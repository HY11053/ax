@extends('frontend.frontend')
@section('title')加盟什么店最赚钱_挣钱最快的方法,u88为您推荐赚钱项目-{{config('app.indexname')}}@stop
@section('keywords')加盟什么店最赚钱,挣钱最快的方法@stop
@section('description')加盟什么店最赚钱_挣钱最快的方法,u88为您推荐赚钱项目@stop
@section('headlibs')
    <meta name="Copyright" content="{{config('app.name')}}-{{config('app.url')}}"/>
    <meta name="author" content="{{config('app.name')}}" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{config('app.url')}}{{Request::getrequesturi()}}"/>
    <meta property="og:type" content="article"/>
@stop
@section('main_content')
    <div class="mainbox">
        <div class="nav_top">
            <ul>
                <li>
                    <a href="https://www.u88.com/ruhechuangye/">创业问答</a>
                </li>
                <li>
                    <a href="https://www.u88.com/chuangyegushi/">创业故事</a>
                </li>
                <li>
                    <a href="https://www.u88.com/chuangyezhinan/">加盟费用</a>
                </li>
                <li>
                    <a href="https://www.u88.com/chuangyezhidao/">创业指导</a>
                </li>
                <li>
                    <a href="https://www.u88.com/touzi/">投资行情</a>
                </li>
                <li>
                    <a href="https://www.u88.com/shangji/">品牌动态</a>
                </li>
                <li>
                    <a href="https://www.u88.com/chuangyedianzi/">创业项目</a>
                </li>
            </ul>
        </div>
    </div>
    <!--资讯分类 结束-->
    <div class="main">
        <!--第一部分 开始-->
        <div class="news_top">
            <!--幻灯片 开始-->
            <div class="slide_bd">
                <div class="hd">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                    </ul>
                </div>
                <div class="bd">
                    <ul>
                        <li>
                            <a href="https://www.u88.com/xiangmu/2002845.html" target="_blank">
                                <img src="https://www.u88.com/uploads/picture/9f/d5/771bf360c8fe06ebebf0070d9e82.jpg" alt="正新鸡排" />
                                <span>正新鸡排</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.u88.com/xiangmu/2004197.html" target="_blank">
                                <img src="https://www.u88.com/uploads/picture/53/88/1a3c4f4c939ca88f082b404ad458.jpg" alt="优家宝贝" />
                                <span>优家宝贝</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.u88.com/xiangmu/2006187.html" target="_blank">
                                <img src="https://www.u88.com/uploads/picture/13/16/a2d96b24ff4b3f4abb6350b897c7.jpg" alt=" 宝缦家纺" />
                                <span> 宝缦家纺</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.u88.com/xiangmu/2010481.html" target="_blank">
                                <img src="https://www.u88.com/uploads/picture/f8/97/fd91c06d5008920e3e04861544b3.jpg" alt="喜多屋自助餐厅" />
                                <span>喜多屋自助餐厅</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--幻灯片 结束-->
            <div class="hot_news">
                <div class="hd">热点资讯</div>
                <div class="bd">
                    @foreach($hotnews as $hotnew)
                        @if($loop->first)<h3><a href="/article/{{$hotnew->id}}.html">{{$hotnew->title}}</a></h3>@endif
                    @endforeach
                    <ul>
                        @foreach($hotnews as $index=>$hotnew)
                            @if($index>0 && $index<5)
                                <li>
                                    <a href="/article/{{$hotnew->id}}.html">{{$hotnew->title}}</a>
                                    <span>{{date('Y-m-d',strtotime($hotnew->created_at))}}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="bd">
                    @foreach($hotnews as $index=>$hotnew)
                        @if($index==5)
                            <h3>
                                <a href="/article/{{$hotnew->id}}.html">{{$hotnew->title}}</a>
                            </h3>
                        @endif
                    @endforeach
                    <ul>
                        @foreach($hotnews as $index=>$hotnew)
                            @if($index>5)
                            <li>
                                <a href="/article/{{$hotnew->id}}.html">{{$hotnew->title}}</a>
                                <span>{{date('Y-m-d',strtotime($hotnew->created_at))}}</span>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="jiam_news">
                <div class="hd">加盟资讯排行榜</div>
                <div class="bd">
                    @foreach($newsphs as $index=>$newsph)
                    <li>
                        <a href="/article/{{$newsph->id}}.html">
                            <i  class="num" >{{$index+1}}</i> {{$newsph->title}}
                        </a>
                    </li>
                 @endforeach
                </div>
            </div>
        </div>
        <!--第一部分 结束-->
        <!--广告位 开始-->
        <div class="brannd_1200x60">
            <a href="https://www.u88.com/xiangmu/2013769.html"><img src="https://www.u88.com/uploads/picture/34/d7/4dc1f0b5504b6a9d5c1dc7cacdaf.jpg" width="1200" height="60" alt="第二乐章餐厅加盟" /></a>
        </div>
        <!--广告位 结束-->
        <!--如何创业 开始-->
        <div class="news_box">
            <div class="cy_news">
                <div class="common_tit">
                    <h2><a href=https://www.u88.com/ruhechuangye/>创业问答</a></h2>
                    <div class="top_924"></div>
                </div>
                <div class="news_1">
                    <div class="bd">
                        <div class="tit">
                            @foreach($chuangyeasks as $chuangyeask)
                                @if($loop->first)
                                <a href="/article/{{$chuangyeask->id}}.html">
                                    <h3>{{$chuangyeask->title}}</h3>
                                    <p>{{$chuangyeask->description}}...</p>
                                </a>
                                @endif
                            @endforeach
                        </div>
                        <ul>
                            @foreach($chuangyeasks as $index=>$chuangyeask)
                                @if($index>0 && $index<6)
                                <li>
                                    <a href="/article/{{$chuangyeask->id}}.html">{{$chuangyeask->title}}</a>
                                    <span>{{date('Y-m-d',strtotime($chuangyeask->created_at))}}</span>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="news_80">
                        <div class="line1"></div>
                        <h2>创业问答</h2>
                        <div class="line"></div>
                    </div>
                    <div class="bd">
                        <div class="tit ts_1">
                            @foreach($chuangyeasks as $index=>$chuangyeask)
                                @if($index==6)
                                <a href="/article/{{$chuangyeask->id}}.html">
                                    <h3><a href="/article/{{$chuangyeask->id}}.html">{{$chuangyeask->title}}</a></h3>
                                </a>
                            @endif
                            @endforeach
                        </div>
                        <ul>
                            @foreach($chuangyeasks as $index=>$chuangyeask)
                                @if($index>6)
                                <li>
                                    <a href="/article/{{$chuangyeask->id}}.html">{{$chuangyeask->title}}</a>
                                    <span>{{date('Y-m-d',strtotime($chuangyeask->created_at))}}</span>
                                </li>
                                @endif
                           @endforeach
                        </ul>
                    </div>
                </div>
                <div class="news_2">
                    <div class="index_news">
                        @foreach($chuangyemiddleasks as $chuangyemiddleask)
                            @if($loop->first)
                        <dl>
                            <dt>
                                <a href="/article/{{$chuangyemiddleask->id}}.html" target="_blank">
                                    <img src="{{$chuangyemiddleask->litpic}}" width="110" height="83" alt="{{$chuangyemiddleask->title}}">
                                </a>
                            </dt>
                            <dd class="name">
                                <a href="/article/{{$chuangyemiddleask->id}}.html" target="_blank" title="{{$chuangyemiddleask->title}}">{{$chuangyemiddleask->title}}</a>
                            </dd>
                            <dd class="desc">{{$chuangyemiddleask->description}}...
                                <a href="/article/{{$chuangyemiddleask->id}}.html">[详情]</a>
                            </dd>
                        </dl>
                            @endif
                        @endforeach
                        <ul>
                            @foreach($chuangyemiddleasks as $chuangyemiddleask)
                            @if(!$loop->first)
                            <li>
                                <span class="date">{{date('Y-m-d',strtotime($chuangyemiddleask->created_at))}}</span>
                                <a href="/article/{{$chuangyemiddleask->id}}.html" target="_blank" title="{{$chuangyemiddleask->title}}">{{$chuangyemiddleask->title}}</a>
                            </li>
                            @endif
                           @endforeach
                        </ul>
                    </div>
                    <div class="news_img">
                        <ul>
                            @foreach($chuangyemidbottomasks as $chuangyemidbottomask)
                            <li>
                                <a href="/article/{{$chuangyemidbottomask->id}}.html">
                                    <img src="{{$chuangyemidbottomask->litpic}}" width="110" height="83" alt="{{$chuangyemidbottomask->title}}" />
                                    <span>{{$chuangyemidbottomask->title}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="zuxi_news">
                <div class="hd"><a href="https://www.u88.com/chuangyegushi/">创业故事</a></div>
                <div class="bd">
                    @foreach($chuangyegs as $chuangyeg)
                    <li>
                        <a href="/article/{{$chuangyeg->id}}.html">
                            <img src="{{$chuangyeg->litpic}}" width="120" height="90" alt="{{$chuangyeg->title}}" />
                            <span>{{$chuangyeg->title}}...</span>
                        </a>
                    </li>
                 @endforeach
                </div>
                <div class="bd_li">
                    <ul>
                        @foreach($chuangyebots as $chuangyebot)
                        <li>
                            <a href="/article/{{$chuangyebot->id}}.html" target="_blank" title="{{$chuangyebot->title}}">{{$chuangyebot->title}}</a>
                        </li>
                       @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <!--广告位 开始-->
        <div class="brannd_1200x60">
            <a href="https://www.u88.com/xiangmu/2013535.html"><img src="https://www.u88.com/uploads/picture/15/68/e22d8308f75992a1210d2a8768b2.jpg" width="1200" height="60" alt="烈焰红唇串串加盟" /></a>
        </div>
        <!--广告位 结束-->
        <!--如何创业 开始-->
        <div class="news_box">
            <div class="cy_news">
                <div class="common_tit">
                    <h2><a href=https://www.u88.com/chuangyezhinan/>加盟费用</a></h2>
                    <div class="top_924"></div>
                </div>
                <div class="news_1">
                    <div class="bd">
                        <div class="tit">
                            @foreach($jmfeiyongs as $jmfeiyong)
                                @if($loop->first)
                                    <a href="/article/{{$jmfeiyong->id}}.html">
                                        <h3>{{$jmfeiyong->title}}</h3>
                                        <p>{{$jmfeiyong->description}}...</p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <ul>
                            @foreach($jmfeiyongs as $index=>$jmfeiyong)
                                @if($index>0 && $index<6)
                                    <li>
                                        <a href="/article/{{$jmfeiyong->id}}.html">{{$jmfeiyong->title}}</a>
                                        <span>{{date('Y-m-d',strtotime($jmfeiyong->created_at))}}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="news_80">
                        <div class="line1"></div>
                        <h2>加盟费用</h2>
                        <div class="line"></div>
                    </div>
                    <div class="bd">
                        <div class="tit ts_1">
                            @foreach($jmfeiyongs as $index=>$jmfeiyong)
                                @if($index==6)
                                    <a href="/article/{{$jmfeiyong->id}}.html">
                                        <h3><a href="/article/{{$jmfeiyong->id}}.html">{{$jmfeiyong->title}}</a></h3>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <ul>
                            @foreach($jmfeiyongs as $index=>$jmfeiyong)
                                @if($index>6)
                                    <li>
                                        <a href="/article/{{$jmfeiyong->id}}.html">{{$jmfeiyong->title}}</a>
                                        <span>{{date('Y-m-d',strtotime($jmfeiyong->created_at))}}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="news_2">
                    <div class="index_news">
                        @foreach($jmfeimiddles as $jmfeimiddle)
                            @if($loop->first)
                                <dl>
                                    <dt>
                                        <a href="/article/{{$jmfeimiddle->id}}.html" target="_blank">
                                            <img src="{{$jmfeimiddle->litpic}}" width="110" height="83" alt="{{$jmfeimiddle->title}}">
                                        </a>
                                    </dt>
                                    <dd class="name">
                                        <a href="/article/{{$jmfeimiddle->id}}.html" target="_blank" title="{{$jmfeimiddle->title}}">{{$jmfeimiddle->title}}</a>
                                    </dd>
                                    <dd class="desc">{{$jmfeimiddle->description}}...
                                        <a href="/article/{{$jmfeimiddle->id}}.html">[详情]</a>
                                    </dd>
                                </dl>
                            @endif
                        @endforeach
                        <ul>
                            @foreach($jmfeimiddles as $jmfeimiddle)
                                @if(!$loop->first)
                                    <li>
                                        <span class="date">{{date('Y-m-d',strtotime($jmfeimiddle->created_at))}}</span>
                                        <a href="/article/{{$jmfeimiddle->id}}.html" target="_blank" title="{{$jmfeimiddle->title}}">{{$jmfeimiddle->title}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="news_img">
                        <ul>
                            @foreach($jmfeibottoms as $jmfeibottom)
                                <li>
                                    <a href="/article/{{$jmfeibottom->id}}.html">
                                        <img src="{{$jmfeibottom->litpic}}" width="110" height="83" alt="{{$jmfeibottom->title}}" />
                                        <span>{{$jmfeibottom->title}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="zuxi_news">
                <div class="hd"><a href="https://www.u88.com/chuangyezhidao/">创业指导</a></div>
                <div class="bd">
                    @foreach($chuanyezds as $chuanyezd)
                        <li>
                            <a href="/article/{{$chuanyezd->id}}.html">
                                <img src="{{$chuanyezd->litpic}}" width="120" height="90" alt="{{$chuanyezd->title}}" />
                                <span>{{$chuanyezd->title}}...</span>
                            </a>
                        </li>
                    @endforeach
                </div>
                <div class="bd_li">
                    <ul>
                        @foreach($chuanyezdbots as $chuanyezdbot)
                            <li>
                                <a href="/article/{{$chuanyezdbot->id}}.html" target="_blank" title="{{$chuanyezdbot->title}}">{{$chuanyezdbot->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <!--广告位 开始-->
        <div class="brannd_1200x60">
            <a href="https://www.u88.com/xiangmu/2013727.html"><img src="https://www.u88.com/uploads/picture/75/12/0124303cc8f08870a0e3d8094997.jpg" width="1200" height="60" alt=" 忘不了手抓龙虾加盟" /></a>
        </div>
        <!--广告位 结束-->
        <!--如何创业 开始-->
        <div class="news_box">
            <div class="cy_news">
                <div class="common_tit">
                    <h2><a href=https://www.u88.com/touzi/>投资行情</a></h2>
                    <div class="top_924"></div>
                </div>
                <div class="news_1">
                    <div class="bd">
                        <div class="tit">
                            @foreach($touzinews as $touzinew)
                                @if($loop->first)
                                    <a href="/article/{{$touzinew->id}}.html">
                                        <h3>{{$touzinew->title}}</h3>
                                        <p>{{$touzinew->description}}...</p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <ul>
                            @foreach($touzinews as $index=>$touzinew)
                                @if($index>0 && $index<6)
                                    <li>
                                        <a href="/article/{{$touzinew->id}}.html">{{$touzinew->title}}</a>
                                        <span>{{date('Y-m-d',strtotime($touzinew->created_at))}}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="news_80">
                        <div class="line1"></div>
                        <h2>投资行情</h2>
                        <div class="line"></div>
                    </div>
                    <div class="bd">
                        <div class="tit ts_1">
                            @foreach($touzinews as $index=>$touzinew)
                                @if($index==6)
                                    <a href="/article/{{$touzinew->id}}.html">
                                        <h3><a href="/article/{{$touzinew->id}}.html">{{$touzinew->title}}</a></h3>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <ul>
                            @foreach($touzinews as $index=>$touzinew)
                                @if($index>6)
                                    <li>
                                        <a href="/article/{{$touzinew->id}}.html">{{$touzinew->title}}</a>
                                        <span>{{date('Y-m-d',strtotime($touzinew->created_at))}}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="news_2">
                    <div class="index_news">
                        @foreach($touzinews as $touzinew)
                            @if($loop->first)
                                <dl>
                                    <dt>
                                        <a href="/article/{{$touzinew->id}}.html" target="_blank">
                                            <img src="{{$touzinew->litpic}}" width="110" height="83" alt="{{$touzinew->title}}">
                                        </a>
                                    </dt>
                                    <dd class="name">
                                        <a href="/article/{{$touzinew->id}}.html" target="_blank" title="{{$touzinew->title}}">{{$touzinew->title}}</a>
                                    </dd>
                                    <dd class="desc">{{$touzinew->description}}...
                                        <a href="/article/{{$touzinew->id}}.html">[详情]</a>
                                    </dd>
                                </dl>
                            @endif
                        @endforeach
                        <ul>
                            @foreach($touzimiddles as $touzimiddle)
                                @if(!$loop->first)
                                    <li>
                                        <span class="date">{{date('Y-m-d',strtotime($touzimiddle->created_at))}}</span>
                                        <a href="/article/{{$touzimiddle->id}}.html" target="_blank" title="{{$touzimiddle->title}}">{{$touzimiddle->title}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="news_img">
                        <ul>
                            @foreach($touzibottoms as $touzibottom)
                                <li>
                                    <a href="/article/{{$touzibottom->id}}.html">
                                        <img src="{{$touzibottom->litpic}}" width="110" height="83" alt="{{$touzibottom->title}}" />
                                        <span>{{$touzibottom->title}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="zuxi_news">
                <div class="hd"><a href="https://www.u88.com/shangji/">品牌动态</a></div>
                <div class="bd">
                    @foreach($brandnews as $brandnew)
                        <li>
                            <a href="/article/{{$brandnew->id}}.html">
                                <img src="{{$brandnew->litpic}}" width="120" height="90" alt="{{$brandnew->title}}" />
                                <span>{{$brandnew->title}}...</span>
                            </a>
                        </li>
                    @endforeach
                </div>
                <div class="bd_li">
                    <ul>
                        @foreach($brandnewbots as $brandnewbot)
                            <li>
                                <a href="/article/{{$brandnewbot->id}}.html" target="_blank" title="{{$brandnewbot->title}}">{{$brandnewbot->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>


@stop