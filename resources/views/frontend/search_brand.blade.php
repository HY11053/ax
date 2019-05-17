@extends('frontend.frontend')
@section('title')品牌搜索页面-u88加盟网@stop
@section('keywords')品牌搜索页面 @stop
@section('description')品牌搜索页面@stop
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
        <div class="path">当前位置： <a href="/">首页</a>&nbsp;&gt;&nbsp;搜索结果</div>
        <!--当前位置 结束-->
        <div class="center_list">
            <!--左边模块 开始-->
            <div class="new_left">
                <div class="white_bg">
                    <div class="item_tit">
                        <span class="info">为您找到的搜索结果</span>
                    </div>
                    <!--搜索列表 开始-->
                    <div class="bd">
                        @foreach($brands as $brand)
                        <div class="bd_item">
                            <div class="item_pic">
                                <a href="/xiangmu/{{$brand->id}}.html" target="_blank" title="{{$brand->brandname}}">
                                    <img src="{{$brand->litpic}}" alt="{{$brand->brandname}}">
                                </a>
                            </div>
                            <div class="item_r">
                                <p class="name">
                                    <a href="/xiangmu/{{$brand->id}}.html" target="_blank" title="{{$brand->brandname}}">{{$brand->brandname}}</a>
                                </p>
                                <p class="info">{{$brand->description}}</p>
                            </div>
                            <div class="item_l">
                                <p>
                                    <em>投资：</em>
                                    <span class="money">{{$investment_types[$brand->tzid]}}</span>
                                    <em>门店：</em>
                                    <span>{{$brand->brandnum}}</span>
                                    <em>指数：</em>
                                    <span>{{$brand->brandattch}}</span>
                                </p>
                                <p>
                                    <em>评分：{{$brand->apply}}</em>
                                    <span></span>
                                    <em>人气：</em>
                                    <span>{{rand(10000,20000)}}</span>
                                    <em>留言：</em>
                                    <span>{{rand(500,800)}}</span>
                                </p>
                            </div>
                            <div class="item_btn">
                                <p class="btn">
                                    <a href="/xiangmu/{{$brand->id}}.html">在线咨询</a>
                                </p>
                                <p class="btn_info">
                                    <a href="/xiangmu/{{$brand->id}}.html">了解详情&gt;</a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--搜索列表 结束-->
                </div>
            </div>
            <!--左边模块 结束-->

            <!--右边模块 开始-->
            <div class="new_right">

                <!--加盟排行榜 开始-->
                <div class="hot_message hot_fl">
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

                <!--创业播报 开始-->
                <div class="bd_commit ">
                    <div class="common_hd">
                        <h2>创业播报</h2>
                    </div>
                    <div class="chuangye_bd">
                        <ul>
                            <li>04-29 02:31:&nbsp;&nbsp;
                                <em>郭女士</em>&nbsp;&nbsp;
                                <i>咨询了</i>&nbsp;&nbsp;
                                <a href="https://www.u88.com/xiangmu/5633.html">重庆巴江水火锅加盟</a> 加盟程序以及条件，或者是否有可能深化合作。
                            </li>
                            <li>04-29 02:55:&nbsp;&nbsp;
                                <em>易先生</em>&nbsp;&nbsp;
                                <i>咨询了</i>&nbsp;&nbsp;
                                <a href="https://www.u88.com/xiangmu/2004234.html">芒果屋加盟</a> 初步打算加入贵公司，请寄资料。
                            </li>
                            <li>04-29 02:38:&nbsp;&nbsp;
                                <em>邓先生</em>&nbsp;&nbsp;
                                <i>咨询了</i>&nbsp;&nbsp;
                                <a href="https://www.u88.com/xiangmu/2010655.html">三上家具饰品加盟有前景</a> 很有想法，但不知如何去装修、设计
                            </li>
                            <li>04-29 02:29:&nbsp;&nbsp;
                                <em>郭先生</em>&nbsp;&nbsp;
                                <i>咨询了</i>&nbsp;&nbsp;
                                <a href="https://www.u88.com/xiangmu/2024520.html">龙门烤鱼诚邀加盟</a> 我想加盟贵公司
                            </li>
                            <li>04-29 02:46:&nbsp;&nbsp;
                                <em>易先生</em>&nbsp;&nbsp;
                                <i>咨询了</i>&nbsp;&nbsp;
                                <a href="https://www.u88.com/xiangmu/2014480.html">哆啦a梦主题餐厅加盟</a> 我想加盟 请尽快联系我
                            </li>
                            <li>04-29 02:46:&nbsp;&nbsp;
                                <em>唐先生</em>&nbsp;&nbsp;
                                <i>咨询了</i>&nbsp;&nbsp;
                                <a href="https://www.u88.com/xiangmu/602.html">百姓坊加盟</a> 你好！我想加盟代理你们的品牌，请联系我。
                            </li>
                            <li>04-29 02:40:&nbsp;&nbsp;
                                <em>易女士</em>&nbsp;&nbsp;
                                <i>咨询了</i>&nbsp;&nbsp;
                                <a href="https://www.u88.com/xiangmu/2004218.html">聪明树幼儿园加盟</a> 我想加盟 请尽快联系我
                            </li>
                        </ul>
                    </div>
                </div>
                <!--创业播报 结束-->

            </div>
            <!--右边模块 结束-->
        </div>
    </div>
    <!--主体结束-->

@stop
