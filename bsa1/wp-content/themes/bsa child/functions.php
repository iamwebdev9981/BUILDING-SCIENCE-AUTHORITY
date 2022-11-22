<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

   function mytheme_register_nav_menu(){
      register_nav_menus( array(
         'primary_menu' => __( 'Primary Menu', 'text_domain' ),
         'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
      ) );
   }
   add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}

function add_menuclass($ulclass) {
  return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
   $defaults = array(
      'height'               => 100,
      'width'                => 400,
      'flex-height'          => true,
      'flex-width'           => true,
      'header-text'          => array( 'site-title', 'site-description' ),
      'unlink-homepage-logo' => true,
   );

   add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


 function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Icon', 'textdomain' ),
        'id'            => 'footer_icon',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
  }
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

/*function wpdocs_theme_slug_widgets_init2() {
    register_sidebar( array(
        'name'          => __( 'Custom_Footer2', 'textdomain' ),
        'id'            => 'custom_footer2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
  }
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init2' ); */



?>
