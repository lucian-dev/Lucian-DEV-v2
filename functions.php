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
// Load Scripts
function yabu_scripts(){

    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', array());
    
	wp_enqueue_script('main.js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);

}
add_action('wp_enqueue_scripts', 'yabu_scripts');

show_admin_bar(false);

//Yabu
require_once "inc/yabu.php";

require_once "inc/remove-header.php";

require_once "inc/remove-emoji.php";

require_once "inc/remove-comments.php";

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

// Register Custom Post Type
function register_projects_yabu() {
    $labels = array(
        'name'                  => _x( 'Projects', 'yabu' ),
        'singular_name'         => _x( 'Project', 'yabu' ),
        'menu_name'             => _x( 'Projects', 'yabu' ),
        'add_new'               => __( 'Add Project', 'yabu' ),
        'add_new_item'          => __( 'Add New Project', 'yabu' ),
        'new_item'              => __( 'New Project', 'yabu' ),
        'edit_item'             => __( 'Edit Project', 'yabu' ),
        'view_item'             => __( 'View Project', 'yabu' ),
        'all_items'             => __( 'All Projects', 'yabu' ),
        'search_items'          => __( 'Search Books', 'yabu' ),
        'parent_item_colon'     => __( 'Parent Books:', 'yabu' ),
        'not_found'             => __( 'No projects found.', 'yabu' ),
        'not_found_in_trash'    => __( 'No projects found in Trash.', 'yabu' ),  
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'rewrite'               => array( 'slug' => 'project'),
        'hierarchical'          => false,
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-sos',
        'supports'              => array( 'title','editor','thumbnail' )
    );
    register_post_type( 'project', $args );
}
add_action( 'init','register_projects_yabu' );

//Register Taxonomy
function custom_taxonomy_yabu() {

    //Project Categories Taxonomy
    $labels = array(
        'name'          => _x( 'Categories', 'taxonomy general name', 'yabu' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name', 'yabu' ),
        'add_new_item'  => __('Add new category','yabu'),
        'menu_name'     => __( 'Categories','yabu' )
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'query_var'             => true,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug'=>'category' ),
    );
    register_taxonomy( 'project-category', 'project', $args );

    unset( $args );
    unset( $labels );

    //Project Tags Taxonomy
    $labels = array(
        'name'                       => _x( 'Tags', 'taxonomy general name', 'yabu' ),
        'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'yabu' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'add_new_item'               => __( 'Add New Tag', 'yabu' ),
        'menu_name'                  => __( 'Tags', 'yabu' ),
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'tag'),
    );

    register_taxonomy( 'tag', 'project', $args );

}
add_action( 'init', 'custom_taxonomy_yabu');