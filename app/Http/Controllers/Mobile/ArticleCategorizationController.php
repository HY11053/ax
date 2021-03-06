<?php

namespace App\Http\Controllers\Mobile;
use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Brandarticle;
use App\AdminModel\flink;
use App\AdminModel\InvestmentType;
use App\AdminModel\Production;
use App\Overwrite\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ArticleCategorizationController extends Controller
{
    /**普通文档列表页
     * @param Request $request
     * @param $path
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ListNewsLists(Request $request,$path,$page=0)
    {
        //判断当前栏目是否存在
        $typeid=Arctype::where('real_path',preg_replace('/\/[0-9]+/','',$path))->value('id')?:abort(404);
        //当前栏目信息缓存
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        $cid=$path;
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        $pagelists=Archive::where('typeid',$thistypeinfo->id)->orderBy('id','desc')->distinct()->paginate($perPage = 40, $columns = ['*'], $pageName = 'p', $page);
        $pagelists= Paginator::transfer(
            $cid,//传入分类id,
            $pagelists//传入原始分页器
        );
        $latestnews=Cache::remember('list_latestnews',config('app.cachetime')+rand(60,60*24), function(){
            return Archive::latest()->take(19)->orderBy('id','desc')->get(['id','title','created_at']);
        });
        $latestbrands=Cache::remember('list_latestbrands',  config('app.cachetime')+rand(60,60*24), function() {
            $latestbrands=Brandarticle::latest()->take(10)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            return $latestbrands;
        });
        return view('mobile.list_article',compact('thistypeinfo','pagelists','latestbrands','investment_types','latestnews'));
    }
    /**文档列表 通配 包含普通文档 品牌文档及产品文档
     * @param $path
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ListBrands(Request $request,$path,$page=0)
    {
        is_numeric($page)?:abort(404);
        //判断当前栏目是否存在
        $typeid=Arctype::where('real_path',preg_replace('/\/[0-9]+/','',$request->path()))->value('id')?:abort(404);
        //当前栏目信息缓存
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        $cid=$path;
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });

        if ($thistypeinfo->reid)
        {
            //获取当前栏目的父栏目
            $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->reid,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return  Arctype::where('id',$thistypeinfo->reid)->first();
            });
            //当前栏目品牌分页处理
            $pagelists=Brandarticle::where('typeid',$typeid)->orderBy('click','desc')->orderBy('id','desc')->distinct()->paginate($perPage = 26, $columns = ['*'], $pageName = 'p', $page);
            //当前品牌栏目排行榜信息
            $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return Brandarticle::where('typeid',$thistypeinfo->id)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });
            //当前栏目相关品牌文档
            $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                $latestbrandnews=Archive::where('brandtypeid',$thistypeinfo->id)->take(10)->latest()->get(['id','title','created_at']);
                return $latestbrandnews;
            });
        }else{
            //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
            $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo) {
                return Arctype::where('id', $thistypeinfo->id)->first();
            });
            //获取当前分类下包含的投资分类并缓存
            $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
            });
            //当前栏目品牌分页处理
            $pagelists=Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('click','desc')->distinct()->paginate($perPage = 26, $columns = ['*'], $pageName = 'p', $page);
            //排行榜
            $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });
            //当前栏目相关品牌文档
            $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                $latestbrandnews=Archive::whereIn('brandtypeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('id','desc')->take(10)->latest()->get(['id','title','created_at']);
                return $latestbrandnews;
            });
        }
        $pagelists= Paginator::transfer(
            $cid,//传入分类id,
            $pagelists//传入原始分页器
        );
        return view('mobile.brands',compact('thistypeinfo','topbrandtypeinfos','pagelists','paihangbangs','investment_types','latestbrands','latestbrandnews','thistypeinforeid'));
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
    public function projectBrandLists($path,$tid='',$zid='',$page=0)
    {
        is_numeric($page)?:abort(404);
        $typeid=Arctype::where('real_path',$path)->value('id')?:abort(404);
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        //获取品牌顶级栏目分类并缓存
        $topbrandtypeinfos=Cache::remember('topbrandtypeinfos', config('app.cachetime')+rand(60,60*24), function (){
            return Arctype::where('mid',1)->where('id','<>',220)->where('reid',0)->take(25)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
        });
        $touzi=$tid.'_'.$zid;
        if ($thistypeinfo->reid)
        {
            //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
            $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->reid,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return  Arctype::where('id',$thistypeinfo->reid)->first();
            });
            //当前栏目品牌分页处理
            $pagelists=Brandarticle::when($touzi, function ($query) use ($touzi) {
                return $query->where('tzid',InvestmentType::where('url',$touzi)->value('id'));
            })->where('typeid',$typeid)->orderBy('click','desc')->distinct()->paginate($perPage = 26, $columns = ['*'], $pageName = 'p', $page);
            $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return Brandarticle::where('typeid',$thistypeinfo->id)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });

            //当前栏目相关品牌文档
            $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                $latestbrandnews=Archive::where('brandtypeid',$thistypeinfo->id)->take(10)->latest()->get(['id','title']);
                return $latestbrandnews;
            });
        }else{
            //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
            $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo) {
                return Arctype::where('id', $thistypeinfo->id)->first();
            });

            //当前栏目品牌分页处理
            $pagelists=Brandarticle::when($touzi, function ($query) use ($touzi) {
                return $query->where('tzid',InvestmentType::where('url',$touzi)->value('id'));
            })->whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('click','desc')->distinct()->paginate($perPage = 26, $columns = ['*'], $pageName = 'p', $page);
            //栏目分类品牌排行榜
            $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });
            //当前栏目相关品牌文档
            $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                $latestbrandnews=Archive::whereIn('brandtypeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->take(10)->latest()->get(['id','title','created_at']);
                return $latestbrandnews;
            });
        }
        if (str_replace('_','',$touzi))
        {
            $touzipath=$touzi.'/';
        }else{
            $touzipath='';
        }
        $project_title=Cache::remember('investment_types'.$touzipath,  config('app.cachetime')+rand(60,60*24), function() use($touzipath){
            return InvestmentType::where('url',trim($touzipath,'/'))->value('type');
        });
        return view('mobile.project_brands',compact('thistypeinfo','topbrandtypeinfos','pagelists','paihangbangs','investment_types','latestbrandnews','thistypeinforeid','project_title'));
    }

}
