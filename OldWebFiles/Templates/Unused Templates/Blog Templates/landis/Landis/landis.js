var topNav = {
	init : function(){
		$(".page_item:last").css("background","none");
	}
};

var sideBar = {
	init : function(){
		$("div.box").each(
			function(){
				$(this).replaceWith('<div class="boxtop"><div class="boxbottom"><div class="boxmiddle">' + $(this).html() + '</div></div></div>');
			}
		);
	}
};

/*  Onload Functions    //---------------------------*/
$(document).ready(function(){
	topNav.init();
	sideBar.init();
});