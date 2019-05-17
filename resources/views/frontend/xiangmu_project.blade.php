@extends('frontend.frontend')
@section('title')@if(isset($project_title)){{$project_title}}@endif{{$thistypeinfo->title}}-{{config('app.indexname')}}@stop
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
    <!--主体开始-->
    <div class="main">
        <!--当前位置 开始-->
        <div class="path">当前位置：<a href="/">首页</a>&gt;&nbsp;{{$thistypeinfo->typename}}</div>
        <!--当前位置 结束-->
        <!--分类筛选 开始-->
        <div class="fenl_box">
            <div class="xuanze">
                <strong>行业频道：</strong>
                <ul>
                    <li  @if(trim(Request::getrequesturi(),'/') == 'xiangmu')class="dq" @endif><a href="/xiangmu/">不限</a></li>
                    @foreach($topbrandtypeinfos as $topbrandtypeinfo)
                        <li>
                            <a href="/{{$topbrandtypeinfo->real_path}}/">{{$topbrandtypeinfo->typename}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="xuanze clearfix">
                <strong>投资金额：</strong>
                <ul>
                    <li  class="dq" ><a href="/{{$thistypeinfo->real_path}}/">不限</a></li>
                    @foreach($type_investment_types as $investment_type)
                        <li >@if(array_key_exists($investment_type->id,$investment_ids))<a href="/{{$thistypeinfo->real_path}}/{{$investment_type->url}}/">{{$investment_type->type}}</a></li>@endif
                    @endforeach
                </ul>

            </div>
            <div class="xuanzea area_wrap1">
                <strong>加盟区域：</strong>
                <ul>
                    <li  class="dq" >
                        <a class="first" href="/{{$thistypeinfo->real_path}}/">全部</a>
                    </li>
                    @foreach($provinces as $provinces)
                        @if(array_key_exists($provinces->id,$province_ids))
                            <li ><a href="/{{$thistypeinfo->real_path}}/{{$provinces->name_path}}/">{{$provinces->name_cn}}</a> </li>
                        @endif
                    @endforeach
                </ul>
                <a class="more_area_btn1" id="js_more_area1" href="javascript:;">展开</a>
            </div>
        </div>
        <!--分类筛选 结束-->
        <div class="center_list">
            <!--左边模块 开始-->
            <div class="new_left">
                <div class="white_bg">
                    <div class="item_tit">
					<span class="info">共
						<i>{{$pagelists->total()}}</i>个匹配商家</span>
                        <span class="moren"><h2>{{$thistypeinfo->typename}}</h2></span>
                    </div>
                    <div class="bd">
                        @foreach($pagelists as $pagelist)
                            <div class="bd_item">
                                <div class="item_pic">
                                    <a href="{{config('app.url')}}/xiangmu/{{$pagelist->id}}.html" target="_blank" title="{{$pagelist->brandname}}">
                                        <i>{{$loop->iteration}}</i><img src="{{$pagelist->litpic}}" alt="{{$pagelist->brandname}}">
                                    </a>
                                </div>
                                <div class="item_r">
                                    <p class="name">
                                        <a href="{{config('app.url')}}/xiangmu/{{$pagelist->id}}.html" target="_blank" title="{{$pagelist->brandname}}">{{$pagelist->brandname}}</a>
                                    </p>
                                    <p class="info">{{$pagelist->description}}...</p>

                                </div>
                                <div class="item_l">
                                    <p>
                                        <em>投资金额：</em><span class="money">{{$investment_types[$pagelist->tzid]}}</span>
                                        <em>门店总数：</em><span>{{$pagelist->brandnum}}</span>
                                        <em>加盟区域：</em><span> {{$pagelist->brandarea}}</span>
                                    </p>
                                    <p>
                                        <em>所在地区：</em><span> <a href="/xiangmu/{{$pagelist->area->name_path}}/">{{$pagelist->area->name_cn}}</a> </span>
                                        <em>意向加盟：</em><span>{{$pagelist->brandattch}}</span>
                                        <em>申请加盟：</em><span>{{$pagelist->brandapply}}</span>
                                    </p>
                                </div>
                                <div class="item_btn">
                                    <p class="btn">
                                        <a href="{{config('app.url')}}/xiangmu/{{$pagelist->id}}.html#msg">在线咨询</a>
                                    </p>
                                    <p class="btn_info">
                                        <a href="{{config('app.url')}}/xiangmu/{{$pagelist->id}}.html">了解详情&gt;</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--分页 开始-->
                    <div class="page">
                        {!! str_replace(['?cid=&amp;page','p=','?cid='],['/p','p',''],preg_replace('#(\/p[0-9]+)(\/p[0-9]+)#','${2}',str_replace('?p=','/p',preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links())))) !!}
                    </div>
                    <!--分页 结束-->
                </div>
            </div>
            <!--左边模块 结束-->
            <!--右边模块 开始-->
            <div class="new_right">
                <!--加盟排行榜 开始-->
                <div class="hot_message hot_fl">
                    <div class="common_hd fl_tit">
                        <span class="more"><a href="{{config('app.url')}}/paihang/" target="_blank">更多&gt;&gt;</a></span>
                        <h2>{{$thistypeinfo->typename}}排行榜</h2>
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
                        <h2>{{$thistypeinfo->typename}}热门文章</h2>
                    </div>
                    <div class="bd">
                        <ul>
                            @foreach($latestbrandnews as $latestbrandnew)
                                <li>
                                    <a href="/article/{{$latestbrandnew->id}}.html" target="_blank" title="{{$latestbrandnew->title}}">{{$latestbrandnew->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--热门文章 结束-->
                <div class="bd_commit">
                    <div class="common_hd">
                        <h2>{{$thistypeinfo->typename}}推荐品牌</h2>
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

                <div class="bd_commit ">
                    <div class="common_hd">
                        <h2>最新上榜</h2>
                    </div>
                    <div class="bd">
                        <ul>
                            @foreach($newbrands as $newbrand)
                                <li>
                                    <a href="{{config('app.url')}}/xiangmu/{{$newbrand->id}}.html">{{$newbrand->brandname}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!--友情链接 开始-->
                <div class="bd_commit">
                    <div class="common_hd">
                        <h2>友情链接</h2>
                    </div>
                    <div class="flinks_bd">
                        <ul>
                            @foreach($flinks as $flink)
                                <li><a href="{{$flink->weburl}}" target="_blank" title="{{$flink->webname}}">{{$flink->webname}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--友情链接 结束-->
            </div>
            @include('frontend.footer')
        </div>
    </div>
@stop
