<?php

namespace App\Http\Controllers\Frontend;
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
    /**文档列表 通配 包含普通文档 品牌文档及产品文档
     * @param $path
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listNews(Request $request,$path,$page=0)
    {
        is_numeric($page)?:abort(404);
        //判断当前栏目是否存在
        $typeid=Arctype::where('real_path',preg_replace('/\/p[0-9]+/','',$request->path()))->value('id')?:abort(404);
        //当前栏目信息缓存
        $thistypeinfo=Cache::remember('thistypeinfos_'.$typeid,  config('app.cachetime')+rand(60,60*24), function() use($typeid){
            return  Arctype::where('id',$typeid)->first();
        });
        $cid=$path;
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        //投资分类获取并缓存 筛选用和其他页面缓存独立，仅此处使用
        $type_investment_types=Cache::remember('investment_types_all',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::get(['type','id','url']);
        });
        //针对不同栏目类型返回不同类型页面
        //普通文档列表
        if($thistypeinfo->mid==0)
        {
            $toparticlenavs=Cache::remember('toparticlenavs',  config('app.cachetime')+rand(60,60*24), function(){
                return  Arctype::whereIn('id',[1,35.83,19,42,46,20])->get(['typename','real_path']);
            });
            $pagelists=Archive::where('typeid',$thistypeinfo->id)->orderBy('id','desc')->distinct()->paginate($perPage = 20, $columns = ['*'], $pageName = 'p', $page);
            $pagelists= Paginator::transfer(
                $cid,//传入分类id,
                $pagelists//传入原始分页器
            );
            $paihangbangs= Cache::remember('phb',  config('app.cachetime')+rand(60,60*24), function(){
                return Brandarticle::take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });
            //当前栏目子栏目下品牌最新品牌
            $latestbrands=Cache::remember('latestbrands',  config('app.cachetime')+rand(60,60*24), function() {
                $latestbrands=Brandarticle::latest()->take(12)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
                return $latestbrands;
            });
            //当前栏目相关品牌文档
            $hotbrandnews=Cache::remember('hotbrandnews',  config('app.cachetime')+rand(60,60*24), function() {
                $latestbrandnews=Archive::take(10)->where('flags','like','c%')->latest()->get(['id','title']);
                return $latestbrandnews;
            });
            return view('frontend.list_article',compact('thistypeinfo','pagelists','paihangbangs','investment_types','latestbrands','hotbrandnews','toparticlenavs'));
        }else{
            //品牌列表页
            //获取品牌顶级栏目分类并缓存
            $topbrandtypeinfos=Cache::remember('topbrandtypeinfos', config('app.cachetime')+rand(60,60*24), function (){
                return Arctype::where('mid',1)->where('id','<>',596)->where('reid',0)->take(25)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
            });
            if ($thistypeinfo->reid)
            {
                //获取当前栏目的父栏目
                $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->reid,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                    return  Arctype::where('id',$thistypeinfo->reid)->first();
                });
                //获取当前栏目同级栏目
                $sontypes=Cache::remember('sontypes'.$thistypeinfo->reid, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                    return Arctype::where('mid',1)->where('reid',$thistypeinfo->reid)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
                });
                //获取当前分类下包含的投资分类并缓存
                $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                    return Brandarticle::where('typeid',$thistypeinfo->id)->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
                });
                //当前栏目品牌分页处理
                $pagelists=Brandarticle::where('typeid',$typeid)->orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
                //当前品牌栏目排行榜信息
                $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                    return Brandarticle::where('typeid',$thistypeinfo->id)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
                });
                //获取当前栏目最新品牌并缓存
                $latestbrands=Cache::remember('thisarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                    $latestbrands=Brandarticle::where('typeid',$thistypeinfo->id)->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
                    return $latestbrands;
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
                //获取当前栏目子栏目
                $sontypes=Cache::remember('sontypes'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                    return Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
                });

                //获取当前分类下包含的投资分类并缓存
                $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                    return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
                });
                //当前栏目品牌分页处理
                $pagelists=Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
                //排行榜
                $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                    return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
                });
                //当前栏目子栏目下品牌最新品牌
                $latestbrands=Cache::remember('thisarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                    $latestbrands=Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
                    return $latestbrands;
                });
                //当前栏目相关品牌文档
                $latestbrandnews=Cache::remember('typebrandnews'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                    $latestbrandnews=Archive::whereIn('brandtypeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->take(10)->latest()->get(['id','title','created_at']);
                    return $latestbrandnews;
                });
            }
            $pagelists= Paginator::transfer(
                $cid,//传入分类id,
                $pagelists//传入原始分页器
            );
            $newbrands=Cache::remember('newbrands',  config('app.cachetime')+rand(60,60*24), function(){
                return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
            });
            return view('frontend.brands',compact('thistypeinfo','topbrandtypeinfos','sontypes','pagelists','paihangbangs','investment_types','latestbrands','latestbrandnews','flinks','provinces','province_ids','thistypeinforeid','investment_ids','type_investment_types','newbrands'));
        }

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
        $type_investment_types=Cache::remember('investment_types_all',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::get(['type','id','url']);
        });
        //获取品牌顶级栏目分类并缓存
        $topbrandtypeinfos=Cache::remember('topbrandtypeinfos', config('app.cachetime')+rand(60,60*24), function (){
            return Arctype::where('mid',1)->where('id','<>',596)->where('reid',0)->take(25)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
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
        if ($thistypeinfo->reid)
        {
            //获取当前栏目的父栏目 如果为顶级栏目 父栏目为自身 兼容前端输出层判断
            $thistypeinforeid=Cache::remember('thistypeinfos_'.$thistypeinfo->reid,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return  Arctype::where('id',$thistypeinfo->reid)->first();
            });
            //获取当前栏目同级栏目
            $sontypes=Cache::remember('sontypes'.$thistypeinfo->reid, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                return Arctype::where('mid',1)->where('reid',$thistypeinfo->reid)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
            });
            //获取当前分类下包含的地区并缓存
            $province_ids=Cache::remember('province_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                return Brandarticle::where('typeid',$thistypeinfo->id)->orderBy('id','desc')->distinct()->pluck('province_id','province_id')->toArray();
            });
            //获取当前分类下包含的投资分类并缓存
            $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                return Brandarticle::where('typeid',$thistypeinfo->id)->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
            });
            //当前栏目品牌分页处理
            $pagelists=Brandarticle::when($touzi, function ($query) use ($touzi) {
                return $query->where('tzid',InvestmentType::where('url',$touzi)->value('id'));
            })->where('typeid',$typeid)->orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
            $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return Brandarticle::where('typeid',$thistypeinfo->id)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });
            //获取当前栏目最新品牌并缓存
            $latestbrands=Cache::remember('thisarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                $latestbrands=Brandarticle::where('typeid',$thistypeinfo->id)->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
                return $latestbrands;
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
            //获取当前栏目子栏目
            $sontypes=Cache::remember('sontypes'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                return Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->orderBy('sortrank','desc')->get(['id','typename','real_path']);
            });
            //获取当前栏目所有子栏目品牌所属省份
            $province_ids=Cache::remember('province_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('province_id','province_id')->toArray();
            });
            //获取当前分类下包含的投资分类并缓存
            $investment_ids=Cache::remember('investment_id'.$thistypeinfo->id, config('app.cachetime')+rand(60,60*24), function () use($thistypeinfo){
                return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('id','desc')->distinct()->pluck('tzid','tzid')->toArray();
            });
            //当前栏目品牌分页处理
            $pagelists=Brandarticle::when($touzi, function ($query) use ($touzi) {
                return $query->where('tzid',InvestmentType::where('url',$touzi)->value('id'));
            })->whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->orderBy('click','desc')->distinct()->paginate($perPage = 10, $columns = ['*'], $pageName = 'p', $page);
            //栏目分类品牌排行榜
            $paihangbangs= Cache::remember('phb'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                return Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            });
            //当前栏目子栏目下品牌最新品牌
            $latestbrands=Cache::remember('thisarticleinfos_latestbrands'.$thistypeinfo->id,  config('app.cachetime')+rand(60,60*24), function() use($thistypeinfo){
                $latestbrands=Brandarticle::whereIn('typeid',Arctype::where('mid',1)->where('reid',$thistypeinfo->id)->pluck('id'))->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
                return $latestbrands;
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
        $newbrands=Cache::remember('newbrands',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
        });
        $project_title=Cache::remember('investment_types'.$touzipath,  config('app.cachetime')+rand(60,60*24), function() use($touzipath){
            return InvestmentType::where('url',trim($touzipath,'/'))->value('type');
        });
        return view('frontend.project_brands',compact('thistypeinfo','topbrandtypeinfos','sontypes','pagelists','paihangbangs','investment_types','latestbrands','latestbrandnews','flinks','provinces','province_ids','thistypeinforeid','investment_ids','type_investment_types','newbrands','touzipath','project_title'));

    }
    public function articleIndex()
    {
        $hotnews=Cache::remember('hotnews', rand(60,60*24), function(){
            return Archive::latest()->take('10')->orderBy('id','desc')->get(['id','title','created_at','description']);
        });
        $newsphs=Cache::remember('newsphs', rand(60,60*24), function(){
            return Archive::latest()->take('10')->orderBy('click','desc')->get(['id','title']);
        });
        $chuangyeasks=Cache::remember('chuangyeasks', rand(60,60*24), function(){
            return Archive::latest()->take('12')->where('typeid',1)->orderBy('id','desc')->get(['id','title','created_at','description']);
        });
        $chuangyemiddleasks=Cache::remember('chuangyemiddleasks',rand(60,60*24), function(){
            return Archive::latest()->skip(12)->take('8')->where('typeid',1)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $chuangyemidbottomasks=Cache::remember('chuangyemidbottomasks', rand(60,60*24), function(){
            return Archive::latest()->skip(20)->take(4)->where('typeid',1)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $chuangyegs=Cache::remember('chuangyeg', rand(60,60*24), function(){
            return Archive::latest()->take(4)->where('typeid',19)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $chuangyebots=Cache::remember('chuangyebots', rand(60,60*24), function(){
            return Archive::latest()->skip(4)->take(6)->where('typeid',19)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        //
        $jmfeiyongs=Cache::remember('jmfeiyongs', rand(60,60*24), function(){
            return Archive::latest()->take('12')->where('typeid',35)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $jmfeimiddles=Cache::remember('jmfeimiddles', rand(60,60*24), function(){
            return Archive::latest()->skip(12)->take('8')->where('typeid',35)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $jmfeibottoms=Cache::remember('jmfeibottoms', rand(60,60*24), function(){
            return Archive::latest()->skip(20)->take(4)->where('typeid',35)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $chuanyezds=Cache::remember('chuanyezds', rand(60,60*24), function(){
            return Archive::latest()->take(4)->where('typeid',42)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $chuanyezdbots=Cache::remember('chuanyezdbots', rand(60,60*24), function(){
            return Archive::latest()->skip(4)->take(6)->where('typeid',42)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });

        //

        $touzinews=Cache::remember('touzinews', rand(60,60*24), function(){
            return Archive::latest()->take('12')->where('typeid',35)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $touzimiddles=Cache::remember('touzimiddles', rand(60,60*24), function(){
            return Archive::latest()->skip(12)->take('8')->where('typeid',35)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $touzibottoms=Cache::remember('touzibottom', rand(60,60*24), function(){
            return Archive::latest()->skip(20)->take(4)->where('typeid',35)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $brandnews=Cache::remember('chuanyezds', rand(60,60*24), function(){
            return Archive::latest()->take(4)->where('typeid',42)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        $brandnewbots=Cache::remember('chuanyezdbots', rand(60,60*24), function(){
            return Archive::latest()->skip(4)->take(6)->where('typeid',42)->orderBy('id','desc')->get(['id','title','created_at','description','litpic']);
        });
        return view('frontend.article_index',compact('hotnews','chuangyeasks','chuangyemiddleasks','chuangyemidbottomasks','newsphs',
            'chuangyegs','chuangyebots','jmfeiyongs','jmfeimiddles','jmfeibottoms','chuanyezds','chuanyezdbots','touzinews','touzimiddles','touzibottoms','brandnews','brandnewbots'));
    }


}
