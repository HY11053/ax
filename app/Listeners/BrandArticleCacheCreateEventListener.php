<?php

namespace App\Listeners;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Brandarticle;
use App\AdminModel\InvestmentType;
use App\Events\BrandArticleCacheCreateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class BrandArticleCacheCreateEventListener
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
     * @param  BrandArticleCacheCreateEvent  $event
     * @return void
     */
    public function handle(BrandArticleCacheCreateEvent $event)
    {
        $id=$event->brandarticle->id;
        if (Brandarticle::find($id))
        {
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('thisbrandarticleinfos_'.$id);
            //当前品牌文档信息，请保持缓存名称和普通文档的所属品牌缓存名称相同
            $thisarticleinfos = Cache::remember('thisbrandarticleinfos_'.$id, config('app.cachetime')+rand(60,60*24), function() use($id){
                return Brandarticle::findOrFail($id);
            });
            //当前品牌所属分类，请保持缓存名称和普通文档的所属品牌分类缓存名称相同
            $thisbrandtypeinfo=Cache::remember('thistypeinfos_'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return  Arctype::where('id',$thisarticleinfos->typeid)->first();
            });
            //当前品牌所属父分类，请保持缓存名称和普通文档的所属品牌父分类缓存名称相同
            $thisbrandtypecidinfo=Cache::remember('thistypeinfos_'.$thisbrandtypeinfo->reid,  config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypeinfo){
                return Arctype::where('id',$thisbrandtypeinfo->reid)->first();
            });
            //品牌所属地区 请保持缓存名称和普通文档的所属品牌地区缓存名称相同
            Cache::remember('thisarticlebradarea'.$thisarticleinfos->city_id,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return Area::where('id',$thisarticleinfos['city_id'])->first(['name_cn']);
            });
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('phb'.$thisarticleinfos->typeid);
            //品牌分类排行榜 请保持缓存名称和普通文档所属品牌分类的排行榜缓存文件名称相同
            Cache::remember('phb'.$thisarticleinfos->typeid,   config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return Brandarticle::where('typeid',$thisarticleinfos->typeid)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('thisarticleinfos_brandidnews'.$id);
            //获取当前文档相关品牌文档，不足将用当前文档所属品牌分类下品牌文档补足 保持缓存名称和普通文档相关品牌文档缓存名称相同
            $latestbrandnews=Cache::remember('thisarticleinfos_brandidnews'.$id,   config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                $brandnews=Archive::where('brandid',$thisarticleinfos->id)->take(10)->latest()->get(['id','title','created_at','litpic']);
                if ($brandnews->count()<10)
                {
                    $completionnews=Archive::where('brandtypeid',$thisarticleinfos->typeid)->whereNotIn('id',Archive::where('brandid',$thisarticleinfos->id)->pluck('id'))->take(10-($brandnews->count()))->latest()->get(['id','title','created_at','litpic']);
                }else{
                    $completionnews=collect([]);
                }
                $latestbrandnews=collect([$brandnews,$completionnews])->collapse();
                return $latestbrandnews;
            });
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('brandtypenews'.$thisarticleinfos->id);
            //当前品牌相关资讯 右侧
            Cache::remember('brandtypenews'.$thisarticleinfos->id,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos,$latestbrandnews,$thisbrandtypecidinfo){
                $notids=[];
                foreach ($latestbrandnews as $latestbrandnew)
                {
                    $notids[]=$latestbrandnew->id;
                }
                $typenews=Archive::where('brandtypeid',$thisarticleinfos->typeid)->whereNotIn('id',$notids)->take(10)->latest()->get(['id','title']);
                if ($typenews->count()<10)
                {
                    if ($thisbrandtypecidinfo->id)
                    {
                        $complettypeews=Archive::where('brandcid',$thisbrandtypecidinfo->id)->whereNotIn('id',$notids)->take(10-($typenews->count()))->latest()->get(['id','title']);
                    }
                }else{
                    $complettypeews=collect([]);
                }
                $latesttypenews=collect([$typenews,$complettypeews])->collapse();
                return $latesttypenews;
            });
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('thisarticleinfos_latestbrands'.$thisarticleinfos->typeid);
            //当前栏目所属分类最新入驻品牌
            Cache::remember('thisarticleinfos_latestbrands'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return Brandarticle::where('typeid',$thisarticleinfos->typeid)->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            });
            //清除推荐品牌缓存重新写入 兼容Update
            Cache::forget('thisarticleinfos_latestcbrands'.$thisarticleinfos->typeid);
            Cache::remember('thisarticleinfos_latestcbrands'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
                return Brandarticle::where('typeid',$thisarticleinfos->typeid)->latest()->take(12)->orderBy('click','desc')->get(['id','brandname','tzid','litpic']);
            });
            //所有行业最新入驻品牌
            Cache::remember('newbrands', 60, function(){
                return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
            });
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('brandtypeids'.$thisarticleinfos->typeid);
            //热门行业商机快速查询
            Cache::remember('brandtypeids'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypecidinfo){
                $brandtypeids=Arctype::where('reid',$thisbrandtypecidinfo->id)->take(20)->orderBy('id','desc')->get(['id','typename','real_path']);
                return $brandtypeids;
            });
            //投资分类获取并缓存
            Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
                return InvestmentType::pluck('type','id');
            });
        }
    }
}
