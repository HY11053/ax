@extends('mip.mip')
@section('title')创业加盟项目月排行榜-U88加盟网@stop
@section('keywords')创业加盟项目月排行榜@stop
@section('description')@stop
@section('main_content')
    <!--排行榜列表 开始-->
    <section class="rank_list_content">
        @foreach($paihangbrands as $index=>$paihangbrand)
            <a href="/xiangmu/{{$paihangbrand->id}}.html"><mip-img src="{{$paihangbrand->litpic}}"></mip-img>
                <p>{{$paihangbrand->brandname}}</p>
            </a>
        @endforeach
    </section>
    <!--排行榜列表 结束-->
@stop