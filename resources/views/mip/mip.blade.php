<!DOCTYPE html>
<html mip>
<head>
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="wap-font-scale" content="no"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="applicable-device" content="mobile">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <link rel="canonical" href="{{str_replace('https://www.','https://m.',config('app.url'))}}{{Request::getrequesturi()}}" >
    <link rel="stylesheet" type="text/css" href="https://c.mipcdn.com/static/v2/mip.css">
    @include('mip.mipstyle')
    @yield('headlibs')
</head>
<body>
<div class="viewport">
    <!--header开始-->
    <div class="header">
        <div class="top">
            <a class="logo" href="/" title="U88加盟网"></a>
            <div class="search">
                <mip-form url="https://mip.u88.com/search/" method="post">
                    <input type="text" name="keywords" class="search_txt" maxlength="18" id="keyword"  placeholder="输入您要找的项目">
                    <input type="submit" class="search_btn">
                </mip-form>
            </div>
        </div>
    </div>
    @yield('main_content')
    <!--footer开始-->
    <div class="footer">
        <div class="footer_nav">
            <a href="/">首页</a>|<a href="/xiangmu/">创业项目</a>|<a href="/article/">创业资讯</a>|<a href="/paihang/">排行榜</a>
        </div>
        <div class="copyright">
            <p>Copyright © 2004-2016 U88.com加盟网 版权所有</p>
            <p>沪ICP备14037163号-46</p>
        </div>
    </div>
    <!--footer结束-->
</div>
<script src="https://c.mipcdn.com/static/v2/mip.js"></script>
<script src="https://c.mipcdn.com/static/v2/mip-form/mip-form.js"></script>
<script src="https://c.mipcdn.com/static/v2/mip-accordion/mip-accordion.js"></script>
<script src="https://mipcache.bdstatic.com/static/v2/mip-link/mip-link.js"></script>
<script src="https://c.mipcdn.com/static/v2/mip-lightbox/mip-lightbox.js"></script>
<script src="https://c.mipcdn.com/static/v2/mip-fixed/mip-fixed.js"></script>
<script src="https://mipcache.bdstatic.com/static/v2/mip-stats-baidu/mip-stats-baidu.js"></script>
<mip-stats-baidu>
    <script type="application/json">
    {
      "token": "154c91acf00a558786ea49a119aee6e6",
      "_setCustomVar": [1, "login", "1", 2],
      "_setAutoPageview": [true]
    }
  </script>
</mip-stats-baidu>
@yield('footlibs')
</body>
</html>
