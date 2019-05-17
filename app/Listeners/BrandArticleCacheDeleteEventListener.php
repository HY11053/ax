<?php

namespace App\Listeners;

use App\AdminModel\Arctype;
use App\AdminModel\Brandarticle;
use App\AdminModel\InvestmentType;
use App\Events\BrandArticleCacheDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class BrandArticleCacheDeleteEventListener
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
     * @param  BrandArticleCacheDeleteEvent  $event
     * @return void
     */
    public function handle(BrandArticleCacheDeleteEvent $event)
    {
        $id=$event->brandarticle->id;
        //清除当前品牌缓存数据
        Cache::forget('thisbrandarticleinfos_'.$id);
        //当前品牌所属分类，请保持缓存名称和普通文档的所属品牌分类缓存名称相同
        $thisbrandtypeinfo=Cache::remember('thistypeinfos_'.$event->brandarticle->typeid,  config('app.cachetime')+rand(60,60*24), function() use($event){
            return  Arctype::where('id',$event->brandarticle->typeid)->first();
        });
        //当前品牌所属父分类，请保持缓存名称和普通文档的所属品牌父分类缓存名称相同
        $thisbrandtypecidinfo=Cache::remember('thistypeinfos_'.$thisbrandtypeinfo->reid,  config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypeinfo){
            return Arctype::where('id',$thisbrandtypeinfo->reid)->first();
        });
        //清除当前品牌排行榜缓存 重新写入 兼容Update
        Cache::forget('phb'.$event->brandarticle->typeid);
        //品牌分类排行榜 请保持缓存名称和普通文档所属品牌分类的排行榜缓存文件名称相同
        Cache::remember('phb'.$event->brandarticle->typeid,   config('app.cachetime')+rand(60,60*24), function() use($event){
            return Brandarticle::where('typeid',$event->brandarticle->typeid)->where('id','<>',$event->brandarticle->id)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
        });
        //清除当前缓存栏目所属分类最新入驻品牌缓存数据
        Cache::forget('thisarticleinfos_latestbrands'.$event->brandarticle->typeid);
        //当前栏目所属分类最新入驻品牌
        Cache::remember('thisarticleinfos_latestbrands'.$event->brandarticle->typeid,  config('app.cachetime')+rand(60,60*24), function() use($event){
            return Brandarticle::where('typeid',$event->brandarticle->typeid)->where('id','<>',$event->brandarticle->id)->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
        });
        //清除推荐品牌缓存
        Cache::forget('thisarticleinfos_latestcbrands'.$event->brandarticle->typeid);
        Cache::remember('thisarticleinfos_latestcbrands'.$event->brandarticle->typeid,  config('app.cachetime')+rand(60,60*24), function() use($event){
            return Brandarticle::where('typeid',$event->brandarticle->typeid)->latest()->take(12)->orderBy('click','desc')->get(['id','brandname','tzid','litpic']);
        });
        Cache::forget('newbrands');
        //所有行业最新入驻品牌
        Cache::remember('newbrands',60, function() use ($event){
            return Brandarticle::latest()->take('12')->orderBy('id','desc')->where('id','<>',$event->brandarticle->id)->get(['id','brandname']);
        });
        //投资分类获取并缓存
        Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });

    }
}
