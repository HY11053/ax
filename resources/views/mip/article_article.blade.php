@extends('mip.mip')
@section('title'){{$thisarticleinfos->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thisarticleinfos->keywords}}@stop
@section('description'){{$thisarticleinfos->description}}@stop
@section('main_content')
    <div class="path"><a href="/">首页</a> &gt; <a href="/article/">创业资讯</a> &gt; <a href="/{{$thistypeinfo->real_path}}/">{{$thistypeinfo->typename}}</a></div>
    <!--资讯内容 开始-->
    <div class="news_cont">
        <h1>{{$thisarticleinfos->title}}</h1>
        <div class="time">时间：{{$thisarticleinfos->created_at}}</div>
        @if(isset($thisarticlebrandinfos->id))
        <div class="wz_pp">
				<span>
                    <a href="/xiangmu/{{$thisarticlebrandinfos->id}}.html">
                        <mip-img src="{{$thisarticlebrandinfos->litpic}}" width="100" height="75" layout="responsive"></mip-img>
					</a>
                </span>
            <cite><em>品牌名称：</em><code>{{$thisarticlebrandinfos->brandname}}</code></cite>
            <cite><em>所属行业：</em><code> <a href="{{config('app.url')}}/{{$thisbrandtypeinfo->real_path}}/">{{$thisbrandtypeinfo->typename}}</a></code></cite>
            <cite><em>投资金额：</em><code>{{$investment_types[$thisarticlebrandinfos->tzid]}}</code></cite>
            <cite><em>申请加盟：</em><code><a href="#msg">立即咨询</a></code></cite>
        </div>
        @endif
        <div class="content">
            @php
                $content=str_replace('<img','<mip-img',preg_replace(["/style=.+?['|\"]/i","/width=.+?['|\"]/i","/height=.+?['|\"]/i"],'',$thisarticleinfos->body));
                preg_match_all("/<mip-img.*?[>]/",$content,$matches);
               if (!empty($matches))
               {
                 foreach ($matches as $match)
                 {
                     $content=str_replace($match,str_replace(['/>','>'],['>','></mip-img>'],$match),$content);
                 }
               }
               $content=str_replace(PHP_EOL,'',$content);
               $content=str_replace(['<p >','<strong >','<br >','<br />'],['<p>','<strong>','<br>','<br/>'],$content);
               $content=str_replace(
               [
               '<p><strong><br/></strong></p>',
               '<p><strong><br></strong></p>',
               '<p><br></p>',
               '<p><br/></p>',
               '　　'
               ],'',$content
               );
                $content=str_replace(["\r","\t",'<span >　　</span>','&nbsp;','　','bgcolor="#FFFFFF"'],'',$content);
                $content=str_replace(["<br  /><br  />"],'<br/>',$content);
                $content=str_replace(["<br/><br/>"],'<br/>',$content);
                $content=str_replace(["<br/> <br/>"],'<br/>',$content);
                $content=str_replace(["<br />　　<br />"],'<br/>',$content);
                $content=str_replace(["<br/>　　<br/>"],'<br/>',$content);
                $content=str_replace(["<br /><br />"],'<br/>',$content);
               $pattens=array(
               "#<p>[\s| |　]?<strong>[\s| |　]?</strong></p>#",
               "#<p>[\s| |　]?<strong>[\s| |　]+</strong></p>#",
               "#<p>[\s| |　]+<strong>[\s| |　]+</strong></p>#",
               "#<p>[\s| |　]?</p>#",
               "#<p>[\s| |　]+</p>#"
               );
               $content=preg_replace($pattens,'',$content);
               echo $content;
            @endphp
          </div>
    </div>
    <!--资讯内容 结束-->
    @include('mip.liuyan')
    <!--相关阅读 开始-->
    <div class="index_news_tab mb10">
        <div class="common_tit">
            <a class="tit" href="#">相关文章</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($latestbrandnews as $index=>$latestbrandnew)
                    @if($index<4)
                <li>
                    <a href="/article/{{$latestbrandnew->id}}.html">
                        <div class="img_show">
                            <mip-img src="{{$latestbrandnew->litpic}}" alt="{{$latestbrandnew->title}}" width="97" height="73" layout="responsive"></mip-img>
                        </div>
                        <div class="cont">
                            <p class="tit">{{$latestbrandnew->title}}</p>
                            <p class="date">
                                <em>来源：U88加盟网</em>{{date('Y-m-d',strtotime($latestbrandnew->created_at))}}
                            </p>
                        </div>
                    </a>
                </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!--相关阅读 结束-->
    <!--项目推荐 开始-->
    <div class="rec_item">
        <div class="common_tit">
            <span class="change_btn"><a href="#">更多&gt;&gt;</a></span>
            <a class="tit" href="#"><i class="index_icon1"></i>项目推荐</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($paihangbangs as $index=>$paihangbang)
                    @if($index<4)
                    <li>
                        <a href="/xiangmu/{{$paihangbang->id}}.html">
                            <div class="img_show">
                                <mip-img src="{{$paihangbang->litpic}}" alt="{{$paihangbang->brandname}}" width="130" height="99" layout="responsive"></mip-img>
                            </div>
                            <div class="cont">
                                <p class="tit">{{$paihangbang->brandname}}</p>
                                <p class="price">投资金额：<em>{{$investment_types[$paihangbang->tzid]}}</em></p>
                                <p class="join"><span class="text_blue">{{$paihangbang->brandnum}}</span>人意向加盟</p>
                            </div>
                        </a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!--项目推荐 结束-->
    <div class="tips">
        <div class="tips_cont"><b>友情提示</b>：U88加盟网为第三方加盟信息平台及互联网信息服务提供者，展示的信息内容系由免费注册用户发布，可能存在所发布的信息未获得品牌所有人授权的情形、企业不开展加盟业务。本平台虽严把审核关，但无法完全避免差错或疏漏。本平台特此声明对免费注册用户发布信息的真实性、准确性不承担任何法律责任。</div>
        <p>创业有风险，投资需谨慎</p>
    </div>
@stop