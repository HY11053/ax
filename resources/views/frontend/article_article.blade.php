@extends('frontend.frontend')
@section('title'){{$thisarticleinfos->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thisarticleinfos->keywords}}@stop
@section('description'){{$thisarticleinfos->description}}@stop
@section('headlibs')
    <meta name="Copyright" content="{{config('app.name')}}-{{config('app.url')}}"/>
    <meta name="author" content="{{config('app.name')}}" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{config('app.url')}}{{Request::getrequesturi()}}"/>
    <meta property="og:type" content="article"/>
    <meta property="article:published_time" content="{{$thisarticleinfos->created_at}}+08:00" />
    <meta property="og:image" content="{{config('app.url')}}{{str_replace(config('app.url'),'',$thisarticleinfos->litpic)}}"/>
@stop
@section('main_content')
    <!--主体开始-->
    <div class="main">
        <!--当前位置 开始-->
        <div class="path">当前位置：<a href="/">首页</a>&gt;&nbsp;<a href="/article/">资讯</a>&gt;<a href="/{{$thistypeinfo->real_path}}/">{{$thistypeinfo->typename}}</a>&gt;&nbsp;{{$thisarticleinfos->title}} </div>
        <!--当前位置 结束-->
        <div class="center_list">

            <!--左边模块 开始-->
            <div class="new_left">
                <div class="list_info">
                    <div class="content_tit">
                        <h1>{{$thisarticleinfos->title}}</h1>
                        <div class="time_source">
                            <span>{{$thisarticleinfos->created_at}}</span>
                            <span>来源：U88加盟网</span>
                            <span>浏览：{{$thisarticleinfos->click}}</span>
                        </div>
                    </div>
                    @if(isset($thisarticlebrandinfos->id))
                    <div class="content_item">
                        <div class="item_logo">
                            <a href="{{config('app.url')}}/xiangmu/{{$thisarticlebrandinfos->id}}.html">
                                <img src="{{$thisarticlebrandinfos->litpic}}" width="128" height="96" alt="{{$thisarticlebrandinfos->brandname}}" />
                            </a>
                        </div>
                            <div class="bd">
                                <table cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td class="td_color">项目名称</td>
                                        <td>
                                            <a href="{{config('app.url')}}/xiangmu/{{$thisarticlebrandinfos->id}}.html">{{$thisarticlebrandinfos->brandname}}</a>
                                        </td>
                                        <td class="td_color">所在地区</td>
                                        <td>{{$thisarticlebradarea->name_cn}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td_color">所属行业</td>
                                        <td>
                                            <a href="{{config('app.url')}}/{{$thisbrandtypecidinfo->real_path}}/">{{$thisbrandtypecidinfo->typename}}</a>&gt;<a href="{{config('app.url')}}/{{$thisbrandtypeinfo->real_path}}/">{{$thisbrandtypeinfo->typename}}</a>
                                        </td>
                                        <td class="td_color">招商区域</td>
                                        <td> {{$thisarticlebrandinfos->brandarea}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td_color">门店总数</td>
                                        <td>{{$thisarticlebrandinfos->brandnum}}</td>
                                        <td class="td_color">意向加盟</td>
                                        <td>{{$thisarticlebrandinfos->brandattach}}</td>
                                    </tr>
                                    <tr>
                                        <td class="td_color td_border">投资金额</td>
                                        <td class="td_border">{{$investment_types[$thisarticlebrandinfos->tzid]}}</td>
                                        <td class="td_color td_border">申请加盟</td>
                                        <td class="td_border">
                                            <p class="btn">
                                                <a style="color:#f60;font-weight:bold;" href="{{config('app.url')}}/xiangmu/{{$thisarticlebrandinfos->id}}.html#msg">立即咨询</a>
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    @endif
                    <div class="body_tit clearfix">
        　               @php
                            $content=preg_replace(["/style=.+?['|\"]/i","/width=.+?['|\"]/i","/height=.+?['|\"]/i"],'',$thisarticleinfos->body);
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
                    <div class="shangxiapian">
                        <p>@if(isset($prev_article)) <span>上一篇：<a href="{{config('app.url')}}/article/{{key($prev_article)}}.html" title="{{reset($prev_article)}}">{{reset($prev_article)}}</a></span> @else 没有了 @endif </p>
                        <p>@if(isset($next_article))  <span class="right">下一篇：<a href="{{config('app.url')}}/article/{{key($next_article)}}.html" title="{{reset($next_article)}}">{{reset($next_article)}}</a></span> @else 没有了 @endif  </p>
                        </p>
                        <div class="fenxiang">
                            <div class="fenxiangdao">分享到：</div>
                            <div class="bdsharebuttonbox bdshare-button-style0-24" data-tag="share_1" data-bd-bind="1494836021222">
                                <a class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪</a>
                                <a class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                                <a class="popup_weixin" data-cmd="weixin" onclick="return false;" title="分享到微信">微信</a>
                            </div>
                        </div>
                    </div>
                    <div class="xg_news">
                        <div class="common_tit">
                            相关资讯
                            <div class="top_924"></div>
                        </div>
                        <div class="xw">
                            <ul class="clearfix">
                                @foreach($latestbrandnews as $brandid=>$latestbrandnew)
                                    <li><em>{{date('Y-m-d',strtotime($latestbrandnew->created_at))}}</em><a href="/article/{{$latestbrandnew->id}}.html">{{$latestbrandnew->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @include('frontend.liuyan')
            </div>
            <!--左边模块 结束-->
            <!--右边模块 开始-->
            <div class="new_right">

                <!--加盟排行榜 开始-->
                <div class="hot_message hot_fl">
                    <div class="common_hd fl_tit">
                        @if(isset($thisarticlebrandinfos->id)) <h2>{{$thisbrandtypeinfo->typename}}排行榜</h2> @else<h2>加盟排行榜</h2>@endif
                    </div>
                    <div class="boutique_list">
                        <ul>
                            @foreach($paihangbangs as $index=>$paihangbang)
                            <li class=" @if($index<3)top @else num @endif @if($index==0) hover @endif">
                                <i class="num">{{$index+1}}</i>
                                <span class="name">
								<a href="{{config('app.url')}}/xiangmu/{{$paihangbang->id}}.html" target="_blank" title="{{$paihangbang->brandname}}">{{$paihangbang->brandname}}</a>
							</span>
                                <div class="cts">
                                    <div class="img">
                                        <img src="{{$paihangbang->litpic}}" alt="{{$paihangbang->brandname}}">
                                    </div>
                                    <div class="center">
                                        <p class="info">投资额：
                                            <em>{{$investment_types[$paihangbang->tzid]}}</em>
                                        </p>
                                        <p class="info">门店数：{{$paihangbang->brandnum}}</p>
                                        <p class="btn">
                                            <a href="{{config('app.url')}}/xiangmu/{{$paihangbang->id}}.html#msg">立即咨询</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <!--加盟排行榜 结束-->

                <!--热门文章 开始-->
                <div class="bd_commit ">
                    <div class="common_hd">
                        @if(isset($thisarticlebrandinfos->id)) <h2>{{$thisbrandtypeinfo->typename}}相关资讯</h2> @else<h2>相关资讯</h2>@endif
                    </div>
                    <div class="bd">
                        <ul>
                            @foreach($latesttypenews as $latesttypenew)
                            <li>
                                <a href="/article/{{$latesttypenew->id}}.html" target="_blank" title="{{$latesttypenew->title}}">{{$latesttypenew->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--热门文章 结束-->
                <div class="bd_commit">
                    <div class="common_hd">
                        <h2>{{$thistypeinfo->typename}}最新入驻品牌</h2>
                    </div>
                    <div class="bd_list">
                        @foreach($latestbrands as $latestbrand)
                            <dl>
                                <dt>
                                    <a href="{{config('app.url')}}/xiangmu/{{$latestbrand->id}}.html" target="_blank">
                                        <img src="{{$latestbrand->litpic}}" alt="{{$latestbrand->brandname}}" title="{{$latestbrand->brandname}}">
                                    </a>
                                </dt>
                                <dd class="tit">
                                    <a href="{{config('app.url')}}/xiangmu/{{$latestbrand->id}}.html" target="_blank" title="{{$latestbrand->brandname}}">{{$latestbrand->brandname}}</a>
                                </dd>
                                <dd>投资额度：
                                    <em>{{$investment_types[$latestbrand->tzid]}}</em>
                                </dd>
                                <p>
                                    <a href="{{config('app.url')}}/xiangmu/{{$latestbrand->id}}.html">立即咨询</a>
                                </p>
                            </dl>
                        @endforeach
                    </div>
                </div>
            </div>
            @include('frontend.footer')
        </div>
    </div>
    <!--主体开始-->

@stop