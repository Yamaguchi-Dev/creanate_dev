/*======== gl-menu,footer ========*/
$(function(){
    $('#gl-menu').load('/common/include/gl_menu.html');
    $('#gl-menu_sp').load('/common/include/gl_menu_sp.html');
    $('#footer').load('/common/include/footer.html');
    $('#left-menu').load('/common/include/left_menu.html');
});


/*======== pagetop ========*/

$(function(){
  var pagetop = $('.pagetop-area');
  // ボタン非表示
  pagetop.hide();

  // 100px スクロールしたらボタン表示
  $(window).on('scroll', '.pagetop-area', function(){
     if ($(this).scrollTop() > 200) {
          pagetop.fadeIn();
     } else {
          pagetop.fadeOut();
     }
  });
  pagetop.click(function () {
     $('body, html').animate({ scrollTop: 0 }, 500);
     return false;
  });
});




$(document).ready(function(){
    $('.pagetop-area').hide();
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            $('.pagetop-area').fadeIn("fast");
        } else {
            $('.pagetop-area').fadeOut("fast");
        }
    });
});



$(document).on('click', '.btnMenu-area', function(){
	$(this).next().slideToggle();
	$('#gl-menu_sp').toggleClass("open");
	$('.overlay').toggle();

	
	if($('#gl-menu_sp').hasClass('open') == false){
		$('.btnMenu').attr('src', '/common/images/menu.png').addClass('open');
	}else{
		$('.btnMenu').attr('src', '/common/images/menu_close.png').removeClass('open');
	}
	
	if($('#gl-menu_sp').hasClass('open') == false){
		$('#gl-menu_sp .glNav li p').next().slideUp();
		$('body').css('position', 'static');
	}else{
		$('#gl-menu_sp .glNav li p').removeClass('open');
		$('body').css('position', 'fixed');
	}
});
$(document).on('click', '.glNav a[href] , .overlay', function(){
	$('.btnMenu-area').trigger('click');
});



/*======== Global nav サブ(SP) ========*/
$(document).on('click', '#gl-menu_sp .glNav li p', function(){
	$(this).next().slideToggle();
	$(this).toggleClass("open");
});


$(document).on('click', '.btnMenu-area', function(){
	
});


/*======== アコーディオン (SP) ========*/
$(document).on('click', '.dropdown', function(){
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu').slideToggle(300);
    });
    $('.dropdown').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropdown-menu').slideUp(300);
    });
    $('.dropdown .dropdown-menu li').click(function () {
        $(this).parents('.dropdown').find('span').text($(this).text());
        $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
    });
/*End Dropdown Menu*/


$('.dropdown-menu li').click(function () {
  var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
      msg = '<span class="msg">Hidden input value: ';
  $('.msg').html(msg + input + '</span>');
}); 



