@extends('frontend.frontend')
@section('title'){{config('app.webname')}}@stop
@section('keywords'){{config('app.keywords')}}@stop
@section('description'){{config('app.description')}}@stop
@section('headlibs')
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('https://www.','https://m.',config('app.url'))}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('https://www.','https://m.',config('app.url'))}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('https://www.','https://m.',config('app.url'))}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('https://www.','https://m.',config('app.url'))}}" >
    <link rel="canonical" href="{{config('app.url')}}{{Request::getrequesturi()}}"/>
@stop
@section('main_content')
    <div class="mainbox">
        <!--中间部分 开始-->
        <div class="picbox">
            <!--幻灯片 开始-->
            <div class="focusBox">
                <div class="bd">
                    <ul>
                        <li><a href="/xiangmu/2005136.html"><img src="https://www.u88.com/uploads/picture/27/f7/9f58dbbab7c7ba9b665073d672c6.jpg" /></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2021495.html"><img src="https://www.u88.com/uploads/picture/5f/f4//5ff4273677f0ad180502393abd7c8783.jpeg" /></a></li>
                        <li><a href="/xiangmu/1013307.html"><img src="https://www.u88.com/uploads/picture/14/ee//14ee65afa8c05874e7df894dc8cdeed2.jpeg" /></a></li>
                        <li><a href="/xiangmu/2019091.html"><img src="https://www.u88.com/uploads/picture/59/e1//59e1c93f4d751826b1c203fcd4c7b331.png" /></a></li>
                    </ul>
                </div>
                <ul class="hd">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <a class="prev" href="javascript:void(0)"></a> <a class="next" href="javascript:void(0)"></a>
            </div>
            <!--幻灯片 结束-->

            <div class="renwu">
                <div class="hd">
                    <span class="tit">金牌品牌专区</span>
                    <span class="txt">
										<a href="https://www.u88.com/xiangmu/2004745.html" target="_blank">一扫光零食</a>
										<a href="https://www.u88.com/xiangmu/2005136.html" target="_blank">UCC国际洗衣</a>
										<a href="https://www.u88.com/xiangmu/2002845.html" target="_blank">正新鸡排</a>
										<a href="https://www.u88.com/xiangmu/6137.html" target="_blank">嘟可茶饮</a>
										<a href="https://www.u88.com/xiangmu/2019091.html" target="_blank">一点点奶茶</a>
									</span>
                </div>
                <div class="bd">
                    <ul>
                        <li><a href="https://www.u88.com/xiangmu/2021495.html" target="_blank" title="UBTV小主播"><img src="https://www.u88.com/uploads/picture/41/79/3b8e1449a650248e4afb28e92de6.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/8479.html" target="_blank" title="爱亲母婴"><img src="https://www.u88.com/uploads/picture/ed/f3/def4b50f933da34b4db75aeb1496.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2019779.html" target="_blank" title="91汇融网"><img src="https://www.u88.com/uploads/picture/b2/7b/1aa916c54ca592af57dfb40e9cc5.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2004969.html" target="_blank" title="法式皇家烘焙"><img src="https://www.u88.com/uploads/picture/fa/a4/18576e6494db0d462fbd5db0aed7.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2002805.html" target="_blank" title="百年龙袍汤包"><img src="https://www.u88.com/uploads/picture/f2/b8/268a47e72a4d8b88410eec70dcbd.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2009556.html" target="_blank" title="探炉烤鱼"><img src="https://www.u88.com/uploads/picture/91/31/ec9dd3d2293af0a5842a2a06c1ff.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2018824.html" target="_blank" title="老艾堂艾灸"><img src="https://www.u88.com/uploads/picture/5c/a1/78bf965a80a7a196650c0c8fd63c.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2021123.html" target="_blank" title="泡面小食堂"><img src="https://www.u88.com/uploads/picture/c8/a5/57c415f5a3ce64c2581db1bec180.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/4723.html" target="_blank" title="金色摇篮幼教"><img src="https://www.u88.com/uploads/picture/f5/d1/36e0e06de9174a498bdace2a453c.jpg"></a></li>
                        <li><a href="https://www.u88.com/xiangmu/2022388.html" target="_blank" title="百草堂药店"><img src="https://www.u88.com/uploads/picture/e6/1a/c54dc68eba4b7d723cd89636236f.jpg"></a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!--中间部分 结束-->

        <div class="sumbox">
            <div class="sum_top">
                <div class="hd">
                    <ul>
                        <li>新加盟项目</li>
                        <li>热门商机资讯</li>
                    </ul>
                </div>
                <div class="bd">
                    <ul class="two_col">
                        @foreach($latestbrands as $latestbrand)
                            <li><a href="/xiangmu/{{$latestbrand->id}}.html" target="_blank" title="{{$latestbrand->brandname}}">{{$latestbrand->brandname}}</a></li>
                        @endforeach
                    </ul>
                    <ul>
                        @foreach($latestbrandnews as $latestbrandnew)
                        <li><a href="/article/{{$latestbrandnew->id}}.html" target="_blank" title="{{$latestbrandnew->title}}">{{$latestbrandnew->title}}</a></li>
                       @endforeach
                    </ul>
                </div>
            </div>


            <div class="sum_searcher">
                <div class="price">
                    <span class="money">金额</span>
                    <a href="/xiangmu/0_1/" title="0-1万">0-1万</a>
                    <a href="/xiangmu/1_5/" title="1-5万">1-5万</a>
                    <a href="/xiangmu/10_20/" title="10-20万">10-20万</a>
                    <a href="/xiangmu/20_50/" title="20-50万">20-50万</a>
                    <a href="/xiangmu/50_100/" title="50-100万">50-100万</a>
                    <a href="/xiangmu/100/" title="100万以上">100万以上</a>
                </div>

                <div class="area">
                    <span class="opportunity">地区</span>
                    <a href="/xiangmu/beijingzxs/">北京</a>
                    <a href="/xiangmu/tianjinzxs/">天津</a>
                    <a href="/xiangmu/hebei/">河北</a>
                    <a href="/xiangmu/shanxi/">山西</a>
                    <a href="/xiangmu/neimenggu/">内蒙</a>
                    <a href="/xiangmu/liaoning/">辽宁</a>
                    <a href="/xiangmu/jilinshen/">吉林</a>
                    <a href="/xiangmu/heilongjiang/">黑龙</a>
                    <a href="/xiangmu/shanghaizxs/">上海</a>
                    <a href="/xiangmu/jiangsu/">江苏</a>
                    <a href="/xiangmu/zhejiang/">浙江</a>
                    <a href="/xiangmu/anhui/">安徽</a>
                    <a href="/xiangmu/fujian/">福建</a>
                    <a href="/xiangmu/jiangxi/">江西</a>
                    <a href="/xiangmu/shandong/">山东</a>
                </div>

                <div class="bd">
                    <form name="project_search" action="" id="index_search_form">
                        <div class="right-searcher-one">
                            <input class="icon-right-searcher-submit" onclick="location.href='/xiangmu/'" type="button" value="项目搜索" />
                            <a href="/xiangmu/" target="_blank">快速进入&gt;&gt;</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--第一部分 结束-->
    <!--广告位 开始-->
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/2005136.html"><img src="https://www.u88.com/uploads/picture/c7/42//c742e2b9f40f68c13088d17df3bff50a.gif" /></a></div>
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/2004745.html"><img src="https://www.u88.com/uploads/picture/44/ae//44ae227db6478c27b03d625cac67944e.jpeg" /></a></div>
    <div class="brannd_597x60">
        <ul>
            <li><a href="https://www.u88.com/xiangmu/2018824.html"><img src="https://www.u88.com/uploads/picture/d0/84//d084d7daefc73ee1ee29889239675279.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2009706.html"><img src="https://www.u88.com/uploads/picture/a5/42/7153168e61a7df4ff616c81a7c31.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2021495.html"><img src="https://www.u88.com/uploads/picture/31/13//3113a8af72ee4040dbf179026b5287b4.jpeg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2002805.html"><img src="https://www.u88.com/uploads/picture/92/2c/a5ec2e2b21e57a5f809dca99b72d.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2003275.html"><img src="https://www.u88.com/uploads/picture/13/dc/1e1d77655f1b43d963eb53a7786a.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/4723.html"><img src="https://www.u88.com/uploads/picture/1b/f8//1bf817cae100cf17f0675395f351e64e.jpeg" /></a></li>
        </ul>
    </div>
    <div class="brannd_295x60">
        <ul>
            <li><a href="https://www.u88.com/xiangmu/2006763.html"><img src="https://www.u88.com/uploads/picture/58/05/15b54326a50348463ba3baf4489d.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2005153.html"><img src="https://www.u88.com/uploads/picture/b9/84/3102e18b67b6b3c7f630f6ff7eee.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2019728.html"><img src="https://www.u88.com/uploads/picture/80/73/9dfad1356288c9294f752bf72bcd.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2004790.html"><img src="https://www.u88.com/uploads/picture/7a/c6/75fbab39af47ce715a4de51cd374.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2021617.html"><img src="https://www.u88.com/uploads/picture/2d/ac/95ee77939e5dc96c69206ef735b8.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2002995.html"><img src="https://www.u88.com/uploads/picture/92/cd/385022364d0b322396ea1184ae00.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2003416.html"><img src="https://www.u88.com/uploads/picture/36/99/923cbdc0c8144fc35b7b7e96dc29.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/1013307.html"><img src="https://www.u88.com/uploads/picture/ac/a8//aca8133f22e29a04cfff208cd9813ae7.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2017762.html"><img src="https://www.u88.com/uploads/picture/0b/ad/453764920a9359817c68ad4a184d.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2008872.html"><img src="https://www.u88.com/uploads/picture/4f/9d/1f03c0de4a0ec50b67a430b1ae70.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2011695.html"><img src="https://www.u88.com/uploads/picture/2f/65/03f8ff1a03ac25f7f749a27f6ab8.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2011671.html"><img src="https://www.u88.com/uploads/picture/84/f7/d342aa3eca8dbc0246028699cb73.jpg" /></a></li>
        </ul>
    </div>
    <!--广告位 结束-->
    <!--第二部分 开始-->
    <div class="mainbox">
        <!--行业分类 开始-->
        <div class="fldh">
            <div class="common_tit">
                <h2>行业分类</h2>
                <div class="r_money">
                    <a href="/xiangmu/0_1/">0-1万 &nbsp;/&nbsp; </a>
                    <a href="/xiangmu/1_5/">1-5万 &nbsp;/&nbsp; </a>
                    <a href="/xiangmu/5_10/">5-10万 &nbsp;/&nbsp; </a>
                    <a href="/xiangmu/10_20/">10-20万 &nbsp;/&nbsp; </a>
                    <a href="/xiangmu/20_50/">20-50万 &nbsp;/&nbsp; </a>
                    <a href="/xiangmu/50_100/">50-100万 &nbsp;/&nbsp; </a>
                    <a href="/xiangmu/100/">100万以上 &nbsp;/&nbsp; </a>
                </div>
                <div class="top_1200"></div>
            </div>
            <div class="bd">
                <ul>
                    <li>
                        <a href="/canyin/" class="tit">[餐饮加盟]</a>
                        <span class="cont">
												<a href="/huoguo/">火锅加盟</a>
												<a href="/kaoyu/">烤鱼加盟</a>
												<a href="/shaokao/">烧烤加盟</a>
												<a href="/hanbao/">汉堡加盟</a>
												<a href="/malatang/">麻辣烫加盟</a>
												<a href="/suancaiyu/">酸菜鱼加盟</a>
												<a href="/tianpin/">甜品店加盟</a>
												<a href="/zhajidian/">炸鸡店加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/chayin/" class="tit">[茶饮加盟]</a>
                        <span class="cont">
												<a href="/naicha/">奶茶加盟</a>
												<a href="/yinpin/">饮品加盟</a>
												<a href="/bingqilin/">冰淇淋加盟</a>
												<a href="/chaguan/">茶馆加盟</a>
												<a href="/baobing/">刨冰加盟</a>
												<a href="/guozhi/">果汁加盟</a>
												<a href="/chaosuannai/">炒酸奶加盟</a>
												<a href="/tangshui/">糖水加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/jiaoyu/" class="tit">[教育培训]</a>
                        <span class="cont">
												<a href="/fudaoban/">辅导班加盟</a>
												<a href="/xueshengyongpin/">学生用品加盟</a>
												<a href="/zaojiao/">早教加盟</a>
												<a href="/yingyupeixun/">英语培训</a>
												<a href="/diannaopeixun/">电脑培训</a>
												<a href="/qiannengpeixun/">潜能培训</a>
												<a href="/tiyuyongpin/">体育用品加盟</a>
												<a href="/jiqirenjiaoyu/">机器人教育加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/meirong/" class="tit">[美容加盟]</a>
                        <span class="cont">
												<a href="/meirongyuan/">美容院加盟</a>
												<a href="/meiti/">美体加盟</a>
												<a href="/huazhuangpin/">化妆品加盟</a>
												<a href="/jianfei/">减肥加盟</a>
												<a href="/qubanqudou/">祛斑祛痘加盟</a>
												<a href="/caizhuang/">彩妆加盟</a>
												<a href="/meifa/">美容美发加盟</a>
												<a href="/hufupin/">护肤品加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/jiajujiameng/" class="tit">[家居加盟]</a>
                        <span class="cont">
												<a href="/jiajujiameng_sub/">智能家居</a>
												<a href="/jiafang/">家纺加盟</a>
												<a href="/jiaju/">家具加盟</a>
												<a href="/shenghuoguan/">生活馆加盟</a>
												<a href="/jiajuzhuangshi/">家居装饰</a>
												<a href="/jichengzao/">集成灶加盟</a>
												<a href="/jienengdeng/">节能灯加盟</a>
												<a href="/zhengtichufang/">整体厨房</a>
											</span>
                    </li>
                    <li>
                        <a href="/lingshou/" class="tit">[零售加盟]</a>
                        <span class="cont">
												<a href="/guoshuliansuo/">蔬菜店加盟</a>
												<a href="/qiaokeli/">巧克力加盟</a>
												<a href="/ganhuo/">干货加盟店</a>
												<a href="/diannao/">电脑加盟</a>
												<a href="/baojianjiu/">保健酒加盟</a>
												<a href="/jingpindian/">精品店加盟</a>
												<a href="/weishengjin/">卫生巾加盟</a>
												<a href="/chaye/">茶叶加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/fuwu/" class="tit">[生活服务]</a>
                        <span class="cont">
												<a href="/sheying/">婚纱摄影加盟</a>
												<a href="/ganxi/">干洗加盟</a>
												<a href="/jinronggongsi/">金融公司加盟</a>
												<a href="/wuliu/">物流加盟</a>
												<a href="/huadian/">花店加盟</a>
												<a href="/caxiedian/">擦鞋店加盟</a>
												<a href="/xixiedian/">洗鞋店加盟</a>
												<a href="/lipin/">礼品加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/huanbaojm/" class="tit">[环保加盟]</a>
                        <span class="cont">
												<a href="/huanbao/">环保项目</a>
												<a href="/chujiaquan/">除甲醛加盟</a>
												<a href="/kongqijinghua/">空气净化加盟</a>
												<a href="/nengyuan/">能源项目</a>
												<a href="/taiyangneng/">太阳能加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/yingyouer/" class="tit">[母婴幼儿]</a>
                        <span class="cont">
												<a href="/yingyouer_sub/">婴幼儿用品加盟</a>
												<a href="/yuezizhongxin/">月子中心加盟</a>
												<a href="/muying/">母婴用品加盟</a>
												<a href="/wanju/">玩具加盟</a>
												<a href="/naifen/">奶粉加盟</a>
												<a href="/tongche/">童车加盟</a>
												<a href="/youyongguan/">婴幼儿游泳馆加盟</a>
												<a href="/ertongleyuan/">儿童乐园加盟</a>
											</span>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="/qiche/" class="tit">[汽车项目]</a>
                        <span class="cont">
												<a href="/qiche_sub/">汽车项目</a>
												<a href="/qicheyongpin/">汽车用品加盟</a>
												<a href="/qichemeirong/">汽车美容</a>
												<a href="/qichezhuangshi/">汽车装饰</a>
												<a href="/jieyouqi/">节油器</a>
												<a href="/runhuayou/">润滑油加盟</a>
												<a href="/diandongche/">电动车加盟</a>
												<a href="/xiche/">洗车加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/baojian/" class="tit">[保健加盟]</a>
                        <span class="cont">
												<a href="/baojian_sub/">保健加盟</a>
												<a href="/jiyin/">基因检测</a>
												<a href="/jianshen/">健身加盟</a>
												<a href="/spa/">spa加盟</a>
												<a href="/yangfaguan/">养发馆加盟</a>
												<a href="/baojianpin/">保健品加盟</a>
												<a href="/yangshengbaojian/">养生馆加盟</a>
												<a href="/hanzhengfang/">汗蒸房加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/jiancai/" class="tit">[建材加盟]</a>
                        <span class="cont">
												<a href="/jiancai_sub/">五金建材</a>
												<a href="/shuilongtou/">电热水龙头</a>
												<a href="/beijingqiang/">背景墙加盟</a>
												<a href="/yetibizhi/">液体壁纸</a>
												<a href="/mumen/">木门加盟</a>
												<a href="/diaoding/">吊顶加盟</a>
												<a href="/qiangzhi/">墙纸加盟</a>
												<a href="/diban/">地板加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/fuzhuang/" class="tit">[服装加盟]</a>
                        <span class="cont">
												<a href="/fuzhuang_sub/">品牌服装</a>
												<a href="/niuzai/">牛仔加盟</a>
												<a href="/nvbao/">女包加盟</a>
												<a href="/tongzhuang/">童装加盟</a>
												<a href="/nvzhuang/">女装加盟</a>
												<a href="/neiyi/">内衣加盟</a>
												<a href="/nanzhuang/">男装加盟</a>
												<a href="/yundongzhuang/">运动服装</a>
											</span>
                    </li>
                    <li>
                        <a href="/zhubao/" class="tit">[珠宝加盟]</a>
                        <span class="cont">
												<a href="/zhubao_sub/">珠宝加盟</a>
												<a href="/zuanshi/">钻石加盟</a>
												<a href="/yuqi/">玉器加盟</a>
												<a href="/huangjin/">黄金首饰</a>
												<a href="/shuijing/">水晶加盟</a>
												<a href="/shechipin/">奢侈品加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/yule/" class="tit">[休闲娱乐]</a>
                        <span class="cont">
												<a href="/yingyuan/">影院加盟</a>
												<a href="/vr/">vr体验馆加盟</a>
												<a href="/ktv/">ktv加盟</a>
												<a href="/jiuba/">酒吧加盟</a>
												<a href="/diaoju/">钓具加盟</a>
												<a href="/wangba/">网吧加盟</a>
												<a href="/dongman/">动漫加盟</a>
												<a href="/youxi/">游戏加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/nongcunzhifu/" class="tit">[农村致富]</a>
                        <span class="cont">
												<a href="/nongcunzhifu_sub/">农村致富项目</a>
												<a href="/zhongzhi/">种植项目</a>
												<a href="/shipinjiagong/">食品加工</a>
												<a href="/yangzhi/">养殖项目</a>
												<a href="/nongcunhaoxiangmu/">农村好项目</a>
												<a href="/tezhongyangzhi/">特种养殖项目</a>
												<a href="/dahuoji/">打火机加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/wujin/" class="tit">[五金加盟]</a>
                        <span class="cont">
												<a href="/wujin_sub/">五金加盟</a>
												<a href="/wujingongju/">五金工具</a>
												<a href="/riyongwujin/">日用五金</a>
												<a href="/jianzhuwujin/">建筑五金</a>
												<a href="/jixiewujin/">机械五金</a>
												<a href="/wujindian/">五金店加盟</a>
												<a href="/mensuo/">门锁加盟</a>
											</span>
                    </li>
                    <li>
                        <a href="/shipin/" class="tit">[饰品加盟]</a>
                        <span class="cont">
												<a href="/shipin_sub/">饰品加盟</a>
												<a href="/qinglvshipin/">情侣饰品</a>
												<a href="/gongyipin/">工艺品加盟</a>
												<a href="/jingpinshipin/">精品饰品</a>
												<a href="/yinshi/">银饰加盟</a>
												<a href="/jiajushipin/">家居饰品</a>
												<a href="/nvxingshipin/">女性饰品</a>
												<a href="/minzushipin/">民族饰品</a>
											</span>
                    </li>
                </ul>
            </div>
        </div>

        <!--行业分类 结束-->

        <div class="hot_message">
            <div class="common_tit">
                <h2 class="co">加盟排行榜</h2>
                <div class="top_xian"></div>
            </div>
            <div class="boutique_list">
                <ul>
                    @foreach($paihangbrands as $index=>$paihangbrand)
                        <li class="@if($index <3) top @endif  @if($loop->first)hover @endif  ">
                        <i class="num">{{$index+1}}</i>
                        <span class="name">
						<a href="/xiangmu/{{$paihangbrand->id}}.html" target="_blank" title="{{$paihangbrand->brandname}}">{{$paihangbrand->brandname}}</a>
					</span>
                        <div class="cts">
                            <div class="img">
                                <img src="{{$paihangbrand->litpic}}" alt="" />
                            </div>
                            <div class="center">
                                <p class="info">投资额：
                                    <em>{{$investment_types[$paihangbrand->tzid]}}</em>
                                </p>
                                <p class="info">门店数：{{$paihangbrand->brandnum}}</p>
                                <p class="btn">
                                    <a href="/xiangmu/{{$paihangbrand->id}}.html#msg">立即咨询</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--第二部分 结束-->

    <!--广告位 开始-->
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/2005136.html"><img src="https://www.u88.com/uploads/picture/c7/42/e2b9f40f68c13088d17df3bff50a.gif" /></a></div>
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/2004745.html"><img src="https://www.u88.com/uploads/picture/44/ae/227db6478c27b03d625cac67944e.jpg" /></a></div>
    <div class="brannd_597x60">
        <ul>
            <li><a href="https://www.u88.com/xiangmu/2003631.html"><img src="https://www.u88.com/uploads/picture/35/c9/7767ecb16d13de878e1c69458a9e.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/257.html"><img src="https://www.u88.com/uploads/picture/8a/9b/104fc38ad7839b1283e174306196.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2005136.html"><img src="https://www.u88.com/uploads/picture/99/35/bf1a4bbd16076efee9622378af89.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2018576.html"><img src="https://www.u88.com/uploads/picture/68/b0/e3b145a60dd75eeab07d92db8585.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/5167.html"><img src="https://www.u88.com/uploads/picture/b6/d7/24a256a59e7f28af5a4fbb61d888.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2022304.html"><img src="https://www.u88.com/uploads/picture/11/86/1bb784b1f2b1ffb135a1327fe23c.jpg" /></a></li>
        </ul>
    </div>
    <div class="brannd_295x60">
        <ul>
            <li><a href="https://www.u88.com/xiangmu/1013307.html"><img src="https://www.u88.com/uploads/picture/ac/a8//aca8133f22e29a04cfff208cd9813ae7.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2005299.html"><img src="https://www.u88.com/uploads/picture/6a/d6/273c9e9aae71a077b73e1406335d.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2021572.html"><img src="https://www.u88.com/uploads/picture/ce/cf/e667b750b46a8dfcfda283fb3b6f.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2017182.html"><img src="https://www.u88.com/uploads/picture/76/fa/dd1150b1f0d211f575e5edc9f7ef.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/4813.html"><img src="https://www.u88.com/uploads/picture/c4/a7/b4c3d1b5966e7dd1b6c140d34256.png" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2016840.html"><img src="https://www.u88.com/uploads/picture/48/63/6ac4857afc5ff0eb50bcbe928751.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/4717.html"><img src="https://www.u88.com/uploads/picture/c5/da/83117dec41fc3c2107bbdce1f528.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2004798.html"><img src="https://www.u88.com/uploads/picture/e2/d7/89396fa6ee59127c6a06abd456d9.jpg" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2014443.html"><img src="https://www.u88.com/uploads/picture/ac/5f/226aab853070224f8aa83ccc0e16.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2016677.html"><img src="https://www.u88.com/uploads/picture/a4/5d/13e6325d35813414f4dde19b0d45.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/58753.html"><img src="https://www.u88.com/uploads/picture/fc/6e/c6a3d6646d6695b7bc9d0c400469.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2002805.html"><img src="https://www.u88.com/uploads/picture/fe/aa/3d6d67b76fdc99b3740cc638f005.gif" /></a></li>
        </ul>
    </div>
    <!--广告位 结束-->

    <!--第三部分 开始-->
    <div class="mainbox">
        <!--品牌项目 开始-->
        <div class="item_list">
            <div class="common_tit">
                <h2>品牌项目</h2>
                <div class="top_924"></div>
            </div>
            <div class="item_box">
                <!--品牌幻灯片 开始-->
                <div class="pic_slide" id="js_brand_show">
                    <div class="bd">
                        <ul>
                            <li><a href="https://www.u88.com/xiangmu/2002960.html"><img src="https://www.u88.com/uploads/picture/b1/2c/41aa9c1df274225c9ca2c84c33d8.jpg" alt="若谷草堂" /><span>若谷草堂</span></a></li>
                            <li><a href="https://www.u88.com/xiangmu/2004247.html"><img src="https://www.u88.com/uploads/picture/3f/fa/435e9677c6365c9cbd65c37620fd.jpg" alt="祝博士教育" /><span>祝博士教育</span></a></li>
                            <li><a href="https://www.u88.com/xiangmu/2018173.html"><img src="https://www.u88.com/uploads/picture/82/03/72d933abb11a84213858b29ff342.jpg" alt="十秒不到过桥米线" /><span>十秒不到过桥米线</span></a></li>
                            <li><a href="https://www.u88.com/xiangmu/4717.html"><img src="https://www.u88.com/uploads/picture/1e/60/297a5368f214cddc60a463ed68e2.jpg" alt="万邦教育" /><span>万邦教育</span></a></li>
                        </ul>
                    </div>
                    <div class="hd">
                        <ul>
                            <li><img src="https://www.u88.com/uploads/picture/b1/2c/41aa9c1df274225c9ca2c84c33d8.jpg" alt="若谷草堂" /></li>
                            <li><img src="https://www.u88.com/uploads/picture/3f/fa/435e9677c6365c9cbd65c37620fd.jpg" alt="祝博士教育" /></li>
                            <li><img src="https://www.u88.com/uploads/picture/82/03/72d933abb11a84213858b29ff342.jpg" alt="十秒不到过桥米线" /></li>
                            <li><img src="https://www.u88.com/uploads/picture/1e/60/297a5368f214cddc60a463ed68e2.jpg" alt="万邦教育" /></li>
                        </ul>
                    </div>
                </div>
                <!--品牌幻灯片 结束-->
                <div class="brend_item">
                    <div class="hd">
                        <a class="next"></a><a class="prev"></a>
                    </div>
                    <div class="bd">
                        <ul>
                            <li><a href="https://www.u88.com/xiangmu/2021123.html" tiitle="泡面小食堂">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/dd/03/f886603927a2fd8b0d740c7d3aeb.jpg" width="180" height="135" alt="" /></div>
                                    <span>泡面小食堂</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2017414.html" tiitle="奈雪の茶茶饮">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/ef/bc/424ad59ec2106b65fbaaa67fe732.jpg" width="180" height="135" alt="" /></div>
                                    <span>奈雪の茶茶饮</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2004745.html" tiitle="一扫光零食">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/2a/55/69063d6bfb2260a6c9a5406da43b.jpg" width="180" height="135" alt="" /></div>
                                    <span>一扫光零食</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2003275.html" tiitle="杨铭宇黄焖鸡米饭">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/b0/6f/46331c1fee22f2b0344821815e05.jpg" width="180" height="135" alt="" /></div>
                                    <span>杨铭宇黄焖鸡米饭</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2009556.html" tiitle="探炉烤鱼">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/8e/b3/f169df4ec8f00db3fe8f622733d3.jpg" width="180" height="135" alt="" /></div>
                                    <span>探炉烤鱼</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2002845.html" tiitle="正新鸡排">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/c9/ae/9c7482f5662cf462453193771433.jpg" width="180" height="135" alt="" /></div>
                                    <span>正新鸡排</span>
                                </a></li>
                        </ul>
                        <ul>
                            <li><a href="https://www.u88.com/xiangmu/2021495.html" tiitle="    UBTV小主播">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/96/80/ef1819da274acc13b4178b33f031.jpg" width="180" height="135" alt="" /></div>
                                    <span>    UBTV小主播</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2013674.html" tiitle="童歌母婴">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/ff/ea/04f8dd92ee8871799b8d15c7b54d.jpg" width="180" height="135" alt="" /></div>
                                    <span>童歌母婴</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/8479.html" tiitle="爱亲母婴">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/85/c7/588207734a682bb080521dfd7313.jpg" width="180" height="135" alt="" /></div>
                                    <span>爱亲母婴</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2002805.html" tiitle="百年龙袍汤包">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/72/b4/0b170cdbf54dd4f4553500723bfc.jpg" width="180" height="135" alt="" /></div>
                                    <span>百年龙袍汤包</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/4723.html" tiitle="金色摇篮幼教">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/86/0e/5caf30e5ce461417c7f9755d2e11.jpg" width="180" height="135" alt="" /></div>
                                    <span>金色摇篮幼教</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2018824.html" tiitle="老艾堂艾灸">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/dc/2c/d58505b9119b9a108032f62758bf.jpg" width="180" height="135" alt="" /></div>
                                    <span>老艾堂艾灸</span>
                                </a></li>
                        </ul>
                        <ul>
                            <li><a href="https://www.u88.com/xiangmu/2004969.html" tiitle="法式皇家烘焙">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/aa/dd/d945e05671aa81012e37ba775ecf.jpg" width="180" height="135" alt="" /></div>
                                    <span>法式皇家烘焙</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2017679.html" tiitle="小杨生煎">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/e8/b0/a4451a58492c63eaf81191f956bb.jpg" width="180" height="135" alt="" /></div>
                                    <span>小杨生煎</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2003224.html" tiitle="辉哥火锅">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/39/16/1d1bb43de7b800f53366a3b2bf4f.jpg" width="180" height="135" alt="" /></div>
                                    <span>辉哥火锅</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2019779.html" tiitle="91汇融网">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/ca/3f/d64b55c7adce7f67a19ede4d7e24.jpg" width="180" height="135" alt="" /></div>
                                    <span>91汇融网</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2005136.html" tiitle="探炉烤鱼">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/bd/41/09723d39971055e9011bfabd7272.jpg" width="180" height="135" alt="" /></div>
                                    <span>探炉烤鱼</span>
                                </a></li>
                            <li><a href="https://www.u88.com/xiangmu/2003043.html" tiitle="味千拉面">
                                    <div class="img"><img src="https://www.u88.com/uploads/picture/31/46/639b9650fd468f12c7ed66109909.jpg" width="180" height="135" alt="" /></div>
                                    <span>味千拉面</span>
                                </a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!--品牌项目 结束-->

        <!--最新上榜 开始-->
        <div class="hot_message">
            <div class="common_tit">
                <h2 class="co">最新上榜</h2>
                <div class="top_xian"></div>
            </div>
            <div class="news_brands">
                <ul>
                    @foreach($latestbrand2s as $latestbrand2)
                        <li><a href="/xiangmu/{{$latestbrand2->id}}.html">{{$latestbrand2->brandname}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--第三部分 结束-->
    <!--第二部分 开始-->
    <div class="mainbox">
        <!--热门品牌-->
        <div class="hot_brand">
            <div class="hd">
                <li class="on"><a href="#">热门品牌</a></li>
                <li><a href="#">人气品牌</a></li>
                <li><a href="#">品牌优选</a></li>
            </div>
            <div class="bd">
                <ul>
                    <li><a href="https://www.u88.com/xiangmu/2004745.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/28/89/e543a385fa42f13fec4749beefb1.jpg" alt="一扫光零食" /></div>
                            <span>一扫光零食</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2019091.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/47/9f/ed4f85edbec2f9a9b42dfa8961c5.jpg" alt="一点点奶茶" /></div>
                            <span>一点点奶茶</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2017679.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/34/21/3032f3867c49e9e1b010123d28ab.jpg" alt="小杨生煎" /></div>
                            <span>小杨生煎</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2005632.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/fe/95/28d9dc6a89ffbaed2d14262e0822.jpg" alt="57度湘" /></div>
                            <span>57度湘</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2012519.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/52/fe/cb4d69ae48492f9dbc22f50de39b.png" alt="探鱼季烤鱼" /></div>
                            <span>探鱼季烤鱼</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2009756.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/ec/5f/dbaef1ef3cb27238299ed3972975.jpg" alt="龙潮炭火烤鱼" /></div>
                            <span>龙潮炭火烤鱼</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2006877.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/05/0d/d29b8df53dc1314f077fdca52539.png" alt="韩鱼客烤鱼" /></div>
                            <span>韩鱼客烤鱼</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2002825.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/3b/7a/8214c87f60e80d4da8c0beab2235.jpg" alt="木屋烧烤" /></div>
                            <span>木屋烧烤</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2017392.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/8f/e4/dad356ac0da26a99c9fb90531e1e.png" alt="海底捞火锅" /></div>
                            <span>海底捞火锅</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2019232.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/0f/d1/b2585c179dbd680767bf44995e75.jpg" alt="小肥羊火锅" /></div>
                            <span>小肥羊火锅</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2017395.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/74/1e/b2ae4045053e6c27a4a1f01d91ed.jpg" alt="    呷哺呷哺" /></div>
                            <span>呷哺呷哺</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2003224.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/b8/20/629155da69a27d63a2da3e338753.jpg" alt="辉哥火锅" /></div>
                            <span>辉哥火锅</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/1013307.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/0f/22/5d85ba1c872ddf865e56a58f89ed.jpg" alt="聚能教育" /></div>
                            <span>聚能教育</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2018666.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/b5/9d/9f0308bf82270a47329f2bdbb58a.jpg" alt="巴仑思教育" /></div>
                            <span>巴仑思教育</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2021816.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/16/ac/b47a073fec3f3dce4b0cb07870be.png" alt="校视通教育" /></div>
                            <span>校视通教育</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2020614.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/8a/13/62d83f8c2cd72e186e90fb11e847.jpg" alt="嘟嘟机器人" /></div>
                            <span>嘟嘟机器人</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/8479.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/a4/dc/a0e66bcdd7ce386eb7ea58dd3ee8.jpg" alt="爱亲母婴" /></div>
                            <span>爱亲母婴</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2009556.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/8e/b3/f169df4ec8f00db3fe8f622733d3.jpg" alt="探炉烤鱼" /></div>
                            <span>探炉烤鱼</span>
                        </a></li>
                </ul>
                <ul>
                    <li><a href="https://www.u88.com/xiangmu/2004745.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/28/89/e543a385fa42f13fec4749beefb1.jpg" alt="一扫光零食" /></div>
                            <span>一扫光零食</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2003449.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/7d/bd/99166bcadcae7b1db3980a53b5ff.jpg" alt="乐而美汉堡" /></div>
                            <span>乐而美汉堡</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2020461.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/e6/cf/604faebd1256d7a141770b39e4bd.png" alt="澳贝森干洗" /></div>
                            <span>澳贝森干洗</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2005760.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/0b/25/e267c336e5f36ea739aa39238498.jpg" alt="威特斯洗衣" /></div>
                            <span>威特斯洗衣</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2017414.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/ef/bc/424ad59ec2106b65fbaaa67fe732.jpg" alt="奈雪の茶茶饮" /></div>
                            <span>奈雪の茶茶饮</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/6137.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/75/95/3791d766671ab400e9bcbdac0dc0.jpg" alt="coco奶茶" /></div>
                            <span>coco奶茶</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/448.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/be/63/1b86a02733df35d3f03d7be8db34.jpg" alt="华莱士汉堡" /></div>
                            <span>华莱士汉堡</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2006484.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/64/de/f44f2fce09c2bc9bbf55fe695162.jpg" alt="避风塘茶餐厅" /></div>
                            <span>避风塘茶餐厅</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2015915.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/1e/3e/4fa02ecffbba7803bc556be2fea0.jpg" alt="点都德茶餐厅" /></div>
                            <span>点都德茶餐厅</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2018824.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/70/2b/d623639c0cc2b7b46585a4b8f23f.jpg" alt="老艾堂艾灸" /></div>
                            <span>老艾堂艾灸</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2018595.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/2a/9b/858df190a15968c8308de13a097c.jpg" alt="百年龙袍汤包" /></div>
                            <span>百年龙袍汤包</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2021580.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/d9/e0/34bb8e528e447591888aab9e4372.jpg" alt="路易芬尼美容" /></div>
                            <span>路易芬尼美容</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2009371.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/8e/b3/f169df4ec8f00db3fe8f622733d3.jpg" alt="探炉烤鱼" /></div>
                            <span>探炉烤鱼</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/8479.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/a4/dc/a0e66bcdd7ce386eb7ea58dd3ee8.jpg" alt="爱亲母婴" /></div>
                            <span>爱亲母婴</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/6137.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/75/95/3791d766671ab400e9bcbdac0dc0.jpg" alt="coco奶茶" /></div>
                            <span>coco奶茶</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/448.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/be/63/1b86a02733df35d3f03d7be8db34.jpg" alt="华莱士汉堡" /></div>
                            <span>华莱士汉堡</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2005760.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/0b/25/e267c336e5f36ea739aa39238498.jpg" alt="维特斯洗衣" /></div>
                            <span>维特斯洗衣</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2006484.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/64/de/f44f2fce09c2bc9bbf55fe695162.jpg" alt="避风塘茶餐厅" /></div>
                            <span>避风塘茶餐厅</span>
                        </a></li>
                </ul>
                <ul>
                    <li><a href="https://www.u88.com/xiangmu/2018824.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/70/2b/d623639c0cc2b7b46585a4b8f23f.jpg" alt="老艾堂艾灸" /></div>
                            <span>老艾堂艾灸</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2020614.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/8a/13/62d83f8c2cd72e186e90fb11e847.jpg" alt="嘟嘟机器人" /></div>
                            <span>嘟嘟机器人</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2017411.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/1a/98/67dfb7086724b9b91461f8c869c8.jpg" alt="神州渔哥烤鱼" /></div>
                            <span>神州渔哥烤鱼</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2015915.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/1e/3e/4fa02ecffbba7803bc556be2fea0.jpg" alt="点都德茶餐厅" /></div>
                            <span>点都德茶餐厅</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/98255.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/86/3d/339dbe595fe82ec8bae730a8e905.jpg" alt="洗车王国" /></div>
                            <span>洗车王国</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2021580.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/d9/e0/34bb8e528e447591888aab9e4372.jpg" alt="路易芬尼美容" /></div>
                            <span>路易芬尼美容</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2018666.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/b5/9d/9f0308bf82270a47329f2bdbb58a.jpg" alt="巴伦思教育" /></div>
                            <span>巴伦思教育</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/7157.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/2d/ec/60bbe882ae3780af294352c49454.jpg" alt="百草味零食" /></div>
                            <span>百草味零食</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/98194.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/bd/16/b0db5a21a93031dc16962c357d96.jpg" alt="车爵仕汽车美容" /></div>
                            <span>车爵仕汽车美容</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/1013307.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/0f/22/5d85ba1c872ddf865e56a58f89ed.jpg" alt="聚能教育" /></div>
                            <span>聚能教育</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2002825.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/3b/7a/8214c87f60e80d4da8c0beab2235.jpg" alt="木屋烧烤" /></div>
                            <span>木屋烧烤</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2003224.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/b8/20/629155da69a27d63a2da3e338753.jpg" alt="辉哥火锅" /></div>
                            <span>辉哥火锅</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2007176.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/5f/7f/4431dc82d0cbf3053fddb58ed41d.jpg" alt="我爱我家房产" /></div>
                            <span>我爱我家房产</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2002845.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/c9/ae/9c7482f5662cf462453193771433.jpg" alt="正新鸡排" /></div>
                            <span>正新鸡排</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/7703.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/74/d3/187041b02c094dd42577e1f26621.jpg" alt="皇家圣雪洗衣" /></div>
                            <span>皇家圣雪洗衣</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/8491.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/52/e3/b943cab2e4cf43284a34e576a6c2.jpg" alt="母婴坊" /></div>
                            <span>母婴坊</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2013674.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/ff/ea/04f8dd92ee8871799b8d15c7b54d.jpg" alt="童歌母婴" /></div>
                            <span>童歌母婴</span>
                        </a></li>
                    <li><a href="https://www.u88.com/xiangmu/2021816.html">
                            <div class="img"><img src="https://www.u88.com/uploads/picture/16/ac/b47a073fec3f3dce4b0cb07870be.png" alt="校视通教育" /></div>
                            <span>校视通教育</span>
                        </a></li>
                </ul>
            </div>
        </div>

        <div class="hot_message">
            <div class="common_tit">
                <h2 class="co">品牌新闻</h2>
                <div class="top_xian"></div>
            </div>
            <div class="hot_pinpai" style="height:397px;">
                <ul>
                    @foreach($brandnews as $brandnew)
                    <li><a href="/article/{{$brandnew->id}}.html">{{$brandnew->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--第二部分 结束-->

    <!--第四部分 开始-->
    <div class="mainbox">
        <div class="div-content">
            <div class="hd">
                <ul>
                    <li class="on"><a href="/xiangmu/">综合</a></li>
                    <li><a href="/canyin/">餐饮</a></li>
                    <li><a href="/fuzhuang/">服装</a></li>
                    <li><a href="/jiaoyu/">教育</a></li>
                    <li><a href="/meirong/">美容</a></li>
                    <li><a href="/ganxi/">干洗</a></li>
                    <li><a href="/zhubao/">珠宝</a></li>
                    <li><a href="/shipin/">饰品</a></li>
                    <li><a href="/yingyouer/">幼儿</a></li>
                    <li><a href="/jiafang/">家纺</a></li>
                    <li><a href="/qiche/">汽车</a></li>
                    <li><a href="/yangshengbaojian/">养生</a></li>
                    <li><a href="/huanbao/">环保</a></li>
                    <li><a href="/jiaju/">家具</a></li>
                    <li><a href="/jiancai/">建材</a></li>
                    <li><a href="/chayin/">茶饮</a></li>
                    <li style="width:78px;"><a href="/fuwu/">服务</a></li>
                </ul>
            </div>
            <div class="bd">

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2005136.html">UCC国际洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2021495.html">UBTV小主播</a>
                        <a href="https://www.u88.com/xiangmu/1013307.html">聚能教育辅导班</a>
                        <a href="https://www.u88.com/xiangmu/2004745.html">一扫光零食</a>
                        <a href="https://www.u88.com/xiangmu/2004969.html">法式皇家烘培</a>
                        <a href="https://www.u88.com/xiangmu/2019779.html">91汇融网金融</a>
                        <a href="https://www.u88.com/xiangmu/8479.html">爱亲母婴生活馆</a>
                        <a href="https://www.u88.com/xiangmu/2021123.html">泡面小食堂</a>
                        <a href="https://www.u88.com/xiangmu/2018824.html">老艾堂中医养生</a>
                        <a href="https://www.u88.com/xiangmu/2022232.html">大摩投资</a>
                        <a href="https://www.u88.com/xiangmu/2022231.html">富麦小笼</a>
                        <a href="https://www.u88.com/xiangmu/2022230.html">老隆兴苏州汤包</a>
                        <a href="https://www.u88.com/xiangmu/2022229.html">吴兴小笼</a>
                        <a href="https://www.u88.com/xiangmu/2022228.html">有家汤包</a>
                        <a href="https://www.u88.com/xiangmu/2022227.html">润丰园汤包</a>
                        <a href="https://www.u88.com/xiangmu/2022226.html">鲜得立汤包</a>
                        <a href="https://www.u88.com/xiangmu/2022225.html">方师傅小笼</a>
                        <a href="https://www.u88.com/xiangmu/2022224.html">德信和保险超市</a>
                        <a href="https://www.u88.com/xiangmu/2022223.html">万家美车险</a>
                        <a href="https://www.u88.com/xiangmu/2022222.html">啤酒鸭焖锅</a>
                        <a href="https://www.u88.com/xiangmu/2022221.html">乐郎乐读</a>
                        <a href="https://www.u88.com/xiangmu/2022220.html">伴随阅读</a>
                        <a href="https://www.u88.com/xiangmu/2022219.html">七步作文</a>
                        <a href="https://www.u88.com/xiangmu/2022218.html">奇趣作文</a>
                        <a href="https://www.u88.com/xiangmu/2022217.html">保联优品车险</a>
                        <a href="https://www.u88.com/xiangmu/2022216.html">众享车险</a>
                        <a href="https://www.u88.com/xiangmu/2022215.html">保多汇车险</a>
                        <a href="https://www.u88.com/xiangmu/2022214.html">香港3861母婴生活馆</a>
                        <a href="https://www.u88.com/xiangmu/2022212.html">婴爱前线</a>
                        <a href="https://www.u88.com/xiangmu/2022211.html">小梅园豆浆油条</a>
                        <a href="https://www.u88.com/xiangmu/2022210.html">弄堂味道</a>
                        <a href="https://www.u88.com/xiangmu/2022209.html">王贵仁砂锅麻辣烫</a>
                        <a href="https://www.u88.com/xiangmu/2022207.html">胖小鲜砂锅麻辣烫</a>
                        <a href="https://www.u88.com/xiangmu/2022206.html">朝味夕食</a>
                        <a href="https://www.u88.com/xiangmu/2022205.html">久叔夜市豆浆油条</a>
                        <a href="https://www.u88.com/xiangmu/2022204.html">门庭若市豆浆油条</a>
                        <a href="https://www.u88.com/xiangmu/2022203.html">溢家鲜小海鲜</a>
                        <a href="https://www.u88.com/xiangmu/2022202.html">码头夜市</a>
                        <a href="https://www.u88.com/xiangmu/2022201.html">阿建豆浆油条</a>
                        <a href="https://www.u88.com/xiangmu/2022200.html">蚝水浒掌上海鲜</a>
                        <a href="https://www.u88.com/xiangmu/2022199.html">钱小胖大饼油条</a>
                        <a href="https://www.u88.com/xiangmu/2022198.html">王阿姨豆浆油条</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2002977.html">元祖蛋糕</a>
                        <a href="https://www.u88.com/xiangmu/2006484.html">避风塘茶餐厅</a>
                        <a href="https://www.u88.com/xiangmu/2016497.html">85℃蛋糕</a>
                        <a href="https://www.u88.com/xiangmu/2007570.html">咬不得高祖生煎</a>
                        <a href="https://www.u88.com/xiangmu/2017698.html">小飞生煎</a>
                        <a href="https://www.u88.com/xiangmu/2017681.html">糊涂生煎</a>
                        <a href="https://www.u88.com/xiangmu/2017682.html">阿三生煎</a>
                        <a href="https://www.u88.com/xiangmu/2018135.html">吴江路生煎包</a>
                        <a href="https://www.u88.com/xiangmu/2017679.html">小杨生煎</a>
                        <a href="https://www.u88.com/xiangmu/2020462.html">克里斯汀蛋糕</a>
                        <a href="https://www.u88.com/xiangmu/2014950.html">香巴岛龙虾</a>
                        <a href="https://www.u88.com/xiangmu/2003380.html">久久丫鸭脖</a>
                        <a href="https://www.u88.com/xiangmu/2003679.html">满记甜品</a>
                        <a href="https://www.u88.com/xiangmu/2003196.html">绝味鸭脖</a>
                        <a href="https://www.u88.com/xiangmu/2021483.html">玉麦手工面条</a>
                        <a href="https://www.u88.com/xiangmu/2020760.html">皇家烤官烧烤</a>
                        <a href="https://www.u88.com/xiangmu/2020064.html">新石器烤肉</a>
                        <a href="https://www.u88.com/xiangmu/2018990.html">蜀一蜀二冒菜</a>
                        <a href="https://www.u88.com/xiangmu/2018998.html">汉釜宫烤肉</a>
                        <a href="https://www.u88.com/xiangmu/2018032.html">老家酸菜鱼</a>
                        <a href="https://www.u88.com/xiangmu/2017551.html">朱丹小时光甜品店</a>
                        <a href="https://www.u88.com/xiangmu/5524.html">谭鱼头火锅</a>
                        <a href="https://www.u88.com/xiangmu/2017413.html">茶物语甜品</a>
                        <a href="https://www.u88.com/xiangmu/2017392.html">海底捞火锅</a>
                        <a href="https://www.u88.com/xiangmu/2017048.html">佬麻雀湘菜</a>
                        <a href="https://www.u88.com/xiangmu/2016944.html">西少爷肉夹馍</a>
                        <a href="https://www.u88.com/xiangmu/2016265.html">西良简面</a>
                        <a href="https://www.u88.com/xiangmu/2016140.html">茗果全日茶餐厅</a>
                        <a href="https://www.u88.com/xiangmu/2015313.html">漫天香手抓小龙虾</a>
                        <a href="https://www.u88.com/xiangmu/2014880.html">欧香台湾面包坊</a>
                        <a href="https://www.u88.com/xiangmu/2014727.html">九门寨石锅鱼</a>
                        <a href="https://www.u88.com/xiangmu/2014143.html">你好猴子儿童餐厅</a>
                        <a href="https://www.u88.com/xiangmu/2013499.html">三聚德羊汤</a>
                        <a href="https://www.u88.com/xiangmu/2013061.html">豆逗婆土豆粉</a>
                        <a href="https://www.u88.com/xiangmu/2012519.html">探鱼季烤鱼</a>
                        <a href="https://www.u88.com/xiangmu/2009992.html">汉拿山烤肉</a>
                        <a href="https://www.u88.com/xiangmu/2009803.html">金陵鸭血粉丝汤</a>
                        <a href="https://www.u88.com/xiangmu/2009413.html">祥子刀削面</a>
                        <a href="https://www.u88.com/xiangmu/2009035.html">九九绝味鸭脖</a>
                        <a href="https://www.u88.com/xiangmu/2005632.html">57度湘</a>
                        <a href="https://www.u88.com/xiangmu/2008501.html">大嘴猴休闲零食</a>
                        <a href="https://www.u88.com/xiangmu/2008420.html">丁老头炒货</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/4201.html">奇乐园6元新潮童装</a>
                        <a href="https://www.u88.com/xiangmu/2020914.html">朵诗妮9元女装</a>
                        <a href="https://www.u88.com/xiangmu/2016074.html">彪马</a>
                        <a href="https://www.u88.com/xiangmu/2014098.html">小太平鸟童装</a>
                        <a href="https://www.u88.com/xiangmu/2013200.html">帕巴拉亲子装</a>
                        <a href="https://www.u88.com/xiangmu/2010577.html">Lee牛仔裤</a>
                        <a href="https://www.u88.com/xiangmu/2007282.html">安莉芳内衣</a>
                        <a href="https://www.u88.com/xiangmu/2006486.html">zara服装</a>
                        <a href="https://www.u88.com/xiangmu/2005217.html">浪莎</a>
                        <a href="https://www.u88.com/xiangmu/99087.html">Nike耐克运动装</a>
                        <a href="https://www.u88.com/xiangmu/7013.html">十月妈咪孕妇装</a>
                        <a href="https://www.u88.com/xiangmu/109.html">威利天舜裤业</a>
                        <a href="https://www.u88.com/xiangmu/2952.html">英氏亲子装</a>
                        <a href="https://www.u88.com/xiangmu/8524.html">红豆家居服</a>
                        <a href="https://www.u88.com/xiangmu/4199.html">亲亲果童装</a>
                        <a href="https://www.u88.com/xiangmu/904.html">九牧王男装</a>
                        <a href="https://www.u88.com/xiangmu/498.html">艾瑞斯丽羽绒服</a>
                        <a href="https://www.u88.com/xiangmu/2020911.html">风尚9元服饰</a>
                        <a href="https://www.u88.com/xiangmu/129.html">芒果王子童装</a>
                        <a href="https://www.u88.com/xiangmu/2007024.html">GXG休闲男装</a>
                        <a href="https://www.u88.com/xiangmu/2007497.html">七波辉童装</a>
                        <a href="https://www.u88.com/xiangmu/2007251.html">梦芭莎内衣</a>
                        <a href="https://www.u88.com/xiangmu/2010817.html">丝界</a>
                        <a href="https://www.u88.com/xiangmu/1747.html">凯伦堡家居服</a>
                        <a href="https://www.u88.com/xiangmu/901.html">劲霸男装</a>
                        <a href="https://www.u88.com/xiangmu/2546.html">朝花夕拾女装</a>
                        <a href="https://www.u88.com/xiangmu/7015.html">贝儿森孕妇装</a>
                        <a href="https://www.u88.com/xiangmu/6001.html">佐丹奴休闲装</a>
                        <a href="https://www.u88.com/xiangmu/6578.html">鸿星尔克运动服</a>
                        <a href="https://www.u88.com/xiangmu/59.html">百斯丽达裤业</a>
                        <a href="https://www.u88.com/xiangmu/322.html">纯儿牛仔</a>
                        <a href="https://www.u88.com/xiangmu/914.html">七匹狼男装</a>
                        <a href="https://www.u88.com/xiangmu/610.html">ochirly女装</a>
                        <a href="https://www.u88.com/xiangmu/2006479.html">361°童装</a>
                        <a href="https://www.u88.com/xiangmu/2005755.html">波司登羽绒服</a>
                        <a href="https://www.u88.com/xiangmu/915.html">波司登男装</a>
                        <a href="https://www.u88.com/xiangmu/6029.html">卡拉贝贝亲子装</a>
                        <a href="https://www.u88.com/xiangmu/1747.html">凯伦堡家居服</a>
                        <a href="https://www.u88.com/xiangmu/2005881.html">快鱼服饰</a>
                        <a href="https://www.u88.com/xiangmu/2005749.html">优衣库服饰</a>
                        <a href="https://www.u88.com/xiangmu/1599.html">玉茄子家居服</a>
                        <a href="https://www.u88.com/xiangmu/5900.html">Dickies帝客休闲装</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2007900.html">昂立幼儿园</a>
                        <a href="https://www.u88.com/xiangmu/2017571.html">韦博国际英语</a>
                        <a href="https://www.u88.com/xiangmu/2021566.html">小博士少儿口才</a>
                        <a href="https://www.u88.com/xiangmu/2017871.html">学而思教育</a>
                        <a href="https://www.u88.com/xiangmu/2005060.html">东方爱婴早教</a>
                        <a href="https://www.u88.com/xiangmu/2017783.html">掌门一对一</a>
                        <a href="https://www.u88.com/xiangmu/2017701.html">新东方教育</a>
                        <a href="https://www.u88.com/xiangmu/2013895.html">巴布豆早教包</a>
                        <a href="https://www.u88.com/xiangmu/2017678.html">精锐教育</a>
                        <a href="https://www.u88.com/xiangmu/1013307.html">聚能教育</a>
                        <a href="https://www.u88.com/xiangmu/2020789.html">山东蓝翔电脑培训</a>
                        <a href="https://www.u88.com/xiangmu/4821.html">北大青鸟电脑培训</a>
                        <a href="https://www.u88.com/xiangmu/4850.html">创智幼儿潜能开发</a>
                        <a href="https://www.u88.com/xiangmu/4849.html">心灵海潜能培训</a>
                        <a href="https://www.u88.com/xiangmu/4013.html">红警电脑维修</a>
                        <a href="https://www.u88.com/xiangmu/2007560.html">京师阳光幼儿园</a>
                        <a href="https://www.u88.com/xiangmu/4838.html">绚彩森林潜能培训</a>
                        <a href="https://www.u88.com/xiangmu/4837.html">学之源右脑开发</a>
                        <a href="https://www.u88.com/xiangmu/4847.html">华夏七田右脑教育</a>
                        <a href="https://www.u88.com/xiangmu/2020793.html">富海电脑培训</a>
                        <a href="https://www.u88.com/xiangmu/4839.html">东方金子塔潜能培训</a>
                        <a href="https://www.u88.com/xiangmu/2006006.html">悦宝园早教</a>
                        <a href="https://www.u88.com/xiangmu/2020784.html">暨华教育电脑培训</a>
                        <a href="https://www.u88.com/xiangmu/4841.html">博爱宝贝潜能培训</a>
                        <a href="https://www.u88.com/xiangmu/2021565.html">童星少儿口才</a>
                        <a href="https://www.u88.com/xiangmu/2020788.html">野马计算机培训</a>
                        <a href="https://www.u88.com/xiangmu/2021563.html">两个黄鹂少儿口才</a>
                        <a href="https://www.u88.com/xiangmu/2018666.html">巴仑思</a>
                        <a href="https://www.u88.com/xiangmu/4690.html">金宝贝早教</a>
                        <a href="https://www.u88.com/xiangmu/2020790.html">博浦计算机培训</a>
                        <a href="https://www.u88.com/xiangmu/4846.html">超级童年全脑开发中心</a>
                        <a href="https://www.u88.com/xiangmu/4843.html">卓人右脑教育</a>
                        <a href="https://www.u88.com/xiangmu/18.html">晨光文具</a>
                        <a href="https://www.u88.com/xiangmu/2017621.html">英孚少儿英语</a>
                        <a href="https://www.u88.com/xiangmu/2006208.html">齐心办公</a>
                        <a href="https://www.u88.com/xiangmu/4635.html">美吉姆早教</a>
                        <a href="https://www.u88.com/xiangmu/2019778.html">ABC外语学校</a>
                        <a href="https://www.u88.com/xiangmu/4593.html">贝发文具</a>
                        <a href="https://www.u88.com/xiangmu/2017626.html">瑞思学科英语</a>
                        <a href="https://www.u88.com/xiangmu/2021562.html">超级少年口才</a>
                        <a href="https://www.u88.com/xiangmu/2021340.html">能力风暴机器人</a>
                        <a href="https://www.u88.com/xiangmu/2004664.html">超脑力教育</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2020866.html">资医堂祛疤祛斑祛痘</a>
                        <a href="https://www.u88.com/xiangmu/2010272.html">CreatorSalon</a>
                        <a href="https://www.u88.com/xiangmu/2009008.html">雅诗兰黛</a>
                        <a href="https://www.u88.com/xiangmu/2008923.html">欧莱雅化妆品</a>
                        <a href="https://www.u88.com/xiangmu/2005641.html">ac彩妆</a>
                        <a href="https://www.u88.com/xiangmu/107317.html">纤纤伊人专业减肥</a>
                        <a href="https://www.u88.com/xiangmu/2959.html">欧洁蔓美容院</a>
                        <a href="https://www.u88.com/xiangmu/603.html">香溢芭黎手工皂</a>
                        <a href="https://www.u88.com/xiangmu/119.html">珂洛丽美甲</a>
                        <a href="https://www.u88.com/xiangmu/2020839.html">苏舍儿手工皂</a>
                        <a href="https://www.u88.com/xiangmu/2017665.html">沃佳纤体</a>
                        <a href="https://www.u88.com/xiangmu/2009724.html">膜法世家化妆品</a>
                        <a href="https://www.u88.com/xiangmu/2009308.html">蓝色之恋彩妆</a>
                        <a href="https://www.u88.com/xiangmu/99187.html">永琪美容美发</a>
                        <a href="https://www.u88.com/xiangmu/2021131.html">伊妮森林美容</a>
                        <a href="https://www.u88.com/xiangmu/2020864.html">相悦四季祛斑祛痘</a>
                        <a href="https://www.u88.com/xiangmu/68532.html">宜兰贝尔美甲</a>
                        <a href="https://www.u88.com/xiangmu/2020843.html">Gamila洁米拉手工皂</a>
                        <a href="https://www.u88.com/xiangmu/2010606.html">倩碧化妆品</a>
                        <a href="https://www.u88.com/xiangmu/2009940.html">卡姿兰</a>
                        <a href="https://www.u88.com/xiangmu/74012.html">韩医生专业祛痘</a>
                        <a href="https://www.u88.com/xiangmu/2020857.html">鲜女面膜</a>
                        <a href="https://www.u88.com/xiangmu/2007479.html">苗姿减肥</a>
                        <a href="https://www.u88.com/xiangmu/2006771.html">文峰美容美发</a>
                        <a href="https://www.u88.com/xiangmu/2004987.html">信雅资美甲</a>
                        <a href="https://www.u88.com/xiangmu/2020844.html">希思黎Sisley手工皂</a>
                        <a href="https://www.u88.com/xiangmu/2010132.html">悦诗风吟化妆品</a>
                        <a href="https://www.u88.com/xiangmu/2009944.html">法兰琳卡</a>
                        <a href="https://www.u88.com/xiangmu/2009262.html">东瀛国际造型</a>
                        <a href="https://www.u88.com/xiangmu/2008297.html">EyeLove美甲</a>
                        <a href="https://www.u88.com/xiangmu/72058.html">普丽缇莎美容院</a>
                        <a href="https://www.u88.com/xiangmu/65551.html">仪美国际减肥</a>
                        <a href="https://www.u88.com/xiangmu/333.html">美爆美妆潮品店</a>
                        <a href="https://www.u88.com/xiangmu/2020853.html">恋恋制皂手工皂</a>
                        <a href="https://www.u88.com/xiangmu/2018118.html">猫猫酱日式美甲</a>
                        <a href="https://www.u88.com/xiangmu/2016417.html">震轩美容美发</a>
                        <a href="https://www.u88.com/xiangmu/2012688.html">魅可化妆品</a>
                        <a href="https://www.u88.com/xiangmu/2005108.html">千艺彩妆</a>
                        <a href="https://www.u88.com/xiangmu/74536.html">雅致轩美容院</a>
                        <a href="https://www.u88.com/xiangmu/65549.html">美尔美乐减肥</a>
                        <a href="https://www.u88.com/xiangmu/2021583.html">CICI纤体</a>
                        <a href="https://www.u88.com/xiangmu/75001.html">润初颜美容院</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2005136.html">UCC国际洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2020461.html">澳贝森干洗</a>
                        <a href="https://www.u88.com/xiangmu/2008771.html">伊莱雅洁</a>
                        <a href="https://www.u88.com/xiangmu/2008508.html">汉洁洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2008421.html">玫瑰园洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2016419.html">正章干洗店</a>
                        <a href="https://www.u88.com/xiangmu/2016420.html">恒协干洗</a>
                        <a href="https://www.u88.com/xiangmu/2014974.html">优奈洗洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2005760.html">威特斯国际洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2010352.html">莫好克洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2010357.html">东方白鸽</a>
                        <a href="https://www.u88.com/xiangmu/2010265.html">维曼丝干洗</a>
                        <a href="https://www.u88.com/xiangmu/2010271.html">博赛尔干洗</a>
                        <a href="https://www.u88.com/xiangmu/2010304.html">欧瑞斯干洗店</a>
                        <a href="https://www.u88.com/xiangmu/2009925.html">美依林干洗</a>
                        <a href="https://www.u88.com/xiangmu/2009492.html">诗百汇洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2009662.html">美涤洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2009663.html">牧雅洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2009496.html">泰利干洗</a>
                        <a href="https://www.u88.com/xiangmu/2009483.html">威纳邦健康洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2009182.html">蓝涤干洗</a>
                        <a href="https://www.u88.com/xiangmu/2009189.html">凯帝洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2009175.html">丘比特洗涤</a>
                        <a href="https://www.u88.com/xiangmu/2009164.html">亚韩干洗</a>
                        <a href="https://www.u88.com/xiangmu/2009095.html">喜也乐干洗</a>
                        <a href="https://www.u88.com/xiangmu/2009016.html">三星美妮干洗</a>
                        <a href="https://www.u88.com/xiangmu/2009082.html">品岸精洗</a>
                        <a href="https://www.u88.com/xiangmu/2009000.html">洁丹妮干洗</a>
                        <a href="https://www.u88.com/xiangmu/2008947.html">洛克洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2008845.html">郑洁丽洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2008833.html">依尔丽洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2008768.html">水玉坊绿色洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2008777.html">依凡洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2008778.html">卡依妮干洗</a>
                        <a href="https://www.u88.com/xiangmu/2008779.html">玛丽阿姨</a>
                        <a href="https://www.u88.com/xiangmu/2008780.html">米兰人洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2008721.html">艾依莎</a>
                        <a href="https://www.u88.com/xiangmu/2008659.html">爱家德福干洗</a>
                        <a href="https://www.u88.com/xiangmu/2008654.html">润荷坊</a>
                        <a href="https://www.u88.com/xiangmu/2008566.html">衣适家干洗店</a>
                        <a href="https://www.u88.com/xiangmu/2008571.html">邦纳福干洗</a>
                        <a href="https://www.u88.com/xiangmu/2008653.html">涤雅洗衣</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2009723.html">潮宏基珠宝</a>
                        <a href="https://www.u88.com/xiangmu/98343.html">南洋珠宝</a>
                        <a href="https://www.u88.com/xiangmu/98317.html">金伯利钻石</a>
                        <a href="https://www.u88.com/xiangmu/72.html">老凤祥黄金饰品</a>
                        <a href="https://www.u88.com/xiangmu/2007010.html">周大福</a>
                        <a href="https://www.u88.com/xiangmu/2004432.html">蒂芙尼珠宝</a>
                        <a href="https://www.u88.com/xiangmu/98321.html">宝至尊翡翠</a>
                        <a href="https://www.u88.com/xiangmu/98307.html">IDO婚戒</a>
                        <a href="https://www.u88.com/xiangmu/4545.html">洁士奢侈品</a>
                        <a href="https://www.u88.com/xiangmu/2005455.html">每克拉美珠宝钻石</a>
                        <a href="https://www.u88.com/xiangmu/2005295.html">卡地罗珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2004919.html">中国黄金</a>
                        <a href="https://www.u88.com/xiangmu/98383.html">奥柔拉水晶</a>
                        <a href="https://www.u88.com/xiangmu/98320.html">南亚珠宝</a>
                        <a href="https://www.u88.com/xiangmu/4544.html">莱姿奢侈品护理</a>
                        <a href="https://www.u88.com/xiangmu/2005282.html">周大生珠宝</a>
                        <a href="https://www.u88.com/xiangmu/98381.html">水晶坊</a>
                        <a href="https://www.u88.com/xiangmu/98354.html">萃工厂玉饰</a>
                        <a href="https://www.u88.com/xiangmu/98313.html">瑞恩钻石</a>
                        <a href="https://www.u88.com/xiangmu/152.html">水晶之恋</a>
                        <a href="https://www.u88.com/xiangmu/138.html">优品惠奢侈品</a>
                        <a href="https://www.u88.com/xiangmu/2020832.html">贝新迪奢侈品皮革护理</a>
                        <a href="https://www.u88.com/xiangmu/2010798.html">潘多拉珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2008039.html">周生生珠宝</a>
                        <a href="https://www.u88.com/xiangmu/98385.html">嘉乐琥珀水晶</a>
                        <a href="https://www.u88.com/xiangmu/98380.html">晶灵水晶</a>
                        <a href="https://www.u88.com/xiangmu/98356.html">和合玉器</a>
                        <a href="https://www.u88.com/xiangmu/98305.html">Dionly戴欧妮钻石</a>
                        <a href="https://www.u88.com/xiangmu/2020836.html">迪娜斯奢侈品护理</a>
                        <a href="https://www.u88.com/xiangmu/2020835.html">坤博奢侈品皮具护理</a>
                        <a href="https://www.u88.com/xiangmu/2010916.html">蓝贝儿珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2010847.html">吉盟珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2010718.html">豪庭珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2009943.html">银荷珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2009640.html">韩福珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2009499.html">世纪缘珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2009402.html">禧六福</a>
                        <a href="https://www.u88.com/xiangmu/2009253.html">翰林艺雕</a>
                        <a href="https://www.u88.com/xiangmu/2006675.html">金嘉利珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2006310.html">皇族逸品翡翠</a>
                        <a href="https://www.u88.com/xiangmu/2005884.html">六桂福珠宝</a>
                        <a href="https://www.u88.com/xiangmu/2005652.html">法兰帝香水</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2002933.html">达梵天饰品</a>
                        <a href="https://www.u88.com/xiangmu/2020972.html">伊泰莲娜情侣饰品</a>
                        <a href="https://www.u88.com/xiangmu/2011292.html">MGS曼古银</a>
                        <a href="https://www.u88.com/xiangmu/2010484.html">天梭手表</a>
                        <a href="https://www.u88.com/xiangmu/2010339.html">饰全饰美饰品</a>
                        <a href="https://www.u88.com/xiangmu/2007504.html">阿吉豆饰品</a>
                        <a href="https://www.u88.com/xiangmu/2006497.html">相思树民族饰品</a>
                        <a href="https://www.u88.com/xiangmu/3835.html">温莎绒绣</a>
                        <a href="https://www.u88.com/xiangmu/1726.html">宝齐莱家居饰品</a>
                        <a href="https://www.u88.com/xiangmu/3771.html">She&#039;s 饰品加盟</a>
                        <a href="https://www.u88.com/xiangmu/3786.html">雅尔美发饰</a>
                        <a href="https://www.u88.com/xiangmu/3645.html">腾祥玉石精品饰品</a>
                        <a href="https://www.u88.com/xiangmu/418.html">希捷仿真花</a>
                        <a href="https://www.u88.com/xiangmu/2020971.html">卡地亚情侣饰品</a>
                        <a href="https://www.u88.com/xiangmu/2010314.html">七狐银饰</a>
                        <a href="https://www.u88.com/xiangmu/2010025.html">M&amp;X彩宝佛宝</a>
                        <a href="https://www.u88.com/xiangmu/2005643.html">圣妍熙饰品</a>
                        <a href="https://www.u88.com/xiangmu/2005372.html">扎西德勒特色饰品</a>
                        <a href="https://www.u88.com/xiangmu/2002855.html">宾德利手表</a>
                        <a href="https://www.u88.com/xiangmu/1734.html">莎梦丽家饰</a>
                        <a href="https://www.u88.com/xiangmu/3781.html">千寻头饰</a>
                        <a href="https://www.u88.com/xiangmu/3811.html">七里香发饰</a>
                        <a href="https://www.u88.com/xiangmu/3621.html">亨利屋家族工艺品</a>
                        <a href="https://www.u88.com/xiangmu/3662.html">瑞丽芭莎饰品</a>
                        <a href="https://www.u88.com/xiangmu/3915.html">CMC十字绣</a>
                        <a href="https://www.u88.com/xiangmu/419.html">清馨花语仿真花</a>
                        <a href="https://www.u88.com/xiangmu/2021032.html">风景线仿真植物</a>
                        <a href="https://www.u88.com/xiangmu/2020970.html">蓝贝儿情侣饰品</a>
                        <a href="https://www.u88.com/xiangmu/2010108.html">卡西欧手表</a>
                        <a href="https://www.u88.com/xiangmu/2007848.html">遇见美饰品</a>
                        <a href="https://www.u88.com/xiangmu/2006221.html">好银坊</a>
                        <a href="https://www.u88.com/xiangmu/2005533.html">卡洛芳瑞饰品</a>
                        <a href="https://www.u88.com/xiangmu/3608.html">一棠工艺品</a>
                        <a href="https://www.u88.com/xiangmu/3805.html">欧芝雅发饰</a>
                        <a href="https://www.u88.com/xiangmu/3749.html">美宜美家家居饰品</a>
                        <a href="https://www.u88.com/xiangmu/3909.html">DOME十字绣</a>
                        <a href="https://www.u88.com/xiangmu/3669.html">S&amp;A赛吉琥珀饰品</a>
                        <a href="https://www.u88.com/xiangmu/368.html">哎呀呀饰品</a>
                        <a href="https://www.u88.com/xiangmu/2021034.html">艺美仿真花</a>
                        <a href="https://www.u88.com/xiangmu/2020966.html">EME饰品</a>
                        <a href="https://www.u88.com/xiangmu/2020923.html">阿科奇儿童定位手表</a>
                        <a href="https://www.u88.com/xiangmu/2020878.html">茜子发饰</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2020880.html">Fedora飞多儿童车</a>
                        <a href="https://www.u88.com/xiangmu/2004175.html">维尼宝贝</a>
                        <a href="https://www.u88.com/xiangmu/8478.html">惠氏母婴用品</a>
                        <a href="https://www.u88.com/xiangmu/8439.html">美赞臣奶粉</a>
                        <a href="https://www.u88.com/xiangmu/15.html">乐高玩具</a>
                        <a href="https://www.u88.com/xiangmu/2020897.html">乔治马丁百变童车</a>
                        <a href="https://www.u88.com/xiangmu/2010461.html">舒宠公仔</a>
                        <a href="https://www.u88.com/xiangmu/8482.html">i-baby世界名品母婴生活馆</a>
                        <a href="https://www.u88.com/xiangmu/2008870.html">强生婴儿理发</a>
                        <a href="https://www.u88.com/xiangmu/8437.html">雅培奶粉</a>
                        <a href="https://www.u88.com/xiangmu/2020894.html">佳源宝童车</a>
                        <a href="https://www.u88.com/xiangmu/2006531.html">百变米奇儿童用品</a>
                        <a href="https://www.u88.com/xiangmu/8489.html">皇家孕婴母婴用品</a>
                        <a href="https://www.u88.com/xiangmu/8430.html">纽贝斯特奶粉</a>
                        <a href="https://www.u88.com/xiangmu/8380.html">carby卡比玩具</a>
                        <a href="https://www.u88.com/xiangmu/2020892.html">辛巴达童车</a>
                        <a href="https://www.u88.com/xiangmu/2006114.html">御宝羊奶粉</a>
                        <a href="https://www.u88.com/xiangmu/2005651.html">爱婴坊孕婴用品</a>
                        <a href="https://www.u88.com/xiangmu/8491.html">母婴坊母婴用品</a>
                        <a href="https://www.u88.com/xiangmu/8420.html">欧塞奇玩具</a>
                        <a href="https://www.u88.com/xiangmu/2013674.html">童歌母婴连锁</a>
                        <a href="https://www.u88.com/xiangmu/2010373.html">乖乖虎童车</a>
                        <a href="https://www.u88.com/xiangmu/2004153.html">千喜贝贝</a>
                        <a href="https://www.u88.com/xiangmu/8369.html">ALEX爱丽克丝玩具</a>
                        <a href="https://www.u88.com/xiangmu/8504.html">润婴宝母婴用品</a>
                        <a href="https://www.u88.com/xiangmu/8438.html">明治乳业</a>
                        <a href="https://www.u88.com/xiangmu/2022214.html">香港3861母婴生活馆</a>
                        <a href="https://www.u88.com/xiangmu/2022212.html">婴爱前线</a>
                        <a href="https://www.u88.com/xiangmu/2021616.html">圣得贝童车</a>
                        <a href="https://www.u88.com/xiangmu/2021615.html">天宏童车</a>
                        <a href="https://www.u88.com/xiangmu/2021611.html">金冠童车</a>
                        <a href="https://www.u88.com/xiangmu/2021387.html">星期六儿童成长主题乐园</a>
                        <a href="https://www.u88.com/xiangmu/2021392.html">贝儿健儿童乐园</a>
                        <a href="https://www.u88.com/xiangmu/2021393.html">好奇岛儿童乐园</a>
                        <a href="https://www.u88.com/xiangmu/2021577.html">迪兰朵产后恢复</a>
                        <a href="https://www.u88.com/xiangmu/2021576.html">珂珂朵谧产后修复</a>
                        <a href="https://www.u88.com/xiangmu/2021571.html">诗安母婴会所</a>
                        <a href="https://www.u88.com/xiangmu/2021394.html">卡奇乐儿童乐园</a>
                        <a href="https://www.u88.com/xiangmu/2021395.html">爱嘟嘟儿童乐园</a>
                        <a href="https://www.u88.com/xiangmu/2021385.html">炫天堂儿童乐园</a>
                        <a href="https://www.u88.com/xiangmu/2021384.html">麦幼优儿童乐园</a>
                        <a href="https://www.u88.com/xiangmu/2021383.html">史洛比儿童乐园</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/1458.html">罗莱家纺</a>
                        <a href="https://www.u88.com/xiangmu/1350.html">水星家纺</a>
                        <a href="https://www.u88.com/xiangmu/1460.html">富安娜家纺</a>
                        <a href="https://www.u88.com/xiangmu/1453.html">博洋家纺</a>
                        <a href="https://www.u88.com/xiangmu/1347.html">紫罗兰家纺</a>
                        <a href="https://www.u88.com/xiangmu/2019449.html">孚日家纺</a>
                        <a href="https://www.u88.com/xiangmu/2011370.html">多多爱家纺</a>
                        <a href="https://www.u88.com/xiangmu/2011122.html">圣宝兰家纺</a>
                        <a href="https://www.u88.com/xiangmu/2011103.html">雅兰家纺</a>
                        <a href="https://www.u88.com/xiangmu/2011068.html">优家家纺</a>
                        <a href="https://www.u88.com/xiangmu/2010948.html">科莎家纺</a>
                        <a href="https://www.u88.com/xiangmu/2010885.html">提籁雅家纺</a>
                        <a href="https://www.u88.com/xiangmu/2010802.html">华福布艺家纺</a>
                        <a href="https://www.u88.com/xiangmu/2010637.html">梦百合家纺加盟</a>
                        <a href="https://www.u88.com/xiangmu/2010509.html">华欣窗帘</a>
                        <a href="https://www.u88.com/xiangmu/2010358.html">鑫亚伦家纺</a>
                        <a href="https://www.u88.com/xiangmu/2010406.html">美凯珑家纺</a>
                        <a href="https://www.u88.com/xiangmu/2010281.html">香港至尊家纺</a>
                        <a href="https://www.u88.com/xiangmu/2009647.html">晋帛家纺</a>
                        <a href="https://www.u88.com/xiangmu/2008691.html">梦之语家纺</a>
                        <a href="https://www.u88.com/xiangmu/2006187.html">宝缦家纺</a>
                        <a href="https://www.u88.com/xiangmu/2005789.html">柏琳家纺</a>
                        <a href="https://www.u88.com/xiangmu/2005578.html">兴达贝妮梦家纺</a>
                        <a href="https://www.u88.com/xiangmu/2005436.html">睡冬宝家纺</a>
                        <a href="https://www.u88.com/xiangmu/2004553.html">斯诺曼家纺</a>
                        <a href="https://www.u88.com/xiangmu/2004483.html">新大宏</a>
                        <a href="https://www.u88.com/xiangmu/2004485.html">诺伊曼</a>
                        <a href="https://www.u88.com/xiangmu/2004414.html">登克尔家纺</a>
                        <a href="https://www.u88.com/xiangmu/1083.html">民光家纺</a>
                        <a href="https://www.u88.com/xiangmu/1151.html">依格尔家纺</a>
                        <a href="https://www.u88.com/xiangmu/1196.html">智阳毛巾</a>
                        <a href="https://www.u88.com/xiangmu/1201.html">瑞春毛巾</a>
                        <a href="https://www.u88.com/xiangmu/941.html">达利家纺</a>
                        <a href="https://www.u88.com/xiangmu/942.html">福庆祥家纺</a>
                        <a href="https://www.u88.com/xiangmu/946.html">最爱巢居家纺</a>
                        <a href="https://www.u88.com/xiangmu/976.html">万得家纺</a>
                        <a href="https://www.u88.com/xiangmu/977.html">美麟家纺</a>
                        <a href="https://www.u88.com/xiangmu/978.html">情人草家纺</a>
                        <a href="https://www.u88.com/xiangmu/979.html">茗雅老粗布家纺</a>
                        <a href="https://www.u88.com/xiangmu/981.html">乐竹家纺</a>
                        <a href="https://www.u88.com/xiangmu/982.html">大浪屿淘纱家纺</a>
                        <a href="https://www.u88.com/xiangmu/983.html">东樱美家纺</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2017172.html">贝特斯燃油宝</a>
                        <a href="https://www.u88.com/xiangmu/2017169.html">车宝1号节油</a>
                        <a href="https://www.u88.com/xiangmu/2017156.html">瀚爵省油1号</a>
                        <a href="https://www.u88.com/xiangmu/2007739.html">赛浪汽车快修</a>
                        <a href="https://www.u88.com/xiangmu/98245.html">车洁士洗车</a>
                        <a href="https://www.u88.com/xiangmu/98225.html">香车之恋汽车装饰品</a>
                        <a href="https://www.u88.com/xiangmu/98107.html">龟博士汽车美容</a>
                        <a href="https://www.u88.com/xiangmu/3676.html">开瑞汽车</a>
                        <a href="https://www.u88.com/xiangmu/3431.html">纳智捷汽车</a>
                        <a href="https://www.u88.com/xiangmu/2020845.html">丹弗润滑油</a>
                        <a href="https://www.u88.com/xiangmu/2018899.html">博世车联</a>
                        <a href="https://www.u88.com/xiangmu/98291.html">广州停车场系统</a>
                        <a href="https://www.u88.com/xiangmu/98255.html">洗车王国洗车</a>
                        <a href="https://www.u88.com/xiangmu/98230.html">豪盾汽车装饰</a>
                        <a href="https://www.u88.com/xiangmu/98105.html">威洁士汽车美容店</a>
                        <a href="https://www.u88.com/xiangmu/3427.html">凯迪拉克汽车</a>
                        <a href="https://www.u88.com/xiangmu/162.html">油博士节油器</a>
                        <a href="https://www.u88.com/xiangmu/28.html">固特异轮胎</a>
                        <a href="https://www.u88.com/xiangmu/2020846.html">加德士润滑油</a>
                        <a href="https://www.u88.com/xiangmu/2009135.html">车保姆洗车</a>
                        <a href="https://www.u88.com/xiangmu/2008817.html">168二手车</a>
                        <a href="https://www.u88.com/xiangmu/98281.html">力普顿节油器</a>
                        <a href="https://www.u88.com/xiangmu/98231.html">百祥车饰</a>
                        <a href="https://www.u88.com/xiangmu/98221.html">小拇指汽车维修</a>
                        <a href="https://www.u88.com/xiangmu/98158.html">特福莱汽车美容</a>
                        <a href="https://www.u88.com/xiangmu/3532.html">福特汽车</a>
                        <a href="https://www.u88.com/xiangmu/2020847.html">金富力润滑油</a>
                        <a href="https://www.u88.com/xiangmu/2009141.html">博洋车饰</a>
                        <a href="https://www.u88.com/xiangmu/2009019.html">273二手车</a>
                        <a href="https://www.u88.com/xiangmu/98287.html">博驰节油器</a>
                        <a href="https://www.u88.com/xiangmu/98239.html">洁力神洗车</a>
                        <a href="https://www.u88.com/xiangmu/98204.html">澳德巴克斯汽车维修</a>
                        <a href="https://www.u88.com/xiangmu/98194.html">车爵仕汽车美容</a>
                        <a href="https://www.u88.com/xiangmu/98088.html">德杰仕汽车用品</a>
                        <a href="https://www.u88.com/xiangmu/3652.html">红旗汽车</a>
                        <a href="https://www.u88.com/xiangmu/2020854.html">中能高科润滑油</a>
                        <a href="https://www.u88.com/xiangmu/2017173.html">车清宝节油器</a>
                        <a href="https://www.u88.com/xiangmu/2005423.html">艾姆肯汽车美容</a>
                        <a href="https://www.u88.com/xiangmu/98285.html">益发远景</a>
                        <a href="https://www.u88.com/xiangmu/98207.html">奔腾汽车维修</a>
                        <a href="https://www.u88.com/xiangmu/3682.html">克莱斯勒汽车</a>
                        <a href="https://www.u88.com/xiangmu/235.html">首汽汽车租赁</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2018052.html">社区生活馆</a>
                        <a href="https://www.u88.com/xiangmu/2020219.html">悦灸悦好养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2020218.html">爱灸堂养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2020216.html">董敏园艾灸</a>
                        <a href="https://www.u88.com/xiangmu/2020215.html">千年艾灸道养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2021570.html">戴西养生堂</a>
                        <a href="https://www.u88.com/xiangmu/2021564.html">火烈鸟健身养生</a>
                        <a href="https://www.u88.com/xiangmu/2020212.html">艾和艾灸养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2020213.html">汗方国灸养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2020214.html">圣江塬艾灸养生</a>
                        <a href="https://www.u88.com/xiangmu/2019720.html">道康国际养生</a>
                        <a href="https://www.u88.com/xiangmu/2019171.html">醍醐堂养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019178.html">华伟养生</a>
                        <a href="https://www.u88.com/xiangmu/2019185.html">康一生养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019014.html">权健火疗</a>
                        <a href="https://www.u88.com/xiangmu/2019015.html">好艾友</a>
                        <a href="https://www.u88.com/xiangmu/2019016.html">玉玄宫</a>
                        <a href="https://www.u88.com/xiangmu/2019017.html">艾之初</a>
                        <a href="https://www.u88.com/xiangmu/2019018.html">壹美汇</a>
                        <a href="https://www.u88.com/xiangmu/2019019.html">益灸堂</a>
                        <a href="https://www.u88.com/xiangmu/2019020.html">五行宫足疗</a>
                        <a href="https://www.u88.com/xiangmu/2019021.html">周天养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019022.html">神帆金色年代</a>
                        <a href="https://www.u88.com/xiangmu/2019023.html">脉之元中医养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019024.html">行易堂</a>
                        <a href="https://www.u88.com/xiangmu/2019025.html">紫光六疗养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019026.html">凝香阁spa养生会所</a>
                        <a href="https://www.u88.com/xiangmu/2019027.html">修元康中医养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019028.html">火莲香灸</a>
                        <a href="https://www.u88.com/xiangmu/2019029.html">LOOKSEE名士会男士养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019030.html">山里娃</a>
                        <a href="https://www.u88.com/xiangmu/2019032.html">汉典沙灸</a>
                        <a href="https://www.u88.com/xiangmu/2019033.html">阳光阿莲养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019034.html">绿茵阁沙灸</a>
                        <a href="https://www.u88.com/xiangmu/2019035.html">华夏良子</a>
                        <a href="https://www.u88.com/xiangmu/2019036.html">众缘康医养健康体验馆</a>
                        <a href="https://www.u88.com/xiangmu/2019037.html">悦本堂养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019038.html">本色物语</a>
                        <a href="https://www.u88.com/xiangmu/2019039.html">尚尚灸</a>
                        <a href="https://www.u88.com/xiangmu/2019040.html">尚合元睡眠体验店</a>
                        <a href="https://www.u88.com/xiangmu/2019041.html">金燊汗蒸养生馆</a>
                        <a href="https://www.u88.com/xiangmu/2019042.html">美极养极</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2020284.html">净元素除甲醛</a>
                        <a href="https://www.u88.com/xiangmu/7881.html">安意道空气净化</a>
                        <a href="https://www.u88.com/xiangmu/7882.html">亚纳米特环保材料</a>
                        <a href="https://www.u88.com/xiangmu/7886.html">威洁空气净化</a>
                        <a href="https://www.u88.com/xiangmu/7831.html">亚欣空气净化</a>
                        <a href="https://www.u88.com/xiangmu/7801.html">晶欧全效纳米液体膜</a>
                        <a href="https://www.u88.com/xiangmu/2020285.html">荃芬除甲醛</a>
                        <a href="https://www.u88.com/xiangmu/2020286.html">东方神盾除甲醛</a>
                        <a href="https://www.u88.com/xiangmu/2009015.html">低碳客环保</a>
                        <a href="https://www.u88.com/xiangmu/2002649.html">康乐巢</a>
                        <a href="https://www.u88.com/xiangmu/7794.html">五指峰环保项目</a>
                        <a href="https://www.u88.com/xiangmu/7795.html">双全环保</a>
                        <a href="https://www.u88.com/xiangmu/7796.html">乐达环保</a>
                        <a href="https://www.u88.com/xiangmu/7797.html">绿盟环保</a>
                        <a href="https://www.u88.com/xiangmu/7798.html">碧艾</a>
                        <a href="https://www.u88.com/xiangmu/7799.html">凯美茵辐射消除器</a>
                        <a href="https://www.u88.com/xiangmu/7800.html">清润活性炭</a>
                        <a href="https://www.u88.com/xiangmu/7802.html">伟复空气净化器</a>
                        <a href="https://www.u88.com/xiangmu/7803.html">绿创环保项目</a>
                        <a href="https://www.u88.com/xiangmu/7804.html">好瑞佳空气净化</a>
                        <a href="https://www.u88.com/xiangmu/7805.html">金凯德竹炭用品</a>
                        <a href="https://www.u88.com/xiangmu/7806.html">健竹竹炭用品</a>
                        <a href="https://www.u88.com/xiangmu/7807.html">派蒙防辐射产品</a>
                        <a href="https://www.u88.com/xiangmu/7808.html">东方龙邦节能设备</a>
                        <a href="https://www.u88.com/xiangmu/7809.html">奥得奥空气净化器</a>
                        <a href="https://www.u88.com/xiangmu/7810.html">炭博士竹炭产品</a>
                        <a href="https://www.u88.com/xiangmu/7811.html">金星节能环保厨卫</a>
                        <a href="https://www.u88.com/xiangmu/7812.html">中辐室内环保</a>
                        <a href="https://www.u88.com/xiangmu/7813.html">花兵卫空气净化</a>
                        <a href="https://www.u88.com/xiangmu/7814.html">宜捷嘉室内净化</a>
                        <a href="https://www.u88.com/xiangmu/7815.html">卖炭翁竹炭</a>
                        <a href="https://www.u88.com/xiangmu/7816.html">净力竹炭用品</a>
                        <a href="https://www.u88.com/xiangmu/7817.html">竹韵竹炭用品</a>
                        <a href="https://www.u88.com/xiangmu/7818.html">日享集成环保</a>
                        <a href="https://www.u88.com/xiangmu/7820.html">法瑞集成环保灶</a>
                        <a href="https://www.u88.com/xiangmu/7821.html">金帝集成环保灶</a>
                        <a href="https://www.u88.com/xiangmu/7822.html">奥普集成环保灶</a>
                        <a href="https://www.u88.com/xiangmu/7823.html">帅丰集成环保灶</a>
                        <a href="https://www.u88.com/xiangmu/7824.html">森歌集成环保灶</a>
                        <a href="https://www.u88.com/xiangmu/7825.html">美太美厨环保灶</a>
                        <a href="https://www.u88.com/xiangmu/7828.html">好宜佳活性炭</a>
                        <a href="https://www.u88.com/xiangmu/7829.html">奥陆炉灶节能控制器</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2010682.html">宜家家居</a>
                        <a href="https://www.u88.com/xiangmu/2009810.html">松下电器</a>
                        <a href="https://www.u88.com/xiangmu/2008697.html">全友家私</a>
                        <a href="https://www.u88.com/xiangmu/2160.html">沁园净水器</a>
                        <a href="https://www.u88.com/xiangmu/1546.html">曲美家具</a>
                        <a href="https://www.u88.com/xiangmu/1808.html">龙发装饰</a>
                        <a href="https://www.u88.com/xiangmu/2680.html">罗曼蒂克生活馆</a>
                        <a href="https://www.u88.com/xiangmu/3346.html">艺极楼梯</a>
                        <a href="https://www.u88.com/xiangmu/3403.html">索菲亚衣柜</a>
                        <a href="https://www.u88.com/xiangmu/3440.html">万和热水器</a>
                        <a href="https://www.u88.com/xiangmu/2917.html">摩力克布艺</a>
                        <a href="https://www.u88.com/xiangmu/2709.html">迪凯诺橱柜</a>
                        <a href="https://www.u88.com/xiangmu/1886.html">北斗星节能灯LED照明灯</a>
                        <a href="https://www.u88.com/xiangmu/1721.html">法恩莎卫浴</a>
                        <a href="https://www.u88.com/xiangmu/1458.html">罗莱家纺</a>
                        <a href="https://www.u88.com/xiangmu/2010470.html">能率热水器</a>
                        <a href="https://www.u88.com/xiangmu/2009351.html">西门子电器</a>
                        <a href="https://www.u88.com/xiangmu/2008950.html">欧派衣柜</a>
                        <a href="https://www.u88.com/xiangmu/2126.html">荣事达净水器</a>
                        <a href="https://www.u88.com/xiangmu/1519.html">红苹果家具</a>
                        <a href="https://www.u88.com/xiangmu/1350.html">水星家纺</a>
                        <a href="https://www.u88.com/xiangmu/3367.html">罗兰衣柜</a>
                        <a href="https://www.u88.com/xiangmu/2868.html">韩丽橱柜</a>
                        <a href="https://www.u88.com/xiangmu/2675.html">艺厨轩家居生活馆</a>
                        <a href="https://www.u88.com/xiangmu/1554.html">维意定制家具</a>
                        <a href="https://www.u88.com/xiangmu/3347.html">美步楼梯</a>
                        <a href="https://www.u88.com/xiangmu/2908.html">奥坦斯布艺</a>
                        <a href="https://www.u88.com/xiangmu/1845.html">欧瑞特LED灯</a>
                        <a href="https://www.u88.com/xiangmu/1792.html">元洲装饰</a>
                        <a href="https://www.u88.com/xiangmu/1723.html">恒洁卫浴</a>
                        <a href="https://www.u88.com/xiangmu/2011102.html">丽芙家居</a>
                        <a href="https://www.u88.com/xiangmu/2011082.html">莫干山衣柜</a>
                        <a href="https://www.u88.com/xiangmu/2011016.html">海尔净水机</a>
                        <a href="https://www.u88.com/xiangmu/2006588.html">金牌厨柜</a>
                        <a href="https://www.u88.com/xiangmu/1596.html">九牧卫浴</a>
                        <a href="https://www.u88.com/xiangmu/1534.html">掌上明珠家具</a>
                        <a href="https://www.u88.com/xiangmu/2891.html">美居乐窗帘</a>
                        <a href="https://www.u88.com/xiangmu/1810.html">业之峰装饰</a>
                        <a href="https://www.u88.com/xiangmu/2679.html">苏泊尔生活馆</a>
                        <a href="https://www.u88.com/xiangmu/3351.html">唐朝楼梯</a>
                        <a href="https://www.u88.com/xiangmu/3420.html">普菱热水器</a>
                        <a href="https://www.u88.com/xiangmu/1835.html">英特LED照明灯</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2010130.html">布鲁斯特墙纸</a>
                        <a href="https://www.u88.com/xiangmu/1725.html">伊丽莎白壁纸</a>
                        <a href="https://www.u88.com/xiangmu/1909.html">欧尚墙纸</a>
                        <a href="https://www.u88.com/xiangmu/270.html">玉兰墙纸</a>
                        <a href="https://www.u88.com/xiangmu/1915.html">欧雅壁纸</a>
                        <a href="https://www.u88.com/xiangmu/1914.html">瑞宝壁纸</a>
                        <a href="https://www.u88.com/xiangmu/2020807.html">大河马触控水龙头</a>
                        <a href="https://www.u88.com/xiangmu/2020782.html">陶木然瓷砖</a>
                        <a href="https://www.u88.com/xiangmu/2020783.html">楼兰陶瓷</a>
                        <a href="https://www.u88.com/xiangmu/2016402.html">泥博士硅藻泥</a>
                        <a href="https://www.u88.com/xiangmu/2015201.html">壹百年硅藻泥</a>
                        <a href="https://www.u88.com/xiangmu/2011280.html">欧圣地板</a>
                        <a href="https://www.u88.com/xiangmu/2011199.html">派雅门窗</a>
                        <a href="https://www.u88.com/xiangmu/2008918.html">欧派木门</a>
                        <a href="https://www.u88.com/xiangmu/99298.html">巴菲克集成吊顶</a>
                        <a href="https://www.u88.com/xiangmu/7777.html">贝斯特液体壁纸</a>
                        <a href="https://www.u88.com/xiangmu/4211.html">安尔丽隐形防盗网</a>
                        <a href="https://www.u88.com/xiangmu/2020806.html">速尔电热水龙头</a>
                        <a href="https://www.u88.com/xiangmu/2020781.html">卡斯维诺石砖</a>
                        <a href="https://www.u88.com/xiangmu/2019230.html">冠峰漆</a>
                        <a href="https://www.u88.com/xiangmu/2010673.html"> 欧克斯门窗</a>
                        <a href="https://www.u88.com/xiangmu/2010696.html">欧帝丝</a>
                        <a href="https://www.u88.com/xiangmu/2010308.html">荣事达地板</a>
                        <a href="https://www.u88.com/xiangmu/2004629.html">圣凡尔赛陶瓷</a>
                        <a href="https://www.u88.com/xiangmu/7767.html">帝郡液体壁纸</a>
                        <a href="https://www.u88.com/xiangmu/4213.html">捷视达安防设备</a>
                        <a href="https://www.u88.com/xiangmu/312.html">东鹏瓷砖</a>
                        <a href="https://www.u88.com/xiangmu/88.html">扬子木门</a>
                        <a href="https://www.u88.com/xiangmu/2009149.html">鹰牌瓷砖</a>
                        <a href="https://www.u88.com/xiangmu/2005177.html">多乐士油漆</a>
                        <a href="https://www.u88.com/xiangmu/2004895.html">欧佩克门窗</a>
                        <a href="https://www.u88.com/xiangmu/2004853.html">深呼吸硅藻泥</a>
                        <a href="https://www.u88.com/xiangmu/2004641.html">艾丽丝3D背景墙</a>
                        <a href="https://www.u88.com/xiangmu/2004588.html">罗曼蒂克</a>
                        <a href="https://www.u88.com/xiangmu/2529.html">德国汉诺地板</a>
                        <a href="https://www.u88.com/xiangmu/7779.html">美斯特液体壁纸</a>
                        <a href="https://www.u88.com/xiangmu/4214.html">艾礼安安防设备</a>
                        <a href="https://www.u88.com/xiangmu/8315.html">世博电热水龙头</a>
                        <a href="https://www.u88.com/xiangmu/612.html">美赫集成吊顶</a>
                        <a href="https://www.u88.com/xiangmu/529.html">石尚石英石</a>
                        <a href="https://www.u88.com/xiangmu/509.html">金欧米木门</a>
                        <a href="https://www.u88.com/xiangmu/2012261.html">泰和门窗</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/2017414.html">奈雪の茶茶饮</a>
                        <a href="https://www.u88.com/xiangmu/2005015.html">c忆奶茶</a>
                        <a href="https://www.u88.com/xiangmu/2019904.html">五条人糖水铺</a>
                        <a href="https://www.u88.com/xiangmu/2019091.html">一点点奶茶</a>
                        <a href="https://www.u88.com/xiangmu/2016898.html">喜茶HEYTEA</a>
                        <a href="https://www.u88.com/xiangmu/2019897.html">觅糖记·美颜糖水</a>
                        <a href="https://www.u88.com/xiangmu/6137.html">COCO奶茶</a>
                        <a href="https://www.u88.com/xiangmu/2019915.html">三记糖水店</a>
                        <a href="https://www.u88.com/xiangmu/2018977.html">吾饮良品</a>
                        <a href="https://www.u88.com/xiangmu/2019906.html"> 燚记糖水铺</a>
                        <a href="https://www.u88.com/xiangmu/2019914.html"> 松记糖水店</a>
                        <a href="https://www.u88.com/xiangmu/2011696.html">润心堂凉茶</a>
                        <a href="https://www.u88.com/xiangmu/2005588.html">逸果果汁</a>
                        <a href="https://www.u88.com/xiangmu/2003727.html">星巴克咖啡</a>
                        <a href="https://www.u88.com/xiangmu/6040.html">哈根达斯冰淇淋</a>
                        <a href="https://www.u88.com/xiangmu/2016424.html">八喜冰激凌</a>
                        <a href="https://www.u88.com/xiangmu/2013588.html">马拉桑果汁</a>
                        <a href="https://www.u88.com/xiangmu/2003978.html">Costa咖世家咖啡</a>
                        <a href="https://www.u88.com/xiangmu/99201.html">黄振龙凉茶品牌</a>
                        <a href="https://www.u88.com/xiangmu/2016533.html">太平洋咖啡</a>
                        <a href="https://www.u88.com/xiangmu/2013688.html">魔法婆婆果汁</a>
                        <a href="https://www.u88.com/xiangmu/2004802.html">dq冰雪皇后</a>
                        <a href="https://www.u88.com/xiangmu/6955.html">不二碗凉茶</a>
                        <a href="https://www.u88.com/xiangmu/2013923.html">果巢鲜榨果汁</a>
                        <a href="https://www.u88.com/xiangmu/2003120.html">迪欧咖啡</a>
                        <a href="https://www.u88.com/xiangmu/6958.html">黄福兴凉茶</a>
                        <a href="https://www.u88.com/xiangmu/7085.html">两岸咖啡</a>
                        <a href="https://www.u88.com/xiangmu/2013928.html">安妮心鲜榨果汁</a>
                        <a href="https://www.u88.com/xiangmu/2003383.html">爱茜茜里</a>
                        <a href="https://www.u88.com/xiangmu/2003397.html">上岛咖啡</a>
                        <a href="https://www.u88.com/xiangmu/6135.html">大卡司奶茶</a>
                        <a href="https://www.u88.com/xiangmu/6189.html">柠檬工坊</a>
                        <a href="https://www.u88.com/xiangmu/6034.html">新城市冰淇淋</a>
                        <a href="https://www.u88.com/xiangmu/2012457.html">尚米克酸奶</a>
                        <a href="https://www.u88.com/xiangmu/2008052.html">美滋淋蛋仔冰淇淋</a>
                        <a href="https://www.u88.com/xiangmu/2021088.html">感德龙馨茶业</a>
                        <a href="https://www.u88.com/xiangmu/2021086.html">名峰茶业</a>
                        <a href="https://www.u88.com/xiangmu/2021084.html">琦泰茶铺</a>
                        <a href="https://www.u88.com/xiangmu/2021083.html">平武茶业</a>
                        <a href="https://www.u88.com/xiangmu/2021081.html">柴大官人</a>
                        <a href="https://www.u88.com/xiangmu/2021080.html">君山银针茶业</a>
                        <a href="https://www.u88.com/xiangmu/2021078.html">三和茶业</a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="https://www.u88.com/xiangmu/3224.html">腾业装饰</a>
                        <a href="https://www.u88.com/xiangmu/2004743.html">康之居装饰装潢</a>
                        <a href="https://www.u88.com/xiangmu/2004166.html">乐豪斯装修</a>
                        <a href="https://www.u88.com/xiangmu/2004147.html">创昕全屋整装</a>
                        <a href="https://www.u88.com/xiangmu/3225.html">鸿扬宅配</a>
                        <a href="https://www.u88.com/xiangmu/256.html">链家地产</a>
                        <a href="https://www.u88.com/xiangmu/2007176.html">我爱我家房产中介</a>
                        <a href="https://www.u88.com/xiangmu/3317.html">21世纪不动产</a>
                        <a href="https://www.u88.com/xiangmu/3311.html">大众房产</a>
                        <a href="https://www.u88.com/xiangmu/3280.html">首创置业</a>
                        <a href="https://www.u88.com/xiangmu/2020872.html">贝妈之家母婴网店</a>
                        <a href="https://www.u88.com/xiangmu/2019721.html">大嘴狗宠物医院</a>
                        <a href="https://www.u88.com/xiangmu/8291.html">罗森便利店</a>
                        <a href="https://www.u88.com/xiangmu/2008458.html">米兰婚纱摄影</a>
                        <a href="https://www.u88.com/xiangmu/2008101.html">红绣球婚庆</a>
                        <a href="https://www.u88.com/xiangmu/2007562.html">邮政快递</a>
                        <a href="https://www.u88.com/xiangmu/2005656.html">好邦伲家政</a>
                        <a href="https://www.u88.com/xiangmu/2005136.html">UCC国际洗衣</a>
                        <a href="https://www.u88.com/xiangmu/2005144.html">安能物流</a>
                        <a href="https://www.u88.com/xiangmu/2005140.html">酷迪宠物店</a>
                        <a href="https://www.u88.com/xiangmu/2004828.html">快客便利店</a>
                        <a href="https://www.u88.com/xiangmu/4096.html">靓点婚纱摄影</a>
                        <a href="https://www.u88.com/xiangmu/8460.html">安恩贝月嫂</a>
                        <a href="https://www.u88.com/xiangmu/3277.html">顺驰房产</a>
                        <a href="https://www.u88.com/xiangmu/117.html">贵族天使儿童摄影</a>
                        <a href="https://www.u88.com/xiangmu/2020871.html">咱宝贝网店</a>
                        <a href="https://www.u88.com/xiangmu/2020802.html">七里香花店</a>
                        <a href="https://www.u88.com/xiangmu/2020461.html">澳贝森干洗</a>
                        <a href="https://www.u88.com/xiangmu/2020390.html">吉善缘佛教用品</a>
                        <a href="https://www.u88.com/xiangmu/2012039.html">格林童趣</a>
                        <a href="https://www.u88.com/xiangmu/2010017.html">广信快递</a>
                        <a href="https://www.u88.com/xiangmu/2008311.html">喜洋洋婚庆</a>
                        <a href="https://www.u88.com/xiangmu/2006762.html">宠物宝宝宠物店</a>
                        <a href="https://www.u88.com/xiangmu/2005138.html">派多格宠物店</a>
                        <a href="https://www.u88.com/xiangmu/2004448.html">7-11便利店</a>
                        <a href="https://www.u88.com/xiangmu/107127.html">天使宝贝月嫂</a>
                        <a href="https://www.u88.com/xiangmu/4098.html">蔓延视觉婚纱摄影</a>
                        <a href="https://www.u88.com/xiangmu/3989.html">佳居乐家政服务</a>
                        <a href="https://www.u88.com/xiangmu/4205.html">北大荒物流</a>
                        <a href="https://www.u88.com/xiangmu/508.html">吉泰连锁酒店</a>
                        <a href="https://www.u88.com/xiangmu/2019132.html">翰申微金融</a>
                        <a href="https://www.u88.com/xiangmu/2020870.html">爱购爱度网店</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--第四部分 结束-->

    <!--广告位 开始-->
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/1013307.html"><img src="https://www.u88.com/uploads/picture/18/89/57b6c78c026e0bb0962e3dec8560.gif" /></a></div>
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/2024105.html"><img src="https://www.u88.com/uploads/picture/2d/3c/6ee795ab3e88eabb8d3732d863f3.gif" /></a></div>
    <div class="brannd_597x60">
        <ul>
            <li><a href="https://www.u88.com/xiangmu/2004070.html"><img src="https://www.u88.com/uploads/picture/4e/69/a70e99a117a3d3335af13a7235d5.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2018966.html"><img src="https://www.u88.com/uploads/picture/87/8e/9474767f1cd75d926eff3a4a872f.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2022404.html"><img src="https://www.u88.com/uploads/picture/4a/53/14b9122ce32b7533d6b5f0677151.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2017645.html"><img src="https://www.u88.com/uploads/picture/ff/25/2c59a28d823cfd064aafb595b0f9.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2016775.html"><img src="https://www.u88.com/uploads/picture/76/9a/94cfa0ad4cbf53bdafd029516fd0.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/4813.html"><img src="https://www.u88.com/uploads/picture/16/f4/aceadf571422c753551589964805.gif" /></a></li>
        </ul>
    </div>
    <div class="brannd_295x60">
        <ul>
            <li><a href="https://www.u88.com/xiangmu/2008763.html"><img src="https://www.u88.com/uploads/picture/a8/d1/dadc0896eac32377c00bd83ca370.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2003796.html"><img src="https://www.u88.com/uploads/picture/3d/93/66beea3edcf9db0f3ddcb5a7966b.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2016764.html"><img src="https://www.u88.com/uploads/picture/a8/d1/34c5cfc4cb1de2ce6821b8c3ace4.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2009344.html"><img src="https://www.u88.com/uploads/picture/1e/40/c4705bfd5c88e7fc93581f94e096.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2011272.html"><img src="https://www.u88.com/uploads/picture/75/17/906d69239c061a990d55192d2004.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2019451.html"><img src="https://www.u88.com/uploads/picture/39/a6/93ee3c0b0b46945f4fe8af039d2b.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/8505.html"><img src="https://www.u88.com/uploads/picture/96/a4/f985e3a525981bacce12e0ba7f80.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2016691.html"><img src="https://www.u88.com/uploads/picture/5a/c3/8beace0c20f73c95c191db2efe72.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2019474.html"><img src="https://www.u88.com/uploads/picture/08/1e/4c0f15ddf5732a61706fc682f68e.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/5821.html"><img src="https://www.u88.com/uploads/picture/75/b0/3fb5e540759fe8d714b708ea7591.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2016715.html"><img src="https://www.u88.com/uploads/picture/06/53/d37a07483c5a27251246f879ee50.gif" /></a></li>
            <li><a href="https://www.u88.com/xiangmu/2016689.html"><img src="https://www.u88.com/uploads/picture/b7/1a/3534f48ac231f02270e27df5d57a.gif" /></a></li>
        </ul>
    </div>
    <!--广告位 结束-->


    <!--第五部分 开始-->
    <div class="mainbox">
        <div class="item_left">
            <div class="item">
                <div class="hd">
                    <div class="tit">
                        <h3>创业指导</h3>
                        <span class="more"><a href="/chuangyezhidao/">更多&gt;&gt;</a></span>
                    </div>
                    @foreach($chuangyenews as $chuangyenew)
                        @if($loop->first)
                        <dl>
                            <dt><a href="/article/{{$chuangyenew->id}}.html" target="_blank"><img src="{{$chuangyenew->litpic}}" alt="{{$chuangyenew->title}}"></a></dt>
                            <dd class="name"><a href="/article/{{$chuangyenew->id}}.html" target="_blank">{{$chuangyenew->title}}</a></dd>
                            <dd class="desc">{{$chuangyenew->description}}...<a href="/article/{{$chuangyenew->id}}.html">详情&gt;</a></dd>
                        </dl>
                        @endif
                    @endforeach
                </div>
                <div class="bd">
                    <ul>
                        @foreach($chuangyenews as $chuangyenew)
                            @if(!$loop->first)
                            <li><a href="/article/{{$chuangyenew->id}}.html" target="_blank" title="{{$chuangyenew->title}}">{{$chuangyenew->title}}</a><span>{{date('Y-m-d',strtotime($chuangyenew->created_at))}}</span></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="item">
                <div class="hd">
                    <div class="tit">
                        <h3>加盟费用</h3>
                        <span class="more"><a href="/chuangyezhinan/">更多&gt;&gt;</a></span>
                    </div>
                    @foreach($jmfeiyongnews as $jmfeiyongnew)
                        @if($loop->first)
                            <dl>
                                <dt><a href="/article/{{$jmfeiyongnew->id}}.html" target="_blank"><img src="{{$jmfeiyongnew->litpic}}" alt="{{$jmfeiyongnew->title}}"></a></dt>
                                <dd class="name"><a href="/article/{{$jmfeiyongnew->id}}.html" target="_blank">{{$jmfeiyongnew->title}}</a></dd>
                                <dd class="desc">{{$jmfeiyongnew->description}}...<a href="/article/{{$jmfeiyongnew->id}}.html">详情&gt;</a></dd>
                            </dl>
                        @endif
                    @endforeach
                </div>
                <div class="bd">
                    <ul>
                        @foreach($jmfeiyongnews as $jmfeiyongnew)
                            @if(!$loop->first)
                                <li><a href="/article/{{$jmfeiyongnew->id}}.html" target="_blank" title="{{$jmfeiyongnew->title}}">{{$jmfeiyongnew->title}}</a><span>{{date('Y-m-d',strtotime($jmfeiyongnew->created_at))}}</span></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="item">
                <div class="hd">
                    <div class="tit">
                        <h3>投资行情</h3>
                        <span class="more"><a href="/touzi/">更多&gt;&gt;</a></span>
                    </div>
                    @foreach($touzinews as $touzinew)
                        @if($loop->first)
                            <dl>
                                <dt><a href="/article/{{$touzinew->id}}.html" target="_blank"><img src="{{$touzinew->litpic}}" alt="{{$touzinew->title}}"></a></dt>
                                <dd class="name"><a href="/article/{{$touzinew->id}}.html" target="_blank">{{$touzinew->title}}</a></dd>
                                <dd class="desc">{{$touzinew->description}}...<a href="/article/{{$touzinew->id}}.html">详情&gt;</a></dd>
                            </dl>
                        @endif
                    @endforeach
                </div>
                <div class="bd">
                    @foreach($touzinews as $touzinew)
                        @if(!$loop->first)
                            <li><a href="/article/{{$touzinew->id}}.html" target="_blank" title="{{$touzinew->title}}">{{$touzinew->title}}</a><span>{{date('Y-m-d',strtotime($touzinew->created_at))}}</span></li>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="item">
                <div class="hd">
                    <div class="tit">
                        <h3>品牌动态</h3>
                        <span class="more"><a href="/shangji/">更多&gt;&gt;</a></span>
                    </div>
                    @foreach($pinpainews as $pinpainew)
                        @if($loop->first)
                            <dl>
                                <dt><a href="/article/{{$pinpainew->id}}.html" target="_blank"><img src="{{$pinpainew->litpic}}" alt="{{$pinpainew->title}}"></a></dt>
                                <dd class="name"><a href="/article/{{$pinpainew->id}}.html" target="_blank">{{$pinpainew->title}}</a></dd>
                                <dd class="desc">{{$pinpainew->description}}...<a href="/article/{{$pinpainew->id}}.html">详情&gt;</a></dd>
                            </dl>
                        @endif
                    @endforeach
                </div>
                <div class="bd">
                    @foreach($pinpainews as $pinpainew)
                        @if(!$loop->first)
                            <li><a href="/article/{{$pinpainew->id}}.html" target="_blank" title="{{$pinpainew->title}}">{{$pinpainew->title}}</a><span>{{date('Y-m-d',strtotime($pinpainew->created_at))}}</span></li>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="hot_message">
            <div class="common_tit">
                <h2 class="co">展会信息</h2>
                <div class="top_xian"></div>
            </div>
            <div class="hot_pinpai">
                <div class="hot_pinpai_hd">
                    <div class="img_show"><a href="https://www.u88.com/article/3715332.html"><img src="https://www.u88.com/uploads/picture/a6/24/a8a4eabcd5e24b64ad5a1ba97872.jpg" title="第二十一界国际名酒展"></a></div>
                    <div class="img_show"><a href="https://www.u88.com/article/3717404.html"><img src="https://www.u88.com/uploads/picture/59/36/89c23ed6f131fce6b1fef0674849.jpg" title="国际幼儿教育展"></a></div>
                    <div class="img_show"><a href="https://www.u88.com/article/3720878.html"><img src="https://www.u88.com/uploads/picture/01/20/7cfeb01d17745c59c316d55ea4fd.jpg" title="创业展览"></a></div>
                </div>

                <ul>
                    <li><a href="/article/3720878.html">2017第33届北京国际连锁加盟展览会</a></li>
                    <li><a href="/article/3720332.html">2017中国品牌加盟投资博览会 创业加盟精彩继续</a></li>
                    <li><a href="/article/3718008.html">CLIC CHINA 2017上海连锁加盟展览会</a></li>
                    <li><a href="/article/3718006.html">2017年5月19-21日  长沙.湖南国际会展中心（广电）</a></li>
                    <li><a href="/article/3717404.html">第19届北京国际幼教用品展览会邀请函</a></li>
                    <li><a href="/article/3717401.html">2017第十七届中国（杭州）国际服装服饰博览会</a></li>

                </ul>
            </div>
        </div>
    </div>

    <!--第五部分 结束-->

    <!--第六部分 开始-->
    <div class="mainbox">
        <div class="center_new_list">
            <div class="common_tit">
                <h2>潜力品牌</h2>
                <div class="top_1200"></div>
            </div>
            <ul>
                @foreach($latestbrandbots as $latestbrandbot)
                  <li> <a href="/xiangmu/{{$latestbrandbot->id}}.html"><img src="{{$latestbrandbot->litpic}}" alt="" title="{{$latestbrandbot->brandname}}">
                            <div class="new_tit_1">
                                <p class="tit">{{$latestbrandbot->brandname}}</p>
                                <p>投资金额：<em>{{$investment_types[$latestbrandbot->tzid]}}</em> <span>了解详情</span></p>
                            </div>
                        </a>
                  </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!--第六部分 结束-->

    <!--广告位 开始-->
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/2004745.html"><img src="https://www.u88.com/uploads/picture/44/ae/227db6478c27b03d625cac67944e.jpg" /></a></div>
    <div class="brannd_1200x60"><a href="https://www.u88.com/xiangmu/2005136.html"><img src="https://www.u88.com/uploads/picture/c7/42/e2b9f40f68c13088d17df3bff50a.gif" /></a></div>
    <div class="brannd_597x60">
        <ul>
        </ul>
    </div>
    <div class="brannd_295x60">
        <ul>
        </ul>
    </div>
    <!--广告位 开始-->
    <!--友情链接 开始-->
    <div class="mainbox">
        <div class="flink">
            <div class="common_tit">
                <h2>友情链接</h2>
                <div class="top_1200"></div>
            </div>
            <div class="bd">
                <ul>
                    @foreach($flinks as $flink)
                    <li><a href="{{$flink->weburl}}">{{$flink->webname}}</a></li>
                   @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--友情链接 结束-->

@stop
@section('footerlibs')

@stop