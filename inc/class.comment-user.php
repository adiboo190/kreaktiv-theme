<?php
/**
 * Author Check Class
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/The_Loop
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

if (!class_exists('Comment_Author_Role_Label')):
  class Comment_Author_Role_Label {
    public function __construct() {
      add_filter('get_comment_author', array(
        $this,
        'get_comment_author_role'
      ), 10, 3);
      add_filter('get_comment_author_link', array(
        $this,
        'comment_author_role'
      ));
    }
    function get_comment_author_role($author, $comment_id, $comment) {
      $authoremail = get_comment_author_email($comment);
      if (email_exists($authoremail)) {
        $commet_user_role        = get_user_by('email', $authoremail);
        $comment_user_role       = $commet_user_role->roles[0];

        if ( $comment_user_role === 'administrator' ) {
          $this->comment_user_role = '<span data-toggle="tooltip" data-placement="top" title="' . __( 'Ini adalah administrator situs.', 'wowstrap' ) . '" class="comment-author-label ml-2 badge-pill badge badge-success comment-author-label-admin"><i class="fas fa-user-shield"></i></span>';
        } else {
          $this->comment_user_role = '<span data-toggle="tooltip" data-placement="top" title="' . __( 'Ini adalah pengurus situs.', 'wowstrap' ) . '" class="comment-author-label ml-2 badge-pill badge badge-primary comment-author-label-admin"><i class="fas fa-user-shield"></i></span>';
        }
      } else {
        $this->comment_user_role = '';
      }
      return $author;
    }
    function comment_author_role($author) {
      return $author .= $this->comment_user_role;
    }
  }
  new Comment_Author_Role_Label;
endif; 