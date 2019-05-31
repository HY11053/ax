<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <meta name="wap-font-scale" content="no"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="applicable-device" content="mobile">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <link rel="canonical" href="{{config('app.url')}}{{Request::getrequesturi()}}" >
    <link rel="miphtml" href="{{str_replace('http://www.','http://mip.',config('app.url'))}}{{Request::getrequesturi()}}">
    <link href="/mobile/css/common.css" rel="stylesheet" type="text/css"/>
    @yield('headlibs')
</head>
<body>
<div class="header clearfix mtop84">
    <div class="search clearfix">
        <div class="city fl">
            <a href="/"><img src="/mobile/images/nav-logo2.png" alt="安心加盟网"/></a>
        </div>
        <div class="searchCon fl">
            <form action="/sprodlist/all/" method="post">
                {{csrf_field()}}
            <div class="ipt-box"></div>
            <input class="ipt-placeholder" placeholder="输入您想找的项目" />
            <button type="submit" class="search_btn"></button>
            </form>
        </div>
        <div class="message fr">
            <b>项目分类</b>
        </div>
        <div class="d_nav">
            <ul>
                <li><a href="/" target="_self"><span>首页</span></a></li>
                <li><a href="/xm/" target="_self"><span>项目大全</span></a></li>
                <li><a href="/guide/" target="_self"><span>加盟指南</span></a></li>
                <li><a href="/analysis/" target="_self"><span>投资分析</span></a></li>
                <li><a href="/management/" target="_self"><span>经营管理</span></a></li>
                <li><a href="/news/" target="_self"><span>品牌新闻</span></a></li>
                <li><a href="/paihangbang/" target="_self"><span>品牌排行榜</span></a></li>
                <li>热门行业</li>
                <li><a href="/zaojiao/" target="_self"><span>早教加盟</span></a></li>
                <li><a href="/shaoer/" target="_self"><span>少儿英语加盟</span></a></li>
                <li><a href="/youeryuan/" target="_self"><span>幼儿园加盟</span></a></li>
                <li><a href="/qianneng/" target="_self"><span>潜能教育</span></a></li>
                <li><a href="/xuedifudao/" target="_self"><span>学习辅导</span></a></li>
                <li><a href="/wudao/" target="_self"><span>舞蹈培训</span></a></li>
                <li><a href="/yishujiaoyu/" target="_self"><span>艺术教育</span></a></li>
                <li><a href="/shaoerbiancheng/" target="_self"><span>少儿编程</span></a></li>
                <li><a href="/taiquandao/" target="_self"><span>跆拳道加盟</span></a></li>
                <li><a href="/zuowen/" target="_self"><span>作文培训</span></a></li>
                </li>
            </ul>
        </div>
    </div>
</div>
@yield('main_content')
<footer>
    <div class="link-box ">
        <a href="http://www.jjedu.com.cn/" class="foot-link">电脑版</a><span class="v-line">|</span>
        <a href="/xm/" class="foot-link">教育品牌</a><span class="v-line">|</span>
        <a href="/guide/" class="foot-link">加盟指南</a><span class="v-line">|</span>
        <a href="/analysis/" class="foot-link">投资分析</a><span class="v-line">|</span>
        <a href="/management/" class="foot-link">经营管理</a>
    </div>
    <p class="firm clearfix">
        <span class="foot-text mgr15">上海桥梓网络科技有限公司 	 版权所有</span>
    </p>
</footer>
<script type="text/javascript" src="/mobile/js/jquery.min.js"></script>
<script type="text/javascript" src="/mobile/js/swiper.min.js"></script>
<script type="text/javascript" src="/mobile/js/index.js"></script>
@yield('footlibs')
@if(!Jenssegers\Agent\Facades\Agent::isRobot())
    <div class="popup_mask">
        <div class="lastCeng"></div>
        <div class="CengBox">
            <img src="/mobile/images/kai.png" class="money" />
            <span class="popup_close"></span>
            <p class="top1"><span id="brand_name_UNM">立即获取</span><span><font id="fengex">|</font></span><span>加盟方案</span></p>
            <form class="modalbox" onsubmit="return false">
                <input type="text" maxlength="11"  id="msg_phone" placeholder="请输入手机号码">
                <input type="text" id="msg_name" placeholder="请输入您的称呼" >
                <button type="submit" id="msg_sub" class="sure">立即咨询</button>
            </form>
        </div>
    </div>
<div class="zxNavBar">
    <div class="zxnavbarcon">
        <button  role="button" tabindex="0"  id="btn-open" class="zxHdImgcons" >
            <div class="zxHdImg">
                <img src="/mobile/images/hdimg2.jpg"/>
            </div>
            <div class="zxHdName">
                <div class="zxHdName-peo">安心加盟网</div>
                <p>招商经理  <span>联系她</span></p>
            </div>
        </button>
        <div class="mfcall js_popup" >免费通话</div>
        <div class="mfcsain js_popup" >立即咨询</div>
    </div>
</div>
@endif
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?106a3a7232fd5ef32c3efd3b89d0358b";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
