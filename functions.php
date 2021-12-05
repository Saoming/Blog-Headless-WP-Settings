<?php 

// register the WordPress Registered Style
function wp_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'headless-wp-style', get_template_directory_uri() . '/style.css', $theme_version );
}
add_action('wp_enqueue_scripts', 'wp_register_styles');

//Custom Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-sam.svg);
		height:65px;
		width:320px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Add SVG Support
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
   }
add_filter('upload_mimes', 'cc_mime_types');