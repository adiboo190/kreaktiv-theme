<?php
/**
 * Template Loop
 *
 * Menampilkan postingan di looping index.php
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */
?><section <?php echo post_class('py-3 row'); ?> id="">

	<div class="entry-image col-md-4">
		<figure>
			<?php echo (has_post_thumbnail()?get_the_post_thumbnail():'<img src="'.get_template_directory_uri().'/assets/images/1.png'.'" class="d-block w-100" />'); ?>
		</figure>
	</div>

	<div class="col-md-8">
		<div class="entry-header">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) {
				printf( '<span class="badge badge-lg badge-primary">%s</span>', _x( 'Featured', 'post', 'wowstrap' ) );
			} ?>

			<?php if ( has_category() ) {
				$no     = -1;
				$colors = array( 'secondary', 'info', 'danger', 'warning', 'success' );
				foreach ( get_the_category() as $data ) { $no++;
					// var_dump($data);
					echo '<a href="" class="mr-1 badge-pill badge badge-' . $colors[$no] . '">' . $data->name . '</a>';
				}
			} ?>

			<?php if ( is_singular() ) {
				printf( '<h1 class="entry-title">%$1s</h1>', the_title() );
			} else {
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			} ?>
		</div>
		<div class="entry-content">
			<?php
			the_excerpt(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Lanjutkan Membaca<span class="screen-reader-text"> "%s"</span>', 'wowstrap' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			?>
		</div>
	</div>

</section>
<?php
/* End of file content.php */
/* Location: ./wp-content/themes/wowstrap/content/content.php */