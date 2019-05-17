<style mip-custom>
    /*全局定义*/
    body, dl, dd, ul, ol, h1, h2, h3, h4, h5, h6, pre, form, input, textarea, p, hr, thead, tbody, tfoot, th, td { margin: 0; padding: 0 }
    ul, ol{list-style: none }
    a {text-decoration: none; color: #666 }
    a:hover{color:#ff6000}
    html{-ms-text-size-adjust: none; -webkit-text-size-adjust: none; text-size-adjust:none; font-size:100px;}
    body{font-size:0.12rem; line-height:1.5em; color:#333; background:#C8C8C8;}
    body, button, input, select, textarea { font-family:"Microsoft YaHei", 'helvetica neue', tahoma, 'hiragino sans gb', stheiti, 'wenquanyi micro hei', \5FAE\8F6F\96C5\9ED1, \5B8B\4F53, sans-serif }
    b, strong {font-weight: bold }
    i, em {font-style: normal }
    img {border:0 none; /*width: auto\9; max-width: 100%; vertical-align: top */}
    button, input, select, textarea { font-family: inherit; font-size: 100%; margin: 0; vertical-align: baseline }
    button, html input[type="button"], input[type="reset"], input[type="submit"], select{ -webkit-appearance: button; cursor: pointer}
    button[disabled], input[disabled] { cursor: default }
    input[type="checkbox"], input[type="radio"] { box-sizing: border-box; padding: 0 }
    input[type="search"] { -webkit-appearance: textfield; -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box }
    input[type="search"]::-webkit-search-decoration {-webkit-appearance:none}
    .clearfix:after { display: block; font-size: 0; content: "."; clear: both; height: 0; visibility: hidden;}

    .common_tit{ height:0.44rem; line-height:0.44rem; border-bottom:0.01rem solid #EEEEEE; box-sizing:border-box; overflow:hidden; zoom:1; }
    .common_tit .tit{ float:left; font-size:0.16rem; font-weight:bold; color:#666; position:relative;background:url(/public/mip/images/dot1.gif) no-repeat 0.1rem center #fff; padding-left:0.24rem; background-size:auto 0.18rem;}
    .common_tit  a.more{float:right; font-size:0.12rem; padding-right:0.1rem; color:#666;}
    .common_tit  a.more:hover{color:#E73727;}
    .viewport{width:100%; max-width:640px; margin:0 auto; background:#eee;}

    /*头部*/
    .header{}
    .header .top{ height:0.5rem; background:#7CBB2F; border-bottom:0.01rem solid #71AA2B; position:relative; padding:0 0.2rem;z-index:20;}
    .header .top .logo{ width:1.15rem; height:0.4rem; display:block; position:absolute; left:0.15rem; top:0.05rem; background:url(/public/mip/images/logo.png) no-repeat; background-size:contain; overflow:hidden; text-indent:-9999px; z-index:1000;}

    /*搜索*/
    .header .top .search{height:0.32rem; padding:0.09rem 0 0 1.25rem; position:relative;}
    .header .top .search .search_txt{float:left; border:none; width:100%; padding-left:0.13rem; box-sizing:border-box; height:0.32rem; border-radius:0.16rem ; font-size:0.12rem; }
    .header .top .search .search_btn{ width:0.4rem; height:0.32rem; cursor:pointer; display:inline-block; border-radius:0 0.16rem 0.16rem 0; border:none; background:url(/public/mip/images/search_btn.png) no-repeat center center #fff; background-size:0.25rem; text-indent:-9999px; position:absolute; right:-0.02rem; top:0;}

    /*顶部导航*/
    .nav{height:0.4rem; background:#7CBB2F; border-top:0.01rem solid #8ACD38; padding-left:2%; }
    .nav a{ display:inline-block; font-size:0.16rem; padding:0 2.3%; line-height:0.4rem; color:#fff; text-align:center;}
    .nav a:hover,.nav a:active{ background:#71AA2B;}

    .mip-carousel-indicator-wrapper{ position:relative; height:0; top:-0.2rem;}
    .mip-carousel-indicatorDot .mip-carousel-indecator-item{ width:0.06rem; height:0.06rem;}

    .index_nav .mip-showmore-btn{ height:0.4rem; line-height:0.4rem; border:none; border-top:0.01rem solid #eee; width:100%;  padding:0; display:block; text-align:center; margin-top:0.1rem; color:#666;}
    .index_nav .mip-showmore-btn .show {display: block; background:url(/public/mip/images/nav_more_down.png) no-repeat #fff;  background-position:58% center; background-size:0.1rem auto;}
    .index_nav .mip-showmore-btn .hidden {display: none;}
    .index_nav .mip-showmore-open .show { display: none;}
    .index_nav .mip-showmore-open .hidden {display: block;background:url(/public/mip/images/nav_more_up.png) no-repeat #fff;  background-position:58% center; background-size:0.1rem auto;}


    .hd_nav{height:0.4rem; background:#7CBB2F; border-top:0.01rem solid #8ACD38; position:relative;}
    .hd_nav .back{ background:url(/public/mip/images/back.png) no-repeat center; background-size:0.14rem auto;position:absolute;top:0;left:0;width:0.4rem;height:0.4rem;color:#fff;font-size:0.16rem; text-align:center; white-space:nowrap; overflow:hidden; text-indent:-9999px;}
    .hd_nav .mcate{position:absolute;top:0;right:0rem; width:0.52rem; height:0.4rem; z-index:1; background:url(/public/mip/images/nav_btn.png) no-repeat center; background-size:0.26rem auto; overflow:hidden; text-indent:-9999px; cursor:pointer;}
    .hd_nav .mcate a{ display:block; height:0.4rem;}

    .hd_nav .title{ width:100%; height:0.4rem; line-height:0.4rem; color:#fff; text-align:center; font-size:0.18rem; padding:0 0.4rem; box-sizing:border-box; overflow:hidden;}
    .hd_nav .title a{ color:#fff;}

    /*幻灯片*/
    .focus{ width:100%; height:1.5rem;/*适配*/ margin:0 auto; position:relative; overflow:hidden; margin-bottom:0.1rem;}
    .focus .hd{ width:100%; height:0.11rem;  position:absolute; z-index:1; bottom:0.1rem; text-align:center;  }
    .focus .hd ul{ display:inline-block; height:0.05rem; padding:0.03rem 0.05rem; /*background-color:rgba(255,255,255,0.7);
        	-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; font-size:0; */vertical-align:top;}
    .focus .hd ul li{ display:inline-block; width:0.08rem; height:0.08rem; -webkit-border-radius:0.05rem; -moz-border-radius:0.05rem; border-radius:0.05rem; background:#D6D6D6; opacity:0.7; margin:0 0.05rem;  vertical-align:top; overflow:hidden; text-indent:-9999px;}
    .focus .hd ul .on{ background:#7CBB2F;opacity:1;}
    .focus .bd{ position:relative; z-index:0;}
    .focus .bd li img{ width:100%;  /*height:288px;*/ background:url(/public/mip/images/loading.gif) center center no-repeat;}
    .focus .bd li a{ -webkit-tap-highlight-color:rgba(0, 0, 0, 0); /* 取消链接高亮 */  }

    /*首页导航*/
    /*.index_nav{padding:15px 0.1rem; overflow:hidden; background:#fff; border-top:1px solid #D6D6D6; border-bottom:1px solid #D6D6D6; margin-bottom:0.1rem;}
    .index_nav li{ width:25%; padding:2% 0; float:left;}*/
    .index_nav{padding:0.15rem 0.1rem 0 0.1rem; overflow:hidden; background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; margin-bottom:0.1rem; position:relative;}
    .index_nav .hd{ width:100%; height:0.11rem;  position:absolute; z-index:1; left:0; bottom:0.15rem; text-align:center;}
    .index_nav .hd ul{ display:inline-block; height:0.05rem; padding:0.03rem 0.05rem; vertical-align:top;}
    .index_nav .hd ul li{ display:inline-block; width:0.08rem; height:0.08rem; -webkit-border-radius:0.05rem; -moz-border-radius:0.05rem; border-radius:0.05rem; background:#D6D6D6; opacity:0.7; margin:0 0.05rem;  vertical-align:top; overflow:hidden; text-indent:-9999px;}
    .index_nav .hd ul .on{ background:#7CBB2F;opacity:1;}
    .index_nav .bd{ position:relative; z-index:0;}
    .index_nav .bd span{ width:25%; padding:2% 0; float:left;}


    .index_nav a{font-size:0.13rem;display:block;text-align:center; color:#666}
    .index_nav a em{display:block;width:0.5rem;height:0.5rem; background:url(/public/mip/images/nav_icon.png) no-repeat;margin:0 auto; margin-bottom:0.05rem; background-size:0.5rem auto;  border-radius:10%;}
    .index_nav a:active,.index_nav a:hover{ color:#ff6000;}
    .index_nav .icon1 em{background:url(/public/mip/images/nav_icon.png) 0 0 no-repeat; background-size:0.5rem auto;}
    .index_nav .icon2 em{background:url(/public/mip/images/nav_icon.png) 0 -0.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon3 em{background:url(/public/mip/images/nav_icon.png) 0 -1rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon4 em{background:url(/public/mip/images/nav_icon.png) 0 -1.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon5 em{background:url(/public/mip/images/nav_icon.png) 0 -2rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon6 em{background:url(/public/mip/images/nav_icon.png) 0 -2.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon7 em{background:url(/public/mip/images/nav_icon.png) 0 -3rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon8 em{background:url(/public/mip/images/nav_icon.png) 0 -3.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon9 em{background:url(/public/mip/images/nav_icon.png) 0 -4rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon10 em{background:url(/public/mip/images/nav_icon.png) 0 -4.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon11 em{background:url(/public/mip/images/nav_icon.png) 0 -5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon12 em{background:url(/public/mip/images/nav_icon.png) 0 -5.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon13 em{background:url(/public/mip/images/nav_icon.png) 0 -6rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon14 em{background:url(/public/mip/images/nav_icon.png) 0 -6.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon15 em{background:url(/public/mip/images/nav_icon.png) 0 -7rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon16 em{background:url(/public/mip/images/nav_icon.png) 0 -7.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon17 em{background:url(/public/mip/images/nav_icon.png) 0 -8rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon18 em{background:url(/public/mip/images/nav_icon.png) 0 -8.5rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon19 em{background:url(/public/mip/images/nav_icon.png) 0 -9rem no-repeat; background-size:0.5rem auto;}
    .index_nav .icon20 em{background:url(/public/mip/images/nav_icon.png) 0 -9.5rem no-repeat; background-size:0.5rem auto;}

    .index_nav mip-showmore{ min-height:1.76rem !important;}

    /*推荐项目*/
    .index_item{border-top:0.01rem solid #DDD; background:#fff; margin-bottom:0.1rem;}
    .index_item .common_tit .tit{background:none; padding-left:0;}
    .index_item .common_tit .index_icon1{width:0.22rem; height:0.22rem; display:inline-block; position:relative; left:0.1rem; top:0.05rem; margin-right:0.15rem; background:url(/public/mip/images/index_icon1.png) no-repeat; background-size:contain;}
    .index_item .bd{overflow:hidden; zoom:1;}
    .index_item .bd li{ border-bottom:0.01rem solid #DDD; overflow:hidden; zoom:1; position:relative;}
    .index_item .bd li:hover,.index_item .bd li:active{ background:#F6F6F6;}
    .index_item .bd li a{display:block; overflow:hidden; zoom:1;padding:0.1rem;}
    .index_item .bd .img_show{float:left; width:0.97rem; height:0.73rem; padding-top:0.03rem;position:relative;}
    .index_item .bd .img_show img{ width:0.97rem; height:0.73rem; }
    .index_item .bd .img_show i{  width:0.18rem; height:0.3rem; line-height:0.18rem; display:inline-block; background:url(/public/mip/images/top_icon.png) no-repeat; background-size:contain; position:absolute; left:0; top:0.03rem; font-size:0.12rem; font-weight:bold; color:#fff; padding-right:0.12rem; text-align:center; z-index:9999;}
    .index_item .bd .cont{ padding-left:1.07rem;}
    .index_item .bd .tit{font-size:0.14rem; width:1.58rem; height:0.18rem; font-weight:bold; color:#f60;white-space: nowrap;text-overflow: ellipsis; overflow:hidden; }
    .index_item .bd .price{color:#999;}
    .index_item .bd .price em{ color:#FF6000; font-size:0.14rem; font-weight:bold; }
    .index_item .bd .company{color:#999; height:0.2rem; overflow:hidden;text-overflow:ellipsis;white-space: nowrap; padding-bottom:0.02rem;}
    .index_item .bd .btn i{ width:100%;/* max-width:200px;*/ border-radius:0.03rem; height:0.22rem; line-height:0.22rem; text-align:center; color:#fff; display:inline-block; background:#FF6600;}
    .index_item .bd .cert{ width:0.3rem; height:0.3rem; overflow:hidden; text-indent:-9999px; background:url(/public/mip/images/cert_icon.png) no-repeat; background-size:contain; display:block; position:absolute; right:0.05rem; top:0.1rem;}
    .index_item .bd .pt{ color:#999;}
    .index_item .bd .ask_btn{ width:0.7rem; height:0.22rem; overflow:hidden; text-indent:-9999px; background:url(/public/mip/images/ask_btn.png) no-repeat; background-size:contain; display:block; position:absolute; right:0.1rem; top:0.43rem;}
    .loading{ height:0.4rem; line-height:0.4rem; text-align:center; color:#999;}

    /*最新资讯*/
    .index_news{border-top:0.01rem solid #DDD; background:#fff; margin-bottom:0.1rem;}
    .index_news .common_tit .tit{background:none; padding-left:0;}
    .index_news .common_tit .index_icon2{width:0.22rem; height:0.22rem; display:inline-block; position:relative; left:0.1rem; top:0.05rem; margin-right:0.15rem; background:url(/public/mip/images/index_icon2.png) no-repeat; background-size:contain; }
    .index_news_nav{ margin:0.1rem 0.1rem 0 0.1rem; overflow:hidden; zoom:1; border-top:0.01rem solid #D6D6D6; border-left:0.01rem solid #D6D6D6; border-radius:0.05rem;box-shadow:0px 0.02rem 0px rgba(0,0,0,0.1);}
    .index_news_nav li{ width:25%; float:left; text-align:center; height:0.35rem; line-height:0.35rem; box-sizing:border-box; border-bottom:1px solid #D6D6D6; border-right:0.01rem solid #D6D6D6;}
    .index_news_nav li:nth-child(4){ border-radius:0 0.05rem 0 0;}
    .index_news_nav li:nth-child(9){ border-radius:0 0 0 0.05rem;}
    .index_news_nav li:nth-child(12){ border-radius:0 0 0.05rem 0;}
    .index_news_nav li a{ color:#688C00; display:block;}
    .index_news_nav li a:hover{color:#ff6600;}
    .index_news_nav li:hover,.index_news_nav li:active{ background:#F6F6F6;}

    .index_news .bd{overflow:hidden; zoom:1; padding-top:0.1rem; border-bottom:0.01rem solid #DDD; }
    .index_news .bd li{ height:0.36rem; line-height:0.36rem; background:url(/public/mip/images/dot.jpg) no-repeat 0.1rem 0.16rem; padding:0 0 0 0.18rem; font-size:0.14rem;}
    .index_news .bd li:hover,.index_news .bd li:active{background-color:#F6F6F6;}
    .index_news .bd li:last-child{ border-bottom:none;}
    .index_news .bd  a{ display:block;}
    .index_news .bd .date{ float:right; width:0.35rem; height:0.36rem; overflow:hidden; color:#999;}

    /*推荐项目*/
    .rec_item{border-top:0.01rem solid #DDD; background:#fff; margin-bottom:0.1rem; border-bottom:0.01rem solid #DDD;}
    .rec_item .common_tit{ padding-left:0.1rem; }
    .rec_item .common_tit .tit{background:none; padding-left:0;}
    .rec_item .common_tit .change_btn{ font-size:0.14rem; float:right; padding-right:0.1rem; color:#666; cursor:pointer;}
    .rec_item .common_tit .index_icon3{width:0.22rem; height:0.22rem; display:inline-block; position:relative; left:0.1rem; top:0.05rem; margin-right:0.15rem; background:url(/public/mip/images/index_icon3.png) no-repeat; background-size:contain;}

    .rec_item .bd{overflow:hidden; zoom:1; padding:0.15rem 0.1rem 0.05rem 0.1rem; }
    .rec_item .bd li{ width:50%; float:left; box-sizing:border-box; margin-bottom:0.1rem;}
    .rec_item .bd li a{ display:block;}
    .rec_item .bd .img_show{ width:1.3rem; height:0.99rem; margin:0 auto;}
    .rec_item .bd .img_show img{width:1.3rem; height:0.99rem; }
    .rec_item .bd .cont{ width:1.4rem; height:0.9rem;}
    .rec_item .bd .tit{ padding-top:0.05rem; height:0.2rem; line-height:0.2rem; overflow:hidden; font-size:0.14rem; padding-left:0.1rem}
    .rec_item .bd .price{ color:#999; height:0.2rem; line-height:0.2rem; overflow:hidden; padding-left:0.1rem;}
    .rec_item .bd .price em{ color:#FF6600;}
    .rec_item .bd .join{color:#999; padding-bottom:0.02rem; padding-left:0.1rem;}
    .rec_item .bd .join .text_blue{color:#0ae;}
    .rec_item .bd .hb{padding-left:0.1rem;height:0.22rem; overflow:hidden;}
    .rec_item .bd .hb i{ border-radius:0.03rem;max-width:1.3rem; height:0.2rem; display:inline-block; line-height:0.2rem; overflow:hidden; color:#f60; border:0.01rem solid #f60; padding:0 0.02rem;}

    .rec_item .bd ul{ display:none;}
    .rec_item .bd ul:first-child{ display:block;}

    .load_more_btn{ height:0.4rem; line-height:0.4rem; background:#fff; display:block; text-align:center; font-size:0.14rem; border-top:0.01rem solid #eee; color:#666;}
    .load_more_btn a{ display:block;}

    .index_news_tab{ background:#fff; border-top: 0.01rem solid #DDD; border-bottom: 0.01rem solid #DDD; }
    .index_news_tab .hd{ height:0.4rem; line-height:0.4rem; font-size:0.14rem;  border-bottom:0.02rem solid #eee; }
    .index_news_tab .hd ul{ overflow:hidden;}
    .index_news_tab .hd ul li{ float:left; width:25%; text-align:center; color:#666;  }
    .index_news_tab .hd ul .on{ border-bottom:0.02rem solid #7CBB2F; color:#7CBB2F;  }
    .index_news_tab .hd ul .on a{ display:block; /* 修复Android 4.0.x 默认浏览器当前样色无效果bug */ }
    .index_news_tab .bd ul{ }
    .index_news_tab .bd li{ overflow:hidden; zoom:1; border-bottom:0.01rem solid #eee; padding:0.1rem 0.15rem;}
    .index_news_tab .bd ul li:last-child{ border-bottom:none;}
    .index_news_tab .bd li a{ display:block; overflow:hidden;}
    .index_news_tab .bd .cont{ padding-right:1rem; box-sizing:border-box;}
    .index_news_tab .bd .cont .tit{ font-size:0.14rem; max-height:0.36rem; overflow:hidden;}
    .index_news_tab .bd .cont .date{ color:#999; padding-top:0.03rem;}
    .index_news_tab .bd .cont .date em{ padding-right:0.1rem;}
    .index_news_tab .bd .img_show{ width:0.97rem; height:0.73rem; float:right;}
    .index_news_tab .bd .img_show img{ width:0.97rem; height:0.73rem;}
    .index_news_tab .load_more_btn{border-top:none;}

    .index_news_tab .common_tit{ padding-left:0.1rem; }
    .index_news_tab .common_tit .tit{background:none; padding-left:0;}

    .index_news_tab mip-vd-tabs.mip-vd-tabs{background:#fff;}
    .index_news_tab mip-vd-tabs .mip-vd-tabs-row-tile{ height:0.4rem;}
    .index_news_tab mip-vd-tabs .mip-vd-tabs-nav{ padding:0;}
    .index_news_tab mip-vd-tabs .mip-vd-tabs-nav-li{box-sizing:border-box; height:0.4rem; line-height:0.4rem; font-size:0.16rem; border-bottom: 0.01rem solid #DDD; padding:0; cursor:pointer;}
    .index_news_tab mip-vd-tabs .mip-vd-tabs-nav .mip-vd-tabs-nav-selected {border-bottom:0.02rem solid #7CBB2F; color:#7CBB2F;}
    .index_news_tab mip-vd-tabs .mip-vd-tabs-nav .mip-vd-tabs-nav-selected a{color:#fff;}

    /*footer*/
    .footer{height:1.1rem; background:#7CBB2F; color:#fff;}
    .footer .footer_nav{text-align:center; height:0.4rem; line-height:0.4rem; border-bottom:0.01rem solid #71AA2B;}
    .footer .footer_nav a{display:inline-block; height:0.16rem; line-height:0.16rem; padding:0 0.11rem; text-align:center; color:#fff;}
    .footer .footer_nav a:hover{ text-decoration:underline;}
    .footer .copyright{text-align:center; line-height:0.25rem; padding-top:0.1rem; border-top:0.01rem solid #8ACD38;}
    .footer .copyright a{ color:#fff;}
    .footer .copyright p{ padding:0 0.1rem;}

    /*底部导航*/
    .footer_nav_top{ height:0.5rem;}
    .footer_nav_fixed{ width:100%; height:0.5rem; background:#FF6600; position:fixed; left:0; bottom:0; z-index:99999;}
    .footer_nav_fixed li{ float:left; width:25%; text-align:center;}
    .footer_nav_fixed li a{ color:#fff; display:block; height:0.46rem; padding-top:0.04rem;}
    .footer_nav_fixed li i{ width:0.22rem; height:0.22rem; display:block; margin:0 auto; background:url(/public/mip/images/footer_nav_icon.png) no-repeat;}
    .footer_nav_fixed li .icon1{ background-position:0 0; background-size:0.22rem auto}
    .footer_nav_fixed li .icon2{ background-position:0 -0.22rem; background-size:0.22rem auto;}
    .footer_nav_fixed li .icon3{ background-position:0 -0.44rem; background-size:0.22rem auto;}
    .footer_nav_fixed li .icon4{ background-position:0 -0.66rem; background-size:0.22rem auto;}

    .path{ height:0.35rem; line-height:0.35rem; padding:0 0.1rem; color:#A5A5A5; overflow:hidden;}

    /*项目分类*/
    .item_cate{ border:0.01rem solid #DDD; background:#fff; margin:0 0.1rem 0.12rem 0.1rem;}
    .item_cate .hd{ height:0.44rem; line-height:0.44rem; border-bottom:0.01rem solid #DDD;}
    .item_cate .hd .tit{font-size:0.16rem; height:0.44rem; line-height:0.44rem; padding-left:0.15rem; font-weight:bold;}
    .item_cate .hd i{ display:inline-block; width:0.25rem; height:0.25rem; margin-right:0.05rem; background:url(/public/mip/images/nav_icon.png) no-repeat; position:relative; top:0.07rem; }
    .item_cate .hd .more{ float:right; padding-right:0.15rem;}

    .item_cate .hd .icon1{background:url(/public/mip/images/nav_icon.png) 0 0 no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon2{background:url(/public/mip/images/nav_icon.png) 0 -0.25rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon3{background:url(/public/mip/images/nav_icon.png) 0 -0.5rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon4{background:url(/public/mip/images/nav_icon.png) 0 -0.75rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon5{background:url(/public/mip/images/nav_icon.png) 0 -1rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon6{background:url(/public/mip/images/nav_icon.png) 0 -1.25rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon7{background:url(/public/mip/images/nav_icon.png) 0 -1.5rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon8{background:url(/public/mip/images/nav_icon.png) 0 -1.75rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon9{background:url(/public/mip/images/nav_icon.png) 0 -2rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon10{background:url(/public/mip/images/nav_icon.png) 0 -2.25rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon11{background:url(/public/mip/images/nav_icon.png) 0 -2.5rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon12{background:url(/public/mip/images/nav_icon.png) 0 -2.75rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon13{background:url(/public/mip/images/nav_icon.png) 0 -3rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon14{background:url(/public/mip/images/nav_icon.png) 0 -3.25rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon15{background:url(/public/mip/images/nav_icon.png) 0 -3.5rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon16{background:url(/public/mip/images/nav_icon.png) 0 -3.75rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon17{background:url(/public/mip/images/nav_icon.png) 0 -4rem no-repeat; background-size:0.25rem auto;}
    .item_cate .hd .icon18{background:url(/public/mip/images/nav_icon.png) 0 -4.25rem no-repeat; background-size:0.25rem auto;}

    .item_cate .bd{ padding:0.1rem; overflow:hidden; zoom:1;}
    .item_cate .bd li{ width:25%; height:0.35rem; line-height:0.35rem; box-sizing:border-box; float:left; font-size:0.14rem; overflow:hidden;}

    /*项目子分类*/
    .item_sub_cate{ overflow:hidden; zoom:1;}
    .item_sub_cate li{ float:left; width:25%; height:0.32rem; line-height:0.32rem; border-right:0.02rem solid #F2F2F2; border-bottom:0.02rem solid #F2F2F2; box-sizing:border-box; background:#fff; text-align:center; overflow:hidden;}
    .item_sub_cate li:nth-child(4n+0){border-right:none;}
    .item_sub_cate li a{ display:block;}
    .item_sub_cate li a:hover,.item_sub_cate li a:active,.item_sub_cate .cur a{ color:#fff;}
    .item_sub_cate li:hover,.item_sub_cate li:active,.item_sub_cate .cur{ background:#98C932;}

    #js_sub_cate_list mip-showmore{ min-height:0.64rem;}

    .js_sub_cate_btn a{ color:#88B62D;}

    .item_sub_tit { height:0.4rem; line-height:0.4rem; background:url(/public/mip/images/dot1.gif) no-repeat 0.1rem 0.11rem #fff; background-size:0.04rem auto; padding-left:0.24rem; margin-bottom:0.02rem; padding-right:0.15rem;}
    .item_sub_tit .tit{color:#89B62E; font-weight:bold; font-size:0.16rem;}
    .item_sub_tit .more{ float:right;}
    .item_sub_tit .mip-showmore-btn{ padding:0; float:right; border:none; background:none; cursor:pointer; color:#666;}
    .item_sub_tit .mip-showmore-btn:hover{ color:#f60;}

    #js_sub_cate_list .mip-showmore-btn{ width:25%; height:0.3rem; line-height:0.3rem; text-align:center; padding:0; float:right; border:none; background:#fff; cursor:pointer; position:relative; top:-0.32rem; color:#88B62D;}
    #js_sub_cate_list .mip-showmore-btn-hide{display: none!important}
    .ntb{ border-top:none; margin-bottom:0;}
    .notb{ border-top:none;}

    .fixation { border-top: 1px solid #F2F2F2; height: 0.35rem; position: relative;}
    .drop-down-ctn {font-size: 0.12rem; padding: 0.05rem 0.1rem 0.05rem 0; padding-right: 0; background: #fff url("/public/mip/images/rank_shade.png") no-repeat right 0.05rem; background-size: 0.35rem 0.285rem; position: absolute; top: 0; z-index: 101; box-sizing:border-box; }
    .shade { display: none; width:100%; height: 100%; background: #000; opacity: 0.5; z-index:100; /*top:1rem;*/ position:absolute;}
    .drop-down-ctn.up { height:0.35rem; overflow: hidden; }
    .drop-down-ctn.up .ic-drop { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
    .drop-left { float: left; z-index: 0;  width:100%;}
    .drop-left a { color: #4c4c4c; float:left;  width:30%; height:0.28rem; line-height:0.28rem; box-sizing:border-box; overflow:hidden; text-align: center; }
    .drop-left a.red { color: #ea1719; }
    .drop-down-ctn .ic-drop { width: 0.3rem; height: 0.35rem; background: url("/public/mip/images/icon_drop.png") no-repeat center; background-size: 0.09rem 0.05rem; position: absolute; right: 0; top: 0; -webkit-transition: 0.4s; transition: 0.4s; z-index: 1; -webkit-transform: rotate(180deg); transform:rotate(180deg); cursor:pointer; }
    .drop-down-ctn .up{-webkit-transform: rotate(0deg); transform: rotate(0deg);}
    .drop-down-ctn .mip-showmore-btn{ width:0.3rem; height:0.35rem; padding:0; border:none; background:#fff; position:absolute; right:0; top:0;}

    .drop-down-ctn mip-showmore{ min-height:0.28rem !important; padding:0.05rem 0.1rem}

    .drop-down-ctn .mip-showmore-btn .down {display: block; }
    .drop-down-ctn .mip-showmore-btn .up {display: none;}
    .drop-down-ctn .mip-showmore-open .down { display: none;}
    .drop-down-ctn .mip-showmore-open .up {display: block;}

    .drop-down-ctn .mip-showmore-boxshow{ box-shadow: 0px 2px 2px rgba(0,0,0,0.22);}


    .rank_list_content { display: -webkit-box; display: -ms-flexbox; display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; padding-bottom:0.1rem; }
    .rank_list_content a { background: #ffffff; padding: 0.05rem; margin: 0.1rem 0 0 0.07rem; }
    .rank_list_content img { display: block; width:0.875rem; height:0.785rem; background:#f5ccaf; }
    .rank_list_content p { width:0.875rem; height:0.18rem; overflow:hidden; font-size: 0.12rem; text-align:center; color:#666;}

    .rank_detail{ margin-bottom:0.1rem;}
    .rank_detail li{ border-bottom:0.01rem solid #DDD; padding:0.1rem; overflow:hidden; zoom:1; position:relative; background:#fff;}
    .rank_detail li:hover,.rank_detail li:active{ background:#F6F6F6;}


    .rank_detail .img_show{float:left; padding-top:0.03rem; width:0.97rem; height:0.73rem; position:relative;}
    .rank_detail .img_show img{ width:0.97rem; height:0.73rem;}
    .rank_detail .img_show i{  width:0.18rem; height:0.3rem; line-height:0.18rem; display:inline-block; background:url(/public/mip/images/top_icon.png) no-repeat; background-size:contain; position:absolute; left:0; top:0.03rem; font-size:0.12rem; font-weight:bold; color:#fff; padding-right:0.12rem; text-align:center; z-index:9999;}
    .rank_detail .cont{ padding-left:1.07rem;}
    .rank_detail .tit{font-size:0.14rem; width:1.58rem; height:0.18rem; font-weight:bold; color:#f60;white-space: nowrap;text-overflow: ellipsis; overflow:hidden;}
    .rank_detail .price{color:#999;}
    .rank_detail .price em{ color:#FF6000; font-size:0.14rem; font-weight:bold; }
    .rank_detail .info{ color:#666;}
    .rank_detail .ask_btn{display:block; width:0.38rem; height:0.38rem; overflow:hidden; text-indent:-9999px; background:url(/public/mip/images/ask_btn1.png) no-repeat; background-size:contain; position:absolute; top:0.1rem; right:0.1rem;}
    .rank_detail .mt{ color:#999; clear:both;}
    .rank_detail .mt em{ color:#666;}
    .rank_detail .mt span{ display:inline-block;  height:0.18rem;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}
    .rank_detail .hy { color:#999; width:1.5rem;}
    .rank_detail .area{ width:0.7rem;}
    .rank_detail .shop{width:0.7rem;}

    /*项目分类*/
    .item_sort{ height:0.4rem; background:#fff; position:relative; border-bottom:0.02rem solid #EEE;}
    .item_sort .hd{border-bottom:0.02rem solid #EEE; height:0.4rem;}
    .item_sort .tit{font-size:0.14rem; width:25%; float:left; height:0.4rem; line-height:0.4rem; border-right:0.02rem solid #EEE; box-sizing:border-box; text-align:center;}
    .item_sort .tabs{height:0.4rem; width:75%; float:left;}
    .item_sort .tabs li{ float:left; width:33%; height:0.4rem; line-height:0.4rem; text-align:center; border-right:0.02rem solid #EEE; box-sizing:border-box; cursor:pointer; color:#666;}
    .item_sort .tabs li i{ width:0.1rem; height:0.1rem; display:inline-block; background:url(/public/mip/images/tabs_down.png) no-repeat; background-size:0.1rem auto; margin:0 0 0 .05rem; vertical-align:middle;}
    .item_sort .tabs .cur{ background-size:0.07rem auto; color:#f60;}
    .item_sort .tabs .cur i{background:url(/public/mip/images/tabs_up.png) no-repeat; background-size:0.1rem auto; margin:0 0 0 0.05rem; vertical-align:middle; }
    .item_sort .tabs li:last-child{ border-right:none;}

    .item_sort .sum{ display:none; width:100%; position:absolute; left:0; top:0.42rem; background:#fff; z-index:99999; height:1.44rem !important; overflow-y: scroll; box-shadow: 0px 2px 2px rgba(0,0,0,0.22);}
    .item_sort .sum li{ width:50%; height:0.35rem; line-height:0.35rem; border-bottom:0.01rem solid #eee; float:left;}
    .item_sort .sum li a{ display:block; padding-left:0.15rem;}
    .item_sort .sum .on{color:#f60;}
    .mask{background-color:rgba(0,0,0,0.5); width:100%; position:absolute; left:0; top:0.42rem; z-index:99998;}

    .item_sort .mip-layout-container{height:0.4rem; width:75%; float:left; position:static !important;}
    .item_sort section{float:left; width:33%; height:0.4rem; line-height:0.4rem; text-align:center; border-right:0.02rem solid #EEE; box-sizing:border-box; cursor:pointer; color:#666;}
    .item_sort section p i{ width:0.1rem; height:0.1rem; display:inline-block; background:url(/public/mip/images/tabs_down.png) no-repeat; background-size:0.1rem auto; margin:0 0 0 .05rem; vertical-align:middle;}
    .item_sort section:last-child{ border-right:none;}
    .item_sort section[expanded=open] p i{background:url(/public/mip/images/tabs_up.png) no-repeat; background-size:0.1rem auto; margin:0 0 0 0.05rem; vertical-align:middle; }

    /*项目详情*/
    .item_info{ background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; margin-bottom:0.12rem;}
    .item_info h1{ font-size:0.16rem; font-weight:bold !important; color:#333; }

    .item_info .item_desc{ font-size:0.14rem; color:#666; padding:0.05rem 0.1rem 0.1rem; line-height:0.25rem; overflow:hidden; zoom:1; position:relative;}
    .item_info .item_desc .item_desc_mt{ height:0.25rem;}
    .item_info .item_desc .item_desc_mt span, .comp_info .hy span{ width:50%; height:0.25rem; color:#999; float:left; overflow:hidden;}
    .item_info .item_desc .item_desc_mt em{  }
    .item_info .item_desc .item_desc_mt .price{color:#FF6000;font-weight:bold; font-size:0.15rem;}
    .item_info .item_desc .item_desc_mt .addr{ color:#666;}
    .item_info .item_desc .item_desc_mt .num{color:#666;}
    .item_info .item_desc .comp{ position:relative; overflow:hidden; zoom:1;}
    .item_info .item_desc .comp .comp_name{ width:1.9rem; height:0.25rem; overflow:hidden; display:inline-block; float:left;white-space: nowrap;text-overflow: ellipsis;}
    .item_info .item_desc .mip-layout-container{ position:static;}
    .item_info .item_desc .comp_btn{ width:1rem; height:0.22rem; line-height:0.22rem; font-size:0.12rem; display:inline-block; background:#f60; color:#fff; text-align:center; border-radius:0.03rem; margin-left:0.1rem; cursor:pointer;float:right; margin-top:0.02rem; position:absolute; top:0rem; right:0.1rem;}

    .item_info .item_desc .ask_btn{display:block; width:0.38rem; height:0.38rem; overflow:hidden; text-indent:-9999px; background:url(/public/mip/images/ask_btn1.png) no-repeat; background-size:contain; position:absolute; top:0.1rem; right:0.1rem;}

    .item_info .item_desc .comp_info{ border-top:0.01rem solid #EEEEEE; padding-top:0.1rem; margin-top:0.1rem; }
    .item_info .item_desc .comp_info .addr{color:#666;}
    .item_info .item_desc .comp_info .num{color:#666;}
    .item_info .item_desc .comp_info .hy{ color:#999;}
    .item_info .item_desc .comp_info .hy a{ color:#2c64b6;}

    .item_info .item_desc .comp_info .bd .name{ color:#999;}
    .close_comp_info{ height:0.4rem; line-height:0.4rem; color:#f60; text-align:center; cursor:pointer;}
    .close_comp_info i{ width:0.1rem; height:0.1rem; display:inline-block; background:url(/public/mip/images/tabs_up.png) no-repeat; background-size:0.1rem auto; margin:0 0 0 .05rem; vertical-align:middle;}

    .item_info .item_desc .comp_info .bd .fw{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:5;overflow: hidden;}


    .item_info .pic_wrap{ width:100%; height:2rem;/*适配*/ margin:0 auto; position:relative; text-align:center; overflow:hidden; margin-bottom:0.1rem;}
    .item_info .pic_wrap .hd{ width:100%; height:0.11rem;  position:absolute; z-index:1; bottom:0.1rem; text-align:center;  }
    .item_info .pic_wrap .hd ul{ display:inline-block; height:0.05rem; padding:0.03rem 0.05rem; /*background-color:rgba(255,255,255,0.7);
        	-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; font-size:0; */vertical-align:top;}
    .item_info .pic_wrap .hd ul li{ display:inline-block; width:0.08rem; height:0.08rem; -webkit-border-radius:0.05rem; -moz-border-radius:0.05rem; border-radius:0.05rem; background:#D6D6D6; opacity:0.7; margin:0 0.05rem;  vertical-align:top; overflow:hidden; text-indent:-9999px;}
    .item_info .pic_wrap .hd ul .on{ background:#7CBB2F;opacity:1;}
    .item_info .pic_wrap .bd{ position:relative; z-index:0;}
    .item_info .pic_wrap .bd li img{ max-width:100%;height:2rem; background:url(/public/mip/images/loading.gif) center center no-repeat;}
    .item_info .pic_wrap .bd li a{ -webkit-tap-highlight-color:rgba(0, 0, 0, 0); /* 取消链接高亮 */  }

    .hb_box{ background:#FFEBEB; padding:0.1rem; overflow:hidden; zoom:1;}
    .hb_box .hb_icon{ width:0.28rem; height:0.28rem; float:left; background:url(/public/mip/images/hb_icon.png) no-repeat; background-size:contain; margin-right:0.1rem;}
    .hb_box .tit{ border-radius:0.03rem; max-width:1.6rem; height:0.28rem; line-height:0.28rem; overflow:hidden; color:#f60; border:0.01rem solid #f60;float:left; background:#fff; padding:0 0.05rem;}
    .hb_box a.lq_btn{ display:block; width:0.75rem; height:0.28rem; line-height:0.28rem; text-align:center; background:#fff; color:#EE3333; border:1px solid #EE3333; border-radius:0.05rem; float:right;}
    .hb_box a.lq_btn:hover{background:#EE3333; color:#fff;}
    .tel_box{ padding:0  0.1rem; height:0.4rem; background:url(/public/mip/images/tel.png) no-repeat left center; background-size:contain; margin-top: .05rem; margin-bottom: .05rem;}
    .tel_box a.tel_btn{ display:block; width:0.75rem; height:0.28rem; line-height:0.28rem; text-align:center; background:#EE3333; color:#fff; border:1px solid #EE3333; border-radius:0.05rem; float:right; margin-top:0.05rem;}
    .item_info .item_desc .btn{ padding:0.05rem 0;}
    .item_info .item_desc .btn a{width:100%; border-radius:0.03rem; height:0.35rem; line-height:0.35rem; text-align:center; color:#fff; display:inline-block; background:#FF6600;}
    .item_info .item_desc .btn a:hover,.item_info .item_desc .btn a:active{background:#E15A00;}
    .item_intro{ background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; margin-bottom:0.12rem;}
    .item_intro .bd{ font-size:0.14rem; padding:0.1rem 0.1rem; line-height:0.24rem; color:#666;}
    .item_intro .bd .name{ color:#999;}
    .item_intro .bd table {    border-collapse: collapse;    border-spacing: 0;    border-top: 1px solid rgb(230, 230, 230);    width: 100%;}
    .item_intro .bd tbody {    display: table-row-group;    vertical-align: middle;    border-color: inherit;}
    .item_intro .bd td{    padding-top: 5px;    padding-bottom: 5px;    text-align: center;    color: rgb(85, 85, 85);    border: 1px solid rgb(230, 230, 230);    text-indent: 15px;    height: 20px;    overflow: hidden;    width: 266px;}
    .item_intro .bd  th {  font-size: .25rem;   padding-top: 5px;    padding-bottom: 5px;    color: rgb(85, 85, 85);    border: 1px solid rgb(230, 230, 230);    text-indent: 15px;    height: 20px;    overflow: hidden;    width: 130px;    background: rgb(249, 249, 249);}
    .item_intro .bd img{max-width:100% !important; display:block;   margin: 0.2rem 0; border-radius: 5px;}
    .item_intro .bd h3,.item_intro .bd h2{font-size:0.14rem;    position: relative;	color: #7CBB2F !important;white-space: nowrap;	text-overflow: ellipsis;	overflow: hidden;	padding-left: 10px;	border-bottom: 2px solid #EDEDED;	    height: .3rem;	line-height: .35rem;	color: #4b4b4b;	font-weight: bold;	margin-bottom: 10px;}
    .item_intro .bd h3:after,.item_intro .bd h2:after{ position: absolute;	left: 0px;	top: .1rem;	width: .04rem;	height: .25rem;	background-color: #7CBB2F;	content: '';}
    .viewport .display,.viewport  .hidden{text-align: center; width: 100%; margin: 0 auto;  height: 1rem; border: none; background: #fff;font-size: 16px; padding: 0px;    }
    .viewport .display span,.viewport  .hidden span{display: inline-block;    width: 0.2rem;    height: 0.12rem; margin-top: 0.45rem; margin-left: 0.2rem; background: url(/public/mip/images/Arrow-open.png) no-repeat center;    background-size: 0.2rem 0.12rem;    }
    .viewport .display i{ display: inherit; width: 0.2rem; height: 0.12rem;margin-top: 0.45rem; margin-left: 0.2rem; background: url('/public/mip/images/Arrow-open.png') no-repeat center;        background-size:0.2rem 0.12rem;    }
    .viewport .hidden{display: none;}
    .viewport .hidden i{ display: block; float: left; width: 0.2rem; height: 0.12rem; margin-top: 0.45rem;  margin-left: 0.2rem;  background: url('../images/Arrow-close.png') no-repeat center;  background-size:0.2rem 0.12rem;}
    .tips{ color:#666;}
    .tips .tips_cont{ border:0.01rem solid #F8C6A5; padding:0.1rem; background:#FFFCDD;  }
    .tips p{ text-align:center; height:0.3rem; line-height:0.3rem;}

    /*导航*/
    .fixed_nav {height: 0.4rem; background:#fff; overflow: hidden;zoom:1;}
    .fixed_nav .cont_tab {  height: 0.4rem;  }
    .fixed_nav .cont_tab li { float: left; width:25%; height:0.4rem; line-height:0.4rem; text-align:center; font-size:0.14rem; border-right:0.01rem solid #eee; box-sizing:border-box;  position: relative; }
    .fixed_nav .cont_tab li:last-child{ border-right:none;}
    .fixed_nav .cont_tab li a { display: block; }
    .fixed_nav .cont_tab li a:hover { text-decoration: none; }
    .fixed_nav .cont_tab .cur {   }
    .fixed_nav .cont_tab .cur a { color: #f60; }

    .anchor_fixed { width:100%; position: fixed; background-color: #FFF; top: 0px; z-index: 99999; -moz-box-shadow: 0px 2px 1px rgba(0,0,0,0.1); -webkit-box-shadow: 0px 2px 1px rgba(0,0,0,0.1); box-shadow: 0px 2px 1px rgba(0,0,0,0.1); -ms-filter: "progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=2,Color=#1a000000,Positive=true)"; filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=0, OffY=2, Color=#1a000000, Positive=true);
    }


    /*在线留言*/
    .msg{ background:#FDECE8; border-top:0.02rem solid #FCC4B6; border-bottom:0.01rem solid #FCC4B6; margin-bottom:0.12rem;}
    .msg .hd{ height:0.35rem; line-height:0.35rem; color:#FF6600; font-weight:bold; font-size:0.14rem; padding-left:0.1rem;}
    .msg .bd{  margin:0 auto; padding:0.05rem 0.1rem 0.1rem 0.1rem; }
    .msg .bd li{ padding-bottom:0.08rem; overflow:hidden; zoom:1; position:relative;}
    .msg .bd .label{ position:absolute; left:0.08rem; top:0.08rem;}
    .msg .bd .input_bk{ border:0.01rem solid #D6D6D6; padding-left:0.47rem; width:100%; height:0.35rem; line-height:0.35rem; border-radius:0.03rem; box-sizing:border-box; font-size:0.14rem;}
    .msg .bd .textarea_bk{ border:0.01rem solid #D6D6D6; width:100%; height:0.6rem; line-height:0.24rem; padding:0.05rem 0.05rem 0.05rem 0.47rem; border-radius:0.03rem; box-sizing:border-box; font-size:0.14rem;}
    .msg .bd .btn{ height:0.35rem; font-size:0.14rem; text-align:center; width:100%; background:#FF6600; border-radius:0.03rem; color:#fff; border:none;}
    .msg .bd .btn:hover,.msg .bd .btn:active{ background:#E15A00;}


    /*相关阅读*/
    .rela_news{background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; margin-bottom:0.12rem;}
    .rela_news .bd{overflow:hidden; zoom:1; padding:0.05rem 0;  }
    .rela_news .bd li{ height:0.36rem; line-height:0.36rem; background:url(/public/mip/images/dot.jpg) no-repeat 0.1rem 0.16rem; padding:0 0 0 0.18rem; font-size:0.14rem; overflow:hidden;}
    .rela_news .bd li:hover,.rela_news .bd li:active{background-color:#F6F6F6;}
    .rela_news .bd li:last-child{ border-bottom:none;}
    .rela_news .bd a{ display:block;}

    /*项目推荐*/
    .rela_item{background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; }
    .rela_item .bd{overflow:hidden; zoom:1; padding:0.15rem 0 0.05rem 0;}
    .rela_item .bd li{ width:50%; float:left; box-sizing:border-box; margin-bottom:0.1rem;}
    .rela_item .bd li a{ display:block;}
    .rela_item .bd .img_show{ width:1.32rem; height:0.99rem; margin:0 auto;}
    .rela_item .bd .img_show img{width:1.32rem; height:0.99rem;}
    .rela_item .bd .tit{ text-align:center; padding-top:0.05rem; height:0.2rem; line-height:0.2rem;  overflow:hidden; font-size:0.14rem;}
    .rela_item .bd .price{ color:#999; text-align:center;height:0.2rem; line-height:0.2rem; overflow:hidden;}
    .rela_item .bd .price em{ color:#FF6600;}

    /*分页*/
    .page{padding:30px 0; background:#fff; color:#666666;text-align:center;*zoom:1;}
    .page:after{content:".";display:block;height:0;clear:both;visibility:hidden;line-height:0;font-size:0;}
    .page .pagination{ display:inline-block;*display:inline; *zoom:1;}
    .page li{display:inline-block; *display:inline; *zoom:1;}
    .page li a,.page li span{display:inline-block;vertical-align:middle;margin:0 2px;padding:0 12px;height:30px;font:normal 14px/30px "\5B8B\4F53";border:1px solid #ddd;background-color:#fff; *display:inline; *zoom:1;}
    .page li a:hover{text-decoration:none;background-color:#98C932;border-color:#98C932;color:#fff;}
    .page .active span{background-color:#98C932;border-color:#98C932;color:#fff;}
    .page .disabled span{ border:none; background:#fff; padding:0; }
    .page .goto{ display:inline-block;*display:inline; *zoom:1;}

    /*新闻分类项*/
    .news_item{background:#fff; border-top:00.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; margin-bottom:0.12rem;}
    .news_item .common_tit a{ width:50%; box-sizing:border-box;}
    .news_item .common_tit a.more{ text-align:right;}
    .news_item .bd{overflow:hidden; zoom:1; padding:0.05rem 0;}


    .news_item .bd ul{ }
    .news_item .bd li{ overflow:hidden; zoom:1; border-bottom:0.01rem solid #eee; padding:0.1rem 0.15rem;}
    .news_item .bd ul li:last-child{ border-bottom:none;}
    .news_item .bd li a{ display:block; overflow:hidden;}
    .news_item .bd .cont{ padding-right:1rem; box-sizing:border-box;}
    .news_item .bd .cont .tit{ font-size:0.14rem; max-height:0.36rem; overflow:hidden;}
    .news_item .bd .cont .date{ color:#999; padding-top:0.03rem;}
    .news_item .bd .cont .date em{ padding-right:0.1rem;}
    .news_item .bd .img_show{ width:0.97rem; height:0.73rem; float:right;}
    .news_item .bd .img_show img{ width:0.97rem; height:0.73rem;}



    /*新闻列表*/
    .news_list{background:#fff; border-top:0.01rem solid #D6D6D6; padding:0.1rem 0 0 0;  }
    .news_list ul li{ height:0.3rem; line-height:0.3rem; margin:0 0.1rem 0 0.1rem; font-size:0.14rem; overflow:hidden; white-space:nowrap;}
    .news_list li:nth-child(10n+0){ border-bottom:0.01rem dotted #D6D6D6; padding-bottom:0.1rem; margin-bottom:0.1rem; }
    .news_list li:last-child{ margin-bottom:0;}
    .news_list ul li:hover,.news_list ul li:active{background-color:#F6F6F6;}
    .news_item ul a{ display:block;}

    /*新闻内容*/
    .news_cont{background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; padding:0.1rem 0; margin-bottom:0.12rem;}
    .news_cont h1{font-size:0.16rem; padding:0.1rem; line-height:0.22rem; text-align:center;}
    .news_cont .time{ color:#666; text-align:center; border-bottom:0.01rem dotted #D6D6D6; margin:0 0.1rem; padding-bottom:0.1rem;}
    .news_cont .content{ padding:0.1rem; font-size:0.14rem; line-height:0.24rem; color:#666;}
    .news_cont .content h2{ font-size:0.16rem; padding:0.05rem 0;}
    .news_cont .content p{ padding-bottom:0.15rem;}
    p.title_li{ font-weight:bold; color:#ff4000;}
    .news_cont .content img{ max-width:100%;}

    .wz_pp{ border:solid 0.01rem #ddd; margin:0.1rem 1.5%; overflow:hidden; background:#f9f9f9; padding:0.05rem;}
    .wz_pp span{ display:block; float:left; width:1rem; }
    .wz_pp span img{ width:100%;}
    .wz_pp cite{ margin-left:1.1rem;display:block; font-style:normal; color:#666;}
    .wz_pp cite em{ color:#999;}
    .wz_pp cite code{ color:#666;font-family:"Microsoft YaHei";}
    .wz_pp cite code a{ margin-right:0.15rem; color:#f60; font-weight:bold;}

    /*百度自定义分享*/
    .share{ height:0.4rem; margin:0 0.1rem; padding:0.14rem 0; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; font-size:0.12rem;}
    .share .tit{ float:left; line-height:0.41rem; color:#666; margin-right:0.1rem; font-size:0.12rem;}
    .bdsharebuttonbox{ float:left;}
    .share .bdsharebuttonbox .bds_tsina, .share .bdsharebuttonbox .bds_qzone, .share .bdsharebuttonbox .popup_weixin{float:left; width:0.41rem; height:0.41rem; text-indent:-9999px; padding:0; margin:0 0.08rem 0 0;}
    .share .bdsharebuttonbox .bds_tsina{ background:url(/public/mip/images/share_icon.png) no-repeat; }
    .share .bdsharebuttonbox .bds_qzone{ background:url(/public/mip/images/share_icon.png) no-repeat -0.97rem 0;}
    .share .bdsharebuttonbox .popup_weixin{ background:url(/public/mip/images/share_icon.png) no-repeat -0.48rem 0;}

    .nextpage{font-size:0.14rem; color:#666; line-height:0.25rem; padding:0.07rem 0.1rem;}

    /*排行榜*/
    .rank_item{background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; margin-bottom:0.12rem;}
    .rank_item .common_tit .tit{ width:50%; background:none; padding-left:0.12rem;}
    .rank_list .hd{ height:0.3rem; line-height:0.3rem; color:#999;padding:0 0.1rem;}
    .rank_list .hd span{float:left;}
    .rank_list .hd .hd_index{width:0.4rem;margin-left:0.1rem;}
    .rank_list .hd .hd_name{width:56%;}
    .rank_list .hd .hd_trend{width:0.4rem;}
    .rank_list .hd .hd_value{width:0.4rem; text-align:right;}
    .rank_list li{ border-top:0.01rem dotted #D6D6D6;}
    .rank_list li:hover{ background:#F6F6F6;}
    .rank_list li a{height:0.2rem; line-height:0.2rem; display:block; padding:0.1rem 0;}
    .rank_list .bd{ padding:0 0.1rem;}
    .rank_list .bd .i_rank{ width:0.2rem; height:0.2rem; line-height:0.2rem; border-radius:0.02rem; background:#7CBB2F; color:#fff; display:inline-block; text-align:center; float:left; margin-right:0.2rem; margin-left:0.1rem;}
    .rank_list .bd .bg1{ background:#E12313;}
    .rank_list .bd .bg2{ background:#FF6600;}
    .rank_list .bd .bg3{ background:#FDC722;}
    .rank_list .bd .tit{ display:inline-block; width:56%; height:0.2rem; font-size:0.14rem; overflow:hidden; box-sizing:border-box; float:left;}
    .rank_list .bd .num{ width:0.4rem; float:left; text-align:right;}
    .icon_rise, .icon_fall, .icon_fair{ width:0.07rem; height:0.08rem; display:inline-block; background:url(/public/mip/images/arr_icon.gif) no-repeat; margin-right:0.33rem; margin-top:0.05rem; float:left; position:relative; left:0.1rem;}
    .icon_rise{background-position: 0 0;}
    .icon_fall{background-position: 0 -0.08rem;}
    .icon_fair{background-position: 0 -0.16em;}

    .rank_cate_list{ overflow:hidden; zoom:1; padding:0.1rem 0;}
    .rank_cate_list li{ width:50%; height:0.3rem; line-height:0.3rem; font-size:0.14rem; overflow:hidden; float:left; padding-left:0.2rem; box-sizing:border-box;}

    .rank_cate_cont{width:3rem;margin:0 auto; padding:0.1rem 0;}
    .rank_cate_cont .img-box { display: block; width: 3rem;height:1rem;overflow:hidden;background: #8b4848;}
    .rank_cate_cont .big-img {width:2rem; height:1rem;}
    .rank_cate_cont .slogan-box { padding-left: 0.1rem; font-size: 0.11rem; color:#dedede; width:0.9rem;float:right;}
    .rank_cate_cont .slogan-box p { padding-top: 0.1rem;}
    .rank_cate_cont .name { font-size: 0.13rem; color: #fff;}

    .rank_cate_cont .name:after { content: ''; display: block; border-top: 2px solid #b78e8e; width: 0.15rem; }

    .img-link-box { font-size: 0.11rem; margin-top: 0.1rem; overflow:hidden; zoom:1; }
    .img-link-box ul{ width:3.2rem;}
    .img-link-box li{ width:0.95rem; height:1.2rem; float:left; text-align:center; margin:0 0.1rem 0.1rem 0;}

    .img-link-box a { display: block; }

    .img-link-box p { color: #595959; line-height: 0.15rem;}

    .adver{ width:0.95rem; height:0.95rem; }

    .link-box { padding: 0.07rem 0 0.05rem; }



    /*网站地图*/
    .sitemap{ margin-bottom:0.1rem;}
    .sitemap dt{ font-weight:bold;}
    .sitemap dd { display:inline-block; padding-right:0.15rem; font-size:0.12rem;}

    /*404*/
    .error404 img{ width:100%;}
    .error404 .tip_area{text-align:center;}
    .error404 .btn_area{text-align:center;}
    .error404 .pub_btn{display:inline-block;width:29%;height:0.3rem;line-height:0.3rem; background:#FF9900; color:#fff;border-radius:0.03rem;text-align:center;text-decoration:none;font-size:0.14rem;margin-right:0.06rem;margin-left:0.04rem;font-weight:100;}
    .error404 a:hover.pub_btn{ background:#E38800;}
    .error404 .tip_area p{color:#666;font:0.16rem/0.24rem Microsoft YaHei;padding:0.1rem 0 0.1rem 0;}
    .error404 .tip_area font{color:#f30;display:inline-block;font-size:0.2rem;margin-right:0.05rem;}
    .mt10{ margin-top:0.1rem;}

    /*搜索结果*/
    .search_tab{height:0.34rem; margin:0.05rem 0.1rem 0.1rem 0.1rem; border:0.01rem solid #7CBB2F; border-radius:0.05rem; background:#fff; text-align:center;}
    .search_tab li{width:50%; float:left; box-sizing:border-box; line-height:0.34rem; font-size:0.14rem; text-align:center;}
    .search_tab li a{ display:block; color:#7CBB2F; }
    .search_tab li.on { background:#7CBB2F;}
    .search_tab li.on a,.search_tab li.on{color:#fff;}
    .search_tips{ padding:0 0 0.1rem 0.1rem; color:#666;}

    .search_news{ overflow:hidden; zoom:1; border-top:0.1rem solid #DDD; background:#fff; margin-bottom:0.1rem;}
    .search_news li{border-bottom:0.01rem solid #DDD;padding:0.1rem;}
    .search_news li:hover,.search_news li:active{ background:#F6F6F6;}
    .search_news .tit{ font-size:0.15rem;font-weight: bold;}

    .search_news .desc{color: #666;padding-top:0.08rem; padding-bottom:0.1rem; line-height:150%;}

    /*代理*/
    .daili{}
    .daili dl{ padding:0.1rem; border-bottom:0.01rem solid #DDD;}
    .daili dl a{display:block;}
    .daili dl dt{ font-weight:bold; font-size:0.14rem; padding-bottom:0.05rem;}
    .daili dl dd { color:#666; padding-bottom:0.05rem;}
    .daili dl dd.info{ color:#999;}
    .daili dl dd span{ display:inline-block; padding-right:0.1rem;}

    table{ max-width:100% !important;border-collapse:collapse;}
    .tbl{ width:100% !important;border-collapse:collapse;}
    .tbl th,.tbl td{ padding:0.01rem 0.02rem; line-height:2.2em; text-align:center;}
    .tbl th{background:#E73727; font-size:0.14rem; color:#fff; padding:0 0.1rem; height:0.3rem; line-height:0.2rem;}
    .tbl td{ text-align:center; font-size:0.12rem; border:0.01rem solid #C65911 !important; padding:0.05rem;}
    .tbl td span{ white-space:normal !important;}
    .tbl tr:first-child{background:#E73727; color:#fff; font-size:0.14rem; font-weight:bold;}

    .item_intro .bd table{width:100% !important;}

    .Lawpic{ width:1.1rem; height:1.35rem; margin-bottom:0.05rem;}


    /*专题*/
    .zt_list{background:#fff; border-top:0.01rem solid #D6D6D6; border-bottom:0.01rem solid #D6D6D6; overflow:hidden; zoom:1; padding:0.2rem 0 0.1rem; }
    .zt_list li{ float:left; width:50%; margin-bottom:0.05rem;}
    .zt_list .img_show{ width:1.46rem; height:0.85rem; margin:0 auto;}
    .zt_list .img_show img{width:1.46rem; height:0.85rem;}
    .zt_list .tit{ height:0.3rem; line-height:0.3rem; text-align:center;}
    .zt_list .hd{ height:0.44rem; line-height:0.44rem; font-size:0.16rem; font-weight:bold; color:#666; margin-top:-0.2rem; margin-bottom:0.2rem; padding-left:0.1rem; border-bottom:0.01rem solid #EEEEEE; box-sizing:border-box; overflow:hidden; zoom:1;}

    .zt_detail{background:#fff; padding:0.1rem; margin-bottom:0.12rem; border-top:0.01rem solid #ddd; border-bottom:0.01rem solid #ddd;}
    .zt_detail .zt_detail_img{ text-align:center;}
    .zt_detail .zt_detail_img img{ width:100%;}
    .zt_detail .zt_detail_intro{ }
    .zt_detail .zt_detail_intro h1{ font-size:0.18rem; padding:0.1rem 0; color:#666;}
    .zt_detail .zt_detail_intro .zt_detail_cont{ font-size:0.14rem; color:#666; line-height:0.22rem;}
    .pl10{ padding-left:0.1rem;}
    .mb10{ margin-bottom:0.1rem;}

    .hb_btn{ width:0.44rem; height:0.44rem; background:url(/public/mip/images/hb_btn.png) no-repeat; display:block; position:absolute; bottom:-0.05rem; right:0.05rem; background-size:contain;border-radius:50%; border:0.02rem solid rgba(255,255,255,.75); box-shadow: 0 0 0.02rem 0 rgba(75,75,75,.34); text-indent:-9999px; overflow:hidden;}
    .vip_content{ margin-bottom:0.1rem;}


    /*导航*/
    .lxnav{ width:100%; box-sizing: border-box; padding:10px 0; overflow:hidden; background:#fff;}
    .lxnav section{ width:21%; height:4rem; float:left; border-right:0.01rem solid #e1e5e8; overflow-y: scroll;}
    .lxnav section li{ height:0.5rem; line-height:0.5rem; text-align:center; font-size:0.14rem; position:relative; width:100%;}
    .lxnav section li.mip-vd-tabs-nav-selected{ color:#f60;}
    .lxnav section li.mip-vd-tabs-nav-selected i{ width:0.03rem; height:0.5rem; display:block; background:#FF6600; position:absolute; left:0;top:0;}

    .lxnav mip-vd-tabs .mip-vd-tabs-nav{ display:block !important; padding:0;}
    .lxnav mip-vd-tabs .mip-vd-tabs-nav-li{ border-bottom:none;}

    .lxnav .lxnav_cont{ width:78%; height:4rem; float:left; overflow-y:scroll;}
    .lxnav .lxnav_cont ul{ padding-left:2%;}
    .lxnav .lxnav_cont li{ float:left; width:20%; padding:2%; text-align:center; font-size:0.14rem; height:0.77rem; overflow:hidden;}
    .lxnav .lxnav_cont li a{ color:#999;}
    .lxnav .lxnav_cont li img{ width:100%;}
    .lxnav .lxnav_cont li span{display:block; height:0.25rem; line-height:0.25rem; overflow:hidden;}
    .lxnav_mask{ display:block;background-color:rgba(0,0,0,0.5); width:100%; position:absolute; left:0; top:0.4rem; z-index:99998;}

    /* 意见反馈 */
    .content mip-form div{display: block; color: #666;font-size:0.12rem;text-align: left;padding:0;}
    div.input_item{vertical-align:top;}
    div.input_item span{line-height:28px;}
    div.input_item a{color:#3161AC;text-decoration:underline ;}
    div.input_item span.fe_notice{font-size:12px;color:#ff0000;}
    div.input_item label input,div.input_item label select{height:25px;margin-top:3px;padding:0px 5px;line-height:25px;font-size:13px;border: 1px solid #bbbbbb;}
    div.input_item label select{padding:0px;}
    div.input_item label input[type="radio"],div.input_item label input[type="checkbox"]{vertical-align:middle; margin-top:0;margin-right:3px;border:none}
    div.input_item label input[type="text"],div.input_item label input[type="password"],div.input_item label input[type="file"]{
        width:65%;
    }
    div.input_item textarea{margin:4px 0px;width:96%;height:85px;font-size:13px;line-height:16px; padding:5px;}
    div.input_item label{margin-right:10px;height:28px;font-size:12px;}
    div.input_item_level_1 > div.fi_title{display:none;font-size:15px;font-weight:bold;border-bottom: 4px solid #E17009;line-height:32px;color:#E17009;margin-bottom:5px;}

    div.input_item_level_2{min-height:45px;_height:45px;}

    div.input_item_level_2  div.fi_title,div.input_item_level_2  div.fe_title{
        float:left;width:70px;display:block;
        line-height:28px;font-size:13px;text-align:left;padding-right:5px;letter-spacing:2px;color:#333333
    }
    div.input_item_level_2 div.fi_desc,div.input_item_level_2 div.fe_desc{line-height:25px;font-size:12px;color:#999999;padding-left: 80px;}
    div.input_item_level_2 div.fi_content,div.input_item_level_2 div.fe_content{
        margin:0px;width:auto;font-size:12px;
    }

    div.input_item_level_3,div.input_item_level_4{min-height:30px;*height:30px;line-height:28px;}
    div.input_item_level_3  div.fi_title,div.input_item_level_3  div.fe_title,div.input_item_level_4  div.fi_title,div.input_item_level_4  div.fe_title{
        float:left;line-height:28px;font-size:12px;text-align:right;padding-right:5px;color:#b0b0f0
    }
    div.input_item_level_3  div.fi_desc,div.input_item_level_3  div.fe_desc,div.input_item_level_4  div.fi_desc,div.input_item_level_4  div.fe_desc{
        float:right;width:180px;padding:0px 10px;
    }
    div.input_item_level_3  div.fi_content,div.input_item_level_3  div.fe_content,div.input_item_level_4  div.fi_content,div.input_item_level_4  div.fe_content{
        width:auto;
    }

    div.valid_code_img{padding-left: 80px;}

    div.feedback div.fe_title, div.feedback-content div.fe_title{width: 0px; padding-right: 0px;}
    div.feedback div.fe_content label {display: block;}
    div.feedback div.fe_content label input{vertical-align:middle; margin-top:0; margin-right:3px; border:none;}
    div.feedback-submit div.fe_content label input{margin-left: 80px; margin-top: 10px;}
    .fe_content .btn{ width:100px; height:30px; line-height:30px;}

    @media  screen and (min-width:320px) and (max-width:359px){
        html{font-size:100px;}
    }
    @media  screen and (min-width:360px) and (max-width:374px){
        html{font-size:112.5px;}
    }
    @media  screen and (min-width:375px) and (max-width:385px){
        html{font-size:117.188px;}
    }
    @media  screen and (min-width:386px) and (max-width:392px){
        html{font-size:120.625px;}
    }
    @media  screen and (min-width:393px) and (max-width:400px){
        html{font-size:122.813px;}
    }
    @media  screen and (min-width:401px) and (max-width:413px){
        html{font-size:125.313px;}
    }
    @media  screen and (min-width:414px) and (max-width:639px){
        html{font-size:129.375px;}
    }
    @media  screen and (min-width:640px){
        html{font-size:200px;}
    }

    .zxNavBarcon {        height: .5rem;        width: 100%;    }
    .zxNavBarcon .zxHdImgcons {        background: #fff;        width: 55.9999%;        height: .5rem;        float: left;        -webkit-appearance:none;        border:0;    }
    .zxNavBarcon .zxHdImgcons .zxHdImg {        width: .4rem;        height: .4rem;        border-radius: 50%;        border: 1px solid #dcdcdc;        float: left;    }
    .zxNavBarcon .zxHdImgcons .zxHdImg img {        width: .3rem;        height: .3rem;        border-radius: 50%;    }
    .zxHdName {        float: left;    }
    .zxNavBarcon .zxHdImgcons .zxHdName-peo {        text-align: left;        color: #000;        padding-left: 0.13333333rem;        color: red;        font-size: .13rem;        font-weight: bold;    }
    .zxNavBarcon .zxHdImgcons p {        text-align: left;        font-size: 0.13rem;        line-height: 0.20rem;        float: left;        color: #999;        margin-top: 0.03rem;    }
    .zxNavBarcon .zxHdImgcons p span {        display: block;        text-align: center;        border: 1px solid #d80000;        height: 0.20rem;        line-height: 0.20rem;        width: .4rem;        color: #d80000;        float: right;        margin-left: 0.1rem;        font-size: .1rem;    }
    .zxNavBarcon .mfcall, .zxNavBarcon .mfcsain {        width: 22%;        height: 100%;        font-size: 0.12rem;        color: #fff;        text-align: center;        float: left;        background: #D80000;        -webkit-appearance: none;        border: 0;    }
    .zxNavBarcon .mfcsain {        background: #33bd57;    }
    .popup_mask{background-color:rgba(0,0,0,0.5); width:100%; height:100%; }
    .popup{ background:#fff; width:300px; margin:0 auto; position:relative; top:50%; margin-top:-135px; border-radius:5px;}
    .popup .hd{ height:38px; line-height:38px; background:#D71318; color:#fff; position:relative; border-radius:5px 5px 0 0;}
    .popup .hd .tit{ font-size:16px; padding-left:16px;}
    .popup .hd em{ font-size:12px;}
    .popup .hd .popup_close{ width:20px; height:20px; overflow:hidden; text-indent:-9999px; background:url(/mobile/images/popup_close.png) no-repeat; background-size:contain; position:absolute; top:9px; right:10px;}
    .popup .bd{ width:270px; margin:0 auto; padding:15px 0 }
    .popup .bd li{ padding-bottom:8px; overflow:hidden; zoom:1; position:relative;}
    .popup .bd .label{ position:absolute; left:8px; top:8px;}
    .popup .bd .input_bk{ border:1px solid #D6D6D6; padding-left:47px; width:100%; height:35px; line-height:35px; border-radius:3px; box-sizing:border-box;}
    .popup .bd .textarea_bk{ border:1px solid #D6D6D6; width:100%; height:60px; line-height:24px; padding:5px 5px 5px 47px; border-radius:3px; box-sizing:border-box;}
    .popup .bd .btn{ height:35px; line-height:35px; text-align:center; width:100%; background:#D71318; border-radius:3px; color:#fff; border:none;}
    .popup .bd .btn:hover,.popup .bd .btn:active{ background:#B01F24;}
    .lastCeng{width: 74%;margin-left: 13%;background:#fff;height: 260px;margin-top: 29%;opacity: 0.2;border-radius: 16px;z-index:20000;}
    .cengcon{position: relative;}
    .CengBox{width: 70%;margin-left: 15%;background:#fff;margin-top: 30%;height: 247px;border-radius: 12px;z-index:20001; position: relative;}
    .CengBox .money{display: block;position: absolute;top: -4px;left: -5px;width: 65px;height: 65px;}
    .CengBox .top1{height: 60px;line-height: 78px;text-align: center;color: #333333;font-size: 18px;	}
    .CengBox .top2{height: 13px;line-height: 13px;color: #666666;text-align: center;font-size: 12px;}
    .modalbox input{line-height: 40px; border:solid 1px  #c0c5cb; border-radius: 3px; width: 86%; margin-left: 6%; margin-bottom: 10px; padding-left: 40px; font-size: 12px !important; box-sizing: border-box;}
    .modalbox input::placeholder{line-height: 40px; font-size:12px !important; }
    .modalbox input:nth-child(1){background: url(/mobile/images/tell_03.png) no-repeat 10px center;background-size: 26px 18px;}
    .modalbox input:nth-child(2){background: url(/mobile/images/useName_01.png) no-repeat 10px center;background-size: 26px 18px;}
    .CengBox .sure{width: 88%;  border:none;height: 40px;  margin-left:6%; background: #e44b46;text-align: center;line-height: 40px;  color: #fff;font-size: 14px;border-radius:4px;}
    .popup_close{position: absolute;width:20px; height:20px; overflow:hidden; text-indent:-9999px; background:url(/mobile/images/popup_close.png) no-repeat; background-size:contain;  top:9px; right:10px;}
    .sexNa{background: none!important;}
    .CengBox p{font-family:'微软雅黑';}
    #fengex{margin:0 3px; color: #ccc;}
    #mobile_UNM{border:none;outline: none;}
    #brand_name_UNM{color: #e44b46;}
    .lightbox{height: 100%}
    /*@media  only screen and (min-width:100px)and (max-width:320px) {
    .focus{height:150px;}
    }
    @media  only screen and (min-width:321px)and (max-width:360px) {
    .focus{height:168px;}
    .nav a{ padding:0 3.4%;}
    }
    @media  only screen and (min-width: 361px) and (max-width:400px) {
    .focus{height:180px;}
    .nav a{ padding:0 3.6%;}
    .rank_list .hd .hd_name,.rank_list .bd .tit{width:60%;}
    }

    @media  only screen and (min-width: 401px) and (max-width: 479px) {
    .focus{height:195px;}
    .nav a{ padding:0 4%;}
    .rank_list .hd .hd_name,.rank_list .bd .tit{width:62%;}
    }

    @media  only screen and (min-width: 480px) {
    .focus{height:20.1rem;}
    .nav a{ padding:0 5%;}
    .rank_list .hd .hd_name,.rank_list .bd .tit{width:68%;}
    }

    @media  only screen and (min-width:1024px) {

    .focus{height:300px;}
    .nav a{ padding:0 7%;}
    .index_nav{padding:15px 0;}
    .index_nav a em{width:80px;height:80px; margin-bottom:5px; background-size:80px auto; }
    .index_nav .icon1 em{background:url(/public/mip/images/nav_icon.png) 0 0 no-repeat; background-size:80px auto;}
    .index_nav .icon2 em{background:url(/public/mip/images/nav_icon.png) 0 -80px no-repeat; background-size:80px auto;}
    .index_nav .icon3 em{background:url(/public/mip/images/nav_icon.png) 0 -160px no-repeat; background-size:80px auto;}
    .index_nav .icon4 em{background:url(/public/mip/images/nav_icon.png) 0 -240px no-repeat; background-size:80px auto;}
    .index_nav .icon5 em{background:url(/public/mip/images/nav_icon.png) 0 -320px no-repeat; background-size:80px auto;}
    .index_nav .icon6 em{background:url(/public/mip/images/nav_icon.png) 0 -400px no-repeat; background-size:80px auto;}
    .index_nav .icon7 em{background:url(/public/mip/images/nav_icon.png) 0 -480px no-repeat; background-size:80px auto;}
    .index_nav .icon8 em{background:url(/public/mip/images/nav_icon.png) 0 -560px no-repeat; background-size:80px auto;}
    .index_nav .icon9 em{background:url(/public/mip/images/nav_icon.png) 0 -640px no-repeat; background-size:80px auto;}
    .index_nav .icon10 em{background:url(/public/mip/images/nav_icon.png) 0 -720px no-repeat; background-size:80px auto;}
    .index_nav .icon11 em{background:url(/public/mip/images/nav_icon.png) 0 -800px no-repeat; background-size:80px auto;}
    .index_nav .icon12 em{background:url(/public/mip/images/nav_icon.png) 0 -880px no-repeat; background-size:80px auto;}
    .index_nav .icon13 em{background:url(/public/mip/images/nav_icon.png) 0 -960px no-repeat; background-size:80px auto;}
    .index_nav .icon14 em{background:url(/public/mip/images/nav_icon.png) 0 -1040px no-repeat; background-size:80px auto;}
    .index_nav .icon15 em{background:url(/public/mip/images/nav_icon.png) 0 -1120px no-repeat; background-size:80px auto;}
    .index_nav .icon16 em{background:url(/public/mip/images/nav_icon.png) 0 -1200px no-repeat; background-size:80px auto;}
    .index_nav .icon17 em{background:url(/public/mip/images/nav_icon.png) 0 -1280px no-repeat; background-size:80px auto;}
    .index_nav .icon18 em{background:url(/public/mip/images/nav_icon.png) 0 -1360px no-repeat; background-size:80px auto;}

    .index_item .bd .btn i{max-width:200px;}

    .rank_list .hd .hd_name,.rank_list .bd .tit{width:76%;}

    .zt_list li{width:33.33%;}

    .hb_btn{ width:88px; height:88px;}
    }*/
    .pages{padding:0.2rem 0; background:#fff; color:#666666;text-align:center;*zoom:1; margin-bottom:0.1rem;border-bottom:0.01rem solid #D6D6D6; }
    .pages:after{content:".";display:block;height:0;clear:both;visibility:hidden;line-height:0;font-size:0;}
    .pagination {text-align: center;}
    .pagination li {border:0.01rem solid #bfbfbf;border-radius: 0.18em;color: #000;display: inline-block; height:0.2rem; line-height:0.2rem; margin-right: 0.2em;overflow: hidden;}
    .pagination li.active {background: #e63726 none repeat scroll 0 0;border-color: #f00; color: #fff;}
    .pagination li.current {background-color: #e63726;}
    .pagination li a {display: block; padding:0 0.05rem;}
    .pagination li select{ border:none; height:0.3rem; padding:0 0.3rem; line-height:0.3rem; text-align:center;}
    .pagination .disabled span{ color:#999;padding:0 0.05rem;}
</style>