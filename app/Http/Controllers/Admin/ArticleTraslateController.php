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
        $arctypes=DB::connection('u88')->select('SELECT * FROM category  WHERE id>?',[0]);
        foreach ($arctypes as $arctype)
        {
            $insertarctypes=[];
            $insertarctypes['id']=$arctype->id;
            $insertarctypes['reid']=0;
            $insertarctypes['topid']=0;
            $insertarctypes['typename']=$arctype->name;
            $insertarctypes['title']=$arctype->title;
            $insertarctypes['keywords']=$arctype->keywords;
            $insertarctypes['description']=$arctype->description;
            $insertarctypes['typedir']=$arctype->realm;
            $insertarctypes['real_path']=$arctype->realm;
            $insertarctypes['mid']=1;
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
        $arctypes=DB::connection('anxjm')->select('SELECT * FROM category  WHERE id>?',[0]);
        foreach ($arctypes as $arctype)
        {
            $insertarctypes=[];
            $insertarctypes['id']=$arctype->id;
            $insertarctypes['reid']=0;
            $insertarctypes['topid']=0;
            $insertarctypes['typename']=$arctype->name;
            $insertarctypes['title']=$arctype->seo_title;
            $insertarctypes['keywords']=$arctype->seo_keywords;
            $insertarctypes['description']=$arctype->seo_description;
            $insertarctypes['typedir']=$arctype->realm;
            $insertarctypes['real_path']=$arctype->realm;
            $insertarctypes['mid']=1;
            $insertarctypes['is_write']=1;
            $insertarctypes['dirposition']=1;
            $insertarctypes['updated_at']=Carbon::now();
            $insertarctypes['created_at']=Carbon::now();
            Arctype::create($insertarctypes);
        }
        echo '导入成功';
    }

    public function getSonTypes()
    {
        $sonarctypes=DB::connection('anxjm')->select('SELECT * FROM category_x  WHERE id>?',[0]);
        foreach ($sonarctypes as $arctype)
        {
            $insertarctypes=[];
            $insertarctypes['reid']=$arctype->categoryId;
            $insertarctypes['topid']=$arctype->categoryId;
            $insertarctypes['typename']=$arctype->name;
            $insertarctypes['title']=$arctype->seo_title;
            $insertarctypes['keywords']=$arctype->seo_keywords;
            $insertarctypes['description']=$arctype->seo_description;
            $insertarctypes['typedir']=$arctype->id;
            $insertarctypes['real_path']=$arctype->id;
            $insertarctypes['mid']=1;
            $insertarctypes['is_write']=1;
            $insertarctypes['dirposition']=1;
            $insertarctypes['updated_at']=Carbon::now();
            $insertarctypes['created_at']=Carbon::now();
            Arctype::create($insertarctypes);
        }
        echo '子品牌栏目导入成功';
    }

    public function processArctypes()
    {
        set_time_limit(0);

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
        DB::connection('anxjm')->table('company_basicinfo')->where('id','>',0)->orderBy('id','desc')->chunk(100, function($articles) {
            foreach ($articles as $article) {
                $inserarticle = [];
                $inserarticle['id'] = $article->id;
                $inserarticle['brandgroup'] = $article->companyName;
                $inserarticle['brandorigin'] = $article->birthLand;
                $inserarticle['genre'] = $article->property;
                $inserarticle['topid'] = $article->categoryId;
                $inserarticle['typeid'] = $article->xcategoryId;
                $inserarticle['brandaddr'] = $article->address;
                $inserarticle['tzid'] = $article->invest;
                $inserarticle['brandnum'] = $article->shopNum;
                $inserarticle['brandarea'] = $article->joinArea;
                $inserarticle['brandmoshi'] = $article->managementMode;
                $inserarticle['branddevelop'] = $article->developMode;
                $inserarticle['created_at']=$article->created_at;
                $inserarticle['published_at']=$article->created_at;
                $inserarticle['updated_at']=$article->updated_at;
                $inserarticle['brandname']=$article->brandName;
                $inserarticle['brandpsp']=$article->slogan;
                $inserarticle['click']=$article->hits;
                $inserarticle['indexpic']=$article->logo;
                $inserarticle['brandperson']=$article->crowd;
                $inserarticle['registeredcapital']=$article->registeredCapital;
                $inserarticle['dutyadmin']=$article->author_id;
                $inserarticle['title']=$article->seo_title;
                $inserarticle['keywords']=$article->seo_keywords;
                $inserarticle['description']=$article->seo_description;
                $inserarticle['ismake'] = 1;
                $inserarticle['write']=Admin::where('id',$article->author_id)->value('name')?:'梁李良';
                $inserarticle['mid'] = 1;
                $articles2=DB::connection('anxjm')->table('company_detailsinfo')->where('companyId',$article->id)->first();
                if (!empty($articles2))
                {
                    $inserarticle['body'] ='';
                    if (!empty($articles2->intro_title)){
                        $inserarticle['body'] .='<h2>'.$articles2->intro_title.'</h2>'.$articles2->intro;
                    }
                    if (!empty($articles2->joinProcess_title)){
                        $inserarticle['body'] .= '<h2>'.$articles2->joinProcess_title.'</h2>'.$articles2->joinProcess;
                    }
                    if (!empty($articles2->joinAdvantage_title))
                    {
                        $inserarticle['body'] .= '<h2>'.$articles2->joinAdvantage_title.'</h2>'.$articles2->joinAdvantage;
                    }
                    if (!empty($articles2->joinCost_title))
                    {
                        $inserarticle['body'] .= '<h2>'.$articles2->joinCost_title.'</h2>'.$articles2->joinCost;
                    }
                    if (!empty($articles2->joinCondition_title))
                    {
                        $inserarticle['body'] .= '<h2>'.$articles2->joinCondition_title.'</h2>'.$articles2->joinCondition;
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
        $admins=DB::connection('anxjm')->select('SELECT * FROM admin  WHERE id>?',[1]);
        foreach ($admins as $admin) {
            $inserarticle=[];
            $inserarticle['name']=$admin->fullname?:'林田荣';
            $inserarticle['email']='liang5698'.rand(1,10000).'@hotmail.com';
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
