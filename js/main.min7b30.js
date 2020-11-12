function writeCookie(name, value, days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
$(document).ready(function () {
  $('.page-counter_plus').on('click', function () {
    $('#calc4').val(parseInt($('#calc4').val()) + 1),
    $('#calc4').trigger('change')
  }),
  $('.page-counter_minus').on('click', function () {
    $('#calc4').val() >= 2 && ($('#calc4').val(parseInt($('#calc4').val()) - 1), $('#calc4').trigger('change'))
  }),
  $('.calculator-date').on('click', function () {
    $('#dateFolder').css('opacity', '0')
  }),
  $(function () {
    $('dt').on('click', function (e) {
      $(this).parent('dl div').hasClass('checked') ? ($('dl div').removeClass('checked'), $('dl div').children('dd:visible').slideUp(), $(this).nextUntil('dt').filter(':not(:visible)').slideDown())  : (e.preventDefault(), $('dl div dd').slideUp(), $(this).nextUntil('dt').filter(':not(:visible)').slideDown(), $('dl div').removeClass('checked'), $(this).parent('dl div').addClass('checked'))
    })
  }),
  $('input').focus(function () {
    $(this).parents('.form-group').addClass('focused')
  }),
  $('input').blur(function () {
    '' == $(this).val() ? ($(this).removeClass('filled'), $(this).parents('.form-group').removeClass('focused'))  : $(this).addClass('filled')
  }),
  $('textarea').focus(function () {
    $(this).parents('.form-group').addClass('focused')
  }),
  $('textarea').blur(function () {
    '' == $(this).val() ? ($(this).removeClass('filled'), $(this).parents('.form-group').removeClass('focused'))  : $(this).addClass('filled')
  }),
  $(window).width() <= 760 && ($('.statistics-items').addClass('single-item'), $('.advantages-items').addClass('single-testimonials')),
  $('.readmore-link').click(function () {
    $('.readmore-link').hasClass('all') && $(window).width() > 600 ? ($('.readmore-link__text').html('READ ALL <img src="images/arrow_down.png" alt="">'), $('.readmore-link').removeClass('all'), $('.hidden-text').slideUp())  : $('.readmore-link').hasClass('all') && $(window).width() <= 600 ? ($('.readmore-link__text').html('READ ALL <img src="images/arrow_down.png" alt="">'), $('.readmore-link').removeClass('all'), $('.hidden-text-mob').slideUp(), $('.hidden-text').slideUp())  : ($('.readmore-link__text').html('READ LESS'), $('.readmore-link').addClass('all'), $('.hidden-text-mob').slideDown(), $('.hidden-text').slideDown())
  }),
  $('.close').on('click', function () {
    $('.header-offer').slideUp(),
    $('.header').css('height', '60px'),
    writeCookie('GetEssay_5_coupon', 'true', 30);
  }),
  $(window).width() <= 1024 && $('.close').on('click', function () {
    $('.header-offer').slideUp(),
    $('.header').css('height', '60px'),
    $('.main-nav').css('top', '64px')
  });
  var e = $('.header-body');
  $(window).scroll(function () {
    $(this).scrollTop() > 500 && e.hasClass('default') ? e.fadeOut('slow', function () {
      $(this).removeClass('default').addClass('fixed transbg').fadeIn()
    })  : $(this).scrollTop() <= 500 && e.hasClass('fixed') && e.fadeOut('slow', function () {
      $(this).removeClass('fixed transbg').addClass('default').fadeIn()
    })
  }),
  $(function () {
    function e() {
      $('.humburger').hasClass('menu_close') ? ($('.header-menu').removeAttr('style'), $('.humburger').removeClass('menu_close'), $('.main-nav').animate({
        height: 'toggle'
      }), $('.humburger').removeClass('humburger-hover'), $('html,body').removeClass('overflow-hidden'), $('.overlay').removeClass('overlay-active overflow-hidden'), $('header').removeClass('absolute'))  : $(window).width() > 600 ? ($('.humburger').toggleClass('menu_close'), $('.header-menu').css('height', '128px'), $('.main-nav').animate({
        height: 'toggle'
      }), $('.humburger').toggleClass('humburger-hover'), $('html,body').addClass('overflow-hidden'), $('.overlay').toggleClass('overlay-active overflow-hidden'), $('header').toggleClass('absolute'))  : ($('.humburger').toggleClass('menu_close'), $('.main-nav').animate({
        height: 'toggle'
      }), $('.humburger').toggleClass('humburger-hover'), $('html,body').addClass('overflow-hidden'), $('.overlay').toggleClass('overlay-active overflow-hidden'), $('header').toggleClass('absolute'))
    }
    $('.humburger').on('click', function () {
      e()
    }),
    $('.overlay').on('click', function () {
      e()
    }),
    $('.close-menu').on('click', function () {
      e()
    })
  })
});

$(document).ready(function(){
	var d = document.getElementById("nav"),
		a = d.getElementsByTagName("a"),
		c = location.protocol + "//" + document.domain + "/" + location.pathname.split("/")[1] + "/";
	if (c == location.protocol + "//" + document.domain + "//") {
		c = window.location
	}
	for (var b = 0; b < a.length; b++) {
		if (a[b].href == c) {
			a[b].parentNode.className = "active"
		}
	}
});

function doOnOrientationChange() {
    switch(window.orientation) {
      case -90:
         if($('.humburger-hover').length > 0){$('.header-menu').css('height', '128px');}
        break;
      case 90:
         if($('.humburger-hover').length > 0){$('.header-menu').css('height', '128px');}
         break;
      default:
        $('.header-menu').removeAttr('style');
        break;
    }
}
if(window.innerWidth < 768){
    window.addEventListener('orientationchange', doOnOrientationChange);
}
// doOnOrientationChange();