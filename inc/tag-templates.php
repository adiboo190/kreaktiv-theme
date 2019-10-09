<?php
/**
 * Template Tambahan Wowstrap Theme
 *
 * Membuat dan menampilkan fungsi pada tema tertentu agar dapat menampilkan kode
 * tanpa membuatnya berantakan.
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

if ( ! function_exists( 'wowstrap_tags' ) ) {
	function wowstrap_tags() {
		if ( has_tag() ) {
			echo the_tags();
		} else {
			echo __( "Tidak ada tagar terkait.", 'wowstrap' );
		}
	}
}
if ( ! function_exists( 'wowstrap_category' ) ) {
	function wowstrap_category() {
		if ( has_category() ) {
			echo the_category( ', ' );
		} else {
			echo __( "Tidak ada kategori terkait.", 'wowstrap' );
		}
	}
}

if (!function_exists('wowstrap_recent_after_slider')) {
	function wowstrap_recent_after_slider () {
		echo "<div class=\"row no-gutters text-center\">\n";
		$args  = array( 'posts_per_page' => '4' );
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) { $query->the_post();
				
				echo "<div class=\"col-6\">\n";
					echo '<div class="content">
	    				<a href="' . get_the_permalink() . '" target="_blank">
	      					<div class="content-overlay"></div>' .
	      					(has_post_thumbnail() ? get_the_post_thumbnail() : '<img src="'.get_template_directory_uri().'/assets/images/1.png'.'" class="d-block w-100" />') . '
	      					<div class="content-details fadeIn-bottom">';
	      						if ( strlen( get_the_title() ) <= '5' ) {
	        						echo '<h3 class="text-white content-title">' . get_the_title() . '</h3>';
	        					} elseif ( strlen( get_the_title() ) <= '30' ) {
	        						echo '<h4 class="text-white content-title">' . get_the_title() . '</h4>';
	        					} else {
	        						echo '<h5 class="text-white content-title">' . get_the_title() . '</h5>';
	        					}
	        					echo '<p class="content-text"><i class="mr-2 fas fa-clock"></i>' . get_the_date( 'l, j F Y h.i' ) . '<br/><i class="fas fa-users mx-2"></i>' . get_the_author() . '</p>
	      					</div>
    					</a>
  					</div>';
				echo "</div>\n";
			}
		}
		echo "</div>\n";
	}
}

if (!function_exists('wowstrap_sekilas')) {
	function wowstrap_sekilas() {
		echo '<div class="title-sekilas col-md-3 text-center py-2">
          '.__('Sekilas', 'wowstrap').'
          </div>
          <div class="content-sekilas col-md-9 align-self-center text-center py-1">';
          
		$args = array(
		    'posts_per_page' => '5',
		);


		$query = new WP_Query($args);

		if ($query->have_posts()) {
			echo '<marquee onmouseover="this.stop();" onmouseout="this.start();">';
			$no = -1;
			while ($query->have_posts()) {$query->the_post(); $no++;
				if ($no > 1) {
					echo '<span class="align-self-center mx-3">|</span><span class="sekilas sekilas-'.$no.'"><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></span>';
				} elseif ($no === 5) {
					echo '<span class="sekilas sekilas-'.$no.'"><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></span><span class="align-self-center mx-3">|</span>';
				} else {
					echo '<span class="align-self-center mx-3">|</span><span class="sekilas sekilas-'.$no.'"><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></span>';
				}
			}
			echo '</marquee>';
		}

		echo '</div>';
	}
}

if (!function_exists('wowstrap_carousel')) {
	function wowstrap_carousel() {
		$args['posts_per_page'] = get_theme_mod( 'items_slider', '5' );
		if ( get_theme_mod( 'category_tag_slider' ) !== 'null' ) { $args['category_name'] = get_theme_mod( 'category_tag_slider', 'uncategorized' ); }

		$query = new WP_Query($args);

		if ($query->have_posts()) {
			$no = 0;
			while ($query->have_posts()) {$query->the_post(); $no++;
				echo '<div class="carousel-item'.($no === 1?' active':false).'">';
				echo (has_post_thumbnail()?get_the_post_thumbnail():'<img src="'.get_template_directory_uri().'/assets/images/1.png'.'" class="d-block w-100 carousel-image-'.$no.'" />');
				echo '<div class="carousel-caption d-none d-md-block">';
				echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
				echo '<p>'.get_the_excerpt().'</p>';
				echo '</div>';
				echo '</div>';
			}
		}
	}
}

if (!function_exists('wowstrap_recent_after_slider')) {
	function wowstrap_recent_after_slider() {
		echo '<div class="row no-gutters">';
		$args = array(
		        'posts_per_page' => '5',
		);


		$query = new WP_Query($args);

		if ($query->have_posts()) {
			$no = 0;
			while ($query->have_posts()) {$query->the_post(); $no++;
				echo '<div class="col-6">';
				echo '<a href="'.get_the_permalink().'" class="card">';
				echo (has_post_thumbnail()?get_the_post_thumbnail():'<img src="'.get_template_directory_uri().'/assets/images/1.png'.'" class="d-block w-100" />');
        		printf( '<div class="after-post-block"><b>%s</b><p>%s</p></div>', get_the_title(), get_the_excerpt() );
				echo '</a> <!-- /.card -->';
				echo "</div>";
			}
		}
		echo "</div>";
	}
}
