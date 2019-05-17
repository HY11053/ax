<?php

namespace App\Listeners;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Brandarticle;
use App\AdminModel\InvestmentType;
use App\Events\ArticleCacheCreateEvent;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class ArticleCacheCreateEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleCacheCreateEvent  $event
     * @return void
     */
    public function handle(ArticleCacheCreateEvent $event)
    {
        $id=$event->arcvhive->id;
        if (Archive::find($id))
        {
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('thisarticleinfos_'.$id);
            //获取当前文档并缓存
            $thisarticleinfos = Cache::remember('thisarticleinfos_'.$id, config('app.cachetime')+rand(60,60*24), function() use($id){
                return Archive::findOrFail($id);
            });
            //获取当前栏目信息并缓存
            $thistypeinfo=Cache::remember('thistypeinfos_'.$thisarticleinfos->typeid, config('app.cachetime')+rand(60,60*24), function() use($id,$thisarticleinfos){
                return Arctype::where('id',$thisarticleinfos->typeid)->first();
            });
            //获取文档上一篇并缓存
            Cache::remember('thisarticleinfos_prev'.$id, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return Archive::latest('created_at')->where('id',$this->getPrevArticleId($thisarticleinfos->id))->pluck('title','id')->toArray();
            });
            //获取文档下一篇并缓存 此时下一篇为空
            Cache::remember('thisarticleinfos_next'.$id, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return Archive::latest('created_at')->where('id',$this->getNextArticleId($thisarticleinfos->id))->pluck('title','id')->toArray();
            });
            //更新上一篇文档的下一篇缓存
            $prev_id=$this->getPrevArticleId($id);
            Cache::forget('thisarticleinfos_next'.$prev_id);
            Cache::remember('thisarticleinfos_next'.$prev_id, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return Archive::latest('created_at')->where('id',$thisarticleinfos->id)->pluck('title','id')->toArray();
            });
            //获取当前文档所属品牌并缓存
            if($thisarticleinfos->brandid && Brandarticle::where('id',$thisarticleinfos->brandid)->orderBy('id','desc')->value('id'))
            {
                //清除当前缓存 重新写入 兼容Update
                Cache::forget('thisbrandarticleinfos_'.$thisarticleinfos->brandid);
                $thisarticlebrandinfos = Cache::remember('thisbrandarticleinfos_'.$thisarticleinfos->brandid, config('app.cachetime')+rand(60,60*24), function() use($id,$thisarticleinfos){
                    return Brandarticle::where('id',$thisarticleinfos->brandid)->first();
                });
            }
            //获取当前文档所属品牌分类、父分类及品牌所属地区
            if (isset($thisarticlebrandinfos) && !empty($thisarticlebrandinfos))
            {
                //清除当前缓存 重新写入 兼容Update
                Cache::forget('thistypeinfos_'.$thisarticlebrandinfos->typeid);
                //当前文档所属品牌所属分类
                $thisbrandtypeinfo=Cache::remember('thistypeinfos_'.$thisarticlebrandinfos->typeid, config('app.cachetime')+rand(60,60*24), function() use($thisarticlebrandinfos){
                    return  Arctype::where('id',$thisarticlebrandinfos->typeid)->first();
                });
                //清除当前缓存 重新写入 兼容Update
                Cache::forget('thistypeinfos_'.$thisbrandtypeinfo->reid);
                //当前文档所属品牌所属分类的父分类
                $thisbrandtypecidinfo=Cache::remember('thistypeinfos_'.$thisbrandtypeinfo->reid, config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypeinfo){
                    return Arctype::where('id',$thisbrandtypeinfo->reid)->first();
                });
                //清除当前缓存 重新写入 兼容Update
                //当前文档所属品牌所属地区
                Cache::remember('thisarticlebradarea'.$thisarticlebrandinfos->city_id, config('app.cachetime')+rand(60,60*24), function() use($thisarticlebrandinfos){
                    return Area::where('id',$thisarticlebrandinfos->city_id)->first(['name_cn']);
                });
            }
            //获取当前文档相关品牌文档，不足将用当前文档所属品牌分类下品牌文档补足
            if ($thisarticleinfos->brandid && isset($thisarticlebrandinfos['id']))
            {
                //清除当前缓存 重新写入 兼容Update
                Cache::forget('thisarticleinfos_brandnews'.$thisarticlebrandinfos->id);
                $latestbrandnews=Cache::remember('thisarticleinfos_brandnews'.$thisarticlebrandinfos->id, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos,$thisarticlebrandinfos){
                    $brandnews=Archive::where('brandid',$thisarticleinfos->brandid)->take(10)->latest()->get(['id','title','created_at','litpic']);
                    if ($brandnews->count()<10)
                    {
                        $completionnews=Archive::where('brandtypeid',$thisarticleinfos->brandtypeid)->whereNotIn('id',Archive::where('brandid',$thisarticleinfos->brandid)->pluck('id'))->take(10-($brandnews->count()))->latest()->get(['id','title','created_at','litpic']);
                    }else{
                        $completionnews=collect([]);
                    }
                    $latestbrandnews=collect([$brandnews,$completionnews])->collapse();
                    return $latestbrandnews;
                });
                //清除当前文档所属品牌分类品牌文档调用缓存并重新写入
                Cache::forget('typebrandnews'.$thisarticlebrandinfos->typeid);
                Cache::remember('typebrandnews'.$thisarticlebrandinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisarticlebrandinfos){
                    return Archive::where('brandtypeid',$thisarticlebrandinfos->typeid)->take(10)->latest()->get(['id','title','created_at']);
                });
                //清除当前文档所属品牌分类父分类品牌文档调用缓存并重新写入
                Cache::forget('typebrandnews'.$thisbrandtypecidinfo->id);
                Cache::remember('typebrandnews'.$thisbrandtypecidinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypecidinfo){
                    return Archive::whereIn('brandtypeid',Arctype::where('mid',1)->where('reid',$thisbrandtypecidinfo->id)->pluck('id'))->take(10)->latest()->get(['id','title','created_at']);
                });
            }else{
                //清除当前缓存 重新写入 兼容Update
                Cache::forget('thisarticleinfos_brandnews'.$thisarticleinfos->typeid);
                $latestbrandnews=Cache::remember('thisarticleinfos_brandnews'.$thisarticleinfos->typeid, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos) {
                    return Archive::where('typeid', $thisarticleinfos->typeid)->take(10)->latest()->get(['id', 'title', 'created_at','litpic']);
                });
            }
            //获取当前文档所属品牌栏目分类
            if (isset($thisarticlebrandinfos))
            {
                $cachetypid=$thisarticlebrandinfos->typeid?$thisarticlebrandinfos->typeid:0;
            }else{
                $cachetypid=0;
            }
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('phb'.$cachetypid);
            //排行榜 根据品牌对应的所属栏目查询并缓存
            Cache::remember('phb'.$cachetypid, config('app.cachetime')+rand(60,60*24), function() use($cachetypid){
                if ($cachetypid){
                    $paihangbangs=Brandarticle::where('typeid',$cachetypid)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
                }else{
                    $paihangbangs=Brandarticle::take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
                }
                return $paihangbangs;
            });
            //当前品牌相关资讯 右侧
            if ($thisarticleinfos->brandid && isset($thisarticlebrandinfos->id))
            {
                //清除当前缓存 重新写入 兼容Update
                Cache::forget('brandtypenews'.$thisarticleinfos->brandid);
                Cache::remember('brandtypenews'.$thisarticleinfos->brandid, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos,$latestbrandnews,$thisarticlebrandinfos){
                    $notids=[];
                    foreach ($latestbrandnews as $latestbrandnew)
                    {
                        $notids[]=$latestbrandnew->id;
                    }
                    return Archive::where('brandtypeid',$thisarticleinfos->brandtypeid)->whereNotIn('id',$notids)->take(10)->latest('created_at')->get(['id','title']);
                    /**
                     * if ($typenews->count()<10)
                    {
                    if ($thisarticleinfos->brandcid)
                    {
                    $complettypeews=Archive::where('brandcid',$thisarticleinfos->brandcid)->whereNotIn('id',$notids)->take(10-($typenews->count()))->latest('created_at')->get(['id','title']);
                    }
                    }else{
                    $complettypeews=collect([]);
                    }
                    $latesttypenews=collect([$typenews,$complettypeews])->collapse();
                    return $latesttypenews;
                     */
                });
            }else{
                //清除当前缓存 重新写入 兼容Update
                Cache::forget('typenews'.$thisarticleinfos->typeid);
                Cache::remember('typenews'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos) {
                    return  Archive::where('typeid', $thisarticleinfos->typeid)->take(10)->latest('created_at')->get(['id', 'title']);
                });
            }
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('thisarticleinfos_latestbrands'.$cachetypid);
            //当前栏目所属分类最新入驻品牌
            Cache::remember('thisarticleinfos_latestbrands'.$cachetypid,  config('app.cachetime')+rand(60,60*24), function() use($cachetypid){
                if ($cachetypid){
                    $latestbrands=Brandarticle::where('typeid',$cachetypid)->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
                }else{
                    $latestbrands=Brandarticle::latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
                }
                return $latestbrands;
            });
            //投资分类获取并缓存
            Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
                return InvestmentType::pluck('type','id');
            });
        }
    }

    protected function getPrevArticleId($id)
    {
        return Archive::where('id', '<', $id)->orderBy('id','desc')->value('id');
    }
    protected function getNextArticleId($id)
    {
        return Archive::where('id', '>', $id)->orderBy('id','asc')->value('id');
    }
}
