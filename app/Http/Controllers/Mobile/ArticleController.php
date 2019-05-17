<?php

namespace App\Http\Controllers\Mobile;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Brandarticle;
use App\AdminModel\InvestmentType;
use App\AdminModel\Production;
use Carbon\Carbon;
use App\Overwrite\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\AdminModel\Comment;

class ArticleController extends Controller
{
    /**普通文档界面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function NewsArticle(Request $request,$id)
    {
        //获取当前文档并缓存
        $thisarticleinfos = Cache::remember('thisarticleinfos_'.$id, config('app.cachetime')+rand(60,60*24), function() use($id){
            return Archive::findOrFail($id);
        });
        //获取当前栏目信息并缓存
        $thistypeinfo = Cache::remember('thistypeinfos_'.$thisarticleinfos->typeid, config('app.cachetime')+rand(60,60*24), function() use($id,$thisarticleinfos){
            return Arctype::where('id',$thisarticleinfos->typeid)->first();
        });
        //获取文档上一篇并缓存
        $prev_article =Cache::remember('thisarticleinfos_prev'.$id, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
            return Archive::latest('created_at')->where('id',$this->getPrevArticleId($thisarticleinfos->id))->pluck('title','id')->toArray();
        });
        //获取文档下一篇并缓存
        $next_article = Cache::remember('thisarticleinfos_next'.$id, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
            return Archive::latest('created_at')->where('id',$this->getNextArticleId($thisarticleinfos->id))->pluck('title','id')->toArray();
        });
        //获取当前文档所属品牌并缓存
        if($thisarticleinfos->brandid && Brandarticle::where('id',$thisarticleinfos->brandid)->orderBy('id','desc')->value('id'))
        {
            $thisarticlebrandinfos = Cache::remember('thisbrandarticleinfos_'.$thisarticleinfos->brandid, config('app.cachetime')+rand(60,60*24), function() use($id,$thisarticleinfos){
                return Brandarticle::where('id',$thisarticleinfos->brandid)->first();
            });
        }
        //获取当前文档所属品牌分类、父分类及品牌所属地区
        if (isset($thisarticlebrandinfos) && !empty($thisarticlebrandinfos))
        {
            //当前文档所属品牌所属分类
            $thisbrandtypeinfo=Cache::remember('thistypeinfos_'.$thisarticlebrandinfos->typeid, config('app.cachetime')+rand(60,60*24), function() use($thisarticlebrandinfos){
              return  Arctype::where('id',$thisarticlebrandinfos->typeid)->first();
            });
            //当前文档所属品牌所属分类的父分类
            $thisbrandtypecidinfo=Cache::remember('thistypeinfos_'.$thisbrandtypeinfo->reid, config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypeinfo){
                return Arctype::where('id',$thisbrandtypeinfo->reid)->first();
            });
            //当前文档所属品牌所属地区
            $thisarticlebradarea=Cache::remember('thisarticlebradarea'.$thisarticlebrandinfos->city_id, config('app.cachetime')+rand(60,60*24), function() use($thisarticlebrandinfos){
                return Area::where('id',$thisarticlebrandinfos->city_id)->first(['name_cn']);
            });
        }
        //获取当前文档相关品牌文档，不足将用当前文档所属品牌分类下品牌文档补足
        if ($thisarticleinfos->brandid && isset($thisarticlebrandinfos['id']))
        {
            $latestbrandnews=Cache::remember('thisarticleinfos_brandnews'.$thisarticlebrandinfos->id, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos,$thisarticlebrandinfos){
            $brandnews=Archive::where('brandid',$thisarticleinfos->brandid)->take(10)->latest()->get(['id','title','created_at','litpic']);
            if ($brandnews->count()<10)
            {
                $completionnews=Archive::where('brandtypeid',$thisarticleinfos->brandtypeid)->whereNotIn('id',Archive::where('brandid',$thisarticleinfos->brandid)->pluck('id'))->take(10-($brandnews->count()))->latest()->get(['id','title','created_at','litpic']);
            }else{
                $completionnews=collect([]);
            }
            $latestbrandnews=collect([$brandnews,$completionnews])->collapse();
            return $latestbrandnews;
            });
        }else{
            $latestbrandnews=Cache::remember('thisarticleinfos_brandnews'.$thisarticleinfos->typeid, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos) {
                return Archive::where('typeid', $thisarticleinfos->typeid)->take(10)->latest()->get(['id', 'title', 'created_at','litpic']);
            });
        }

        //获取当前文档所属品牌栏目分类
        if (isset($thisarticlebrandinfos))
        {
            $cachetypid=$thisarticlebrandinfos->typeid?$thisarticlebrandinfos->typeid:0;
        }else{
            $cachetypid=0;
        }
        //排行榜 根据品牌对应的所属栏目查询并缓存
        $paihangbangs= Cache::remember('phb'.$cachetypid, config('app.cachetime')+rand(60,60*24), function() use($cachetypid){
            if ($cachetypid){
                $paihangbangs=Brandarticle::where('typeid',$cachetypid)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            }else{
                $paihangbangs=Brandarticle::take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
            }
            return $paihangbangs;
        });
        //当前品牌相关资讯 右侧
        if ($thisarticleinfos->brandid && isset($thisarticlebrandinfos->id))
        {
                $latesttypenews=Cache::remember('brandtypenews'.$thisarticleinfos->brandid, config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos,$latestbrandnews,$thisarticlebrandinfos){
                $notids=[];
                foreach ($latestbrandnews as $latestbrandnew)
                {
                    $notids[]=$latestbrandnew->id;
                }
                return Archive::where('brandtypeid',$thisarticleinfos->brandtypeid)->whereNotIn('id',$notids)->take(10)->latest('created_at')->get(['id','title']);
                });
        }else{
            $latesttypenews=Cache::remember('typenews'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos) {
               return  Archive::where('typeid', $thisarticleinfos->typeid)->take(10)->latest('created_at')->get(['id', 'title']);
            });
        }

        //当前栏目所属分类最新入驻品牌
        $latestbrands=Cache::remember('thisarticleinfos_latestbrands'.$cachetypid,  config('app.cachetime')+rand(60,60*24), function() use($cachetypid){
            if ($cachetypid){
                $latestbrands=Brandarticle::where('typeid',$cachetypid)->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            }else{
                $latestbrands=Brandarticle::latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
            }
            return $latestbrands;
        });
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        return view('mobile.article_article',compact('thisarticleinfos','thisarticlebrandinfos','prev_article','next_article','latestbrandnews','paihangbangs','latesttypenews','latestbrands','thistypeinfo','thisbrandtypeinfo','thisbrandtypecidinfo','investment_types','brand','thisarticlebradarea'));
    }

    /**品牌文档界面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function BrandArticle($id)
    {
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
        $thisarticlebradarea=Cache::remember('thisarticlebradarea'.$thisarticleinfos->city_id,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
            return Area::where('id',$thisarticleinfos['city_id'])->first(['name_cn']);
        });
        //品牌分类排行榜 请保持缓存名称和普通文档所属品牌分类的排行榜缓存文件名称相同
        $paihangbangs= Cache::remember('phb'.$thisarticleinfos->typeid,   config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
            return Brandarticle::where('typeid',$thisarticleinfos->typeid)->take('10')->orderBy('click','desc')->get(['id','brandname','litpic','brandnum','tzid']);
        });
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
        //当前品牌相关资讯 右侧
        $latesttypenews=Cache::remember('brandtypenews'.$thisarticleinfos->id,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos,$latestbrandnews,$thisbrandtypecidinfo){
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

        //当前栏目所属分类最新入驻品牌
        $latestbrands=Cache::remember('thisarticleinfos_latestbrands'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisarticleinfos){
            return Brandarticle::where('typeid',$thisarticleinfos->typeid)->latest()->take(5)->orderBy('id','desc')->get(['id','brandname','tzid','litpic']);
        });
        //所有行业最新入驻品牌
        $newbrands=Cache::remember('newbrands',  config('app.cachetime')+rand(60,60*24), function(){
            return Brandarticle::latest()->take('12')->orderBy('id','desc')->get(['id','brandname']);
        });
        //热门行业商机快速查询
        $brandtypeids=Cache::remember('brandtypeids'.$thisarticleinfos->typeid,  config('app.cachetime')+rand(60,60*24), function() use($thisbrandtypecidinfo){
            $brandtypeids=Arctype::where('reid',$thisbrandtypecidinfo->id)->take(20)->orderBy('id','desc')->get(['id','typename','real_path']);
            return $brandtypeids;
        });
        //投资分类获取并缓存
        $investment_types=Cache::remember('investment_types',  config('app.cachetime')+rand(60,60*24), function(){
            return InvestmentType::pluck('type','id');
        });
        return view('mobile.brand_article',compact('thisarticleinfos','thisbrandtypeinfo','thisbrandtypecidinfo','thisarticlebradarea','investment_types','paihangbangs','latestbrandnews','latesttypenews','latestbrands','newbrands','brandtypeids'));
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
