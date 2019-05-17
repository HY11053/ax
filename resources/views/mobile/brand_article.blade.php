@extends('mobile.mobile')
@section('title'){{$thisarticleinfos->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thisarticleinfos->keywords}}@stop
@section('description'){{$thisarticleinfos->description}}@stop
@section('main_content')
    <div class="path"><a href="/">首页</a> > <a href="/{{$thisbrandtypecidinfo->real_path}}/">{{$thisbrandtypecidinfo->typename}}</a>&gt;<a href="/{{$thisbrandtypeinfo->real_path}}/">{{$thisbrandtypeinfo->typename}}</a></div>
    <!--项目信息 开始-->
    <div class="item_info">
        <div class="item_desc">
            <div class="item_desc_mt">
                <span><h1>{{$thisarticleinfos->brandname}}</h1></span>
                <span>投资：<em class="price">{{$investment_types[$thisarticleinfos->tzid]}}</em></span>
            </div>
            <div class="item_desc_mt">
                <span>加盟区域：<em class="addr"> {{$thisarticleinfos->brandarea}}</em></span>
                <span>门店：<em class="num">{{$thisarticleinfos->brandnum}}</em></span></div>
            <div class="comp">
                <span class="comp_name">{{$thisarticleinfos->brandgroup}}</span>
                <em class="comp_btn js_popup">留言获取资料&gt;&gt;</em>
            </div>
            <small>更新时间：{{$thisarticleinfos->created_at}}</small>
            <a href="#msg" class="ask_btn">咨询</a>
        </div>
        <div id="focus" class="pic_wrap">
            <div class="hd">
                <ul>
                </ul>
            </div>
            <div class="bd">
                <ul>
                    @foreach(explode(',',trim($thisarticleinfos->imagepics,',')) as $imagepic)
                        <li @if($loop->first)  class="on" @endif><img src="{{$imagepic}}" alt="{{$thisarticleinfos->brandname}}"/></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            TouchSlide({
                slideCell: "#focus",
                titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                mainCell: ".bd ul",
                effect: "left",
                autoPlay: true, //自动播放
                autoPage: true, //自动分页
                switchLoad: "_src" //切换加载，真实图片路径为"_src"
            });
        </script>
        <div class="tel_box">
            <a href="tel:4008858878" class="tel_btn">拨打电话</a>
        </div>
    </div>
    <!--项目信息 结束-->
    <!--品牌介绍 开始-->
    <div class="item_intro" id="js_join_2">
        <div class="bd">
            @php
                $content=preg_replace(["/style=.+?['|\"]/i","/width=.+?['|\"]/i","/height=.+?['|\"]/i"],'',$thisarticleinfos->body);
               $content=str_replace(PHP_EOL,'',$content);
               $content=str_replace(['<p >','<strong >','<br >','<br />'],['<p>','<strong>','<br>','<br/>'],$content);
               $content=str_replace(
               [
               '<p><strong><br/></strong></p>',
               '<p><strong><br></strong></p>',
               '<p><br></p>',
               '<p><br/></p>',
               '　　'
               ],'',$content
               );
                $content=str_replace(["\r","\t",'<span >　　</span>','&nbsp;','　','bgcolor="#FFFFFF"'],'',$content);
                $content=str_replace(["<br  /><br  />"],'<br/>',$content);
                $content=str_replace(["<br/><br/>"],'<br/>',$content);
                $content=str_replace(["<br/> <br/>"],'<br/>',$content);
                $content=str_replace(["<br />　　<br />"],'<br/>',$content);
                $content=str_replace(["<br/>　　<br/>"],'<br/>',$content);
                $content=str_replace(["<br /><br />"],'<br/>',$content);
               $pattens=array(
               "#<p>[\s| |　]?<strong>[\s| |　]?</strong></p>#",
               "#<p>[\s| |　]?<strong>[\s| |　]+</strong></p>#",
               "#<p>[\s| |　]+<strong>[\s| |　]+</strong></p>#",
               "#<p>[\s| |　]?</p>#",
               "#<p>[\s| |　]+</p>#"
               );
               $content=preg_replace($pattens,'',$content);
               echo $content;
            @endphp
        </div>
    </div>
    @include('mobile.liuyan')
    <!--相关推荐 开始-->
    <div class="rec_item">
        <div class="common_tit">
            <a class="tit" href="/xiangmu/"><i class="index_icon1"></i>相关项目推荐</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($paihangbangs as $index=>$paihangbang)
                    @if($index<4)
                        <li>
                            <a href="/xiangmu/{{$paihangbang->id}}.html">
                                <div class="img_show"><img src="{{$paihangbang->litpic}}" alt="{{$paihangbang->brandname}}" /></div>
                                <div class="cont">
                                    <p class="tit">{{$paihangbang->brandname}}</p>
                                    <p class="price">投资金额：<em>{{$investment_types[$paihangbang->tzid]}}</em></p>
                                    <p class="join"><span class="text_blue">{{$paihangbang->brandnum}}</span>人意向加盟</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!--相关推荐 结束-->

    <div class="tips">
        <div class="tips_cont"><b>友情提示</b>：U88加盟网为第三方加盟信息平台及互联网信息服务提供者，展示的信息内容系由免费注册用户发布，可能存在所发布的信息未获得品牌所有人授权的情形、企业不开展加盟业务。本平台虽严把审核关，但无法完全避免差错或疏漏。本平台特此声明对免费注册用户发布信息的真实性、准确性不承担任何法律责任。</div>
        <p>创业有风险，投资需谨慎</p>
    </div>
@stop