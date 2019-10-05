<?php 
/**
 * Daftar Konten\
 *
 * Memuat keluaran dari perulangan postingan untuk tulisan tunggal.
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */ 
?><div <?php echo post_class(); ?> id="<?php echo the_ID(); ?>">
	<div class="entry-header">
		<figure class="post-<?php echo the_ID(); ?>">
			<?php echo (has_post_thumbnail() ? get_the_post_thumbnail() : '<img src="'.get_template_directory_uri().'/assets/images/1.png" class="d-block w-100" />'); ?>
		</figure>
		<?php echo the_title( '<h1 class="entry-header">', '</h1>' ); ?>
	</div>
	<div class="entry-content border-bottom">
		<?php echo the_content(); ?>
	</div>
</div>