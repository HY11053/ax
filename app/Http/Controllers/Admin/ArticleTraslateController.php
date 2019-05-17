<?php

namespace App\Http\Controllers\Admin;
use App\AdminModel\Admin;
use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Brandarticle;
use App\AdminModel\flink;
use App\AdminModel\InvestmentType;
use App\AdminModel\Production;
use App\Scopes\PublishedScope;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleTraslateController extends Controller
{

    /**
     * 普通文档栏目迁移导入
     */
    public function getarctypes()
    {
        $arctypes=DB::connection('u88')->select('SELECT * FROM u88_article_categories  WHERE parent_cid=?',[0]);
        foreach ($arctypes as $arctype)
        {
            $insertarctypes=[];
            $insertarctypes['id']=$arctype->cid;
            $insertarctypes['reid']=$arctype->parent_cid;
            $insertarctypes['topid']=0;
            $insertarctypes['typename']=$arctype->name_cn;
            $insertarctypes['title']=json_decode($arctype->seo)->title;
            $insertarctypes['keywords']=json_decode($arctype->seo)->keywords;
            $insertarctypes['description']=json_decode($arctype->seo)->description;
            $insertarctypes['typedir']=$arctype->name;
            $insertarctypes['real_path']=$arctype->name;
            $insertarctypes['mid']=0;
            $insertarctypes['is_write']=1;
            $insertarctypes['dirposition']=1;
            $insertarctypes['updated_at']=Carbon::now();
            $insertarctypes['created_at']=Carbon::now();
            Arctype::create($insertarctypes);
        }
        echo '导入成功';

    }

    /**
     * 品牌栏目迁移导入
     */
    public function getBrandarctypes()
    {
        $arctypes=DB::connection('u88')->select('SELECT * FROM u88_project_categories  WHERE cid>?',[0]);
        foreach ($arctypes as $arctype)
        {
            $insertarctypes=[];
            if ($arctype->cid==19)
            {
                $insertarctypes['id']=589;
            }elseif($arctype->cid==20)
            {
                $insertarctypes['id']=590;
            }elseif ($arctype->cid==35){
                $insertarctypes['id']=591;
            }elseif ($arctype->cid==42){
                $insertarctypes['id']=592;
            }elseif ($arctype->cid==46){
                $insertarctypes['id']=593;
            }elseif ($arctype->cid==83){
                $insertarctypes['id']=594;
            }elseif ($arctype->cid==86){
                $insertarctypes['id']=595;
            }else{
                $insertarctypes['id']=$arctype->cid;
            }
            if ($arctype->parent_cid==19)
            {
                $insertarctypes['reid']=589;
                $insertarctypes['topid']=589;
            }elseif($arctype->parent_cid==20)
            {
                $insertarctypes['reid']=590;
                $insertarctypes['topid']=590;
            }elseif($arctype->parent_cid==35)
            {
                $insertarctypes['reid']=591;
                $insertarctypes['topid']=591;
            }elseif($arctype->parent_cid==42)
            {
                $insertarctypes['reid']=592;
                $insertarctypes['topid']=592;
            }elseif($arctype->parent_cid==46)
            {
                $insertarctypes['reid']=593;
                $insertarctypes['topid']=593;
            }elseif($arctype->parent_cid==83)
            {
                $insertarctypes['reid']=594;
                $insertarctypes['topid']=594;
            }elseif($arctype->parent_cid==86)
            {
                $insertarctypes['reid']=595;
                $insertarctypes['topid']=595;
            }
            else{
                $insertarctypes['reid']=$arctype->parent_cid;
                $insertarctypes['topid']=0;
            }

            $insertarctypes['typename']=$arctype->name_cn;
            $insertarctypes['title']=json_decode($arctype->seo)->title;
            $insertarctypes['keywords']=json_decode($arctype->seo)->keywords;
            $insertarctypes['description']=json_decode($arctype->seo)->description;
            $insertarctypes['typedir']=$arctype->name;
            $insertarctypes['real_path']=$arctype->name;
            $insertarctypes['mid']=1;
            $insertarctypes['is_write']=1;
            $insertarctypes['dirposition']=1;
            $insertarctypes['updated_at']=Carbon::now();
            $insertarctypes['created_at']=Carbon::now();
            Arctype::create($insertarctypes);
        }
        echo '导入成功';

    }

    public function processArctypes()
    {
        set_time_limit(0);
        Arctype::where('mid',1)->chunkById(100, function($arctypes) {
            foreach ($arctypes as $arctype)
            {
                if ($arctype->reid)
                {
                    Arctype::where('id',$arctype->id)->update(['topid'=>$arctype->reid]);
                }

            }
        });
        echo '栏目topid处理成功';
    }
    /**
     * 普通文档迁移导入
     */
    public function getArticles()
    {
        set_time_limit(0);
        DB::connection('u88')->table('articles')->where('article_id','>',0)->orderBy('article_id','asc')->chunk(100, function($articles) {
            foreach ($articles as $article)
            {
                $inserarticle=[];
                $inserarticle['id']=$article->article_id;
                $inserarticle['typeid']=$article->cid;
                $inserarticle['brandid']=$article->project_id;
                $inserarticle['title']=json_decode($article->seo)->title;
                $inserarticle['body']=$article->content;
                $inserarticle['oldurl']=$article->inner_uri;
                $inserarticle['click']=$article->pv_num;
                $inserarticle['keywords']=json_decode($article->seo)->keywords;
                $inserarticle['description']=json_decode($article->seo)->description;
                $inserarticle['ismake']=$article->status;
                $inserarticle['mid']=0;
                $inserarticle['write']=Admin::where('id',$article->last_editor)->value('name')?:'梁李良';
                $inserarticle['dutyadmin']=$article->last_editor <29 ? $article->last_editor :1;
                $inserarticle['brandcid']=$article->pro_cid;
                $inserarticle['brandtypeid']=$article->type_id;
                $inserarticle['created_at']=$article->created_at;
                $inserarticle['updated_at']=$article->updated_at;
                $inserarticle['published_at']=$inserarticle['created_at'];
                if(!Archive::withoutGlobalScope(PublishedScope::class)->where('id',$inserarticle['id'])->value('id') && empty($article->deleted_at))
                {
                    Archive::create($inserarticle);
                }
            }
        });
        echo '普通文档导入成功！';
    }


    /**
     * 普通文档品牌关联处理
     */
    public function processBdname()
    {
        set_time_limit(0);
        Archive::where('brandid','<>','')->chunkById(10, function($articles) {
            foreach ($articles as $article)
            {
                Archive::where('id',$article->id)->update([
                    'bdname'=>Brandarticle::where('id',$article->brandid)->value('brandname'),
                    'brandtypeid'=>Brandarticle::where('id',$article->brandid)->value('typeid'),
                    'brandcid'=>Arctype::where('id',Brandarticle::where('id',$article->brandid)->value('typeid'))->value('reid'),
                ]);
            }
        });
        echo '普通相关品牌写入成功';
    }
    /**
     * 品牌文档迁移导入
     */
    public function getBrandArticles()
    {
        set_time_limit(0);
        DB::connection('u88')->table('projects')->where('project_id','>',0)->orderBy('project_id','desc')->chunk(100, function($articles) {
            foreach ($articles as $article) {
                $inserarticle = [];
                $inserarticle['id'] = $article->project_id;
                if ($article->cid==19)
                {
                    $inserarticle['typeid']=589;
                }elseif ($article->cid==20){
                    $inserarticle['typeid']=590;
                }elseif ($article->cid==35){
                    $inserarticle['typeid']=591;
                }elseif ($article->cid==42){
                    $inserarticle['typeid']=592;
                }elseif ($article->cid==46){
                    $inserarticle['typeid']=593;
                }elseif ($article->cid==83){
                    $inserarticle['typeid']=594;
                }elseif ($article->cid==86){
                    $inserarticle['typeid']=595;
                }else{
                    $inserarticle['typeid']=$article->cid;
                }
                $inserarticle['brandname'] = $article->name_cn;
                //
                $inserarticle['inner_uri'] = $article->inner_uri;
                $inserarticle['ismake'] = $article->status;
                $inserarticle['click'] = $article->pv_num;
                //
                $inserarticle['comment_num'] = $article->comment_num;
                $inserarticle['brandnum'] = $article->franchise_num;
                $inserarticle['brandattch'] = $article->pv_num;
                $inserarticle['brandapply'] = $article->comment_num;
                $inserarticle['write']=Admin::where('id',$article->last_editor)->value('name')?:'梁李良';
                $inserarticle['dutyadmin']=$article->last_editor <29 ?:1;
                $inserarticle['tzid']=$article->invest_level;
                $inserarticle['mid'] = 1;
                $inserarticle['indexpic'] = $article->logo;
                $inserarticle['created_at']=$article->created_at;
                $inserarticle['updated_at']=$article->updated_at;
                $articles2=DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->first();
                if (!empty($articles2))
                {
                    $inserarticle['title'] = json_decode(DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('seo'))->title;
                    $inserarticle['keywords'] =json_decode(DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('seo'))->keywords;
                    $inserarticle['description'] = json_decode(DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('seo'))->description;
                    $inserarticle['published_at']=$inserarticle['created_at'];
                    $inserarticle['litpic']=DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('pic');
                    $inserarticle['imagepics']=str_replace('|',',',DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('pics'));
                    $inserarticle['brandgroup'] = DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('company_name');
                    $inserarticle['registeredcapital'] = DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('registered_capital').'万';
                    $inserarticle['brandtime'] = DB::connection('u88')->table('projects_ex')->where('project_id',$article->project_id)->value('founding_time');
                    $inserarticle['genre'] = $articles2->type_of_business;
                    $inserarticle['legal'] = $articles2->legal_representative;
                    $inserarticle['province_id'] = $articles2->company_prov_id;
                    $inserarticle['city_id'] = $articles2->company_city_id;
                    $inserarticle['dist_id'] = $articles2->company_dist_id;
                    $inserarticle['brandaddr'] = $articles2->company_detail_addr;
                    $inserarticle['brandmap'] = $articles2->scope_of_business;
                    $inserarticle['body'] ='';
                    if (!empty($articles2->brand_intro)){
                        $inserarticle['body'] .='<h2>'.str_replace('加盟','',$article->name_cn).'加盟品牌介绍'.'</h2>'.$articles2->brand_intro;
                    }
                    if (!empty($articles2->join_cost)){
                        $inserarticle['body'] .= '<h2>'.str_replace('加盟','',$article->name_cn).'加盟费用'.'</h2>'.$articles2->join_cost;
                    }
                    if (!empty($articles2->join_condition))
                    {
                        $inserarticle['body'] .= '<h2>'.str_replace('加盟','',$article->name_cn).'加盟条件'.'</h2>'.$articles2->join_condition;
                    }
                    if (!empty($articles2->join_advantage))
                    {
                        $inserarticle['body'] .= '<h2>'.str_replace('加盟','',$article->name_cn).'加盟优势'.'</h2>'.$articles2->join_advantage;
                    }
                    if (!empty($articles2->join_process))
                    {
                        $inserarticle['body'] .= '<h2>'.str_replace('加盟','',$article->name_cn).'加盟流程'.'</h2>'.$articles2->join_process;
                    }
                    if (!empty($articles2->investment_analysis))
                    {
                        $inserarticle['body'] .= '<h2>'.str_replace('加盟','',$article->name_cn).'投资分析'.'</h2>'.$articles2->investment_analysis;
                    }
                    if (!empty($articles2->join_support))
                    {
                        $inserarticle['body'] .= '<h2>'.str_replace('加盟','',$article->name_cn).'加盟支持'.'</h2>'.$articles2->join_support;
                    }

                }

                if(!Brandarticle::withoutGlobalScope(PublishedScope::class)->where('id',$inserarticle['id'])->value('id') && empty($article->deleted_at))
                {
                    Brandarticle::create($inserarticle);
                }
            }
        });
        echo '品牌数据导入成功！！！';
    }

    /**
     * 后台用户迁移导入
     */
    public function getAdmins()
    {
        $admins=DB::connection('u88')->select('SELECT * FROM u88_admin  WHERE id>?',[1]);
        foreach ($admins as $admin) {
            $inserarticle=[];
            $inserarticle['name']=$admin->fullname?:'梁李良2';
            $inserarticle['email']='liang5698'.rand(1,10000).'@163.com';
            $inserarticle['password']=$admin->password;
            $inserarticle['created_at']=$admin->created_at;
            $inserarticle['updated_at']=$admin->updated_at;
            Admin::create($inserarticle);

        }
        echo '后台用户导入成功！';
    }

    /**
     * 地区数据迁移导入
     */
    public function getAreas()
    {
        DB::connection('u88')->table('areas')->where('area_id','>',0)->orderBy('area_id','asc')->chunk(1000, function($areas) {
            foreach ($areas as $area)
            {
                $areainsert=[];
                $areainsert['id']=$area->area_id;
                $areainsert['parentid']=$area->parent_area_id;
                $areainsert['name']=$area->name;
                $areainsert['name_cn']=$area->name_cn;
                $areainsert['deep']=$area->deep;
                $areainsert['id_path']=$area->id_path;
                $areainsert['name_path']=$area->name_path;
                $areainsert['status']=$area->status;
                $areainsert['sort']=$area->sort;
                if(!Area::where('id',$areainsert['id'])->value('id')) {
                    Area::create($areainsert);
                }
            }
        });
        echo '地区信息导入成功';
    }

    /**
     * 友情链接迁移导入
     */
    public function getFlinks()
    {
        DB::connection('u88')->table('frilink')->where('status','>',0)->orderBy('id','asc')->chunk(1000, function($flinks) {
            foreach ($flinks as $flink)
            {
                $flinkinsert=[];
                $flinkinsert['id']=$flink->id;
                $flinkinsert['cid']=$flink->cid;
                $flinkinsert['webname']=$flink->title;
                $flinkinsert['weburl']=$flink->url;
                if ($flink->type=='project')
                {
                    $flinkinsert['type']=0;
                }else{
                    $flinkinsert['type']=1;
                }
                $flinkinsert['created_at']=$flink->created_at;
                $flinkinsert['updated_at']=$flink->updated_at;
                if(!flink::where('id',$flinkinsert['id'])->value('id') && !flink::where('weburl',$flinkinsert['weburl'])->value('weburl') ) {
                    flink::create($flinkinsert);
                }
            }
        });
        echo '友情链接导入成功';
    }

    /**
     * 投资分类批量生成
     */
    public function createInverment()
    {
        InvestmentType::create(['id'=>2,'type'=>'0-1万','url'=>'0_1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        InvestmentType::create(['id'=>3,'type'=>'1-5万','url'=>'1_5','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        InvestmentType::create(['id'=>4,'type'=>'5-10万','url'=>'5_10','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        InvestmentType::create(['id'=>5,'type'=>'10-20万','url'=>'10_20','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        InvestmentType::create(['id'=>6,'type'=>'20-50万','url'=>'20_50','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        InvestmentType::create(['id'=>7,'type'=>'50-100万','url'=>'50_100','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        InvestmentType::create(['id'=>8,'type'=>'100万以上','url'=>'100','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        echo '投资分类生成成功！';
    }

    /**
     * 普通文档缩略图提取
     */
    public function getLitpic()
    {
        $ids=Archive::pluck('id');
        foreach ($ids as $id)
        {
            $thispic=Archive::where('id',$id)->value('litpic');
            if (empty($thispic) || $thispic=='/frontend/images/nopic.png')
            {
                if(preg_match('/<[img|IMG].*?src=[\' | \"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/i',Archive::where('id',$id)->value('body'),$match)) {
                    Archive::where('id',$id)->update(['litpic'=> $match[1]]);
                }
            }
        }
        echo '缩略图提取完成';
    }

    public function updateIndexpic()
    {
        Admin::whereIn('id',[1,30])->update(['type'=>1]);
    }
}
