@extends('mobile.mobile')
@section('title'){{str_replace('加盟','',$thistypeinfo->typename)}}加盟排行榜-{{str_replace('加盟','',$thistypeinfo->typename)}}加盟十大品牌排行榜-{{config('app.indexname')}}@stop
@section('keywords'){str_replace('加盟','',$thistypeinfo->typename)}}加盟排行榜,{{str_replace('加盟','',$thistypeinfo->typename)}}加盟十大品牌,@stop
@section('description'){{config('app.indexname')}}为您全方位解读{{str_replace('加盟','',$thistypeinfo->typename)}}加盟品牌排行信息。{{str_replace('加盟','',$thistypeinfo->typename)}}加盟门店排行信息，{{str_replace('加盟','',$thistypeinfo->typename)}}加盟排行榜分类。提供性价比最高{{str_replace('加盟','',$thistypeinfo->typename)}}加盟品牌排行榜信息，让您加盟无忧，顺利开店。快速解决创业致富难题。@stop
@section('main_content')
    <div class="fixation">
        <div class="drop-down-ctn up clearfix">
            <div class="drop-left clearfix">
                @foreach($navbrands as $typename=>$navbrand)
                    <a  href="/paihang/{{$navtops[$typename]->real_path}}/"  @if(str_contains(Request::getrequesturi(),$navtops[$typename]->real_path)) class="red" @endif>{{$typename}}排行榜</a>
                @endforeach
            </div>
            <div class="ic-drop"></div>
        </div>
        <div class="shade"></div>
    </div>

    <!--排行榜列表 开始-->
    <section class="rank_list_content">
        @foreach($paihangbrands as $index=>$paihangbrand)
        <a href="/xiangmu/{{$paihangbrand->id}}.html"><img src="{{$paihangbrand->litpic}}">
            <p>{{$paihangbrand->brandname}}</p>
        </a>
        @endforeach
    </section>
    <!--排行榜列表 结束-->
@stop