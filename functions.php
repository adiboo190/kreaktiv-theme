<?php
/**
 * WowStrap Functions and Definitions
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/The_Loop
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */


// Check The WP Version
// Minimum version is 4.8
if ( version_compare( $GLOBALS['wp_version'], '4.8', '<' ) ) {
  // require get_template_directory() . '/inc/back-compat.php';
}

// Get All Files on folder inc
foreach ( glob ( get_template_directory() . '/inc/*.php' ) as $value) {
  require $value;
}

add_action( 'after_setup_theme', 'wowstrap_setup', 10, 1 );
if ( ! function_exists( 'wowstrap_setup' ) )
{
  /**
   * Initialize Theme
   * Memulai dan menginitialisasi tema
   */
  function wowstrap_setup () 
  {

    /**
     * Load Theme Script and Stylesheet
     */
    add_action( 'wp_enqueue_scripts', 'wowstrap_styling', 10, 1 );
    function wowstrap_styling ()
    {
      wp_enqueue_style ( 'bootstrap-main-style', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', '4.3.1', false, 'all' );
      wp_enqueue_style ( 'wowstrap-style', get_stylesheet_uri(), wp_get_theme()->get('Version'), false, 'all' );

      wp_enqueue_script ( 'jQuery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js', '3.2.1', true );
      wp_enqueue_script ( 'bootstrap-javascript', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', '4.3.1', true );
    }

    /**
     * Enable Features
     *
     * @see https://developer.wordpress.org/reference/functions/add_theme_support/
     */
    add_theme_support ( 'title-tag' );
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );
    add_theme_support( 'post-thumbnails', array(
      'post',
      'page'
    ) );
    add_theme_support( 'custom-logo', array(
      'height'      => 30,
      'width'       => 125,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
    ) );


    // This theme uses wp_nav_menu() in one locations.
    register_nav_menus( array(
      'primary' => __( 'Menu Utama', 'wowstrap' ),
      'top_nav' => __( 'Menu Pojok Kanan', 'wowstrap' ),
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
      'video',
      'gallery',
    ) );
  }
}