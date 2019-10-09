<?php
/**
 * Change Comments
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://smutek.net/filtering-the-wordpress-custom-logo/
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

if ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
<ol class="m-0 p-0">
<?php

  wp_list_comments( array(
      'style'         => 'li',
      'max_depth'     => 4,
      'short_ping'    => true,
      'avatar_size'   => '50',
      'walker'        => new Bootstrap_Comment_Walker(),
  ) );
?>
</ol>

<div class="alert alert-info">
	<div class="row align-items-center">
		<div class="col-3 text-center">
			<i class="fas fa-5x text-center fa-info-circle"></i>
		</div>
		<div class="col-9">
			<div class="alert-title">
				<h3><?php echo __( 'Komentar Dinonaktifkan Oleh Admin', 'wowstrap' ); ?></h3>
				<p><?php echo __( 'Maaf, konten ini sudah dinonaktifkan fungsi komentarnya, karena sudah tidak relevan atau ada alasan lain untuk tidak berkomentar di artikel ini.', 'wowstrap' ); ?></p>
			</div>
		</div>
	</div>
</div>

<?php } else { ?>
<ol class="m-0 p-0">
<?php

  wp_list_comments( array(
      'style'         => 'li',
      'max_depth'     => 4,
      'short_ping'    => true,
      'avatar_size'   => '50',
      'walker'        => new Bootstrap_Comment_Walker(),
  ) );
?>
</ol>
<?php

	$fields =  array(

	  'author' =>
	    '<p class="comment-form-author"><label for="author">' . __( 'Nama', 'wowstrap' ) .
	    ( $req ? '<span class="required text-danger">*</span>' : '' ) . '</label>' .
	    '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	  'email' =>
	    '<p class="comment-form-email"><label for="email">' . __( 'Surat Elektronik', 'wowstrap' ) .
	    ( $req ? '<span class="required text-danger">*</span>' : '' ) . '</label>' .
	    '<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	  'url' =>
	    '<p class="comment-form-url"><label for="url">' . __( 'Situs Web', 'wowstrap' ) . '</label>' .
	    '<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	    '" size="30" /></p>',
	);

	$args = array(
	  'id_form'           => 'commentform',
	  'class_form'        => 'comment-form form-group',
	  'id_submit'         => 'submit',
	  'class_submit'      => 'submit btn btn-outline-primary mt-2',
	  'name_submit'       => 'submit',
	  'title_reply'       => __( 'Beri Tanggapan', 'wowstrap' ),
	  'title_reply_to'    => __( 'Beri Balasan ke %s', 'wowstrap' ),
	  'cancel_reply_link' => __( 'Batal Membalas', 'wowstrap' ),
	  'label_submit'      => __( 'Publikasi Komentar', 'wowstrap' ),
	  'format'            => 'xhtml',

	  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . __( 'Komentar', 'wowstrap' ) .
	    '</label><textarea id="comment-froala" name="comment" class="form-control" cols="" rows="10" aria-required="true">' .
	    '</textarea></p>',

	  'must_log_in' => '<p class="must-log-in">' .
	    sprintf(
	      __( 'Anda harus <a href="%s">masuk dahulu</a> untuk memberikan komentar.', 'wowstrap' ),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</p>',

	  'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Masuk sebagai <a href="%1$s">%2$s</a>. <a class="badge badge-danger" href="%3$s" title="Keluar dari akun ini">Keluar?</a>', 'wowstrap' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',

	  'comment_notes_before' => '<p class="comment-notes alert-info alert">' .
	    __( 'Emailmu gak akan kami sebarkan.', 'wowstrap' ) . ( $req ? $required_text : '' ) .
	    '</p>',

	  'comment_notes_after' => '<p class="form-allowed-tags">' .
	    sprintf(
	      __( 'Kamu dapat menggunakan atribut dan tag <abbr title="HyperText Markup Language">HTML</abbr>:<br/>%s', 'wowstrap' ),
	      ' <code>' . allowed_tags() . '</code>'
	    ) . '</p>',

	  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);
	comment_form( $args );
}