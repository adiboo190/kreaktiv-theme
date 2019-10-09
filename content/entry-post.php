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
			<?php echo (has_post_thumbnail() ? get_the_post_thumbnail() : '<img src="'.get_template_directory_uri().'/assets/images/1.png'.'" class="d-block w-100" />'); ?>
		</figure>
		<?php echo the_title( '<h1 class="entry-header">', '</h1>' ); ?>

		<div class="entry-meta">
			<p>
				<span class="entry-date posted-on"><i class="fas fa-clock mr-2 ml-3"></i><?php echo get_the_date( 'l, j F Y h.i.s' ); ?></span>
				<span class="posted-by entry-author"><button type="button" class="btn btn-xs p-0" data-toggle="popover" title="<?php echo get_the_author_meta('display_name'); ?>" data-content="<p><?php echo get_the_author_meta('description'); ?></p><a class='btn btn-primary btn-xs' href='<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>'><i class='mr-2 fas fa-eye'></i><?php echo __( 'Lihat Profil', 'wowstrap' ); ?></a>"><i class="fas fa-users mr-2"></i><?php echo get_the_author(); ?></button></span>
			</p>
		</div>
	</div>
	<div class="entry-content border-bottom">
		<?php echo the_content(); ?>
	</div>
	<div class="entry-footer mt-3 border-bottom">
		<p><?php echo __( 'Ditulis di arsip', 'wowstrap' ); ?></p>
		<p><i class="fas fa-tag mr-2"></i><?php echo wowstrap_tags(); ?><i class="fas fa-folder mx-2"></i><?php wowstrap_category(); ?></p>

<div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
  <a href="https://www.facebook.com/share.php?url=<?php echo esc_url( the_permalink() ); ?>" class="btn btn-secondary"><i class="fab fa-facebook"></i></a>
  <a href="" class="btn btn-secondary"><i class="fab fa-twitter"></i></a>
  <a href="" class="btn btn-secondary"><i class="fab fa-whatsapp"></i></a>
</div>

	</div>
	<div class="entry-comments mt-3" id="comments">
		<?php comments_template( '/comments.php' ); ?>
	</div>
</div>