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
    <link rel="miphtml" href="{{str_replace('https://www.','https://mip.',config('app.url'))}}{{Request::getrequesturi()}}">
    <link rel="stylesheet" type="text/css" href="/mobile/css/css.css">
    <script type="text/javascript" src="/mobile/js/jquery.min.js"></script>
    <script type="text/javascript" src="/mobile/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="/mobile/js/index.js"></script>
    <script type="text/javascript" src="/mobile/js/jquery.lazyload.min.js"></script>
    @yield('headlibs')
</head>
<body>
<div class="viewport">
<!--header开始-->
<div class="header">
    <div class="top">
        <a class="logo" href="/" title="U88加盟网"></a>
        <div class="search">
            <form action="/search/" method="post">
                {{csrf_field()}}
                <input type="text" name="keywords" class="search_txt" maxlength="18" id="keyword" placeholder="输入您要找的项目">
                <input type="submit" class="search_btn" />
            </form>
        </div>
    </div>
</div>
<!--header结束-->
@yield('main_content')
<div class="footer">
    <div class="footer_nav">
        <a href="/">首页</a>|<a href="/xiangmu/">创业项目</a>|<a href="/article/">创业资讯</a>|<a href="/paihang/">排行榜</a>
    </div>
    <div class="copyright">
        <p>Copyright © 2004-2016 U88.com加盟网 版权所有</p>
        <p>沪ICP备14037163号-46</p>
    </div>
</div>
</div>
@yield('footlibs')
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?03d84b4fd8df8141723a456b3e4fd838";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
