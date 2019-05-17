@extends('frontend.frontend')
@section('title')最新加盟店排行榜_众多品牌加盟店排行榜尽在u88创业加盟网-U88加盟网@stop
@section('keywords')加盟店排行榜@stop
@section('description')u88加盟店排行榜是中国最专业的加盟店排行榜，u88创业加盟网每天第一时间更新排行榜，包含了服装，餐饮，奶茶，童装，小吃等众多品牌加盟店排行榜，深受广大创业加盟者喜爱。@stop
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

        <div class="item_list_tit">
            <div class="hd "></div>
            <div class="bd">
                <span>U88加盟店排行榜是品牌商机信息排行榜，它依据上榜品牌的综合招商指数、加盟者点评、专家评测、加盟人数等权威指数制定形成，确保排行数据的公平、公正、精准、权威。排行榜涵盖当月热门排行与8大行业排行榜，详细且清晰，是投资加盟者选择品牌商机的必看信息。</span>
            </div>
        </div>
        <!--排行榜分类开始-->
        <div class="rank_sort_wrap">
            <div class="rank_sort">
                <div class="rank_item">
                    <div class="hd">
						<span class="more">
							<a href="/paihang/all/" target="_blank">更多&gt;&gt;</a>
						</span>
                        <em>总加盟店</em>排行榜
                    </div>
                    <div class="bd">
                        <div class="tit">
                            <span class="txt1">排名</span><span class="txt2">项目名称</span><span class="txt3">投资额度</span><span class="txt4">趋势</span>
                        </div>
                        <div class="list">
                            <ul>
                                @foreach($paihangbangalls as $index=>$paihangbangall)
                                <li class=" @if($index<3) top @endif   hover ">
                                    <i class="num">{{$index+1}}</i>
                                    <span class="name">
										<a href="/xiangmu/{{$paihangbangall->id}}.html" target="_blank" title="{{$paihangbangall->brandname}}">{{$paihangbangall->brandname}}</a>
									</span>
                                    <span class="price">{{$investment_types[$paihangbangall->tzid]}}</span>
                                    <i class="ico_rise"></i>
                                    <div class="cont">
                                        <img src="{{$paihangbangall->litpic}}" alt="{{$paihangbangall->brandname}}">
                                        <div class="tit">
                                            <p>门店数：{{$paihangbangall->brandnum}}</p>
                                            <p class="btn">
                                                <a href="/xiangmu/{{$paihangbangall->id}}.html">立即咨询</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="rank_item">
                    <div class="hd">
						<span class="more">
							<a href="/paihang/month/" target="_blank">更多&gt;&gt;</a>
						</span>
                        <em>本月加盟店</em>排行榜
                    </div>
                    <div class="bd">
                        <div class="tit">
                            <span class="txt1">排名</span><span class="txt2">项目名称</span><span class="txt3">投资额度</span><span class="txt4">趋势</span>
                        </div>
                        <div class="list">
                            <ul>
                                @foreach($paihangbangmonths as $index=>$paihangbangmonth)
                                    <li class=" @if($index<3) top @endif   hover ">
                                        <i class="num">{{$index+1}}</i>
                                        <span class="name">
										<a href="/xiangmu/{{$paihangbangmonth->id}}.html" target="_blank" title="{{$paihangbangmonth->brandname}}">{{$paihangbangmonth->brandname}}</a>
									</span>
                                        <span class="price">{{$investment_types[$paihangbangmonth->tzid]}}</span>
                                        <i class="ico_rise"></i>
                                        <div class="cont">
                                            <img src="{{$paihangbangmonth->litpic}}" alt="{{$paihangbangmonth->brandname}}">
                                            <div class="tit">
                                                <p>门店数：{{$paihangbangmonth->brandnum}}</p>
                                                <p class="btn">
                                                    <a href="/xiangmu/{{$paihangbangmonth->id}}.html">立即咨询</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="rank_item">
                    <div class="hd">
						<span class="more">
							<a href="/paihang/week/" target="_blank">更多&gt;&gt;</a>
						</span>
                        <em>本周加盟店</em>排行榜
                    </div>
                    <div class="bd">
                        <div class="tit">
                            <span class="txt1">排名</span><span class="txt2">项目名称</span><span class="txt3">投资额度</span><span class="txt4">趋势</span>
                        </div>
                        <div class="list">
                            <ul>
                                @foreach($paihangbangweeks as $index=>$paihangbangweek)
                                    <li class=" @if($index<3) top @endif   hover ">
                                        <i class="num">{{$index+1}}</i>
                                        <span class="name">
										<a href="/xiangmu/{{$paihangbangweek->id}}.html" target="_blank" title="{{$paihangbangweek->brandname}}">{{$paihangbangweek->brandname}}</a>
									</span>
                                        <span class="price">{{$investment_types[$paihangbangweek->tzid]}}</span>
                                        <i class="ico_rise"></i>
                                        <div class="cont">
                                            <img src="{{$paihangbangweek->litpic}}" alt="{{$paihangbangweek->brandname}}">
                                            <div class="tit">
                                                <p>门店数：{{$paihangbangweek->brandnum}}</p>
                                                <p class="btn">
                                                    <a href="/xiangmu/{{$paihangbangweek->id}}.html">立即咨询</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach($paihangbangbrands as $typename=>$paihangbangbrand)
                <div class="rank_item">
                    <div class="hd">
						<span class="more">
							<a href="{{config('app.url')}}/paihang/{{$topbandnav2[$typename]}}/" target="_blank">更多&gt;&gt;</a>
						</span>
                        <em>{{$typename}}</em>排行榜
                    </div>
                    <div class="bd">
                        <div class="tit">
                            <span class="txt1">排名</span><span class="txt2">项目名称</span><span class="txt3">投资额度</span><span class="txt4">趋势</span>
                        </div>
                        <div class="list">
                            <ul>
                                @foreach($paihangbangbrand as $index=>$paihangbang)
                                <li class=" @if($index < 3) top @endif  @if($loop->first)hover @endif ">
                                    <i class="num">{{$index+1}}</i>
                                    <span class="name">
										<a href="/xiangmu/{{$paihangbang->id}}.html" target="_blank" title="{{$paihangbang->brandname}}">{{$paihangbang->brandname}}</a>
									</span>
                                    <span class="price">{{$investment_types[$paihangbang->tzid]}}</span>
                                    <i class="ico_rise"></i>
                                    <div class="cont">
                                        <img src="{{$paihangbang->litpic}}" alt="{{$paihangbang->brandname}}">
                                        <div class="tit">
                                            <p>门店数：{{$paihangbang->brandnum}}</p>
                                            <p class="btn">
                                                <a href="/xiangmu/{{$paihangbang->id}}.html">立即咨询</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <!--排行榜分类结束-->

        <!--行业分类排行开始-->
        <div class="hangye_fl">
            <div class="hd">行业分类排行</div>
            <div class="bd">
                <li>
                    <a href="/paihang/all/">总加盟店排行榜</a>
                    <a href="/paihang/month/">本月加盟店排行榜</a>
                    <a href="/paihang/week/">本周加盟店排行榜</a>
                </li>
                <li>
                    <a href="https://www.u88.com/paihang/canyin/">餐饮加盟</a>
                    <a href="https://www.u88.com/paihang/chayin/">茶饮加盟</a>
                    <a href="https://www.u88.com/paihang/jiaoyu/">教育培训</a>
                </li>
                <li>
                    <a href="https://www.u88.com/paihang/meirong/">美容加盟</a>
                    <a href="https://www.u88.com/paihang/jiajujiameng/">家居加盟</a>
                    <a href="https://www.u88.com/paihang/lingshou/">零售加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/paihang/fuwu/">生活服务</a>
                    <a href="https://www.u88.com/paihang/huanbaojm/">环保加盟</a>
                    <a href="https://www.u88.com/paihang/yingyouer/">母婴幼儿</a>
                </li>
                <li>
                    <a href="https://www.u88.com/paihang/qiche/">汽车项目</a>
                    <a href="https://www.u88.com/paihang/baojian/">保健加盟</a>
                    <a href="https://www.u88.com/paihang/jiancai/">建材加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/paihang/fuzhuang/">服装加盟</a>
                    <a href="https://www.u88.com/paihang/zhubao/">珠宝加盟</a>
                    <a href="https://www.u88.com/paihang/yule/">休闲娱乐</a>
                </li>
                <li>
                    <a href="https://www.u88.com/paihang/nongcunzhifu/">农村致富</a>
                    <a href="https://www.u88.com/paihang/wujin/">五金加盟</a>
                    <a href="https://www.u88.com/paihang/shipin/">饰品加盟</a>
                </li>
            </div>

        </div>
        <!--行业分类排行结束-->
    </div>

@stop