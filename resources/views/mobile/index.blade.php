@extends('mobile.mobile')
@section('title'){{config('app.webname')}}@stop
@section('keywords'){{config('app.keywords')}}@stop
@section('description'){{config('app.description')}}@stop
@section('main_content')
    <!--幻灯片开始-->
    <div id="focus" class="focus">
        <div class="hd">
            <ul>
            </ul>
        </div>
        <div class="bd">
            <ul>
                <li><a href="/xiangmu/2025045.html"><img _src="https://www.u88.com/uploads/picture/92/7d/0e3e4085115f35610d9a2da9cfa2.jpg" src="https://www.u88.com/uploads/picture/92/7d/0e3e4085115f35610d9a2da9cfa2.jpg"/></a></li>
                <li><a href="/xiangmu/2012519.html"><img _src="https://www.u88.com/uploads/picture/dc/ef/6be81af68e04fb5a19e533daa157.jpg" src="https://www.u88.com/uploads/picture/dc/ef/6be81af68e04fb5a19e533daa157.jpg"/></a></li>
                <li><a href="/xiangmu/2005015.html"><img _src="https://www.u88.com/uploads/picture/b0/0d/cf7abd0a7f1a74c8d753df9974d2.png" src="https://www.u88.com/uploads/picture/b0/0d/cf7abd0a7f1a74c8d753df9974d2.png"/></a></li>
                <li><a href="/xiangmu/2011164.html"><img _src="https://www.u88.com/uploads/picture/69/bc/020f367ee05d7cc182e44d672d3a.png" src="https://www.u88.com/uploads/picture/69/bc/020f367ee05d7cc182e44d672d3a.png"/></a></li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        TouchSlide({
            slideCell:"#focus",
            titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
            mainCell:".bd ul",
            effect:"left",
            autoPlay:true,//自动播放
            autoPage:true,//自动分页
            switchLoad:"_src"//切换加载，真实图片路径为"_src"
        });
    </script>
    <!--幻灯片结束-->
    <!--分类开始-->
    <div class="index_nav" id="index_nav">
        <div class="hd">
            <ul>
            </ul>
        </div>
        <div class="bd">
            <ul>
                <li> <span><a href="/canyin/" class="icon1"><em></em>餐饮加盟</a></span> <span><a href="/ganxi/" class="icon2"><em></em>干洗加盟</a></span>
                    <span><a href="/chayin/" class="icon3"><em></em>茶饮项目</a></span> <span><a href="/huoguo/" class="icon4"><em></em>火锅加盟</a></span>
                    <span><a href="/jiaoyu/" class="icon5"><em></em>教育加盟</a></span> <span><a href="/muying/" class="icon6"><em></em>母婴加盟</a></span>
                    <span><a href="/meirong/" class="icon7"><em></em>美容加盟</a></span> <span><a href="/jiaju/" class="icon8"><em></em>家居加盟</a></span>
                </li>
                <li> <span><a href="/jinronggongsi/" class="icon9"><em></em>金融公司</a></span> <span><a href="/lingshou/" class="icon10"><em></em>零售加盟</a></span>
                    <span><a href="/baojian/" class="icon11"><em></em>保健加盟</a></span> <span><a href="/yule/" class="icon12"><em></em>休闲娱乐</a></span>
                    <span><a href="/qiche/" class="icon13"><em></em>汽车加盟</a></span> <span><a href="/fuzhuang/" class="icon14"><em></em>服装加盟</a></span>
                    <span><a href="/tesejiameng/" class="icon15"><em></em>新奇加盟</a></span> <span><a href="/jiancai/" class="icon16"><em></em>建材加盟</a></span>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        TouchSlide({
            slideCell:"#index_nav",
            titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
            mainCell:".bd ul",
            effect:"left",
            autoPlay:false,//自动播放
            autoPage:true,//自动分页
        });
    </script>
    <!--分类结束-->
    <!--推荐项目 开始-->
    <div class="rec_item">
        <div class="common_tit">
            <span class="change_btn" onClick="tabsNext(this,1)">换一批<i class="index_icon3"></i></span>
            <a class="tit" href="/xiangmu/"><i class="index_icon1"></i>精品推荐</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($hotbrands as $index=>$hotbrand)
                    @if($index<4)
                        <li>
                            <a href="/xiangmu/{{$hotbrand->id}}.html">
                                <div class="img_show"><img src="{{$hotbrand->litpic}}" alt="{{$hotbrand->brandname}}"/></div>
                                <div class="cont">
                                    <p class="tit">{{$hotbrand->brandname}}</p>
                                    <p class="price">投资金额：<em>{{$investment_types[$hotbrand->tzid]}}</em></p>
                                    <p class="join"><span class="text_blue">{{$hotbrand->brandnum}}</span>人意向加盟</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <ul>
                @foreach($hotbrands as $index=>$hotbrand)
                    @if($index<4)
                        <li>
                            <a href="/xiangmu/{{$hotbrand->id}}.html">
                                <div class="img_show"><img src="{{$hotbrand->litpic}}" alt="{{$hotbrand->brandname}}"/></div>
                                <div class="cont">
                                    <p class="tit">{{$hotbrand->brandname}}</p>
                                    <p class="price">投资金额：<em>{{$investment_types[$hotbrand->tzid]}}</em></p>
                                    <p class="join"><span class="text_blue">{{$hotbrand->brandnum}}</span>人意向加盟</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>
    </div>
    <!--推荐项目 结束-->
    <!--精品项目 开始-->
    <div class="rec_item">
        <div class="common_tit">
            <span class="change_btn" onClick="tabsNext(this,1)">换一批<i class="index_icon3"></i></span>
            <a class="tit" href="/xiangmu/"><i class="index_icon1"></i>新品推荐</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($latestbrands as $index=>$latestbrand)
                    @if($index<4)
                <li>
                    <a href="/xiangmu/{{$latestbrand->id}}.html">
                        <div class="img_show"><img src="{{$latestbrand->litpic}}" alt="{{$latestbrand->brandname}}"/></div>
                        <div class="cont">
                            <p class="tit">{{$latestbrand->brandname}}</p>
                            <p class="price">投资金额：<em>{{$investment_types[$latestbrand->tzid]}}</em></p>
                            <p class="join"><span class="text_blue">{{$latestbrand->brandnum}}</span>人意向加盟</p>
                        </div>
                    </a>
                </li>
                    @endif
                @endforeach
            </ul>
            <ul>
                @foreach($latestbrands as $index=>$latestbrand)
                    @if($index >3)
                        <li>
                            <a href="/xiangmu/{{$latestbrand->id}}.html">
                                <div class="img_show"><img src="{{$latestbrand->litpic}}" alt="{{$latestbrand->brandname}}"/></div>
                                <div class="cont">
                                    <p class="tit">{{$latestbrand->brandname}}</p>
                                    <p class="price">投资金额：<em>{{$investment_types[$latestbrand->tzid]}}</em></p>
                                    <p class="join"><span class="text_blue">{{$latestbrand->brandnum}}</span>人意向加盟</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <span class="load_more_btn"><a href="/xiangmu/">更多热门项目</a></span>
    </div>
    <!--精品项目 结束-->

    <!--创业资讯 开始-->
    <div class="index_news_tab mb10" id="index_news_tab">
        <div class="hd">
            <ul>
                <li>新闻资讯</li>
                <li>创业指导</li>
                <li>加盟费用</li>
                <li>投资行情</li>
            </ul>
        </div>
        <div class="bd">
            <ul>
                @foreach($pinpainews as $index=>$pinpainew)
                    @if($index<4)
                <li>
                    <a href="/article/{{$pinpainew->id}}.html">
                        <div class="img_show"><img src="{{$pinpainew->litpic}}" alt="{{$pinpainew->title}}"/></div>
                        <div class="cont">
                            <p class="tit">{{$pinpainew->title}}</p>
                            <p class="date"><em>编辑：U88加盟网</em>{{date('Y-m-d',strtotime($pinpainew->created_at))}}</p>
                        </div>
                    </a>
                </li>
                    @endif
                @endforeach
                <span class="load_more_btn"><a href="/article/">查询更多资讯</a></span>
            </ul>
            <ul>
                @foreach($chuangyenews as $index=>$chuangyenew)
                    @if($index<4)
                        <li>
                            <a href="/article/{{$chuangyenew->id}}.html">
                                <div class="img_show"><img src="{{$chuangyenew->litpic}}" alt="{{$chuangyenew->title}}"/></div>
                                <div class="cont">
                                    <p class="tit">{{$chuangyenew->title}}</p>
                                    <p class="date"><em>编辑：U88加盟网</em>{{date('Y-m-d',strtotime($chuangyenew->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
                <span class="load_more_btn"><a href="/chuangyezhidao/">查询更多资讯</a></span>
            </ul>
            <ul>
                @foreach($jmfeiyongnews as $index=>$jmfeiyongnew)
                    @if($index<4)
                        <li>
                            <a href="/article/{{$jmfeiyongnew->id}}.html">
                                <div class="img_show"><img src="{{$jmfeiyongnew->litpic}}" alt="{{$jmfeiyongnew->title}}"/></div>
                                <div class="cont">
                                    <p class="tit">{{$jmfeiyongnew->title}}</p>
                                    <p class="date"><em>编辑：U88加盟网</em>{{date('Y-m-d',strtotime($jmfeiyongnew->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
                <span class="load_more_btn"><a href="/chuangyezhinan/">查询更多资讯</a></span>
            </ul>
            <ul>
                @foreach($touzinews as $index=>$touzinew)
                    @if($index<4)
                        <li>
                            <a href="/article/{{$touzinew->id}}.html">
                                <div class="img_show"><img src="{{$touzinew->litpic}}" alt="{{$touzinew->title}}"/></div>
                                <div class="cont">
                                    <p class="tit">{{$touzinew->title}}</p>
                                    <p class="date"><em>编辑：U88加盟网</em>{{date('Y-m-d',strtotime($touzinew->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
                <span class="load_more_btn"><a href="/touzi/">查询更多资讯</a></span>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        TouchSlide({ slideCell:"#index_news_tab"});
    </script>
    <!--创业资讯 结束-->
@stop
