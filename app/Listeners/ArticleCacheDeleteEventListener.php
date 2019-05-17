<?php

namespace App\Listeners;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Brandarticle;
use App\Events\ArticleCacheDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class ArticleCacheDeleteEventListener
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
     * @param  ArticleCacheDeleteEvent  $event
     * @return void
     */
    public function handle(ArticleCacheDeleteEvent $event)
    {
        $id=$event->archive->id;
        //清除当前缓存
        Cache::forget('thisarticleinfos_'.$id);
        //获取当前栏目信息并缓存
        Cache::remember('thistypeinfos_'.$event->archive->typeid, config('app.cachetime')+rand(60,60*24), function() use($event){
            return Arctype::where('id',$event->archive->typeid)->first();
        });
        //清除上一篇文档和下一篇文档的上下篇缓存
        $prev_id=$this->getPrevArticleId($event->archive->id);
        $next_id=$this->getNextArticleId($event->archive->id);
        Cache::forget('thisarticleinfos_prev'.$prev_id);
        Cache::forget('thisarticleinfos_next'.$prev_id);
        Cache::forget('thisarticleinfos_prev'.$next_id);
        Cache::forget('thisarticleinfos_next'.$next_id);
        //获取当前文档所属品牌并缓存
        if($event->archive->brandid && Brandarticle::where('id',$event->archive->brandid)->orderBy('id','desc')->value('id'))
        {
            //清除当前缓存
            Cache::forget('thisbrandarticleinfos_'.$event->archive->brandid);
            $thisarticlebrandinfos = Cache::remember('thisbrandarticleinfos_'.$event->archive->brandid, config('app.cachetime')+rand(60,60*24), function() use($id,$event){
                return Brandarticle::where('id',$event->archive->brandid)->first();
            });
        }
        //获取当前文档所属品牌分类、父分类及品牌所属地区
        if (isset($thisarticlebrandinfos) && !empty($thisarticlebrandinfos))
        {
            $thisbrandtypeinfo=Cache::remember('thistypeinfos_'.$thisarticlebrandinfos->typeid, config('app.cachetime')+rand(60,60*24), function() use($thisarticlebrandinfos){
                return  Arctype::where('id',$thisarticlebrandinfos->typeid)->first();
            });
            //当前文档所属品牌所属分类的父分类
            $thisbrandtypecidinfo=Cache::remember('thistypeinfos_'.$thisbrandtypeinfo->reid, config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypeinfo){
                return Arctype::where('id',$thisbrandtypeinfo->reid)->first();
            });
            //当前文档所属品牌所属地区
            Cache::remember('thisarticlebradarea'.$thisarticlebrandinfos->city_id, config('app.cachetime')+rand(60,60*24), function() use($thisarticlebrandinfos){
                return Area::where('id',$thisarticlebrandinfos->city_id)->first(['name_cn']);
            });
        }
        //获取当前文档相关品牌文档，不足将用当前文档所属品牌分类下品牌文档补足
        if ($event->archive->brandid && isset($thisarticlebrandinfos['id']))
        {
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('thisarticleinfos_brandnews'.$thisarticlebrandinfos->id);
            $latestbrandnews=Cache::remember('thisarticleinfos_brandnews'.$thisarticlebrandinfos->id, config('app.cachetime')+rand(60,60*24), function() use($event,$thisarticlebrandinfos){
                $brandnews=Archive::where('brandid',$event->archive->brandid)->where('id','<>',$event->archive->id)->take(10)->latest()->get(['id','title','created_at','litpic']);
                if ($brandnews->count()<10)
                {
                    $completionnews=Archive::where('brandtypeid',$event->archive->brandtypeid)->whereNotIn('id',Archive::where('brandid',$event->archive->brandid)->pluck('id'))->take(10-($brandnews->count()))->latest()->get(['id','title','created_at','litpic']);
                }else{
                    $completionnews=collect([]);
                }
                $latestbrandnews=collect([$brandnews,$completionnews])->collapse();
                return $latestbrandnews;
            });
            //清除当前文档所属品牌分类品牌文档调用缓存
            Cache::forget('typebrandnews'.$thisarticlebrandinfos->typeid);
            //清除当前文档所属品牌分类父分类品牌文档调用缓存
            Cache::forget('typebrandnews'.$thisbrandtypecidinfo->id);
        }else{
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('thisarticleinfos_brandnews'.$event->archive->typeid);
            $latestbrandnews=Cache::remember('thisarticleinfos_brandnews'.$event->archive->typeid, config('app.cachetime')+rand(60,60*24), function() use($event) {
                return Archive::where('typeid', $event->archive->typeid)->where('id','<>',$event->archive->id)->take(10)->latest()->get(['id', 'title', 'created_at','litpic']);
            });
        }

        //当前品牌相关资讯 右侧
        if ($event->archive->brandid && isset($thisarticlebrandinfos->id))
        {
            //清除当前缓存 重新写入 兼容Update
            Cache::forget('brandtypenews'.$event->archive->brandid);
            Cache::remember('brandtypenews'.$event->archive->brandid, config('app.cachetime')+rand(60,60*24), function() use($event,$latestbrandnews,$thisarticlebrandinfos){
                $notids=[];
                foreach ($latestbrandnews as $latestbrandnew)
                {
                    $notids[]=$latestbrandnew->id;
                }
                return Archive::where('brandtypeid',$event->archive->brandtypeid)->where('id','<>',$event->archive->id)->whereNotIn('id',$notids)->take(10)->latest('created_at')->get(['id','title']);
                /**
                 * if ($typenews->count()<10)
                {
                if ($event->archive->brandcid)
                {
                $complettypeews=Archive::where('brandcid',$event->archive->brandcid)->whereNotIn('id',$notids)->take(10-($typenews->count()))->latest('created_at')->get(['id','title']);
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
            Cache::forget('typenews'.$event->archive->typeid);
            Cache::remember('typenews'.$event->archive->typeid,  config('app.cachetime')+rand(60,60*24), function() use($event) {
                return  Archive::where('typeid', $event->archive->typeid)->where('id',$event->archive->id)->take(10)->latest('created_at')->get(['id', 'title']);
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
