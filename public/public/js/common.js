$(function(){
//排行
$(".boutique_list li").hover(function(){
		$(this).addClass('hover').siblings().removeClass('hover');
	});
$(".rank_item li").hover(function(){
		$(this).addClass('hover').siblings().removeClass('hover');
	});
	

/*首页播报*/
jQuery(".mod-provide").slide({mainCell:".interlayer-rotatelist-list ul",autoPage:true,effect:"left",autoPlay:true,scroll:1,vis:1});

/*首页切换*/
jQuery(".sum_top").slide({});
jQuery(".div-content").slide({});	

/*首页留言动态*/
jQuery(".hot_message").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:4,interTime:50,trigger:"click"});

jQuery(".smallslider").slide({mainCell:".bd ul",autoPlay:true});

jQuery(".vip_msg_list").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:5,interTime:50,trigger:"click"});

//客户留言
jQuery("#js_msg").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,pnLoop:false,trigger:"click"});	

$(".liuyan-right li").click(function(){
	 $(".liuyan-cen textarea").val($(this).text());  
});

$(".check_msg_bd li").click(function(){
	 $("#content").val($(this).text());  
  });	
	
$('.js_join_1').click(function(){
	var sTop=$('#js_join_1').offset().top-45;
	$('html,body').animate({scrollTop:sTop+"px"},500);
});
$('.js_join_2').click(function(){
	var sTop=$('#js_join_2').offset().top-45;
	$('html,body').animate({scrollTop:sTop+"px"},500);
});
$('.js_join_3').click(function(){
	var sTop=$('#js_join_3').offset().top-45;
	$('html,body').animate({scrollTop:sTop+"px"},500);
});
$('.js_join_4').click(function(){
	var sTop=$('#js_join_4').offset().top-45;
	$('html,body').animate({scrollTop:sTop+"px"},500);
});
$('.js_join_5').click(function(){
	var sTop=$('#js_join_5').offset().top-45;
	$('html,body').animate({scrollTop:sTop+"px"},500);
});
$('.js_join_6').click(function(){
	var sTop=$('#js_join_6').offset().top-45;
	$('html,body').animate({scrollTop:sTop+"px"},500);
});


//内容页固定导航
$(document).scroll(function(){
	//获取窗口的滚动条的垂直位置
	var s = $(document).scrollTop();
	//当窗口的滚动条的垂直位置大于页面的最小高度时，让返回顶部元素渐现，否则渐隐
	if( s > 177){
		$(".vip_nav").addClass("vip_nav_fixed");
	}else{
		$(".vip_nav").removeClass("vip_nav_fixed");
		}	

	
 });


});


 