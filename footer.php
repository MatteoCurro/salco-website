		<footer id="footer" class="source-org vcard copyright">
			<small>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></small>
		</footer>

	</div>

	<?php wp_footer(); ?>



<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<footer>
	<section class="social">
		<hr class="divider">
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png" alt="Salco Italia Twitter"></a>
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" alt="Salco Italia Facebook"></a>
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin.png" alt="Salco Italia Linkedin"></a>
	</section>
</footer>
</div>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.mousewheel.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.smartresize.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/shadowbox.js"></script>


<script>
(function($){
	// Archivio le variabili
	var product = $('.product'),
		win = $(window),
		body = $('body'),
		main = $('.main');

	// dichiaro la funzione per centrare il contenitore
	// ps: vengono sottratti 30px all'altezza del product nel caso in cui
	// ci fossero troppi dettagli e quindi risultasse il tutto troppo spostato
	// verso l'alto
	function centerContainer() {
		var product = $('.product');
		var press = $('.press-single');
		product.css('margin-top', ($(window).height()/2)-(product.height()/2-10));
		press.css('margin-top', ($(window).height()/2)-(press.height()/2-30));
	}

	// da fixare... perchè non inverte nuovamente lo scroll?
	function reverseScroll(what, body) {
		if (what) {
			body.on('mousewheel DOMMouseScroll',function(event, delta) {
				this.scrollLeft -= (delta * 30);
				event.preventDefault();
				return false;
			});
		} else {
			body.off('mousewheel DOMMouseScroll');
			return;
		}
	}

	function checkLayout(body, main) {
		// eseguo le operazioni solo nel caso in cui
		// la pagina avesse la classe horizontal e quindi
		// avesse uno scorrimento orizzontale
		if( main.hasClass('horizontal') ) {

			Shadowbox.init();

			if (Modernizr.mq('only screen and (min-width: 800px)')) {
				// con l'ausilio del plugin mousewheel inverto lo scorrimento
				// della pagina con, appunto, la mousewheel o il trackpad
				reverseScroll(true, body);

				// imposto la larghezza del contenitore al totale dei prodotti
				// main.width(product.width() * product.length);
				$(".horizontal").wrapInner("<table cellspacing='100'><tr>");
				$(".product, .press-single").wrap("<td>");
		 		centerContainer();
	 		}

	 		// con l'ausilio di smartresize centro verticalmente i prodotti
	 		// ogni volta che viene ridimensionata la finestra
	 		win.smartresize(function(){
	 			if (Modernizr.mq('only screen and (min-width: 800px)')) {
					centerContainer();
					reverseScroll(true, body);
				} else {
					main.width('100%');
					reverseScroll(false, body);
				}
			});
		}
	}

	$("nav select").change(function() {
	  window.location = $(this).find("option:selected").val();
	});

	checkLayout($('body'), $('.main'));

})(jQuery);

</script>

<script src="<?php bloginfo('template_directory'); ?>/_/js/ajax-loading.js"></script>

</body>

</html>
