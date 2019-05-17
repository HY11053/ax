<?php

namespace App\Http\Controllers\Frontend;
use App\AdminModel\Archive;
use App\AdminModel\Brandarticle;
use App\AdminModel\InvestmentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SeacrhController extends Controller
{
    public function SeacrhBrand(Request $request)
    {
        $investment_types=Cache::remember('investment_types', 60*24*365, function(){
            return InvestmentType::pluck('type','id');
        });
        $brands=Brandarticle::where('brandname','like',$request->keywords.'%')->take(10)->get(['id','brandname','litpic','tzid','description','brandnum','brandattch','brandapply']);
        $paihangbangs= Cache::remember('phb',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
        });
        $hotbrandnews=Cache::remember('hotbrandnews',  config('app.cachetime')+rand(60,60*24), function() {
            $latestbrandnews=Archive::take(10)->where('flags','like','c%')->latest()->get(['id','title']);
            return $latestbrandnews;
        });
        return view('frontend.search_brand',compact('brands','investment_types','paihangbangs','hotbrandnews'));
    }
}
