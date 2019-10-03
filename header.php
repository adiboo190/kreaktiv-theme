<?php
/**
 * Kepala Tema
 *
 * Menampilkan semua elemen yang diperlukan di kepala tema.
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/Function_Reference/get_header
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

$top    = ( class_exists( 'Kirki' ) && get_theme_mod( 'nav_type' ) ? get_theme_mod( 'nav_type' ) : 'default' );
$bottom = ( class_exists( 'Kirki' ) && get_theme_mod( 'nav_align_type' ) ? get_theme_mod( 'nav_align_type' ) : 'default' );
$array  = array(
  array( 'default' => 'container', 'use' => 'container', 'no-use' => 'container-fluid' ), 
  array( 'default' => 'mr-auto', 'left' => 'mr-auto', 'right' => 'ml-auto' ) 
); ?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php endif; ?>

  <?php wp_head(); ?>   
</head>
<body <?php echo body_class(); ?>>
  <?php echo wp_body_open(); ?>

  <!-- Template Berawal Dari Sini -->
  <header class="site-header" id="masthead" role="banner">

    <?php if ( class_exists( 'Kirki' ) AND get_theme_mod( 'top_nav_enable' ) == true ) { ?>
    <!-- Blok Navigasi Dimulai -->
    <nav role="navigation" class="nav" id="top-nav">
      <div class="<?php echo $array[0][$top]; ?> d-none d-lg-inline">
        <div class="row no-gutters justify-content-right align-items-center">
          <div class="col-md-4">

            <div class="sekilas-post row align-items-center">
              <?php if ( class_exists( 'Kirki' ) AND get_theme_mod( 'sekilas_nav_enable' ) == true ) { echo wowstrap_sekilas(); } ?>
            </div>

          </div> <!-- /.col-md-4 -->
          <div class="col-md-6">
            <?php if ( class_exists( 'Kirki' ) AND get_theme_mod( 'search_top_nav_enable' ) == true ) { ?>
            <form role="search" method="get" class="form-inline float-right" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="search" class="form-control bg-transparent border-0 text-white float-right" placeholder="<?php echo esc_attr_x( 'Cari apa?', 'placeholder', 'wowstrap' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            </form>
            <?php } ?>
          </div> <!-- /.col-md-4 -->
          <div class="col-md-2 float-right text-center align-self-center">
            <!-- Button Group Social Media -->
            <div class="btn-group" role="group">
              <a href="<?php echo get_theme_mod( 'fb_links', 'https://fb.me/cakadi.id' ); ?>" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i></a>
              <a href="<?php echo get_theme_mod( 'tw_links', 'https://www.twitter.com/adiboocreative' ); ?>" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i></a>
              <a href="<?php echo get_theme_mod( 'yt_links', 'https://www.youtunav_align_typebe.com/' ); ?>" class="btn btn-sm btn-danger"><i class="fab fa-youtube"></i></a>
              <a href="<?php echo get_theme_mod( 'ig_links', 'https://www.instagram.com/adiboocreative' ); ?>" class="btn btn-sm btn-light"><i class="fab fa-instagram"></i></a>
              <a href="<?php echo get_theme_mod( 'wa_links', 'https://chat.whatsapp.com/send?phone=6281234771365' ); ?>" class="btn btn-sm btn-success"><i class="fab fa-whatsapp"></i></a>
            </div>
          </div> <!-- /.col-md-4 -->
        </div> <!-- /.row -->
      </nav>
    </nav> <!-- /#top-nav -->
  <?php } ?>

    <nav role="navigation" class="navbar navbar-light navbar-expand-md" id="main-nav">
      <div class="<?php echo $array[0][$top]; ?>">
        <?php echo ( has_custom_logo() ? the_custom_logo() : '<a class="navbar-brand" href="'. home_url() . '">' . get_bloginfo( 'name' ) . '</a>' ); ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <?php wp_nav_menu(
          array(
            'theme_location'  => 'primary',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'main-navbar',
            'menu_class'      => 'navbar-nav ' . $array[1][$bottom],
            'fallback_cb'     => '',
            'menu_id'         => 'main-menu',
            'depth'           => 2,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
          )
        ); ?>
      </div>
    </nav> <!-- /#main-nav -->

    <?php if ( is_home() && get_theme_mod( 'show_header_big' ) == true ) { ?>
    <div class="section-head m-0 p-0" role="sectionhead">
      <div class="row no-gutters">
        <div class="col-md-6 mb-3">

          <!-- Carousel Start -->
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php echo wowstrap_carousel(); ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"><?php echo __( 'Sebelumnya', 'wowstrap' ); ?></span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"><?php echo __( 'Selanjutnya', 'wowstrap' ); ?></span>
              </a>
            </div>

          </div> <!-- /.carousel -->
        </div> <!-- ./col.md-8 -->
        <div class="col-md-6">

          <div class="after-post">
            <h3 class="mx-3 d-md-none badge-primary badge"><?php echo __( 'Artikel Terbaru', 'wowstrap' ); ?></h3>
            <?php echo wowstrap_recent_after_slider(); ?>
          </div>

        </div> <!-- ./col.md-8 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
    <?php } ?>
  </header> <!-- /.site-header -->

<?php
/* End of file header.php */
/* Location: ./wp-content/themes/wowstrap/header.php */