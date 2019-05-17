@extends('frontend.frontend')
@section('title'){{$thistypeinfo->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thistypeinfo->keywords}} @stop
@section('description'){{trim($thistypeinfo->description)}}@stop
@section('headlibs')
    <meta name="Copyright" content="{{config('app.indexname')}}-{{config('app.url')}}"/>
    <meta name="author" content="{{config('app.indexname')}}" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{config('app.url')}}{{Request::getrequesturi()}}"/>
@stop
@section('main_content')
    <!--header 开始-->
    <div class="main">
        <!--当前位置 开始-->
        <div class="path">当前位置：<a href="/">首页</a>&nbsp;{{$thistypeinfo->typename}}</div>
        <!--当前位置 结束-->
        <div class="center_list">
            <!--左边模块 开始-->
            <div class="new_left">
                <!--创业分类 开始 -->
                <div class="classify_list">
                    <ul>
                        <li>
                            @foreach($toparticlenavs as $toparticlenav)
                                <a @if(str_contains(Request::getrequesturi(),$toparticlenav->real_path)) class="on" @endif href="/{{$toparticlenav->real_path}}/">{{$toparticlenav->typename}}</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <!--创业分类 结束-->

                <div class="list_new">
                    <div class="common_hd">
                        <h2>创业问答</h2>
                    </div>
                    <div class="bd">
                        <ul>
                            @forelse($pagelists as $pagelist) @if($loop->index % 5 == 0)
                                <li>
                                    @endif
                                    <a href="/article/{{$pagelist->id}}.html">
                                        <span class="info">{{$pagelist->title}}</span>
                                        <span class="time">{{date('Y-m-d',strtotime($pagelist->created_at))}}</span>
                                    </a>
                                    @if($loop->iteration % 5 == 0)
                                </li>
                            @endif
                            @empty
                            @endforelse
                        </ul>
                    </div>

                    <!--分页 开始-->
                    <div class="page">
                        {!! str_replace(['cid=&amp;','cid=/'],'',str_replace('page=','p',str_replace('?','/',preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links())))) !!}
                    </div>
                    <!--分页 结束-->
                </div>


            </div>
            <!--左边模块 结束-->

            <!--右边模块 开始-->
            <div class="new_right">

                <!--加盟排行榜 开始-->
                <div class="hot_message  hot_fl">
                    <div class="common_hd fl_tit">
                        <h2>加盟排行榜</h2>
                    </div>
                    <div class="boutique_list">
                        <ul>
                            @foreach($paihangbangs as $paihangbang)
                                <li class=" top    @if($loop->first) hover @endif ">
                                    <i class="num">{{$loop->iteration}}</i>
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
                        <h2>热门文章</h2>
                    </div>
                    <div class="bd">
                        <ul>
                            @foreach($hotbrandnews as $hotbrandnew)
                            <li>
                                <a href="/article/{{$hotbrandnew->id}}.html" target="_blank" title="{{$hotbrandnew->title}}">{{$hotbrandnew->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--热门文章 结束-->

                <div class="bd_commit ">
                    <div class="common_hd">
                        <h2>最新上榜</h2>
                    </div>
                    <div class="bd">
                        <ul>
                            @foreach($latestbrands as $latestbrand)
                            <li>
                                <a href="/xiangmu/{{$latestbrand->id}}.html">{{$latestbrand->brandname}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--右边模块 结束-->
        </div>
    </div>
    <!--主体开始-->

@stop
