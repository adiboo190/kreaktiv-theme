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

// Variables
$dir = [get_template_directory_uri(), get_template_directory()];

// Get All Files on folder inc
require "{$dir[1]}/inc/class.wp-navwalker.php";
require "{$dir[1]}/inc/class.comments-walker.php";
require "{$dir[1]}/inc/customizer.php";
require "{$dir[1]}/inc/extras.php";
require "{$dir[1]}/inc/tag-templates.php";
require "{$dir[1]}/inc/paginations.php";
require "{$dir[1]}/inc/class.comment-user.php";

if (!function_exists('wowstrap_styling')) {
	/**
	 * Load Theme Script and Stylesheet
	 */
	add_action('wp_enqueue_scripts', 'wowstrap_styling', 10, 1);
	function wowstrap_styling() {
		wp_enqueue_style('bootstrap-main-style', get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css', '4.3.1', false, 'all');
		wp_enqueue_style('wowstrap-style', get_stylesheet_uri(), wp_get_theme()->get('Version'), false, 'all');
		wp_enqueue_style('fa-style', get_template_directory_uri().'/assets/vendor/fontawesome-free/css/all.min.css', '5.9.1', true);

		wp_enqueue_style('quill-style', 'https://cdn.quilljs.com/1.3.6/quill.snow.css', '3.0.6', true);

		wp_enqueue_script('jQuery', get_template_directory_uri().'/assets/vendor/jquery/jquery.min.js', '3.2.1', true, true);
		wp_enqueue_script('jQuery-easing', get_template_directory_uri().'/assets/vendor/jquery-easing/jquery.easing.min.js', '3.2.1', true, true);
		wp_enqueue_script('bootstrap-javascript', get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', '4.3.1', true, true);
		wp_enqueue_script('fa-javascript', get_template_directory_uri().'/assets/vendor/fontawesome-free/js/all.min.js', '5.9.1');
		wp_enqueue_script('ws-javascript', get_template_directory_uri().'/assets/js/ws.js', wp_get_theme()->get('Version'), true, true);

		wp_enqueue_script('quill-js', 'https://cdn.quilljs.com/1.3.6/quill.js', '3.0.6', true, true);

		# Enable Post Comment Script
		if (is_singular()) {
			wp_enqueue_script("comment-reply");
		}
	}
}

if (!function_exists('wowstrap_setup')) {
	/**
	 * Initialize Theme
	 * Memulai dan menginitialisasi tema
	 */
	add_action('after_setup_theme', 'wowstrap_setup', 10, 1);
	function wowstrap_setup() {
		/**
		 * Other Setup
		 */
		if (!isset($content_width)) {
			$content_width = 900;
		}
		add_theme_support('automatic-feed-links');

		/**
		 * Enable Features
		 *
		 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
		 */
		add_theme_support('title-tag');
		add_theme_support('html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			));
		add_theme_support('post-thumbnails', array(
				'post',
				'page',
			));
		add_theme_support('custom-logo', array(
				'height'      => 30,
				'width'       => 125,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array('site-title', 'site-description'),
			));

		// This theme uses wp_nav_menu() in one locations.
		register_nav_menus(array(
				'primary' => __('Menu Utama', 'wowstrap'),
				'top_nav' => __('Menu Pojok Kanan', 'wowstrap'),
			));
	}
}

if (!function_exists('wowstrap_widget_init')) {
	/**
	 * Initialize Widget
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
	 **/
	add_action('widgets_init', 'wowstrap_widget_init');
	function wowstrap_widget_init() {
		register_sidebar([
				'name'          => __('WowStrap Sidebar', 'wowstrap'),
				'id'            => 'sidebar',
				'description'   => __('Menampilkan konten di bilah sisi kanan.', 'wowstrap'),
				'before_widget' => '<section id="%1$s" class="widget mb-3 %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]);
		register_sidebar([
				'name'          => __('WowStrap Kaki Kiri', 'wowstrap'),
				'id'            => 'footer-1',
				'description'   => __('Menampilkan konten di kaki kiri.', 'wowstrap'),
				'before_widget' => '<section id="%1$s" class="widget mb-3 %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]);
		register_sidebar([
				'name'          => __('WowStrap Kaki Tengah Kiri', 'wowstrap'),
				'id'            => 'footer-2',
				'description'   => __('Menampilkan konten di kaki tengah kiri.', 'wowstrap'),
				'before_widget' => '<section id="%1$s" class="widget mb-3 %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			]);
	}
}