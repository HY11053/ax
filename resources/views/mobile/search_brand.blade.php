@extends('mobile.mobile')
@section('title')品牌搜索页面-u88加盟网@stop
@section('keywords')品牌搜索页面 @stop
@section('description')品牌搜索页面@stop
@section('main_content')
    <!--header结束-->
    <div class="path"><a href="/">首页</a>&gt; 搜索结果</div>
    <div class="item_list">
        <div class="index_item">
            <div class="bd">
                <ul>
                    @foreach($brands as $brand)
                    <li>
                        <a href="/xiangmu/{{$brand->id}}.html">
                            <div class="img_show"><img src="{{$brand->litpic}}" /></div>
                            <div class="cont">
                                <p class="tit"><font color="red">{{$brand->brandname}}</font>加盟
                                </p>
                                <p class="price">投资金额：<em>{{$investment_types[$brand->tzid]}}</em></p>
                                <p class="company">公司名称：{{$brand->brandgroup}}</p>
                                <p class="btn"><i>立即留言咨询</i></p>
                            </div>
                        </a>
                    </li>
                  @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--项目列表 结束-->
@stop