<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="main">
	
	<div class="big-logo">
		<img src="<?php bloginfo('template_directory'); ?>/img/logo-400.png" alt="Salco Italia">
	</div>

	<div class="home-piumino full-piumino">
		<img src="<?php bloginfo('template_directory'); ?>/img/piumini/home-full.png" alt="Salco Italia Piumini">
	</div>

	<div class="home-piumino left-piumino">
		<img class="feather " src="<?php bloginfo('template_directory'); ?>/img/feather/left-1.png" alt="Piume Salco">
		<img class="feather" src="<?php bloginfo('template_directory'); ?>/img/feather/left-2.png" alt="Piume Salco">

		<img src="<?php bloginfo('template_directory'); ?>/img/piumini/home-cappuccio.png" alt="Salco Italia Piumini">
	</div>
	<div class="home-piumino right-piumino">
		<img class="feather " src="<?php bloginfo('template_directory'); ?>/img/feather/right-1.png" alt="Piume Salco">
		<img class="feather" src="<?php bloginfo('template_directory'); ?>/img/feather/right-2.png" alt="Piume Salco">

		<img src="<?php bloginfo('template_directory'); ?>/img/piumini/home-camouflage.png" alt="Salco Italia Piumini">
	</div>
	
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
