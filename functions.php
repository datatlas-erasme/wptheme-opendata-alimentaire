<?php

use MangerLocalTheme\AutoLoader;
use MangerLocalTheme\View;

/*
 * Set up our auto loading class and mapping our namespace to the app directory.
 *
 * The autoloader follows PSR4 autoloading standards so, provided StudlyCaps are used for class, file, and directory
 * names, any class placed within the app directory will be autoloaded.
 *
 * i.e; If a class named SomeClass is stored in app/SomeDir/SomeClass.php, there is no need to include/require that file
 * as the autoloader will handle that for you.
 */

require get_stylesheet_directory() . '/app/AutoLoader.php';
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace( 'MangerLocalTheme', get_stylesheet_directory() . '/app' );

View::$view_dir = get_stylesheet_directory() . '/templates/views';

require get_stylesheet_directory() . '/includes/scripts-and-styles.php';

/*
    ===============================
        Activate menus
    ===============================
*/

function mangerlocal_theme_setup() {

    add_theme_support('menus');

    register_nav_menus( array(
        'mobile' => __( 'Mobile menu', 'MangerLocalTheme' ),
        'primary'=>__( 'Desktop menu', 'MangerLocalTheme' ),
        'secondary' =>__('Footer menu','MangerLocalTheme' )
        ) );

    // register_nav_menu('primary', 'Primary Header Navigation');
    // register_nav_menu('secondary', 'Footer Navigation');
    // register_nav_menu('mobile', 'Mobile Navigation');


}
add_action('init', 'mangerlocal_theme_setup');

// function responsive_menu_button( $menu, $args ) {
// 	// S'il s'agit du menu principal, j'ajoute mon bouton devant
// 	if ( 'mobile' == $args->theme_location ) {
// 		$menu = '<div id="mobileButton" class="mobile-nav-button">
//                     <div class="mobile-nav-button__line"></div>
//                     <div class="mobile-nav-button__line"></div>
//                     <div class="mobile-nav-button__line"></div>
//                 </div>' . $menu;
// 	}
// 	return $menu;
// }
// add_action( 'wp_nav_menu', 'responsive_menu_button', 9, 2 );


/*
    ===============================
        Theme support function
    ===============================
*/
add_theme_support( 'custom-background');
add_theme_support( 'custom-header');
add_theme_support( 'post-thumbnails');

/**
 * Add Primary Logo Home
 */

function mangerlocal_theme_support() {
	add_theme_support('custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	));
}
add_action('after_setup_theme','mangerlocal_theme_support');
 
/**
 * Add Secondary Logo Home
 */
function mangerlocal_customizer_setting($wp_customize) {

        $wp_customize->add_setting('mangerlocal_second_logo');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mangerlocal_second_logo', array(
            'label' => 'Upload project Logo',
            'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
            'settings' => 'mangerlocal_second_logo',
            'priority' => 8 // show it just below the custom-logo
        )));

        $wp_customize->add_setting('mangerlocal_footer_logo');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mangerlocal_footer_logo', array(
            'label' => 'Upload footer Logo',
            'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
            'settings' => 'mangerlocal_footer_logo',
            'priority' => 9 // show it just below the custom-logo
        )));
    }
    
    add_action('customize_register', 'mangerlocal_customizer_setting');

/**
 * Add custom logo to the login page
 */

function mangerlocal_filter_login_head() {
 
    if ( has_custom_logo() ) :
 
        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url( $image[0] ); ?>);
                -webkit-background-size: <?php echo absint( $image[1] )?>px;
                background-size: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
                width: <?php echo absint( $image[1] ) ?>px;
            }
        </style>
        <?php
    endif;
}
 
add_action( 'login_head', 'mangerlocal_filter_login_head', 100 );

add_theme_support('wp-block-styles');

add_theme_support( 'dark-editor-style');

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-formats', array('aside', 'image', 'video'));

add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    )
);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mangerlocal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mangerlocal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mangerlocal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mangerlocal_widgets_init' );

/**
 * Block Full width containers
 */

add_theme_support('align-wide');


function additional_contact_form_7_data( $merge_variables, $cf7_variables ) {
    if ( isset( $cf7_variables['your-fname'] ) ) {
        $first_name = filter_var( $cf7_variables['your-fname'], FILTER_SANITIZE_STRING );
        $last_name = filter_var( $cf7_variables['your-lastname'], FILTER_SANITIZE_STRING );
        $fullname = ! empty( $last_name ) ? $first_name . " " .  $last_name : $first_name;
        $merge_variables['FNAME'] = $fullname;
    }
}

/**
 * Custom panel color editor
 */

function mytheme_setup_theme_supported_features() {

	add_theme_support( 'editor-color-palette',
		[
			[ 'name' => 'primary', 'slug'  => 'primary', 'color' => '#343f56' ],
			[ 'name' => 'secondary', 'slug'  => 'white', 'color' => '#fff' ],
			[ 'name' => 'darkgray', 'slug'  => 'darkgray', 'color' => '#71717E' ],
			[ 'name' => 'gray', 'slug'  => 'gray', 'color' => '#c4c4c4' ],
			[ 'name' => 'background', 'slug'  => 'lightgrray', 'color' => '#fcafafa' ],
			[ 'name' => 'red', 'slug'  => 'red', 'color' => '#ff4848' ],
			[ 'name' => 'darkred', 'slug'  => 'darkred', 'color' => '#CA3228' ],
			[ 'name' => 'blue', 'slug'  => 'blue', 'color' => '#aad7ff' ],
		]
	);
}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

/**
 * Desactivate balise p ContactForm7
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/** Remove push admin bar */
add_action('get_header', 'my_filter_head');

function my_filter_head() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );