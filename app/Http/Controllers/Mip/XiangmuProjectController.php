<?php

namespace App\Http\Controllers\Mip;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Brandarticle;
use App\AdminModel\flink;
use App\AdminModel\InvestmentType;
use App\AdminModel\Production;
use Carbon\Carbon;
use App\Overwrite\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class XiangmuProjectController extends Controller
{
    /**项目大分类独立筛选
     * @param Request $request
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function XiangmuLists(Request $request,$page=0)
    {
        is_numeric($page)?:abort(404);
        $typeid=Arctype::where('real_path',preg_replace('/\/p[0-9]+/','',$request->path()))->value('id')?:abort(404);
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        $type_investment_types=Cache::remember('investment_types_all',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::get(['type','id','url']);
        });
        //获取品牌顶级栏目分类并缓存
        $topbrandtypeinfos=Cache::remember('topbrandtypeinfos', config('app.cachetime')+rand(60,60*24), function (){
            return Arctype::where('mid',1)->where('reid',0)->take(25)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目友情链接并缓存
        $flinks=Cache::remember('flinks'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return flink::where('cid',$thistypeinfo->id)->get(['weburl','webname']);
        });
        //获取全国省份城市并缓存
        $provinces=Cache::remember('provinces', config('app.cachetime')+rand(60,60*24), function () {
            return Area::where('parentid',0)->get(['name_cn','id','name_path']);
        });
        //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
        $thistypeinforeid=$thistypeinfo;
        //获取当前栏目子栏目
        $sontypes=Cache::remember('sontypes'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目所有子栏目品牌所属省份
        $province_ids=Cache::remember('province_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function (){
            return Brandarticle::orderBy('id','desc')->distinct()->pluck('province_id','province_id')->toArray();
        });
        //获取当前分类下包含的投资分类并缓存
        $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function (){
            return Brandarticle::orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
        });
        //当前栏目品牌分页处理
        $pagelists=Brandarticle::orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
        $cid='';
        $pagelists= Paginator::transfer(
            $cid,//传入分类id,
            $pagelists//传入原始分页器
        );
        $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
        });
        //当前栏目子栏目下品牌最新品牌
        $latestbrands=Cache::remember('thisbrandarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function(){
            $latestbrands=Brandarticle::latest()->take('5')->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            return $latestbrands;
        });
        //当前栏目相关品牌文档
        $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function(){
            $latestbrandnews=Archive::take(10)->latest()->get(['id','title','created_at']);
            return $latestbrandnews;
        });
        $newbrands=Cache::remember('newbrands',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
        });
        return view('mip.xiangmu_project',compact('thistypeinfo','topbrandtypeinfos','sontypes','pagelists','paihangbangs','investment_types','latestbrands','latestbrandnews','flinks','provinces','province_ids','thistypeinforeid','investment_ids','type_investment_types','newbrands','touzipath'));
    }
    /***
     * 品牌分类筛选
     * @param Request $request
     * @param $path
     * @param int $tid
     * @param int $cid
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function projectBrandLists($tid='',$zid='',$page=0)
    {
        is_numeric($page)?:abort(404);
        $path='xiangmu';
        $typeid=Arctype::where('real_path',$path)->value('id')?:abort(404);
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        $type_investment_types=Cache::remember('investment_types_all',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::get(['type','id','url']);
        });
        //获取品牌顶级栏目分类并缓存
        $topbrandtypeinfos=Cache::remember('topbrandtypeinfos', config('app.cachetime')+rand(60,60*24), function (){
            return Arctype::where('mid',1)->where('reid',0)->take(25)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目友情链接并缓存
        $flinks=Cache::remember('flinks'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return flink::where('cid',$thistypeinfo->id)->get(['weburl','webname']);
        });
        //获取全国省份城市并缓存
        $provinces=Cache::remember('provinces', config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Area::where('parentid',0)->get(['name_cn','id','name_path']);
        });
        $touzi=$tid.'_'.$zid;
        //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
        $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo) {
            return Arctype::where('id', $thistypeinfo->id)->first();
        });
        //获取当前栏目子栏目
        $sontypes=Cache::remember('sontypes'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Arctype::where('mid',1)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目所有子栏目品牌所属省份
        $province_ids=Cache::remember('province_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('province_id','province_id')->toArray();
        });
        //获取当前分类下包含的投资分类并缓存
        $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
        });
        //当前栏目品牌分页处理
        $pagelists=Brandarticle::when($touzi, function ($query) use ($touzi) {
            return $query->where('tzid',InvestmentType::where('url',$touzi)->value('id'));
        })->whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
        $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
        });
        //当前栏目子栏目下品牌最新品牌
        $latestbrands=Cache::remember('thisbrandarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            $latestbrands=Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->latest()->take('5')->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            return $latestbrands;
        });
        //当前栏目相关品牌文档
        $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            $latestbrandnews=Archive::whereIn('brandtypeid',Arctype::where('mid',1)->pluck('id'))->take(10)->latest()->get(['id','title','created_at']);
            return $latestbrandnews;
        });
        if (str_replace('_','',$touzi))
        {
            $touzipath=$touzi.'/';
        }else{
            $touzipath='';
        }
        $newbrands=Cache::remember('newbrands',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
        });
        $project_title=Cache::remember('investment_types'.$touzipath,  config('app.cachetime')+rand(60,60*24), function() use($touzipath){
            return InvestmentType::where('url',trim($touzipath,'/'))->value('type');
        });
        return view('mip.xiangmu_project',compact('thistypeinfo','topbrandtypeinfos','sontypes','pagelists','paihangbangs','investment_types','latestbrands','latestbrandnews','flinks','provinces','province_ids','thistypeinforeid','investment_ids','type_investment_types','newbrands','touzipath','project_title'));
    }

    public function CityBrandLists($path2='',$page=0,$tid='',$zid='')
    {
        is_numeric($page)?:abort(404);
        $path='xiangmu';
        $typeid=Arctype::where('real_path',$path)->value('id')?:abort(404);
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        $type_investment_types=Cache::remember('investment_types_all',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::get(['type','id','url']);
        });
        //获取品牌顶级栏目分类并缓存
        $topbrandtypeinfos=Cache::remember('topbrandtypeinfos', config('app.cachetime')+rand(60,60*24), function (){
            return Arctype::where('mid',1)->where('reid',0)->take(25)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目友情链接并缓存
        $flinks=Cache::remember('flinks'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return flink::where('cid',$thistypeinfo->id)->get(['weburl','webname']);
        });
        //获取全国省份城市并缓存
        $provinces=Cache::remember('provinces', config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Area::where('parentid',0)->get(['name_cn','id','name_path']);
        });
        //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
        $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo) {
            return Arctype::where('id', $thistypeinfo->id)->first();
        });
        //获取当前栏目子栏目
        $sontypes=Cache::remember('sontypes'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Arctype::where('mid',1)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目所有子栏目品牌所属省份
        $province_ids=Cache::remember('province_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('province_id','province_id')->toArray();
        });
        //获取当前分类下包含的投资分类并缓存
        $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
        });
        //当前栏目品牌分页处理
        $pagelists=Brandarticle::where('province_id',Area::where('name_path',$path2)->value('id'))->whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
        $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
        });
        //当前栏目子栏目下品牌最新品牌
        $latestbrands=Cache::remember('thisbrandarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            $latestbrands=Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->latest()->take('5')->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            return $latestbrands;
        });
        //当前栏目相关品牌文档
        $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            $latestbrandnews=Archive::whereIn('brandtypeid',Arctype::where('mid',1)->pluck('id'))->take(10)->latest()->get(['id','title','created_at']);
            return $latestbrandnews;
        });
        $newbrands=Cache::remember('newbrands',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
        });
        $touzi=$tid.'_'.$zid;
        if (str_replace('_','',$touzi))
        {
            $touzipath=$touzi.'/';
        }else{
            $touzipath='';
        }
        $project_title=Cache::remember('city_types'.$path2,  config('app.cachetime')+rand(60,60*24), function() use($path2){
            return Area::where('name_path',$path2)->value('name_cn');
        });
        return view('mip.xiangmu_project',compact('thistypeinfo','topbrandtypeinfos','sontypes','pagelists','paihangbangs','investment_types','latestbrands','latestbrandnews','flinks','provinces','province_ids','thistypeinforeid','investment_ids','type_investment_types','newbrands','touzipath','project_title'));

    }

    /**城市投资合并筛选
     * @param string $path2
     * @param string $tid
     * @param string $zid
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function CityInverBrandLists($path2='',$tid='',$zid='',$page=0)
    {
        is_numeric($page)?:abort(404);
        $path='xiangmu';
        $typeid=Arctype::where('real_path',$path)->value('id')?:abort(404);
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        $type_investment_types=Cache::remember('investment_types_all',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::get(['type','id','url']);
        });
        //获取品牌顶级栏目分类并缓存
        $topbrandtypeinfos=Cache::remember('topbrandtypeinfos', config('app.cachetime')+rand(60,60*24), function (){
            return Arctype::where('mid',1)->where('reid',0)->take(25)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目友情链接并缓存
        $flinks=Cache::remember('flinks'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return flink::where('cid',$thistypeinfo->id)->get(['weburl','webname']);
        });
        //获取全国省份城市并缓存
        $provinces=Cache::remember('provinces', config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Area::where('parentid',0)->get(['name_cn','id','name_path']);
        });
        $touzi=$tid.'_'.$zid;
        //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
        $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo) {
            return Arctype::where('id', $thistypeinfo->id)->first();
        });
        //获取当前栏目子栏目
        $sontypes=Cache::remember('sontypes'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Arctype::where('mid',1)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        //获取当前栏目所有子栏目品牌所属省份
        $province_ids=Cache::remember('province_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('province_id','province_id')->toArray();
        });
        //获取当前分类下包含的投资分类并缓存
        $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
        });
        //当前栏目品牌分页处理
        $pagelists=Brandarticle::when(str_replace('_','',$touzi), function ($query) use ($touzi) {
            return $query->where('tzid',InvestmentType::where('url',$touzi)->value('id'));
        })->when($path2, function ($query) use ($path2) {
            return $query->where('province_id',Area::where('name_path',$path2)->value('id'));
        })->whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
        $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
        });
        //当前栏目子栏目下品牌最新品牌
        $latestbrands=Cache::remember('thisbrandarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            $latestbrands=Brandarticle::whereIn('typeid',Arctype::where('mid',1)->pluck('id'))->latest()->take('5')->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            return $latestbrands;
        });
        //当前栏目相关品牌文档
        $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
            $latestbrandnews=Archive::whereIn('brandtypeid',Arctype::where('mid',1)->pluck('id'))->take(10)->latest()->get(['id','title','created_at']);
            return $latestbrandnews;
        });
        $newbrands=Cache::remember('newbrands',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
        });
        if (str_replace('_','',$touzi))
        {
            $touzipath=$touzi.'/';
        }else{
            $touzipath='';
        }
        $project_title=Cache::remember('city_inver_types'.$path2,  config('app.cachetime')+rand(60,60*24), function() use($path2,$touzipath){
            return Area::where('name_path',$path2)->value('name_cn').InvestmentType::where('url',trim($touzipath,'/'))->value('type');
        });
        return view('mip.project_brands',compact('thistypeinfo','topbrandtypeinfos','sontypes','pagelists','paihangbangs','investment_types','latestbrands','latestbrandnews','flinks','provinces','province_ids','thistypeinforeid','investment_ids','type_investment_types','newbrands','touzipath','project_title'));

    }
}
