<?php
/**
 * Fungsi Tambahan Wowstrap Theme
 *
 * Membuat pengait tema agar elemen keluaran dapat sesuai dengan class Bootstrap 4.
 * Mengandung elemen Bootstrap 4.
 * 
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

/**
 * Function to Hook Post Thumbnail Output
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://wordpress.stackexchange.com/questions/134014/how-do-i-change-modify-the-post-thumbnail-html-output
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */
function wowstrap_modify_post_thumbnail_html ( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $id    = get_post_thumbnail_id();
    $src   = wp_get_attachment_image_src( $id, $size );
    $alt   = get_the_title( $id );

    $html = '<img src="' . $src[0] . '" alt="' . $alt . '" title="' . get_the_title() . '" class="img-fluid" />';

    return $html;
}
add_filter('post_thumbnail_html', 'wowstrap_modify_post_thumbnail_html', 99, 5);

/**
 * Function to Custom Logo
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://smutek.net/filtering-the-wordpress-custom-logo/
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */
function wowstrap_custom_logo_hook ( $html )
{

  $site                    = get_bloginfo('name');
  is_front_page() ? $title = '<h1>' . $site . '</h1>' : $title = '<p>' . $site . '</p>';
  $home                    = esc_url(home_url('/'));
  $class                   = 'navbar-brand';
  $content                 = $title;

  if (has_custom_logo()) {
    $logo    = wp_get_attachment_image(get_theme_mod('custom_logo'), null, false, array(
      'class'    => 'brand-logo img-responsive',
      'itemprop' => 'logo',
    ));

    $content = str_replace( '<img', '<img height="30px" width="auto"', $logo );
    $content .= '<span class="sr-only">' . $title . '</span>';
  }

  $html = sprintf('<a href="%1$s" class="%2$s" rel="home" itemprop="url">%3$s</a>', $home, $class, $content);
  return $html;
}
add_filter ( 'get_custom_logo', 'wowstrap_custom_logo_hook' );