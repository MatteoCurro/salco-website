(function(e){function t(n){var r=e(this).attr("href");e.ajax({url:r,dataType:"html",success:function(n){console.log("chiamata");e("nav, .social").fadeOut(500);e(".logo").animate({marginTop:e(window).height()/2-e(".logo").height()/2},500,function(){e("header").animate({width:"100%"},500,function(){e("#wrapper").fadeOut(500,function(){e(window).scrollTop(0);n=e(n).filter("#wrapper");e("#wrapper").remove();e("body").prepend(n).fadeIn(500);e("nav.desktop a").on("click",t);e("img").one("load",function(){e(".product").css("margin-top",e(window).height()/2-(e(".product").height()/2-30));e(".press-single").css("margin-top",e(window).height()/2-(e(".press-single").height()/2-30))})})})})}});r!=window.location&&window.history.pushState({path:r},"",r);return!1}e("nav.desktop a").on("click",t);e(window).bind("popstate",function(){e.ajax({url:location.pathname+"?rel=ajax",success:function(t){e(window).scrollTop(0);e("body").html(t).fadeIn(400)}})})})(jQuery);