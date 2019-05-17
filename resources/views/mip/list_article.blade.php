@extends('mip.mip')
@section('title'){{$thistypeinfo->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thistypeinfo->keywords}} @stop
@section('description'){{trim($thistypeinfo->description)}}@stop
@section('main_content')
    <div class="path"><a href="/">首页</a>&gt; <a href="/article/">创业资讯</a>&gt; {{$thistypeinfo->typename}}</div>

    <!--资讯列表 开始-->
    <div class="index_news_tab">
        <div class="hd">
            <ul>
                @foreach($toparticlenavs as $index=>$toparticlenav)
                    @if($index<4)
                        <li  @if(str_contains(Request::getrequesturi(),$toparticlenav->real_path)) class="on" @endif ><a href="/{{$toparticlenav->real_path}}/">{{$toparticlenav->typename}}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="bd">
            <ul>
                @foreach($pagelists as $pagelist)
                    <li>
                        <a href="/article/{{$pagelist->id}}.html">
                            <div class="img_show"><mip-img src="{{$pagelist->litpic}}" alt="{{$pagelist->title}}" ></mip-img></div>
                            <div class="cont">
                                <p class="tit">{{$pagelist->title}}</p>
                                <p class="date">
                                    <em>来源：U88加盟网</em>{{date('Y-m-d',strtotime($pagelist->created_at))}}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="pages">
        {!! str_replace(['cid=&amp;','cid=/'],'',str_replace('page=','p',str_replace('?','/',preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links())))) !!}
    </div>
    <!--资讯列表 结束-->
@stop