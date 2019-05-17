<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <link rel="stylesheet" type="text/css" href="/public/css/global.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/css.css" />
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/public/js/common.js"></script>
    @yield('headlibs')
</head>
<body>
<!--header 开始-->
<div class="header">
    <!--网站导航 开始-->
    <div class="top">
        <div class="inner">
            <div class="top_l">
                <a href="/">网站首页</a>
                <a href="/xiangmu/">找项目</a>
                <a href="/paihang/">排行榜</a>
                <a href="/article/">资讯</a>
            </div>
            <div class="top_r">
                <a href="https://m.u88.com" class="t_phone">
                    <i></i>手机版</a>
                <a href="/about/sitemap/">网站导航</a>
                <a rel="nofollow" href="/about/guestbook/">意见反馈</a>
            </div>
        </div>
    </div>
    <!--网站导航 结束-->
    <!--logo 开始-->
    <div class="logo_box">
        <div class="logo">
            <a href="/" target="_blank">
                <img src="https://www.u88.com/public/images/logo.jpg" alt="U88加盟网" />
            </a>
        </div>
        <!--搜索 开始-->
        <div class="logo_center">
            <div class="bd ">
                <form action="/search/" method="post">
                    {{csrf_field()}}
                    <input def="输入你想搜索的关键字" class="search_input" placeholder="输入你想搜索的关键字" name="keywords" type="text">
                    <input class="search_btn" value="搜索" type="submit">
                </form>
            </div>
            <ul class="f12">
                <li>热门搜索：</li>
                <li>
                    <a href="https://www.u88.com/huoguo/" title="火锅加盟" target="_blank">火锅加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/shaokao/" title="烧烤加盟" target="_blank">烧烤加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/malatang/" title="麻辣烫加盟" target="_blank">麻辣烫加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/kaoyu/" title="烤鱼加盟" target="_blank">烤鱼加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/bingqilin/" title="冰激凌加盟" target="_blank">冰激凌加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/jipai/" title="鸡排加盟" target="_blank">鸡排加盟</a>
                </li>
                <li>
                    <a href="https://www.u88.com/xiangmu/2004745.html" title="一扫光零食" target="_blank">一扫光零食</a>
                </li>
                <li>
                    <a href="https://www.u88.com/xiangmu/2005136.html" title="UCC国际洗衣" target="_blank">UCC国际洗衣</a>
                </li>
            </ul>
        </div>
        <!--搜索 结束-->

        <!--金牌连锁-->
        <!--幻灯片 开始-->
        <div id="js_bn" class="bn">
            <div class="hd">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="bd">
                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2005136.html" target="_blank">
                            <img src="https://www.u88.com/uploads/picture/f3/c7/cd545b1530a24e40fffeaecc3cb9.jpg" width="220" height="64" alt="UCC国际洗衣" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2004745.html" target="_blank">
                            <img src="https://www.u88.com/uploads/picture/88/28/0af45c3c254cf8521277c9dceccf.jpg" width="220" height="64" alt="一扫光零食量贩" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.u88.com/xiangmu/7703.html" target="_blank">
                            <img src="https://www.u88.com/uploads/picture/71/78/0ab27635c36f0c5de96cc0d69214.jpg" width="220" height="64" alt="皇家圣雪洗衣" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--幻灯片 结束-->
    </div>
    <!--logo 结束-->
    <div class="nav">
        <div class="inner">
            <div class="header_nav  show ">
                <div class="tit">商机项目分类</div>
                @if(Request::getrequesturi() =='/')
                    @include('frontend.navs')
                @endif
            </div>
            <ul class="nav_list">
                <li><a href="/" target="_blank">首页</a></li>
                <li><a href="https://canyin.u88.com/" target="_blank">餐饮</a></li>
                <li><a href="https://ganxi.u88.com/" target="_blank">干洗</a></li>
                <li><a href="https://huoguo.u88.com/" target="_blank">火锅</a></li>
                <li><a href="https://chayin.u88.com/" target="_blank">茶饮</a></li>
                <li><a href="https://jiaoyu.u88.com/" target="_blank">教育</a></li>
                <li><a href="https://meirong.u88.com/" target="_blank">美容</a></li>
                <li><a href="https://yingyouer.u88.com/" target="_blank">母婴</a></li>
                <li><a href="https://jiajujiameng.u88.com/" target="_blank">家居</a></li>
                <li><a href="https://baojian.u88.com/" target="_blank">保健</a></li>
                <li><a href="https://lingshou.u88.com/" target="_blank">零售</a></li>
                <li><a href="https://jinronggongsi.u88.com/" target="_blank">金融</a></li>
                <li><a href="https://qiche.u88.com/" target="_blank">汽车</a></li>
                <li><a href="https://fuzhuang.u88.com/" target="_blank">服装</a></li>
                <li><a href="https://shipin.u88.com/" target="_blank">饰品</a></li>
                <li><a href="https://jiancai.u88.com/" target="_blank">建材</a></li>
                <li><a href="https://huanbao.u88.com/" target="_blank">环保</a></li>
                <li><a href="https://jiudian.u88.com/" target="_blank">酒店</a></li>
                <li><a href="https://tesejiameng.u88.com/" target="_blank">新奇特</a></li>
            </ul>
        </div>
    </div>
</div>
<!--header 开始-->
<!--第一部分 开始-->
@yield('main_content')
<div class="box_bottm">
    <div class="bd_box">
        <div class="bd_1">
            <ul>
                <li>
                    <div class="ico ico_1"></div>
                    <div class="tit_info">
                        <p class="t">登录u88加盟网</p>
                        <p class="txt">输入www.u88.com
                            <br>进入网站</p>
                    </div>
                </li>
                <li>
                    <div class="ico ico_2"></div>
                    <div class="tit_info">
                        <p class="t">寻找意向</p>
                        <p class="txt">页面浏览，搜索查询
                            <br>发布加盟需求</p>
                    </div>
                </li>
                <li>
                    <div class="ico ico_3"></div>
                    <div class="tit_info">
                        <p class="t">留言咨询</p>
                        <p class="txt">页面留言，电话访问在
                            <br>线咨询</p>
                    </div>
                </li>
                <li>
                    <div class="ico ico_4"></div>
                    <div class="tit_info">
                        <p class="t">等待回访</p>
                        <p class="txt">招商厂家主动联系您了
                            <br>解公司更多信息</p>
                    </div>
                </li>
                <li>
                    <div class="ico ico_5"></div>
                    <div class="tit_info">
                        <p class="t">成功合作</p>
                        <p class="txt">签订合作合同
                            <br>执行合同</p>
                    </div>
                </li>
            </ul>

        </div>
        <div class="bd_2">
            <ul>
                <li>
                    <div class="t">关于我们</div>
                    <div class="txt">
                        <a href="/about/about/" target="_blank">关于我们</a>
                        <br>
                        <a href="/about/contact/" target="_blank">友情链接</a>
                        <br>
                        <a href="/about/youshi/" target="_blank">合作优势</a>
                        <br>
                        <a href="/about/hezuo/" target="_blank">商务合作</a>
                    </div>
                </li>
                <li class="liaxi">
                    <div class="t">联系我们</div>
                    <div class="txt">
                        <p>广告热线：17091425988（伍经理）</p>
                        <p>加盟热线：400-885-8878</p>
                        <p>在线客服：2853525083</p>
                        <p>企业邮箱：2853525083@qq.com</p>

                    </div>
                </li>
                <li class="bangzhu">
                    <div class="t">帮助中心</div>
                    <div class="txt">
                        <a href="/about/disclaimer/" target="_blank">免责声明</a>
                        <br>
                        <a href="/about/flgw/" target="_blank">法律顾问</a>
                        <br>
                        <a href="/shantie.html" target="_blank">投诉删帖</a>
                        <br>
                        <a href="/about/sitemap/" target="_blank">网站地图</a>
                    </div>
                </li>
                <li>

                </li>
            </ul>
        </div>
    </div>
</div>
<!--footer 开始-->
<div class="footer">

    <div class="cert">
        <img src="https://www.u88.com/public/images/index07.jpg" alt="信用保障">
    </div>
    <div class="copyright">
        <p>U88加盟网友情提示：多打电话、多咨询、实地考察，可降低投资风险！</p>
        <p>Copyright © 2015-2017 www.u88.com Corporation, All Rights Reserved 上海哆瑞咪网络科技有限公司 版权所有</p>
        <p><a href="http://www.miitbeian.gov.cn/">沪ICP备17021897号-2</a></p>
        <p>投资有风险，选择需谨慎！</p>
        <div style="width:300px;margin:0 auto; padding:20px 0;">
            <a target="_blank" href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31011302003993" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="https://www.u88.com/public/images/ba.png" style="float:left;"><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#000;">沪公网安备 31011302003993号</p></a>
        </div>
    </div>
</div>
<!--百度统计代码-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?d73e6da7782916c6fbac1ac9f64c5cf1";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--footer 结束-->
@yield('footlibs')
</body>
</html>