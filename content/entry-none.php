<?php
/**
 * Pesan Konten Kosong
 *
 * Menampilkan pesan jika konten pada beranda masih kosong atau belum tersedia.
 *
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/The_Loop
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */
?><div class="alert alert-info">
	<div class="row align-items-center">
		<div class="col-3 text-center">
			<i class="fas fa-5x text-center fa-info-circle"></i>
		</div>
		<div class="col-9">
			<div class="alert-title">
				<h3><?php echo __( 'Konten Belum Tersedia', 'wowstrap' ); ?></h3>
				<p><?php echo __( 'Maaf, konten situs saat ini masih belum tersedia. Kemungkinan <code>administrator</code> sedang malas membuat artikel.', 'wowstrap' ); ?></p>
				<a href="<?php echo admin_url( 'post-new.php' ); ?>" class="<?php echo ( is_admin() ? 'btn btn-primary' : 'd-none' ); ?>"><?php echo __( 'Kuy, Buat Artikel!', 'wowstrap' ); ?></a>
			</div>
		</div>
	</div>
</div>