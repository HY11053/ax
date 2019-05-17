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
    <meta property="article:author" content="{{config('app.name')}}" />
    <meta property="article:published_first" content="{{config('app.name')}}, {{config('app.url')}}{{Request::getrequesturi()}}" />
@stop
@section('main_content')
    <!--主体开始-->
    <div class="main2" style="position: relative;">
        <!--当前位置 开始-->
        <div class="path">当前位置：<a href="/">首页</a>&gt;&nbsp;<a href="/{{$thisbrandtypecidinfo->real_path}}/">{{$thisbrandtypecidinfo->typename}}</a>&gt;<a href="/{{$thisbrandtypeinfo->real_path}}/">{{$thisbrandtypeinfo->typename}}</a>&gt;&nbsp;{{$thisarticleinfos->brandname}}
        </div>
        <!--当前位置 结束-->

        <!--公司详情头部介绍 开始-->
        <div class="item_top">
            <div class="pic_img">
                <ul class="bigImg">
                    @foreach(explode(',',trim($thisarticleinfos->imagepics,',')) as $imagepic)
                    <li><img src="{{$imagepic}}" alt="{{$thisarticleinfos->brandname}}"/></li>
                    @endforeach
                </ul>
                <div class="smallScroll">
                    <a class="sPrev" href="javascript:void(0)">←</a>
                    <div class="smallImg">
                        <ul>
                            @foreach(explode(',',trim($thisarticleinfos->imagepics,',')) as $imagepic)
                                <li @if($loop->first)  class="on" @endif><img src="{{$imagepic}}" alt="{{$thisarticleinfos->brandname}}"/></li>
                            @endforeach
                        </ul>
                    </div>
                    <a class="sNext" href="javascript:void(0)">→</a>
                </div>
            </div>
            <div class="pic_info">
                <h1>{{str_replace('加盟','',$thisarticleinfos->brandname)}}加盟</h1>
                <div class="detail">
                    <ul>
                        <li>投资金额<span class="price">{{$investment_types[$thisarticleinfos->tzid]}}</span></li>
                        <li>所属行业<span class="hy"> <a href="/{{$thisbrandtypeinfo->real_path}}/">{{$thisbrandtypeinfo->typename}}</a></span></li>
                    </ul>
                </div>
                <div class="tit_pice">
                    <ul>
                        <li>所在地区 <span class="date">{{$thisarticlebradarea->name_cn}}</span></li>
                        <li>门店总数<span class="shop">{{$thisarticleinfos->brandnum}}</span></li>
                        <li>加盟区域<span class="area"> {{$thisarticleinfos->brandarea}}</span></li>
                        <li>经营范围<span class="area">{{$thisarticleinfos->brandmap}}</span></li>
                    </ul>
                </div>
                <div class="jiem">
                    <ul>
                        <li>意向加盟<span class="count">{{$thisarticleinfos->brandattch}}</span></li>
                        <li>申请加盟<span class="count">{{$thisarticleinfos->brandapply}}</span></li>
                        <li class="pub_date">更新时间<span class="count">{{$thisarticleinfos->created_at}}</span></li>
                    </ul>
                </div>
                <div class="tel">联系电话
                    <span> 400-885-8878 </span>
                </div>
                <div class="btn_area">
                    <a id="chatNowButton" href="#msg" class="zixun_btn" rel="nofollow">立即咨询</a>
                    <a href="#msg" class="suoyao_btn" rel="nofollow">免费获取资料</a>
                </div>
            </div>
            <div class=" pic_right">
                <div class="bd">
                    <h2>公司信息</h2>
                    <div class="pic_logo">
                        @if($thisarticleinfos->indexpic)
                        <img width="154" height="116" src="{{$thisarticleinfos->indexpic}}" alt="{{$thisarticleinfos->brandname}}">
                        @else
                            <img width="154" height="116" src="{{$thisarticleinfos->litpic}}" alt="{{$thisarticleinfos->brandname}}">
                        @endif
                    </div>
                    <div class="pic_com">
                        <div class="tit" title="{{$thisarticleinfos->brandgroup}}">{{$thisarticleinfos->brandgroup}}</div>
                        <ul>
                            <li>
                                <span>注册资金</span>
                                <em>{{$thisarticleinfos->registeredcapital}}</em>
                            </li>
                            <li>
                                <span>经营状态</span>
                                <em>开业</em>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="comp_fenx">
                    <div class="renZ_info">
                        <ul>
                            <li class="mr15">
                                <span class="beian1"></span>
                                <em>备案企业</em>
                            </li>
                            <li class="mr15">
                                <span class="renzheng1"></span>
                                <em>企业认证</em>
                            </li>
                            <li>
                                <span class="baozhang1"></span>
                                <em>投资保障</em>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--公司详情头部介绍 结束-->
        <div class="center_list">
                <!--左边模块 开始-->
                <div class="new_left">
                    <div class="fixed_nav">
                        <div class="cont_tab">
                            <ul>
                                <li class="js_join_1 cur">
                                    <a href="javascript:void(0)">品牌详情</a>
                                </li>
                                <li class="js_join_2">
                                    <a href="javascript:void(0)">品牌资讯</a>
                                </li>
                                <li class="js_join_3">
                                    <a href="javascript:void(0)">品牌推荐</a>
                                </li>
                                <li class="js_join_4">
                                    <a href="javascript:void(0)">项目咨询</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="join_cont">
                        {!! $content !!}
                    </div>
                    @include('frontend.liuyan')
                    <div class="xg_news" id="js_join_2">
                        <div class="common_tit">{{$thisarticleinfos->brandname}}品牌新闻<div class="top_924"></div>
                        </div>
                        <div class="xw">
                            <ul class="clearfix">
                                @foreach($latestbrandnews as $latestbrandnew)
                                <li><em>{{date('Y-m-d',strtotime($latestbrandnew->created_at))}}</em><a href="/article/{{$latestbrandnew->id}}.html">{{$latestbrandnew->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="xg_news" id="js_join_3">
                        <div class="common_tit">{{$thisarticleinfos->brandname}}同类品牌推荐<div class="top_924"></div>
                        </div>
                        <div class="rec_brand_list">
                            <ul>
                                @foreach($latestcbrands as $latestcbrand)
                                    <li><a href="/xiangmu/{{$latestcbrand->id}}.html" target="_blank" title="{{$latestcbrand->brandname}}" class="pic"><img src="{{$latestcbrand->litpic}}" alt="{{$latestcbrand->brandname}}" style="border-radius: 5px;"></a><strong><a class="brand-title" href="/xiangmu/{{$latestcbrand->id}}.html">{{$latestcbrand->brandname}}</a></strong></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--左边模块 结束-->

                <!--右边模块 开始-->
                <div class="new_right">

                    <!--加盟排行榜 开始-->
                    <div class="hot_message hot_fl">
                        <div class="common_hd fl_tit">
                            <span class="more"><a href="/paihang/hanbao/" target="_blank">更多&gt;&gt;</a></span>
                            <h2>{{$thisbrandtypeinfo->typename}}排行榜</h2>
                        </div>
                        <div class="boutique_list">
                            <ul>
                                @foreach($paihangbangs as $paihangbang)
                                    <li class=" top    @if($loop->first) hover @endif ">
                                        <i class="num">{{$loop->iteration}}</i>
                                        <span class="name">
								<a href="/xiangmu/{{$paihangbang->id}}.html" target="_blank" title="{{$paihangbang->brandname}}">{{$paihangbang->brandname}}</a>
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
                                                    <a href="/xiangmu/{{$paihangbang->id}}.html#msg">立即咨询</a>
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
                    <div class="bd_commit">
                        <div class="common_hd">
                            <h2>{{$thisbrandtypeinfo->typename}}热门文章</h2>
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
                            <h2>{{$thisbrandtypeinfo->typename}}最新入驻品牌</h2>
                        </div>
                        <div class="bd_list">
                            @foreach($latestbrands as $latestbrand)
                                <dl>
                                    <dt>
                                        <a href="/xiangmu/{{$latestbrand->id}}.html" target="_blank">
                                            <img src="{{$latestbrand->litpic}}" alt="{{$latestbrand->brandname}}" title="{{$latestbrand->brandname}}">
                                        </a>
                                    </dt>
                                    <dd class="tit">
                                        <a href="/xiangmu/{{$latestbrand->id}}.html" target="_blank" title="{{$latestbrand->brandname}}">{{$latestbrand->brandname}}</a>
                                    </dd>
                                    <dd>投资额度：
                                        <em>{{$investment_types[$latestbrand->tzid]}}</em>
                                    </dd>
                                    <p>
                                        <a href="/xiangmu/{{$latestbrand->id}}.html">立即咨询</a>
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
                                        <a href="/xiangmu/{{$newbrand->id}}.html">{{$newbrand->brandname}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="bd_commit">
                        <div class="common_hd">
                            <h2>热门行业商机快速查询</h2>
                        </div>
                        <div class="hot_tag_bd">
                            @foreach($brandtypeids as $brandtypeid)
                                <a href="/{{$brandtypeid->real_path}}/" target="_blank" title="{{$brandtypeid->typename}}">{{$brandtypeid->typename}}</a>
                            @endforeach
                        </div>
                    </div>
                    <!--热门行业 结束-->
                </div>
                <!--右边模块 结束-->
                @include('frontend.footer')
            </div>
        @if(!empty($navlists))
           <ul class="section table-of-contents" id="filexed" style="position: absolute; left: -105px;" >
               @foreach($navlists as $index=>$navlist)
                   @if(!$loop->last)
                    <li  class="active"><em class="num">{{$index+1}}</em><span>{{$navlist}}</span></li>
                   @else
                   <li  class="noactive"><em class="num">{{$index+1}}</em><a href="#msg" rel="nofollow">在线留言</a></li>
                   @endif
               @endforeach
            </ul>
        @endif
       </div>
    <!--主体结束-->
@stop
@section('footlibs')
    <script>
        window.onscroll = function(){
            var oDiv = document.getElementById('filexed');
            var scrollTop =document.documentElement.scrollTop||document.body.scrollTop;//浏览器兼容
            startmove(parseInt((document.documentElement.clientHeight - oDiv.offsetHeight )/4)+ scrollTop)                // document.documentElement.clientHeight 页面可视区高度
        }
        var timer = null;
        function startmove(iTarget){
            var oDiv = document.getElementById('filexed');
            clearInterval(timer);
            timer = setInterval(function(){
                var speed = (iTarget-oDiv.offsetTop)/4;
                speed = speed>0?Math.ceil(speed):Math.floor(speed);
                if(oDiv.offsetTop == iTarget){
                    clearInterval(timer);
                }
                else{
                    oDiv.style.top = oDiv.offsetTop +speed+'px';
                }
            },30)
        }
        $("#filexed li.active").each(function(i){
            $(this).click(
                function () {
                    var sTop=$(".join_cont").find("h2:eq("+i+")").offset().top-45;
                    $('html,body').animate({scrollTop:sTop+"px"},500);
                }
            );
        });
    </script>
@stop