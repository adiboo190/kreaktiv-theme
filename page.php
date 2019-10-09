<?php
/**
 * WowStrap Beranda
 *
 * File yang memuat data dan looping tulisan di halaman depan situs.
 * Berkas mengandung class bootstrap 4.3.1
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/The_Loop
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

$sidebar_checker = get_theme_mod ( 'sidebar_layout', 'right' );

get_header();?>
<div class="container mt-3">
  <div class="row">
	<?php if ( $sidebar_checker == 'left' ) { ?>
    <div class="col-md-4">
		<?php echo get_sidebar();?>
	</div>
	<?php } ?>
    <div class="col-md-8">
		<?php if (have_posts()) {
			$no = 0;
			while (have_posts()) { the_post();
				get_template_part('content/entry', 'page');
			}
		} else {
			get_template_part('content/entry', 'none');
		} ?>
	</div>
	<?php if ( $sidebar_checker == 'right' or $sidebar_checker == 'default' ) { ?>
    <div class="col-md-4">
		<?php echo get_sidebar();?>
	</div>
	<?php } ?>
  </div>
</div>

<?php get_footer();

/* End of file page.php */
/* Location: ./wp-content/themes/wowstrap/page.php */