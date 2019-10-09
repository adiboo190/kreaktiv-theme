<?php
/**
 * Halaman 404
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

get_header( '404' ); ?>
<div class="container">
	<div class="row justify-content-center align-items-center">
		<div class="col-md-5 text-center">
			<h1 class="not-found headings-jumbo">404</h1>
			<h4 class="not-found title"><?php echo __( 'Halaman Tak Ditemukan', 'wowstrap' ); ?></h4>
			<p><?php echo __( 'Halaman yang anda cari sekarang tidak ditemukan. Mohon cek kembali parameter dan kata kunci anda.', 'wowstrap' ); ?></p>
			<a href="<?php echo home_url(); ?>" class="btn btn-outline-danger"><i class="fas fa-home mr-2"></i><?php echo __( 'Kembali Ke Beranda', 'wowstrap' ); ?></a>
		</div>
		<footer class="col-md-12 text-center">
			<p class="m-0"><?php printf ( __( 'Hak Cipta %1$s <a href="%2$s">%3$s</a>. Hak Cipta Dilindungi Undang Undang.' ), date ( 'Y' ), home_url(), get_bloginfo('name') ); ?></p>
		</footer>
	</div>
</div>
<?php get_footer ( '404' ); ?>