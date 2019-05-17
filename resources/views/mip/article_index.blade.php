@extends('mip.mip')
@section('title')加盟什么店最赚钱_挣钱最快的方法,u88为您推荐赚钱项目-{{config('app.indexname')}}@stop
@section('keywords')加盟什么店最赚钱,挣钱最快的方法@stop
@section('description')加盟什么店最赚钱_挣钱最快的方法,u88为您推荐赚钱项目@stop
@section('main_content')
    <div class="path"><a href="/">首页</a>&gt; <a href="/article/">创业资讯</a></div>
    <div class="news_item">
        <div class="common_tit">
            <a class="more" href="/chuangyegushi/">显示全部&gt;&gt;</a>
            <a class="tit" href="/chuangyegushi/">创业故事</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($chuangyegs as $index=>$chuangyeg)
                    @if($index<5)
                        <li>
                            <a href="/article/{{$chuangyeg->id}}.html">
                                <div class="img_show"><mip-img src="{{$chuangyeg->litpic}}" alt="{{$chuangyeg->title}}"></mip-img></div>
                                <div class="cont">
                                    <p class="tit">{{$chuangyeg->title}}</p>
                                    <p class="date"><em>来源：U88加盟网</em>{{date('Y-m-d',strtotime($chuangyeg->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="news_item">
        <div class="common_tit">
            <a class="more" href="/chuangyezhinan/">显示全部&gt;&gt;</a>
            <a class="tit" href="/chuangyezhinan/">加盟费用</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($jmfeiyongs as $index=>$jmfeiyong)
                    @if($index<5)
                        <li>
                            <a href="/article/{{$jmfeiyong->id}}.html">
                                <div class="img_show"><mip-img src="{{$jmfeiyong->litpic}}" alt="{{$jmfeiyong->title}}"></mip-img></div>
                                <div class="cont">
                                    <p class="tit">{{$jmfeiyong->title}}</p>
                                    <p class="date"><em>来源：U88加盟网</em>{{date('Y-m-d',strtotime($jmfeiyong->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="news_item">
        <div class="common_tit">
            <a class="more" href="/chuangyezhidao/">显示全部&gt;&gt;</a>
            <a class="tit" href="/chuangyezhidao/">创业指导</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($chuanyezds as $index=>$chuanyezd)
                    @if($index<5)
                        <li>
                            <a href="/article/{{$chuanyezd->id}}.html">
                                <div class="img_show"><mip-img src="{{$chuanyezd->litpic}}" alt="{{$chuanyezd->title}}"></mip-img></div>
                                <div class="cont">
                                    <p class="tit">{{$chuanyezd->title}}</p>
                                    <p class="date"><em>来源：U88加盟网</em>{{date('Y-m-d',strtotime($chuanyezd->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="news_item">
        <div class="common_tit">
            <a class="more" href="/touzi/">显示全部&gt;&gt;</a>
            <a class="tit" href="/touzi/">投资行情</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($touzinews as $index=>$touzinew)
                    @if($index<5)
                        <li>
                            <a href="/article/{{$touzinew->id}}.html">
                                <div class="img_show"><mip-img src="{{$touzinew->litpic}}" alt="{{$touzinew->title}}"></mip-img></div>
                                <div class="cont">
                                    <p class="tit">{{$touzinew->title}}</p>
                                    <p class="date"><em>来源：U88加盟网</em>{{date('Y-m-d',strtotime($touzinew->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
    <div class="news_item">
        <div class="common_tit">
            <a class="more" href="/shangji/">显示全部&gt;&gt;</a>
            <a class="tit" href="/shangji/">品牌动态</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($brandnews as $index=>$brandnew)
                    @if($index<5)
                        <li>
                            <a href="/article/{{$brandnew->id}}.html">
                                <div class="img_show"><mip-img src="{{$brandnew->litpic}}" alt="{{$brandnew->title}}"></mip-img></div>
                                <div class="cont">
                                    <p class="tit">{{$brandnew->title}}</p>
                                    <p class="date"><em>来源：U88加盟网</em>{{date('Y-m-d',strtotime($brandnew->created_at))}}</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@stop