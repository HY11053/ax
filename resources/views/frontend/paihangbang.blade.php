@extends('frontend.frontend')
@section('title'){{str_replace('加盟','',$thistypeinfo->typename)}}加盟排行榜-{{str_replace('加盟','',$thistypeinfo->typename)}}加盟十大品牌排行榜-{{config('app.indexname')}}@stop
@section('keywords'){str_replace('加盟','',$thistypeinfo->typename)}}加盟排行榜,{{str_replace('加盟','',$thistypeinfo->typename)}}加盟十大品牌,@stop
@section('description'){{config('app.indexname')}}为您全方位解读{{str_replace('加盟','',$thistypeinfo->typename)}}加盟品牌排行信息。{{str_replace('加盟','',$thistypeinfo->typename)}}加盟门店排行信息，{{str_replace('加盟','',$thistypeinfo->typename)}}加盟排行榜分类。提供性价比最高{{str_replace('加盟','',$thistypeinfo->typename)}}加盟品牌排行榜信息，让您加盟无忧，顺利开店。快速解决创业致富难题。@stop
@section('headlibs')
    <meta name="Copyright" content="{{config('app.indexname')}}-{{config('app.url')}}"/>
    <meta name="author" content="{{config('app.indexname')}}" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{config('app.url')}}{{Request::getrequesturi()}}"/>
@stop
@section('main_content')
    <div class="main">
        <!--当前位置 开始-->
        <div class="path">当前位置：<a href="/">首页</a>&gt;&nbsp; <a href="/paihang/">排行榜</a>&gt;&nbsp;{{$thistypeinfo->typename}}</div>
        <!--当前位置 结束-->
        <div class="top_list">
            <!--分类加盟导航 开始-->
            <div class="top_nav">
                <div class="hd">行业分类</div>
                <div class="bd">
                    <ul>
                        @foreach($navbrands as $typename=>$navbrand)
                        <li>
                            <a href="/paihang/{{$navtops[$typename]->real_path}}/" class="inactive">{{$typename}}</a>
                            <ul @if(!str_contains(Request::getrequesturi(),$navtops[$typename]->real_path)) style="display:none;" @endif>
                                @foreach($navbrand as $item)
                                <li>
                                    <a href="/paihang/{{$item->real_path}}/" class="ind">{{$item->typename}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                       @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--分类加盟导航 结束-->
            <div class="top_paihang">
                <div class="hd">{{str_replace('加盟','',$thistypeinfo->typename)}}加盟排行榜</div>
                <div class="bd">
                    <div class="tit">
                        <span class="txt1">排名</span>
                        <span class="txt2">品牌名称</span>
                        <span class="txt3">投资金额</span>
                        <span class="txt4">趋势</span>
                        <span class="txt6">相关链接</span>
                    </div>
                    <div class="list">
                        <ul>
                            @foreach($paihangbrands as $index=>$paihangbrand)
                            <li  @if($index<3) class="top" @endif >
                                <i class="num">{{$index+1}}</i>
                                <span class="name">
									<a href="https://www.u88.com/xiangmu/{{$paihangbrand->id}}.html" target="_blank" title="{{$paihangbrand->brandname}}">{{$paihangbrand->brandname}}</a>
								</span>
                                <span class="price">{{$investment_types[$paihangbrand->tzid]}}</span>
                                <i class="ico_line"></i>
                                <span class="lianjie">
									<a href="https://www.u88.com/xiangmu/{{$paihangbrand->id}}.html">详情</a>
									<a href="https://www.u88.com/xiangmu/{{$paihangbrand->id}}.html">留言</a>
								</span>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.inactive').click(function () {
                if ($(this).siblings('ul').css('display') == 'none') {
                    $(this).parent('li').siblings('li').removeClass('inactives');
                    $(this).addClass('inactives');
                    $(this).siblings('ul').slideDown(100).children('li');
                    if ($(this).parents('li').siblings('li').children('ul').css('display') == 'block') {
                        $(this).parents('li').siblings('li').children('ul').parent('li').children('a').removeClass('inactives');
                        $(this).parents('li').siblings('li').children('ul').slideUp(100);

                    }
                } else {
                    //控制自身变成+号
                    $(this).removeClass('inactives');
                    //控制自身菜单下子菜单隐藏
                    $(this).siblings('ul').slideUp(100);
                    //控制自身子菜单变成+号
                    $(this).siblings('ul').children('li').children('ul').parent('li').children('a').addClass('inactives');
                    //控制自身菜单下子菜单隐藏
                    $(this).siblings('ul').children('li').children('ul').slideUp(100);

                    //控制同级菜单只保持一个是展开的（-号显示）
                    $(this).siblings('ul').children('li').children('a').removeClass('inactives');
                }
            })
        });
    </script>

@stop