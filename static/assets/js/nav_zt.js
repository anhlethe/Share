//��ҳ����banner
$(function(){
	
/*�����л�*/	

	$(".nav-ul li a").wrapInner( '<span class="out"></span>' );
	
	$(".nav-ul li a").each(function() {
		$( '<span class="over">' +  $(this).text() + '</span>' ).appendTo( this );
	});

	$(".nav-ul li a").hover(function() {
		$(".out",	this).stop().animate({'top':	'43px'},	300); // move down - hide
		$(".over",	this).stop().animate({'top':	'0px'},		300); // move down - show

	}, function() {
		$(".out",	this).stop().animate({'top':	'0px'},		300); // move up - show
		$(".over",	this).stop().animate({'top':	'-43px'},	300); // move up - hide
	});	
	
});


//��ҳ�˵���̬����λ��
function posTop(obj) {
	var Top = 0;
	while (obj) {
		Top += obj.offsetTop;
		obj = obj.offsetParent;
	}
	return parseInt(Top);
}
var _menudiv = document.getElementById('submenu').getElementsByTagName('div');

window.onscroll = function(){
	
	if(parseInt(document.documentElement.scrollTop || document.body.scrollTop) > posTop(document.getElementById('nav')) + 43){	

		$(".nav-submenu-xl").css("top",(parseInt(document.documentElement.scrollTop || document.body.scrollTop) - posTop(document.getElementById('submenu'))+43)+"px");
	}else{
		$(".nav-submenu-xl").css("top","43px");
	}
}

//��ҳ����Ч��
if(document.getElementById("submenu")){
var _submenu = $("#submenu").find('.submenu1');
var _time = 100;

function autoScrollDown(){
	if($(".nav-submenu").css("height") == '0px'){
		if(!-[1,] && !window.XMLHttpRequest){
			$(".nav-submenu").css("height","472px").find('.submenu1').eq(0).animate({top:'0px'},_time,function(){
				_submenu.eq(1).css("top","0px").animate({top:'105px'},_time,function(){
					_submenu.eq(2).css("top","105px").animate({top:'210px'},_time,function(){
						_submenu.eq(3).css("top","210px").animate({top:'315px'},_time);
					})
				});
			});
		}else{
			$(".nav-submenu").css("height","472px").find('.submenu1').eq(0).animate({bottom:'-119px'},_time,function(){
				_submenu.eq(1).css("bottom","-105px").animate({bottom:'-238px'},_time,function(){
					_submenu.eq(2).css("bottom","-210px").animate({bottom:'-357px'},_time,function(){
						_submenu.eq(3).css("bottom","-315px").animate({bottom:'-476px'},_time);
					})
				});
			
			});
		}
	}
}

function autoScrollUp(){
	$(".nav-l").removeClass("nav-l-hover");
	$(".nav-submenu").css("height","0px").find('.submenu1').stop().css("bottom","0px");
	$(".nav-submenu-xl").hide().children('div').hide();
	_submenu.removeClass('submenu1-hover');
}

$(".nav-l").hover(function(){

	clearTimeout(_autoscroll);
	$(".nav-l").addClass("nav-l-hover");
	autoScrollDown();
},function(){
	autoScrollUp();
});

var _autoscroll = setTimeout(function(){autoScrollUp();},5000);
/**��һ�δ���չ�������**/
/*$(function(){
	$(".nav-l").addClass("nav-l-hover");
	autoScrollDown();
}); */
/**��һ�δ���չ�������--end**/
_submenu.hover(function(){
	_submenu.removeClass('submenu1-hover').eq($(this).index()).addClass('submenu1-hover');
	$(".nav-submenu-xl").show().children('div').hide().eq($(this).index()).show();
	
});
}












//�ַ���Ч��
(function($) {
	$.fn.shoufq = function(o) {
		o = $.extend({
			aniBeforeWidth: '0',
			aniAfterWidth: '0'
		},
		o);
		var _this = this;

		var aBW = o.aniBeforeWidth;
		var aAW = o.aniAfterWidth;
		var v = o.aniStyle;
		return _this.each(function() {
			$(this).mouseover(function() {
				$(this).stop().animate({
					width: aAW
				},
				300).siblings().stop().animate({
					width: aBW
				},
				300);
			});
		});
	}
})(jQuery);
 




function expand(el)
{
var childObj = document.getElementById("child" + el);
var header_hot = document.getElementById("header_hot");//��id������ʽ
if (childObj.style.display == 'block')
{
childObj.style.display = 'none';//�����ر�
header_hot.style.backgroundPosition="0px 0";//��id������ʽ
}
else
{
childObj.style.display = 'block';//������
header_hot.style.backgroundPosition="0px -22px";//��id������ʽ
}
return;
}


function onexpand(el)
{
var childObj = document.getElementById("child" + el);
var header_hot = document.getElementById("header_hot");//��id������ʽ

childObj.style.display = 'block';//������
header_hot.style.backgroundPosition="0px -22px";//��id������ʽ

return;
}



function outexpand(el)
{
var childObj = document.getElementById("child" + el);
var header_hot = document.getElementById("header_hot");//��id������ʽ

childObj.style.display = 'none';//�����ر�
header_hot.style.backgroundPosition="0px 0";//��id������ʽ

return;
}