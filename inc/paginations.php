<?php
/**
 * Berkas Paginasi
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */ 


function wowstrap_paginations($pages = '', $range = 2) 
{  
	$showitems    = ($range * 2) + 1;

	// Variabel Item
	$judul        = __( 'Navigasi Halaman', 'wowstrap' );
	$now_page     = __( 'Halaman Yang Diakses Saat Ini', 'wowstrap' );
	$paged_active = __( 'Halaman %1$s dari %2$s', 'wowstrap' );
	$page_loop    = __( 'Halaman yang ke', 'wowstrap' );
	$page         = __( 'Halaman', 'wowstrap', 'wowstrap' );
	$next_page    = __( 'Halaman Selanjutnya', 'wowstrap' );
	$prev_page    = __( 'Halaman Sebelumnya', 'wowstrap' );
	$home_page    = __( 'Halaman Awal', 'wowstrap' );
	$last_page    = __( 'Halaman Akhir', 'wowstrap' );
	$of           = __( 'dari', 'wowstrap' );


	$showitems = ($range * 2) + 1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
	
		if(!$pages)
			$pages = 1;		 
	} 

	if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div aria-label="' . $judul . '"><ul class="pagination justify-content-center">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active page-item"' : '';
 
        printf( '<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li class="page-item">…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active page-item"' : '';
        printf( '<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="page-item">…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";

    echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">' . $page . '</span> '.$paged.' <span class="text-muted">' . $of . '</span> '.$pages.' ]</div>';	 
}