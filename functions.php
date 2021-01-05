<?php

if (!function_exists('yabu_setup')) :

    function yabu_setup()
    {
        load_theme_textdomain('yabu', get_template_directory() . '/languages');

        //Let WordPress manage the document title.
        add_theme_support('title-tag');

        //Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        set_post_thumbnail_size(1200, 9999);
        register_nav_menus(array(
            'main-menu' => __('Main Menu','yabu'),
            'main-right' => __('Main Right','yabu'),
            'main-footer' => __('Main Footer','yabu'),
        ));
        //  HTML5 support.

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
endif;
add_action('after_setup_theme', 'yabu_setup');

function yabu_scripts(){

    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', array());
    
    wp_enqueue_script( 'cookie.js', get_template_directory_uri() . '/assets/js/cookie.js',  array('jquery'), '', true );
    wp_enqueue_script('slick.min.js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script( 'isotope.min.js', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array('jquery'), '', true );
	wp_enqueue_script('circle-progress.min.js', get_template_directory_uri() . '/assets/js/circle-progress.min.js', array('jquery'), '', true);
	wp_enqueue_script('main.js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);

}
add_action('wp_enqueue_scripts', 'yabu_scripts');

show_admin_bar(false);

//Yabu
require_once "inc/yabu.php";

//Register Sidebar
function ya_widgets() {
    register_sidebar( [
        'name'          => __('Yabu Main Sidebar','yabu'),
        'id'            => 'ya_main_sidebar',
        'description'   => __('Main Sidebar for Yabu Theme','yabu'),
        'before_widget' => '<div id="%1$s" class="yabu-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ] );
}
add_action( 'widgets_init', 'ya_widgets' );

//Register Custom Post Type
function register_projects_yabu(){
    register_post_type( 'project', array(
        'labels' => array(
            'name' => __( 'Projects' ),
            'singular_name' => __( 'Project' )
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'query_var'          => true,
        'rewrite'            => true,
        'hierarchical'       => false,    
        'menu_icon'          => 'dashicons-sos',
        'supports'           => array( 'title','editor','thumbnail' )
    ));
}
add_action( 'init','register_projects_yabu' );

function custom_taxonomy_yabu() {

    $labels = array(
        'name'          => _x( 'Categories', 'Taxonomy general name', 'yabu' ),
        'add_new_item'  => __('Add new category','yabu'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'singular_label'    => __('Field'),
        'rewrite'           => array( 'slug'=>'fields','with_front'=>false),
    );
    register_taxonomy( 'project-category', array( 'project' ), $args );
}
add_action( 'init', 'custom_taxonomy_yabu');

//Google Analytics
function yabu_google_analytics(){ ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133481509-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-133481509-2');
    </script>
    <?php
}
add_action ('wp_head','yabu_google_analytics', 10);