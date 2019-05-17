@extends('mobile.mobile')
@section('title')最新加盟店排行榜_众多品牌加盟店排行榜尽在u88创业加盟网-U88加盟网@stop
@section('keywords')加盟店排行榜@stop
@section('description')u88加盟店排行榜是中国最专业的加盟店排行榜，u88创业加盟网每天第一时间更新排行榜，包含了服装，餐饮，奶茶，童装，小吃等众多品牌加盟店排行榜，深受广大创业加盟者喜爱。@stop
@section('main_content')
    <!--分类导航 开始-->
    <div class="index_nav notb" id="index_nav">
        <div class="hd">
            <ul>
            </ul>
        </div>
        <div class="bd">
            <ul>
                <li> <span><a href="/canyin/" class="icon1"><em></em>餐饮加盟</a></span> <span><a href="/ganxi/" class="icon2"><em></em>干洗加盟</a></span>
                    <span><a href="/chayin/" class="icon3"><em></em>茶饮项目</a></span> <span><a href="/huoguo/" class="icon4"><em></em>火锅加盟</a></span>
                    <span><a href="/jiaoyu/" class="icon5"><em></em>教育加盟</a></span> <span><a href="/muying/" class="icon6"><em></em>母婴加盟</a></span>
                    <span><a href="/meirong/" class="icon7"><em></em>美容加盟</a></span> <span><a href="/jiaju/" class="icon8"><em></em>家居加盟</a></span>
                </li>
                <li> <span><a href="/jinronggongsi/" class="icon9"><em></em>金融公司</a></span> <span><a href="/lingshou/" class="icon10"><em></em>零售加盟</a></span>
                    <span><a href="/baojian/" class="icon11"><em></em>保健加盟</a></span> <span><a href="/yule/" class="icon12"><em></em>休闲娱乐</a></span>
                    <span><a href="/qiche/" class="icon13"><em></em>汽车加盟</a></span> <span><a href="/fuzhuang/" class="icon14"><em></em>服装加盟</a></span>
                    <span><a href="/tesejiameng/" class="icon15"><em></em>新奇加盟</a></span> <span><a href="/jiancai/" class="icon16"><em></em>建材加盟</a></span>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        TouchSlide({
            slideCell: "#index_nav",
            titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
            mainCell: ".bd ul",
            effect: "left",
            autoPlay: false, //自动播放
            autoPage: true, //自动分页
        });
    </script>
    <!--分类导航 结束-->
    @foreach($paihangbangbrands as $typename=>$paihangbangbrand)
    <div class="rank_item">
        <div class="common_tit">
            <a class="more" href="{{config('app.url')}}/paihang/{{$topbandnav2[$typename]}}/">更多&gt;&gt;</a>
            <a class="tit" href="/paihang/{{$topbandnav2[$typename]}}/">{{$typename}}</a>
        </div>
        <div class="rank_cate_cont">
            <div class="img-link-box">
                <ul>
                    @foreach($paihangbangbrand as $index=>$paihangbang)
                        @if($index<6)
                        <li><a href="/xiangmu/{{$paihangbang->id}}.html"><img src="{{$paihangbang->litpic}}" class="adver">
                                <p>{{$paihangbang->brandname}}</p>
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endforeach
@stop