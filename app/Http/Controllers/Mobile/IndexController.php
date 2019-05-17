<?php

namespace App\Http\Controllers\mobile;

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
        $latestbrands=Cache::remember('m_index_latestbrands', 60, function(){
            return Brandarticle::latest()->take(8)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
        });
        $hotbrands=Cache::remember('m_index_hotbrands', 60, function(){
            return Brandarticle::latest()->take(8)->orderBy('click','desc')->get(['id','brandname','tzid','litpic']);
        });
        //创业指导
        $chuangyenews=Cache::remember('index_chuangyenews', 10, function(){
            return Archive::where('typeid',42)->take(6)->latest()->get(['id','title','description','created_at']);
        });
        //加盟费用
        $jmfeiyongnews=Cache::remember('index_jmfeiyongnews', 10, function(){
            return Archive::where('typeid',35)->take(6)->latest()->get(['id','title','description','created_at']);
        });
        //投资行情
        $touzinews=Cache::remember('index_touzinews', 10, function(){
            return Archive::where('typeid',83)->take(6)->latest()->get(['id','title','description','created_at']);
        });
        //品牌新闻
        $pinpainews=Cache::remember('index_pinpainews', 10, function(){
            return Archive::where('typeid',46)->skip(14)->take(6)->latest()->get(['id','title','description','created_at']);
        });
        //投资分类
        $investment_types=Cache::remember('investment_types', 60*24*365, function(){
            return InvestmentType::pluck('type','id');
        });

        return view('mobile.index',compact('latestbrands','hotbrands','investment_types','chuangyenews','jmfeiyongnews','touzinews','pinpainews'));
    }
}
