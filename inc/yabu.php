<?php

//Yabu Login Screen
function yabu_login_logo() { ?>
	<style type="text/css">
		p#backtoblog {
			display: none;
		}
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/LogowpAdmin.png );
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
			width: 300px;
		}
        body.login {
            background: #ffffff;
        }
	</style>
<?php }
add_action( 'login_head', 'yabu_login_logo' );

//Logo Admin area link
function yabu_login_logo_url() {
    return 'https://lucian-yabu.dev/';
}
add_filter( 'login_headerurl', 'yabu_login_logo_url' );

function yabu_login_logo_url_title() {
	return 'Lucian-DEV';
}
add_filter( 'login_headertext', 'yabu_login_logo_url_title' );

//Incorrect login - message
function yabu_login_error_override()
{
    return 'Incorrect login details.';
}
add_filter('login_errors', 'yabu_login_error_override');

//Remove "Welcome Panel"
remove_action('welcome_panel','wp_welcome_panel');

//Default Dashboard color
function yabu_admin_color( $result ) {
    return 'light';
}
add_filter( 'get_user_option_admin_color', 'yabu_admin_color' );

//Yabu Top Bar Dashboard Logo and Link
function yabu_admin_bar_link() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu( array(
        'id'    => 'cwd_link',
        'title' => __( 'YABU' ),
        'href'  => __( 'https://lucian-yabu.dev/' ),
    ));
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'yabu_admin_bar_link', 25 );

//Change Howdy Text
function change_howdy($translated, $text, $domain) {

	if (!is_admin() || 'default' != $domain)
		return $translated;

	if (false !== strpos($translated, 'Howdy'))
		return str_replace('Howdy', 'Welcome', $translated);

	return $translated;
}
add_filter('gettext', 'change_howdy', 10, 3);

//Footer text dashboard
function left_admin_footer_text_output( $text ) {
    $text = '<em>Thank you for using Yabu Theme! For questions, contact <a href="https://lucian-yabu.dev/" target="_blank">Lucian-DEV</a></em>.';
    return $text;
}
add_filter( 'admin_footer_text', 'left_admin_footer_text_output' );

//Editor
function yabu_remove_menus(){
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page('edit-comments.php');
		remove_menu_page( 'plugins.php' );
		remove_menu_page('tools.php');
	}
	$editor = get_role('editor');
	$editor -> remove_cap('manage_options');
}
add_action( 'admin_menu', 'yabu_remove_menus' );

//Footer Copyright
function wphooks_before_footer_message(){

	locate_template( 'template-parts/footer-copyright.php', true );

}
add_action( 'yabu_copy_footer','wphooks_before_footer_message', 10 );

//ACF Yabu Options
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug' => 'theme-options',
		'capability' => 'edit_posts',
		'icon_url' => get_template_directory_uri().'/images/options_yabu.png',
		'redirect' => false,
		'show_in_rest' => true
	));

}