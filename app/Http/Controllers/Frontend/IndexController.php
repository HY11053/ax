<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Brandarticle;
use App\AdminModel\flink;
use App\AdminModel\InvestmentType;
use App\AdminModel\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    function Index()
    {
        //最新加盟项目
        $latestbrands=Cache::remember('index_latestbrands', 60, function(){
            return Brandarticle::latest()->take(24)->orderBy('id','desc')->get(['id','brandname','tzid']);
        });
        //热门商机资讯
        $latestbrandnews=Cache::remember('index_latestbrandnews', 10, function(){
            return Archive::latest()->take(12)->orderBy('id','desc')->get(['id','title']);
        });
        //加盟排行榜
        $paihangbrands=Cache::remember('index_paihang', 60*24, function(){
            return Brandarticle::take(10)->whereIn('typeid',Arctype::where('reid','>',0)->pluck('id'))->orderBy('click','desc')->get(['id','tzid','brandname','litpic']);
        });
        //最新上榜
        $latestbrand2s=Cache::remember('index_latestbrand2s', 60, function(){
            return Brandarticle::latest()->skip(24)->take(12)->orderBy('id','desc')->get(['id','brandname','typeid']);
        });
        //品牌新闻
        $brandnews=Cache::remember('index_brandnews', 10, function(){
            return Archive::where('typeid',46)->latest()->take(14)->orderBy('id','desc')->get(['id','title']);
        });
        //创业指导
        $chuangyenews=Cache::remember('index_chuangyenews', 10, function(){
            return Archive::where('typeid',42)->take(6)->latest()->get(['id','title','description','created_at','litpic']);
        });
        //加盟费用
        $jmfeiyongnews=Cache::remember('index_jmfeiyongnews', 10, function(){
            return Archive::where('typeid',35)->take(6)->latest()->get(['id','title','description','created_at','litpic']);
        });
        //投资行情
        $touzinews=Cache::remember('index_touzinews', 10, function(){
            return Archive::where('typeid',83)->take(6)->latest()->get(['id','title','description','created_at','litpic']);
        });
        //品牌新闻
        $pinpainews=Cache::remember('index_pinpainews', 10, function(){
            return Archive::where('typeid',46)->skip(14)->take(6)->latest()->get(['id','title','description','created_at','litpic']);
        });
        //投资分类
        $investment_types=Cache::remember('investment_types', 60*24*365, function(){
            return InvestmentType::pluck('type','id');
        });
        //潜力品牌
        $latestbrandbots=Cache::remember('index_latestbrandbots', 10, function(){
            return Brandarticle::skip(24)->take(14)->latest()->get(['id','litpic','brandname','tzid']);
        });
        //友情链接
        $flinks=Cache::remember('index_flinks', 10, function(){
            return flink::where('type',1)->get();
        });
        return view('frontend.index',compact('latestbrands','latestbrandnews','investment_types','paihangbrands','latestbrand2s','brandnews','chuangyenews','jmfeiyongnews','touzinews','pinpainews','latestbrandbots','flinks'));
    }
}
