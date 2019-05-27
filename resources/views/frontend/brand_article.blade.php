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
    <!--当前位置 开始-->
    <div class="path">当前位置：<a href="/">首页</a> > <a href="/{{$thisbrandtypecidinfo->real_path}}/">{{$thisbrandtypecidinfo->typename}}</a> > <a href="https://www.anxjm.com/{{$thisbrandtypeinfo->real_path}}/">{{$thisbrandtypeinfo->typename}}</a> > {{$thisarticleinfos->brandname}}</div>
    <!--当前位置 结束-->
    <!--main_strat-->
    <div class="c_bar_wrap">
        <div class="c_bar">
            <ul>
                <li class="cur">项目总览</li>
                <li class="js_join_1">
                    <a href="javaScript:void(0)">加盟费用</a>
                </li>
                <li class="js_join_2">
                    <a href="javaScript:void(0)">加盟条件</a>
                </li>
                <li class="js_join_3">
                    <a href="javaScript:void(0)">加盟优势</a>
                </li>
                <li class="js_join_4">
                    <a href="javaScript:void(0)">加盟流程</a>
                </li>
                <li class="js_join_6">
                    <a href="javaScript:void(0)">索要资料</a>
                </li>
                <li class="js_join_6">
                    <a href="javaScript:void(0)">立即咨询</a>
                </li>
                <li class="js_join_5">
                    <a href="javaScript:void(0)">资质认证</a>
                </li>
                <li class="js_join_6">
                    <a class="red" href="javaScript:void(0)">申请加盟</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="basic">
        <div class="show_img smallslider">
            <div class="hd">
                <ul>
                    <li  class="on" >1</li>
                    <li >2</li>
                    <li >3</li>
                </ul>
            </div>
            <div class="bd">
                <ul>
                    @foreach(explode(',',trim($thisarticleinfos->imagepics,',')) as $imagepic)
                     <li><img src="{{$imagepic}}" title="{{$thisarticleinfos->brandname}}" alt="{{$thisarticleinfos->brandname}}"></li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="c_basic">
            <div class="context_title">
                <h1>{{$thisarticleinfos->brandname}}</h1>
                <div class="c_line">
                    <div class="cl"></div>
                </div>
            </div>
            <div class="c_info">
                <ul>
                    <li>
                        <b>投资金额：</b>
                        <a href="/search?invest=3" target="_blank">
                            <span class="money">{{$thisarticleinfos->brandpay}}</span>
                        </a>
                    </li>
                    <li class="ls">
                        <b>所属行业：</b>
                        <span class="fl"><a href="/{{$thisbrandtypecidinfo->real_path}}/" target="_blank">{{$thisbrandtypecidinfo->typename}}</a> &gt;<a href="/{{$thisbrandtypeinfo->real_path}}/" target="_blank">{{$thisbrandtypeinfo->typename}}</a></span>
                    </li>
                    <li>
                        <b>企业名称：</b>
                        <span>{{$thisarticleinfos->brandgroup}}</span>
                    </li>
                    <li>
                        <b>官方网址：</b>
                        <span>
								<a href="javaScript:void(0)" class="js_join_6">[索取加盟官方网址]</a>
							</span>
                    </li>
                    <li>
                        <b>总部地址：</b>
                        <strong>{{$thisarticleinfos->brandaddr}}</strong>
                    </li>
                    <li class="btn">
                        <a href="javaScript:void(0)" class="js_join_6 btn_ly" title="留言咨询">留言咨询</a>
                        <a href="javaScript:void(0)" class="js_join_6 btn_zl" title="获取资料">获取资料</a>
                    </li>
                </ul>
            </div>
            <div class="tel">
                <p>项目咨询热线</p>
                <p class="num">400-885-8878</p>
            </div>
        </div>
        <div class="c_logo">
            <div class="bd">
                <img src="{{$thisarticleinfos->litpic}}" title="{{$thisarticleinfos->brandname}}" alt="{{$thisarticleinfos->brandname}}" class="cl_logo" />
                <ul>
                    <li>意向加盟
                        <span>{{$thisarticleinfos->brandattch}}</span>
                    </li>
                    <li>申请加盟
                        <span>{{$thisarticleinfos->brandapply}}</span>
                    </li>
                    <li>
                        <a onclick="AddFavorite(window.location,document.title)" href="javascript:void(0)">收藏该项目</a>
                        <span>{{$thisarticleinfos->brandclick}}</span>
                    </li>
                </ul>
            </div>
            <div class="renZ_info">
                <ul>
                    <li>
                        <span class="beian1"></span>
                        <em>开店指导</em>
                    </li>
                    <li>

                        <span class="renzheng1"></span>
                        <em>店铺选址</em>
                    </li>
                    <li>
                        <span class="baozhang1"></span>
                        <em>经营技巧</em>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="company_context">
        <!-- 左侧 start -->

        <div class="context_left">
            {!! $thisarticleinfos->body !!}
            <!-- 资质认证 start -->
            <div class="context_title" id="js_join_5">
                <div style="font-weight:bold;font-size: 20px; height: 40px;line-height: 40px;color: #D71318;">百格汉斯烤肉资质认证</div>
                <div class="c_line">
                    <div class="cl"></div>
                </div>
            </div>
            <div class="company_contact">
                <div class="company_ok">
                    <img src="/public/images/renzhen.jpg" />
                </div>
            </div>
            <div class="c_line2"></div>

            <!-- 资质认证 end -->

            <!-- 相关文章 start -->

            <div class="context_title">
                <div style="font-weight:bold;font-size: 20px; height: 40px;line-height: 40px;color: #D71318;">百格汉斯烤肉相关文章</div>
                <div class="c_line">
                    <div class="cl"></div>
                </div>
            </div>
            <div class="company_contact">
                <div class="rela_news nb">
                    <ul>
                        @foreach($latestbrandnews as $latestbrandnew)
                        <li><a href="/news/{{$latestbrandnew->id}}.html" target="_blank" title="{{$latestbrandnew->title}}">{{$latestbrandnew->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="c_line2"></div>
            <!-- 相关文章 end -->
            <!-- 留言列表 start -->
            <div class="context_title">
                <div style="font-weight:bold;font-size: 20px; height: 40px;line-height: 40px;color: #D71318;">百格汉斯烤肉最新留言</div>
                <div class="c_line">
                    <div class="cl"></div>
                </div>
            </div>
            <div class="company_contact">
                <!--用户留言开始-->
                <div class="msg_list">
                    <div class="tit">客户留言</div>
                    <div class="msg_cont" id="js_msg">
                        <div class="bd">
                            <ul>
                                <li><span class="data">05-25 10:18</span><span class="red">唐女士&nbsp;&nbsp;189******97</span>对该项目产生意向：我想加盟，请联系我。</li>
                                <li><span class="data">05-26 03:05</span><span class="red">王女士&nbsp;&nbsp;134******67</span>对该项目产生意向：做为代理加盟商可以得到哪些支持?</li>
                                <li><span class="data">05-26 07:28</span><span class="red">周女士&nbsp;&nbsp;131******92</span>对该项目产生意向：初步打算加入贵公司，请寄资料。</li>
                                <li><span class="data">05-26 11:39</span><span class="red">赵女士&nbsp;&nbsp;131******19</span>对该项目产生意向：你好！我想加盟代理你们的品牌，请联系我。</li>
                                <li><span class="data">05-26 04:31</span><span class="red">孙先生&nbsp;&nbsp;180******94</span>对该项目产生意向：你们的总部在哪里部在哪里？</li>
                                <li><span class="data">05-26 09:00</span><span class="red">郭先生&nbsp;&nbsp;138******59</span>对该项目产生意向：做为代理加盟商可以得到哪些支持?</li>
                                <li><span class="data">05-27 01:27</span><span class="red">刘先生&nbsp;&nbsp;189******74</span>对该项目产生意向：初步打算加入贵公司，请寄资料。</li>
                                <li><span class="data">05-27 05:57</span><span class="red">赵女士&nbsp;&nbsp;136******73</span>对该项目产生意向：做为代理加盟商可以得到哪些支持?</li>
                                <li><span class="data">05-27 09:56</span><span class="red">王女士&nbsp;&nbsp;170******87</span>对该项目产生意向：对该项目产生意向：我想知道加盟费用是多少。谢谢</li>
                                <li><span class="data">05-27 02:17</span><span class="red">易女士&nbsp;&nbsp;156******66</span>对该项目产生意向：请问店面面积需要多大？</li>
                                <li><span class="data">05-27 07:05</span><span class="red">孙先生&nbsp;&nbsp;170******63</span>对该项目产生意向：你们的总部在哪里部在哪里？</li>
                                <li><span class="data">05-27 11:40</span><span class="red">唐女士&nbsp;&nbsp;136******92</span>对该项目产生意向：做为代理加盟商可以得到哪些支持?</li>
                                <li><span class="data">05-28 04:05</span><span class="red">周女士&nbsp;&nbsp;189******14</span>对该项目产生意向：初步打算加入贵公司，请寄资料。</li>
                                <li><span class="data">05-28 08:06</span><span class="red">吴先生&nbsp;&nbsp;152******58</span>对该项目产生意向：请问店面面积需要多大？</li>
                                <li><span class="data">05-28 12:47</span><span class="red">赵女士&nbsp;&nbsp;138******67</span>对该项目产生意向：做为代理加盟商可以得到哪些支持?</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--用户留言结束-->
            </div>
          @include('frontend.liuyan')
            <!-- 添加留言 end -->
        </div>

        <!-- 左侧 end -->

        <!-- 右侧 end -->
        <div class="context_right">
            <!-- 同类项目 start -->
            <div class="context_title">
					<span>
						<a href="https://www.anxjm.com/ms/" target="_blank">更多&gt;&gt;</a>
					</span>
                <h2>{{$thisarticleinfos->brandname}}同类项目</h2>
                <div class="c_line">
                    <div class="cl"></div>
                </div>
            </div>
            <ul class="right_company">
                @foreach($paihangbangs as $index=>$paihangbang)
                <li> <span class="ico  @if($index<3) num @endif ">{{$index+1}}</span> <span class="name"><a href="/busInfo/{{$paihangbang->id}}.html" target="_blank" title="{{$paihangbang->brandname}}">{{$paihangbang->brandname}}</a></span> <span class="invest">[{{--{{$investment_types[$paihangbang->tzid]}}--}}]</span> </li>
                @endforeach
            </ul>
            <p class="clr"></p>

            <!-- 同类项目 end -->

            <!-- 同类项目 start -->

            <div class="context_title">
					<span>
						<a href="/search?invest=3" target="_blank">更多&gt;&gt;</a>
					</span>
                <h2>{{$thisbrandtypeinfo->typename}}热门资讯</h2>
                <div class="c_line">
                    <div class="cl"></div>
                </div>
            </div>
            <ul class="right_company">
                <li> <span class="ico  num ">1</span> <span class="name"><a href="https://www.anxjm.com/busInfo/5.html" target="_blank" title="茶桔便">茶桔便</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico  num ">2</span> <span class="name"><a href="https://www.anxjm.com/busInfo/13.html" target="_blank" title="易道教育">易道教育</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico  num ">3</span> <span class="name"><a href="https://www.anxjm.com/busInfo/15.html" target="_blank" title="洁之圣洗衣">洁之圣洗衣</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">4</span> <span class="name"><a href="https://www.anxjm.com/busInfo/18.html" target="_blank" title="建达IT生活馆">建达IT生活馆</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">5</span> <span class="name"><a href="https://www.anxjm.com/busInfo/19.html" target="_blank" title="玛莉乔思箱包">玛莉乔思箱包</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">6</span> <span class="name"><a href="https://www.anxjm.com/busInfo/33.html" target="_blank" title="七心作文">七心作文</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">7</span> <span class="name"><a href="https://www.anxjm.com/busInfo/37.html" target="_blank" title="贵丽人家纺">贵丽人家纺</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">8</span> <span class="name"><a href="https://www.anxjm.com/busInfo/38.html" target="_blank" title="卓人右脑教育">卓人右脑教育</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">9</span> <span class="name"><a href="https://www.anxjm.com/busInfo/61.html" target="_blank" title="乐好奇汉堡">乐好奇汉堡</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">10</span> <span class="name"><a href="https://www.anxjm.com/busInfo/68.html" target="_blank" title="变态薯薯条">变态薯薯条</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">11</span> <span class="name"><a href="https://www.anxjm.com/busInfo/69.html" target="_blank" title="梦之谷画像">梦之谷画像</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">12</span> <span class="name"><a href="https://www.anxjm.com/busInfo/72.html" target="_blank" title="亮湾湾饰品">亮湾湾饰品</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">13</span> <span class="name"><a href="https://www.anxjm.com/busInfo/79.html" target="_blank" title="赛维干洗店">赛维干洗店</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">14</span> <span class="name"><a href="https://www.anxjm.com/busInfo/88.html" target="_blank" title="ur-lily美包">ur-lily美包</a></span> <span class="invest">[5-10万元]</span> </li>
                <li> <span class="ico ">15</span> <span class="name"><a href="https://www.anxjm.com/busInfo/96.html" target="_blank" title="依莱斯珠宝">依莱斯珠宝</a></span> <span class="invest">[5-10万元]</span> </li>
            </ul>
            <p class="clr"></p>

            <!-- 同类项目 end -->

            <!-- 最新加盟项目 start -->

            <div class="context_title">
					<span>
						<a href="/search" target="_blank">更多&gt;&gt;</a>
					</span>
                <h2>{{$thisbrandtypeinfo->typename}}最新入驻品牌</h2>
                <div class="c_line">
                    <div class="cl"></div>
                </div>
            </div>
            <ul class="right_company">
                @foreach($latestbrands as $index=>$latestbrand)
                <li> <span class="ico  @if($index<3) num @endif ">{{$index+1}}</span> <span class="name"><a href="/busInfo/{{$latestbrand->id}}.html" target="_blank" title="{{$latestbrand->brandname}}">{{$latestbrand->brandname}}</a></span> <span class="invest">[5-10万元]</span> </li>
                @endforeach
            </ul>
            <p class="clr"></p>

            <!-- 最新加盟项目 end -->
            <div class="right_cywd"> </div>
        </div>

        <!-- 右侧 end -->

        <p class="clr"></p>
    </div>

    <!--main_end-->
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