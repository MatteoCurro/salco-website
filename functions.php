<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );

        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);

	// Add RSS links to <head> section
	automatic_feed_links();
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

    register_nav_menus(
        array(
            'primary'   =>  'Primary Menu'
        )
    );


    add_filter( 'wpcf7_form_class_attr', 'your_custom_form_class_attr' );

    function your_custom_form_class_attr( $class ) {
        $class .= ' contact';
        return $class;
    }

    // verifichiamo che wordpress sia stato inizializzato
    add_action('init', function() {
        // creiamo, ad esempio, un post type per gli snippet
        register_post_type('collection', array(
            'public' => true, // post type pubblico
            'label' => 'Collection', // nome dell'etichetta
            'labels' => array( // configuriamo qualche etichetta
                'add_new_item' => 'Aggiungi Prodotto',
                'edit_item' => 'Modifica Prodotto',
                'new_item' => ' Aggiungi Prodotto'
                ),
            'supports' => array( 'title', 'editor', 'comments'),
            'taxonomies' => array( // tag, categorie
                'post_tag',
                'category')
        ));
    });



    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.


    include('custom-functions.php');

?>