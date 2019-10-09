<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 4 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap 4 Comment Walker
 * @version     1.0.0
 * @author      Aymene Bourafai <bourafai.a@gmail.com> <www.aymenebourafai.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/bourafai/wp-bootstrap-4-comment-walker
 * @link        https://v4-alpha.getbootstrap.com/layout/media-object/
 */
class Bootstrap_Comment_Walker extends Walker_Comment {
		/**
	 * Output a comment in the HTML5 format.
	 *
	 * @access protected
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment Comment to display.
	 * @param int    $depth   Depth of comment.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ? 'div' : 'li' ); ?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media mb-3' ); ?>>
			<?php if ( 0 != $args['avatar_size'] ): ?>
			<a href="<?php echo get_comment_author_url(); ?>">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</a>
			<?php endif; ?>
			<div class="media-body ml-3">
				<?php printf( ( '0' == $comment->comment_approved ? '<span class="mx-2 badge badge-info"><i class="fas fa-info-circle"></i></span>' : false ) . '<h4 class="media-heading m-0">%s</h4>', get_comment_author_link() ); ?>

				<div class="comment-metadata">
					<a class="badge badge-success" href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Ubah', 'wowstrap' ) ); ?>
					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply-link list-inline-item">',
							'after'     => '</span>'
						) ) );
					?>
				</div><!-- .comment-metadata -->

				<div class="comment-content mt-3">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

			</div>
		</<?php echo $tag; ?>>
	<?php }
}