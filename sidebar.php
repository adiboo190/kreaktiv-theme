<?php
/**
 * Bilah Sisi
 *
 * Menampilkan semua widget yang ada di bilah sisi kanan.
 * Jika widget di pengaturan belum tersedia, maka secara otomatis tema ini akan menampilkan widget defaultnya.
 * Mengandung Emelen Bootstrap 4!
 */

if ( is_active_sidebar ( 'sidebar' ) ) {
	dynamic_sidebar ( 'sidebar' );
} else { ?>

<div class="widget searchform">
	<h3><?php echo __( 'Widget Pencarian', 'wowstrap' ); ?></h3>
	<form role="search" method="get" class="search-form form-inline input-group" action="<?php echo esc_url(home_url('/'));?>">
		<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'wowstrap');?>" value="<?php echo get_search_query();?>" name="s" />
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary btn-search-submit"><i class="fas fa-search"></i> <span class="sr-only screen-reader-text"><?php echo _x('Cari', 'submit button', 'wowstrap');?></span></button>
		</div>
	</form>
</div>

<?php }
/* End of file sidebar.php */
/* Location: ./wp-content/themes/wowstrap/sidebar.php */