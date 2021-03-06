@extends('mobile.mobile')
@section('title'){{$thisarticleinfos->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thisarticleinfos->keywords}}@stop
@section('description'){{trim(str_replace('官网','',$thisarticleinfos->description))}}@stop
@section('headlibs')
    <link href="/mobile/css/article.css" rel="stylesheet" type="text/css"/>
    <link href="/mobile/css/brand.css" rel="stylesheet" type="text/css"/>
    <link href="/mobile/css/swiper.min.css" rel="stylesheet" type="text/css"/>
@stop
@section('main_content')
    <div class="weizhi">
	<span><a href="/">首页</a>&nbsp;>&nbsp;
        <a href="{{str_replace('www.','m.',config('app.url'))}}/{{$thisbrandtypecidinfo->real_path}}/">{{$thisbrandtypecidinfo->typename}}</a>&nbsp;>&nbsp;
         <a href="{{str_replace('www.','m.',config('app.url'))}}/{{$thisbrandtypeinfo->real_path}}/">{{$thisbrandtypeinfo->typename}}</a>&nbsp;>&nbsp;详情：
    </span>
    </div>
    <div id="item1">
        <div class="item1box">
            <div class="item1boxleft fl">
                <div class="title">{{str_replace('加盟','',$thisarticleinfos->brandname)}}加盟</div>
                <div class="text">{{$thisarticleinfos->brandgroup}}</div>
                <div class="time"><span>{{date('Y-m-d',strtotime($thisarticleinfos->created_at))}}</span></div>
            </div>
            <div class="item1boxmiddle fl">
                <div class="top" style="font-weight: bold;">{{$investment_types[$thisarticleinfos->tzid]}}</div>
                <a href="#item5"><div class="bottom"></div></a>
            </div>
            <div class="item1boxright fr clearfix">
                <a href="#item5"><img class="js_popup" src="/mobile/images/liuyan.png" alt="在线留言"></a>
                <div class="text">在线留言</div>
            </div>
        </div>
    </div>

    <div id="focus" class="focus">
        <div class="swiper-container">
            <div class="swiper-wrapper" >
                @foreach(array_filter(explode(',',$thisarticleinfos->imagepics)) as $pic)
                    <li class="swiper-slide" ><img src="{{$pic}}"></li>
                    @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div id="item3">
        <div class="item3box">
            <ul class="title clearfix">
                <li class="tl">品牌地址：<span>{{$thisarticleinfos->country}}</span></li>
                <li class="tc">门店数目：<span>{{$thisarticleinfos->brandnum}}</span></li>
                <li class="tr">{{$thisarticleinfos->click}}人关注</li>
            </ul>
            <div class="top clearfix">
                <div class="topleft fl">
                    <i></i>
                    <p>注：{{$thisarticleinfos->brandname}}投资金额可能包含了加盟费、保证金、品牌使用费等其他相关费用，因此投资总额根据实际情况计算，相关费用解释请参考页面<a href="javascript:;" style="cursor: pointer;">底部小贴士</a>
                    </p>
                </div>
                <div class="topright fr">
                    <div class="item3boxbtn btn1">
                        <a href="#item5">立即咨询</a>
                    </div>
                </div>
            </div>
            <div class="bottom clearfix">
                <div class="bottomleft fl">
                </div>
                <div class="bottomright fr">
                    <a href="tel:400-8896-216">
                        <div class="item3boxbtn btn2">
                            拨打电话
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="item4">
        <div class="item4box">
            <div class="item4content">
                <div class="content">
                    <div class="jm_xq" id="b-info">
                        <div class="tb-first">
                            <div class="jm_xq_con on">
                               {!! $content !!}
                            </div>
                            <div class="display" style="display: block;"><span>展开全文</span><i></i></div>
                            <div class="hidden" style="display: none;"><span>收起全文</span><i></i></div>
                    </div>
                    <div class="zhuanzai">
                        <i></i>如需更进一步了解{{$thisarticleinfos->brandname}}品牌加盟相关信息，可留言咨询我们，如因内容、版权或其它问题，请及时和本站取得联系，我们将第一时间删除内容！
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('mobile.liuyan')
    <div id="item7">
        <div class="item7box clearfix">
            <i></i>
            <div class="title">项目资讯</div>
            <div class="item7content">
                @foreach($latestbrandnews as $index=>$latestbrandnew)
                    @if($index<5)
                        <div class="item7list">
                            <a href="/news/{{$latestbrandnew->id}}.html">
                                <div class="left fl">
                                    <div class="lefttitle">{{$latestbrandnew->title}}</div>
                                    <div class="text">
                                        <div class="message">编辑：安心加盟网</div>
                                    </div>
                                </div>
                                <div class="right fr">
                                    <img src="{{$latestbrandnew->litpic}}">
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div id="item8">
        <div class="item8box clearfix">
            <i></i>
            <div class="title">猜你喜欢</div>
            <div class="item8content">
                @foreach($brandarticles as $index=>$brandarticle)
                    @if($index<4)
                    <div class="item8list @if(($index+1)%2==0) fl @else fr @endif">
                        <a href="/busInfo/{{$brandarticle->id}}.html">
                            <img src="{{$brandarticle->litpic}}" alt="{{$brandarticle->brandname}}">
                            <div class="item8listcontent">
                                <div class="listtitle">{{$brandarticle->brandname}}</div>
                                <div class="listtext">
                                    <p>{{$brandarticle->brandgroup}}</p>
                                </div>
                                <div class="textleft fl">￥{{$brandarticle->brandpay}}
                                </div>
                                <div class="textright fr">
                                    {{date('Y-m-d',strtotime($brandarticle->created_at))}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

@stop