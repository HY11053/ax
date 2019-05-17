<?php

namespace App\Http\Controllers\Mip;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Brandarticle;
use App\AdminModel\InvestmentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PaihangbangController extends Controller
{
    public function IndexPaihangbang()
    {
        //获取顶级品牌分类栏目信息并缓存
        $topbandnavs=Cache::remember('topnavsbrandphb',365*24*60,function (){
            return Arctype::where('mid',1)->where('reid',0)->get(['typename','real_path','id']);
        });
        //获取顶级品牌分类栏目信息 缓存路径和栏目名称供循环调用
        $topbandnav2=Cache::remember('topnavsbrandphb2',365*24*60,function (){
            return Arctype::where('mid',1)->where('reid',0)->pluck('real_path','typename');
        });
        //获取全部投资分类类型并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        $paihangbangalls=Cache::remember('paihangbangall',365*34*60,function (){
            return Brandarticle::whereIn('typeid',Arctype::where('reid','>',0)->where('mid',1)->pluck('id'))->take(10)->orderBy('click','desc')->get(['id','typeid','tzid','brandname','litpic']);
        });
        $paihangbangmonths=Cache::remember('paihangbangmonth',365*34*60,function (){
            return Brandarticle::whereIn('typeid',Arctype::where('reid','>',0)->where('mid',1)->pluck('id'))->skip(10)->take(10)->orderBy('click','desc')->get(['id','typeid','tzid','brandname','litpic']);
        });
        $paihangbangweeks=Cache::remember('paihangbangweek',365*34*60,function (){
            return Brandarticle::whereIn('typeid',Arctype::where('reid','>',0)->where('mid',1)->pluck('id'))->skip(20)->take(10)->orderBy('click','desc')->get(['id','typeid','tzid','brandname','litpic']);
        });
        //全部分类排行榜内容缓存输出
        $paihangbangbrands=Cache::remember('paihangbangbrands',365*34*60,function () use($topbandnavs){
            foreach ($topbandnavs as $topbandnav)
            {
                $paihangbangbrands[$topbandnav->typename]=Brandarticle::whereIn('typeid',Arctype::where('reid',$topbandnav->id)->pluck('id'))->take(10)->orderBy('click','desc')->get(['id','typeid','tzid','brandname','litpic']);
            }
            return $paihangbangbrands;
        });
        return view('mip.paihangbang_index',compact('topbandnavs','topbandnav2','paihangbangbrands','investment_types','paihangbangalls','paihangbangmonths','paihangbangweeks'));
    }

    /**分类排行榜详情
     * @param string $path
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Paihangbang($path='')
    {
        $thistypeinfo=Arctype::where('real_path',$path)->first();
        if(!$thistypeinfo)
        {
            abort(404);
        }
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        //根据不同栏目类型获取品牌分类排行榜数据
        if ($thistypeinfo->reid)
        {
            $paihangbrands=Cache::remember('paihang_bang_type'.$thistypeinfo->real_path,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return Brandarticle::take(50)->where('typeid',$thistypeinfo->id)->orderBy('click','desc')->get(['id','tzid','brandname','litpic']);
            });
        }else{
            $paihangbrands=Cache::remember('paihang_bang_type'.$thistypeinfo->real_path,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
               return Brandarticle::take(50)->whereIn('typeid',Arctype::where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('click','desc')->get(['id','tzid','brandname','litpic']);
            });
        }
        //左侧排行榜分类缓存写入
        $navbrands=Cache::remember('navtypes',  config('app.cachetime')+rand(60,60*24)*365, function(){
            $brandtypes=[];
            $navtops=Arctype::where('reid',0)->where('mid',1)->take(18)->get(['typename','id','real_path']);
            foreach ($navtops as $navtop)
            {
                $brandtypes[$navtop->typename]=Arctype::where('reid',$navtop->id)->orderBy('sortrank','desc')->get(['typename','real_path']);
            }
            return $brandtypes;
        });
        $navtops = Cache::remember('navtops', 60 * 24 * 365, function () {
            $tops=[];
            $toplists= Arctype::where('reid', 0)->where('mid', 1)->take(18)->get(['typename', 'real_path']);
            foreach ($toplists as $toplist) {
                $tops[$toplist->typename]=$toplist;
            }
            return $tops;
        });
        return view('mip.paihangbang',compact('thistypeinfo','paihangbrands','investment_types','navbrands','navtops'));
    }

    /**所有排行榜详情
     * @param string $path
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PaihangbangAll($path='')
    {
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        //根据不同栏目类型获取品牌分类排行榜数据
        $paihangbrands=Cache::remember('paihang_bang_type_all',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::take(50)->whereIn('typeid',Arctype::where('reid','>',0)->pluck('id'))->orderBy('click','desc')->get(['id','tzid','brandname','litpic']);
        });
        //左侧排行榜分类缓存写入
        $navbrands=Cache::remember('navtypes',  config('app.cachetime')+rand(60,60*24)*365, function(){
            $brandtypes=[];
            $navtops=Arctype::where('reid',0)->where('mid',1)->take(18)->get(['typename','id','real_path']);
            foreach ($navtops as $navtop)
            {
                $brandtypes[$navtop->typename]=Arctype::where('reid',$navtop->id)->take(25)->orderBy('sortrank','desc')->get(['typename','real_path']);
            }
            return $brandtypes;
        });
        $navtops = Cache::remember('navtops', 60 * 24 * 365, function () {
            $tops=[];
            $toplists= Arctype::where('reid', 0)->where('mid', 1)->take(18)->get(['typename', 'real_path']);
            foreach ($toplists as $toplist) {
                $tops[$toplist->typename]=$toplist;
            }
            return $tops;
        });
        return view('mip.paihangbang_all',compact('thistypeinfo','paihangbrands','investment_types','navbrands','navtops'));
    }


    /**月排行榜详情
     * @param string $path
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PaihangbangMonth($path='')
    {
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        //根据不同栏目类型获取品牌分类排行榜数据
        $paihangbrands=Cache::remember('paihang_bang_type_all',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::skip(50)->take(50)->whereIn('typeid',Arctype::where('reid','>',0)->pluck('id'))->orderBy('click','desc')->get(['id','tzid','brandname','litpic']);
        });
        //左侧排行榜分类缓存写入
        $navbrands=Cache::remember('navtypes',  config('app.cachetime')+rand(60,60*24)*365, function(){
            $brandtypes=[];
            $navtops=Arctype::where('reid',0)->where('mid',1)->take(18)->get(['typename','id','real_path']);
            foreach ($navtops as $navtop)
            {
                $brandtypes[$navtop->typename]=Arctype::where('reid',$navtop->id)->orderBy('sortrank','desc')->get(['typename','real_path']);
            }
            return $brandtypes;
        });
        $navtops = Cache::remember('navtops', 60 * 24 * 365, function () {
            $tops=[];
            $toplists= Arctype::where('reid', 0)->where('mid', 1)->take(18)->get(['typename', 'real_path']);
            foreach ($toplists as $toplist) {
                $tops[$toplist->typename]=$toplist;
            }
            return $tops;
        });
        return view('mip.paihangbang_month',compact('thistypeinfo','paihangbrands','investment_types','navbrands','navtops'));
    }

    /**周排行榜详情
     * @param string $path
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PaihangbangWeek($path='')
    {
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        //根据不同栏目类型获取品牌分类排行榜数据
        $paihangbrands=Cache::remember('paihang_bang_type_all',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::skip(100)->take(50)->whereIn('typeid',Arctype::where('reid','>',0)->pluck('id'))->orderBy('click','desc')->get(['id','tzid','brandname','litpic']);
        });
        //左侧排行榜分类缓存写入
        $navbrands=Cache::remember('navtypes',  config('app.cachetime')+rand(60,60*24)*365, function(){
            $brandtypes=[];
            $navtops=Arctype::where('reid',0)->where('mid',1)->take(18)->get(['typename','id','real_path']);
            foreach ($navtops as $navtop)
            {
                $brandtypes[$navtop->typename]=Arctype::where('reid',$navtop->id)->orderBy('sortrank','desc')->get(['typename','real_path']);
            }
            return $brandtypes;
        });
        $navtops = Cache::remember('navtops', 60 * 24 * 365, function () {
            $tops=[];
            $toplists= Arctype::where('reid', 0)->where('mid', 1)->take(18)->get(['typename', 'real_path']);
            foreach ($toplists as $toplist) {
                $tops[$toplist->typename]=$toplist;
            }
            return $tops;
        });
        return view('mip.paihangbang_week',compact('thistypeinfo','paihangbrands','investment_types','navbrands','navtops'));
    }
}
