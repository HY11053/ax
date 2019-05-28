@extends('frontend.frontend')
@section('title'){{$thistypeinfo->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thistypeinfo->keywords}} @stop
@section('description'){{trim($thistypeinfo->description)}}@stop
@section('headlibs')
    <meta name="Copyright" content="{{config('app.indexname')}}-{{env('APP_URL')}}"/>
    <meta name="author" content="{{config('app.indexname')}}" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{config('app.url')}}{{Request::getrequesturi()}}"/>
@stop
@section('main_content')
        <!--当前位置 开始-->
        <div class="path">当前位置： <a href="/">首页</a> > <a href="/{{$thistypeinforeid->real_path}}/">{{$thistypeinforeid->typename}}</a> > {{$thistypeinfo->typename}}</div>
        <!--当前位置 结束-->
        <!--项目分类 开始-->
        <div class="cate_sort">
            <div class="cate_channel">
                <div class="hd">全部行业：</div>
                <div class="bd area_wrap">
                    <ul>
                        <li @if(trim(Request::getrequesturi(),'/') == $thistypeinfo->real_path) class="hover" @endif><a href="/search/" class="">不限</a></li>
                        @foreach($topbrandtypeinfos as $topbrandtypeinfo)
                            <li><a href="/{{$topbrandtypeinfo->real_path}}/"  @if(trim(Request::getrequesturi(),'/') == $topbrandtypeinfo->real_path || $topbrandtypeinfo->real_path == $thistypeinforeid->real_path) class="hover" @endif>{{$topbrandtypeinfo->typename}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="cate_channel">
                <div class="hd">{{$thistypeinforeid->typename}}：</div>
                <div class="bd area_wrap">
                    <ul>
                        @if(isset($thistypeinforeid))<li  @if(trim(Request::getrequesturi(),'/') == $thistypeinfo->real_path) class="hover" @endif><a href="/{{$thistypeinforeid->real_path}}/" class="">不限</a></li>@endif
                        @foreach($sontypes as $sontype)
                        <li><a href="/{{$sontype->real_path}}/"  @if(trim(Request::getrequesturi(),'/') == $sontype->real_path) class="hover" @endif >{{$sontype->typename}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="cate_channel">
                <div class="hd">投资金额：</div>
                <div class="bd ">
                    <ul>
                        @foreach($type_investment_types as $investment_type)
                            @if(array_key_exists($investment_type->id,$investment_ids))<li><a href="/{{$thistypeinfo->real_path}}/{{$investment_type->url}}/">{{$investment_type->type}}</a> </li>@endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--项目分类 结束-->

        <div class="center_list">
            <!--左边模块 开始-->
            <div class="new_left">
                <div class="white_bg">
                    <div class="item_tit">
                        <span class="info">共<i>{{$pagelists->total()}}</i>个匹配商家</span>
                    </div>
                    <div class="bd">
                        @foreach($pagelists as $pagelist)
                        <div class="item">
                            <div class="t_Logo">
                                <a href="/busInfo/{{$pagelist->id}}.html" title="{{$pagelist->brandname}}" target="_blank"><img src="{{$pagelist->litpic}}" alt="{{$pagelist->brandname}}" width="113" height="87"></a>
                                <span><a href="/busInfo/{{$pagelist->id}}.html" target="_blank">{{$pagelist->brandname}}</a></span>
                            </div>
                            <div class="content">
                                <div class="titBox">
                                    <h2><a href="/busInfo/{{$pagelist->id}}.html" target="_blank" title="{{$pagelist->brandname}}">{{$pagelist->brandname}}</a></h2>
                                </div>
                                <div class="info">
                                    <p>项目分类：<a href="/{{$thistypeinforeid->real_path}}/" target="_blank">{{$thistypeinforeid->typename}}</a> &gt; <a href="/{{$thistypeinfo->real_path}}/" target="_blank">{{$thistypeinfo->typename}}</a></p>
                                    <p>意向加盟：<em>{{$thistypeinfo->click}}</em></p>
                                    <p>人　　气：<span>{{$thistypeinfo->brandattch}}</span></p>
                                    <p>投资金额：<span class="price">{{$investment_types[$pagelist->tzid]}}</span></p>
                                </div>
                            </div>
                        </div>
                            @endforeach

                    </div>
                    <!--分页 开始-->
                    <div class="page">
                        {!! str_replace(['cid=&amp;','cid=/'],'',str_replace('page=','',str_replace('?','/',preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links())))) !!}
                    </div>
                    <!--分页 结束-->
                </div>
            </div>
            <!--左边模块 结束-->
            <div class="new_right">
                <div class="right_img">
                    <a href="https://www.anxjm.com/busInfo/5703.html"><img src="/uploads/picture/15/08/ad_116cd3d859c58669c5cb790607aa.jpg" width="300" height="275" alt="ucc干洗加盟"></a>
                </div>
                <!--热点资讯 开始-->
                <div class="bd_commit ">
                    <div class="common_hd"><h2 class="hd_tit">热点资讯</h2></div>
                    <div class="bd">
                        <ul>
                            <li><a href="https://www.anxjm.com/news/14515.html" target="_blank" title="成功的经营之道 用心去感受这99个成功心得">成功的经营之道 用心去感受这99个成功心得</a></li>
                            <li><a href="https://www.anxjm.com/news/160533" target="_blank" title="小吃店经营技巧(怎么经营一个小吃店及小吃店选址几大禁忌)">小吃店经营技巧(怎么经营一个小吃店及小吃店选址几大禁忌)</a></li>
                            <li><a href="https://www.anxjm.com/news/160486" target="_blank" title="店铺选址技巧之店铺选址的五个步骤和店铺门口风水十大禁忌">店铺选址技巧之店铺选址的五个步骤和店铺门口风水十大禁忌</a></li>
                            <li><a href="https://www.anxjm.com/news/14516.html" target="_blank" title="店铺如何选址:多调查、少吃亏(详细的调查要点分析)">店铺如何选址:多调查、少吃亏(详细的调查要点分析)</a></li>
                            <li><a href="https://www.anxjm.com/news/14534.html" target="_blank" title="4个低投入利润高不起眼的行业-不敢相信有如此高利润">4个低投入利润高不起眼的行业-不敢相信有如此高利润</a></li>
                            <li><a href="https://www.anxjm.com/news/14536.html" target="_blank" title="15个高利润创业项目案例+分析高利润项目的内因">15个高利润创业项目案例+分析高利润项目的内因</a></li>
                            <li><a href="https://www.anxjm.com/news/14514.html" target="_blank" title="创业陷阱：投资者一定要学会分清这五类招商陷阱">创业陷阱：投资者一定要学会分清这五类招商陷阱</a></li>
                            <li><a href="https://www.anxjm.com/news/15694.html" target="_blank" title="小主人小记者加盟费用是多少？只需这些助你成功">小主人小记者加盟费用是多少？只需这些助你成功</a></li>
                            <li><a href="https://www.anxjm.com/news/15471.html" target="_blank" title="萨洛克披萨加盟条件有哪些？要求高不高？">萨洛克披萨加盟条件有哪些？要求高不高？</a></li>
                            <li><a href="https://www.anxjm.com/news/17705.html" target="_blank" title="玖姿女装加盟费多少？分两个级别加盟费">玖姿女装加盟费多少？分两个级别加盟费</a></li>
                        </ul>
                    </div>
                </div>
                <!--热点资讯 结束-->
                <!--最新资讯 开始-->
                <div class="bd_commit ">
                    <div class="common_hd"><h2 class="hd_tit">最新资讯</h2></div>
                    <div class="bd">
                        <ul>
                            <li><a href="https://www.anxjm.com/news/212280.html" target="_blank" title="尚膳极炙烤肉加盟多少钱?创业投资只需几万元">尚膳极炙烤肉加盟多少钱?创业投资只需几万元</a></li>
                            <li><a href="https://www.anxjm.com/news/212279.html" target="_blank" title="尚膳极炙烤肉加盟优势有哪些?优势多，发家致富的好项目">尚膳极炙烤肉加盟优势有哪些?优势多，发家致富的好项目</a></li>
                            <li><a href="https://www.anxjm.com/news/212278.html" target="_blank" title="嘴嘴馋烧烤怎么加盟?流程简单项目好">嘴嘴馋烧烤怎么加盟?流程简单项目好</a></li>
                            <li><a href="https://www.anxjm.com/news/212277.html" target="_blank" title="嘴嘴馋烧烤加盟优势有哪些?优势多，发展前景可观">嘴嘴馋烧烤加盟优势有哪些?优势多，发展前景可观</a></li>
                            <li><a href="https://www.anxjm.com/news/212276.html" target="_blank" title="乡村牛仔摇滚烧烤怎么加盟?操作简单，开店快">乡村牛仔摇滚烧烤怎么加盟?操作简单，开店快</a></li>
                            <li><a href="https://www.anxjm.com/news/212275.html" target="_blank" title="乡村牛仔摇滚烧烤加盟优势有哪些?优势多，前景好">乡村牛仔摇滚烧烤加盟优势有哪些?优势多，前景好</a></li>
                            <li><a href="https://www.anxjm.com/news/212274.html" target="_blank" title="思婕环球内衣加盟利润怎么样?高端市场，收入空间更大">思婕环球内衣加盟利润怎么样?高端市场，收入空间更大</a></li>
                            <li><a href="https://www.anxjm.com/news/212273.html" target="_blank" title="思婕环球内衣加盟费是多少钱?创业费用低,创业难度小">思婕环球内衣加盟费是多少钱?创业费用低,创业难度小</a></li>
                            <li><a href="https://www.anxjm.com/news/212272.html" target="_blank" title="穆星源龟锅烤肉加盟条件是什么?条件少，符合即可加盟">穆星源龟锅烤肉加盟条件是什么?条件少，符合即可加盟</a></li>
                            <li><a href="https://www.anxjm.com/news/212271.html" target="_blank" title="私の森语内衣加盟多少利润?投资利润高，把握商机赚钱多">私の森语内衣加盟多少利润?投资利润高，把握商机赚钱多</a></li>
                        </ul>
                    </div>
                </div>
                <!--最新资讯 结束-->

                <div class="bd_commit ">
                    <div class="common_hd"><h2 class="hd_tit">最新资讯</h2></div>
                    <div class="bd_cont">
                        <ul>
                            <li><a href="https://www.anxjm.com/busInfo/31988.html" target="_blank"><div class="img"><img src="/uploads/picture/00/56/logo_0056ae7d21f6.jpg" width="120" height="90" alt="尚膳极炙烤肉"></div><span>尚膳极炙烤肉</span></a></li>
                            <li><a href="https://www.anxjm.com/busInfo/31987.html" target="_blank"><div class="img"><img src="/uploads/picture/8d/99/logo_8d99ae779f1a.jpg" width="120" height="90" alt="嘴嘴馋烧烤"></div><span>嘴嘴馋烧烤</span></a></li>
                            <li><a href="https://www.anxjm.com/busInfo/31986.html" target="_blank"><div class="img"><img src="/uploads/picture/d8/eb/logo_d8eb361a40da.jpg" width="120" height="90" alt="乡村牛仔摇滚烧烤"></div><span>乡村牛仔摇滚烧烤</span></a></li>
                            <li><a href="https://www.anxjm.com/busInfo/31985.html" target="_blank"><div class="img"><img src="/uploads/picture/7f/f4/logo_7ff494050952.png" width="120" height="90" alt="思婕环球内衣"></div><span>思婕环球内衣</span></a></li>
                            <li><a href="https://www.anxjm.com/busInfo/31984.html" target="_blank"><div class="img"><img src="/uploads/picture/f7/0f/logo_f70f62ba9b00.png" width="120" height="90" alt="私の森语内衣"></div><span>私の森语内衣</span></a></li>
                            <li><a href="https://www.anxjm.com/busInfo/31983.html" target="_blank"><div class="img"><img src="/uploads/picture/f6/68/logo_f6689922034a.jpg" width="120" height="90" alt="穆星源龟锅烤肉"></div><span>穆星源龟锅烤肉</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@stop
