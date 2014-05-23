(function($){
	// console.log ($("a[rel='ajax']"));

	function ajaxLoading(e){
		//get the link location that was clicked
		var pageurl = $(this).attr('href');

		$.ajax({
			url:pageurl,
			dataType: "html",
			success: function(data){
				console.log('chiamata');
			// nascondo la navigazione e i social
			$('nav, .social').fadeOut(500);
				// una volta concluso imposto il logo
				// centrato verticalmente
				$('.logo').animate({
					marginTop: ($(window).height()/2)-($('.logo').height()/2)
				}, 500, function() {
					// una volta concluso imposto l'header largo
					// al 100%
					$('header').animate({
						width: '100%'
					},500, function() {
						// una volta concluso nascondo il body e carico
						// il contenuto html della pagina
						$('#wrapper').fadeOut(500,function() {
							// imposto la pagina alla posizione iniziale
							$(window).scrollTop(0);
							data = $(data).filter('#wrapper');
							// console.log(data);

							// carico i dati
							$('#wrapper').remove();
							$('body').prepend(data).fadeIn(500);
							$("nav.desktop a").on('click', ajaxLoading);
							// aspetto il caricamento delle immagini
							$("img").one('load', function() {
								// centro il contenitore
								// centerContainer(product, win);
								$('.product').css('margin-top', ($(window).height()/2)-($('.product').height()/2-30));
								$('.press-single').css('margin-top', ($(window).height()/2)-($('.press-single').height()/2-30));
							});
						}); // fine body fade out
					}); // fine header animate
				}); // fine logo animate
			
		}}); // fine success e ajax call

		//to change the browser URL to the given link location
		if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);
		}
		//stop refreshing to the page given in
		return false;
	}
$("nav.desktop a").on('click', ajaxLoading);

	/* the below code is to override back button to get the ajax content without page reload*/
	$(window).bind('popstate', function() {
		$.ajax({url:location.pathname+'?rel=ajax',success: function(data){
			$(window).scrollTop(0);
			$('body').html(data).fadeIn(400);
		}});
	});

})(jQuery);