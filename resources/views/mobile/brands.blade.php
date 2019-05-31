@extends('mobile.mobile')
@section('title'){{$thistypeinfo->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thistypeinfo->keywords}} @stop
@section('description'){{trim($thistypeinfo->description)}}@stop
@section('headlibs')
    <link href="/mobile/css/list.css" rel="stylesheet" type="text/css"/>
    <link href="/frontend/css/swiper.min.css" rel="stylesheet" type="text/css"/>
@stop
@section('main_content')
    @include('mobile.header')
    <!--menu End-->
    <div class="weizhi">
	<span><a href="/">首页</a>&nbsp;>&nbsp; <a href="{{str_replace('www.','m.',config('app.url'))}}/{{$thistypeinfo->real_path}}/">{{$thistypeinfo->typename}}</a>&nbsp;>&nbsp;列表：</span>
    </div>
    <div class="brand_list" style="padding-top: 10px ;">
        @foreach($pagelists as $index=>$pagelist)
            <div class="brand-detail-list-all">
            <div class="search-list-container  ">
                <div class="title flex flex-align-center">
                  <span class="num-icon">
                        <span class="top">{{$index+1}}</span>
                    </span>
                    <div class="title-text">
                        <a href="{{str_replace('www.','m.',config('app.url'))}}/xm/{{$pagelist->id}}.shtml" class="a "><span>{{$pagelist->brandname}}</span></a>
                    </div>
                    <a href="{{str_replace('www.','m.',config('app.url'))}}/xm/{{$pagelist->id}}.shtml" class="brand-list-item-jump-tmall official"  title="{{$pagelist->brandname}}" data-bde-bind="1"><span class="active">品牌详情</span></a>
                </div>
                <div class="clear"></div>
                <a href="{{str_replace('www.','m.',config('app.url'))}}/xm/{{$pagelist->id}}.shtml">
                    <dl class="list flex flex-align-center">
                        <div class="dt flex flex-align-center">
                                <span>
                                    <img src="{{$pagelist->litpic}}" alt="{{$pagelist->brandname}}" class="autoWH" style="display: inline; margin: 1px 0px;" width="73" height="31">
                                </span>
                        </div>
                        <dd class="big-data">
                            <div class="data">
                                <div>投资金额：<span>{{$pagelist->brandpay}}</span></div>
                                品牌名称：<span>{{$pagelist->brandname}}</span>
                            </div>
                            <div class="data">
                                <div>加盟人气：<span>{{$pagelist->click}}</span></div>
                                所在地区：<span>{{$pagelist->brandaddr}}</span>
                            </div>
                        </dd>
                    </dl>
                    <div class="spe-msg">
                        {{$pagelist->description}}
                    </div>
                </a>
            </div>
        </div>
        @endforeach
            <div class="page">
                {!! str_replace('page=','page/',str_replace('?','/',preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links()))) !!}
            </div>
    </div>
    @include('mobile.liuyan')
    <div class="index_item">
        <div class="common_tit">
            <span class="tit" href="/paihangbang/{{$thistypeinfo->real_path}}/">{{$thistypeinfo->typename}}十大品牌</span>
        </div>
        <div class="bd">
            <ul>
                @foreach($paihangbangs as $index=>$paihangbang)
                    @if($index<3)
                        <li>
                            <a href="{{str_replace('www.','m.',config('app.url'))}}/xm/{{$paihangbang->id}}.shtml">
                                <div class="img_show"><img src="{{$paihangbang->litpic}}"/></div>
                                <div class="cont">
                                    <p class="tit">{{$paihangbang->brandname}}</p>
                                    <p class="desc">{{str_limit($paihangbang->description,30,'...')}}</p>
                                    <p class="price">投资金额：<em>￥{{$paihangbang->brandpay}}</em></p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="list">
            <ul>
                @foreach($paihangbangs as $index=>$paihangbang)
                    @if($index>2)
                        <li>
                            <a href="{{str_replace('www.','m.',config('app.url'))}}/xm/{{$paihangbang->id}}.shtml">
                                <i>{{$index+1}}</i><span>{{$paihangbang->brandname}}</span><em>已有{{$paihangbang->brandnum}}人申请</em>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!--品牌列表 End-->
    <div id="item7">
        <div class="item7box clearfix">
            <i></i>
            <div class="title">项目资讯</div>
            <div class="item7content">
                @foreach($cnewslists as $cnewslist)
                    <div class="item7list">
                        <a href="/news/{{$cnewslist->id}}.shtml">
                            <div class="left fl">
                                <div class="lefttitle">{{$cnewslist->title}}</div>
                                <div class="text">
                                    <div class="message">编辑：安心加盟网</div>
                                </div>
                            </div>
                            <div class="right fr">
                                <img  @if($cnewslist->litpic) src="{{$cnewslist->litpic}}" alt="{{$cnewslist->tite}}" @else src="/public/images/noimg.jpg" @endif />
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop