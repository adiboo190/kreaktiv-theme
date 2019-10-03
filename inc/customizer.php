<?php
/**
 * Customizer WordPress
 *
 * Membuat dan menampilkan customizer untuk tema ini.
 * Mengandung elemen Bootstrap 4!
 *
 * @package     WordPress
 * @subpackage  WowStrap
 * @since       1.0.0 / Senin, 16 September 2019
 * @see         https://codex.wordpress.org/The_Loop
 * @link        https://www.adiboocreative.com/product/wowstrap-theme/
 */

if (class_exists('Kirki')) {
	Kirki::add_config('theme_config_id', array(
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		));

	## Header Panels
	Kirki::add_panel('header_panel', array(
			'priority'    => 10,
			'title'       => esc_html__('Pengaturan Tambahan', 'wowstrap'),
			'description' => esc_html__('Pengaturan tambahan tema WowStrap', 'wowstrap'),
		));

		# Section 1
		Kirki::add_section('nav_top_sections', array(
				'title'       => esc_html__('Bagian Navigasi Atas', 'wowstrap'),
				'description' => esc_html__('Aturlah bagian navigasi ini sesuai dengan keinginan anda.', 'wowstrap'),
				'panel'       => 'header_panel',
				'priority'    => 160,
			));

			### Control Section 1
			Kirki::add_field('theme_config_id', [
					'type'        => 'checkbox',
					'settings'    => 'top_nav_enable',
					'label'       => esc_html__('Aktifkan menu sekilas dan navigasi atas?', 'wowstrap'),
					'description' => esc_html__('Navigasi ini memuat posting sekilas yang berjalan dan juga menu sosial media.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => false,
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'checkbox',
					'settings'    => 'sekilas_nav_enable',
					'label'       => esc_html__('Aktifkan sekilas postingan?', 'wowstrap'),
					'description' => __('Aktifkan tampilan sekilas (<code>highlight</code>) posting di menu atas.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => false,
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'custom',
					'title'		  => __( 'Menu Sosial Media', 'wowstrap' ),
					'html'		  => 'Html',
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'checkbox',
					'settings'    => 'search_top_nav_enable',
					'label'       => esc_html__('Aktifkan Pencarian Di Menu Atas?', 'wowstrap'),
					'description' => esc_html__('Kotak pencari akan muncul di menu navigasi atas.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => false,
				]);

			Kirki::add_field('theme_config_id', [
					'type'        => 'custom',
					'settings'    => 'custom_text_links',
					'label'       => esc_html__('Tautan Sosial Media', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => __( '<p>Masukkan tautan sosial media yang kamu miliki agar pengunjung dapat mengetahui akun sosial media kamu', 'wowstrap' ),
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'text',
					'settings'    => 'fb_links',
					'label'       => esc_html__('Tautan Akun Facebook', 'wowstrap'),
					'description' => esc_html__('Masukkan tautan akun atau halaman facebook anda.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => 'https://fb.me/cakadi.id',
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'text',
					'settings'    => 'wa_links',
					'label'       => esc_html__('Tautan Akun WhatsApp', 'wowstrap'),
					'description' => esc_html__('Masukkan tautan akun WhatsApp anda.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => 'https://chat.whatsapp.com/send?phone=6281234771365',
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'text',
					'settings'    => 'yt_links',
					'label'       => esc_html__('Tautan Kanal YouTube', 'wowstrap'),
					'description' => esc_html__('Masukkan tautan Channel YouTube anda.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => 'https://www.youtube.com/channel/AbAyea+ehrgysdbx',
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'text',
					'settings'    => 'ig_links',
					'label'       => esc_html__('Tautan Akun Instagram', 'wowstrap'),
					'description' => esc_html__('Masukkan tautan akun instagram anda.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => 'https://www.instagram.com/adiboocreative',
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'text',
					'settings'    => 'tw_links',
					'label'       => esc_html__('Tautan Akun Twitter', 'wowstrap'),
					'description' => esc_html__('Masukkan tautan akun Twitter anda.', 'wowstrap'),
					'section'     => 'nav_top_sections',
					'default'     => 'https://www.twitter.com/adiboocreative',
				]);

		# Section 2
		Kirki::add_section('nav_bottom_sections', array(
				'title'       => esc_html__('Bagian Navigasi Bawah', 'wowstrap'),
				'description' => esc_html__('Aturlah bagian navigasi ini sesuai dengan keinginan anda.', 'wowstrap'),
				'panel'       => 'header_panel',
				'priority'    => 170,
			));

			Kirki::add_field('theme_config_id', [
					'type'        => 'select',
					'settings'    => 'nav_type',
					'label'       => __('<code>Boxed</code> atau <code>Full Width</code>', 'wowstrap'),
					'description' => __('Jenis menu navigasi yang anda inginkan.', 'wowstrap'),
					'section'     => 'nav_bottom_sections',
					'default'     => 'default',
					'choices'	  => array(
						'default' 	=> __( 'Bawaan', 'wowstrap' ),
						'use'  		=> __( 'Boxed', 'wowstrap' ),
						'no-use'  	=> __( 'Tidak boxed', 'wowstrap' ),
					),
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'radio',
					'settings'    => 'nav_align_type',
					'label'       => __('Arah Menu Navigasi', 'wowstrap'),
					'description' => __('Arah Menu Navigasi yang anda inginkan..', 'wowstrap'),
					'section'     => 'nav_bottom_sections',
					'default'     => 'default',
					'choices'	  => array(
						'default' 	=> __( 'Bawaan', 'wowstrap' ),
						'left'  	=> __( 'Rata Kiri', 'wowstrap' ),
						'right'  	=> __( 'Rata Kanan', 'wowstrap' ),
					),
				]);

		Kirki::add_section('header_sections', array(
				'title'       => esc_html__('Bagian Header', 'wowstrap'),
				'description' => esc_html__('Aturlah bagian kepala laman ini sesuai dengan keinginan anda.', 'wowstrap'),
				'panel'       => 'header_panel',
				'priority'    => 170,
			));

			$category 		  = get_categories();
			$categories['null'] = __( 'Tampilkan Semua', 'wowstrap' );

			foreach ($category as $key) {
				$categories[$key->slug] .= $key->name;
			}

			Kirki::add_field('theme_config_id', [
					'type'        => 'checkbox',
					'settings'    => 'show_header_big',
					'label'       => __('Tampilkan Kepala Laman', 'wowstrap'),
					'description' => __('Tampilkan kepala laman yang memuat slider postingan, dan post terbaru', 'wowstrap'),
					'section'     => 'header_sections',
					'default'     => false,
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'select',
					'settings'    => 'category_tag_slider',
					'label'       => __('Kategori Slider', 'wowstrap'),
					'description' => __('Pilih kategori agar postingan di slider dapat menampilkan postingan sesuai kategori.', 'wowstrap') . '<div class="notice notice-warning">' . __('Opsi ini hanya dapat dijalankan jika anda memilih opsi <strong>Tampilkan Kepala Laman</strong>.', 'wowstrap') . '</div>',
					'section'     => 'header_sections',
					'default'     => 'null',
					'choices'	  => $categories,
				]);
			Kirki::add_field('theme_config_id', [
					'type'        => 'text',
					'settings'    => 'items_slider',
					'label'       => __('Jumlah Item Slider', 'wowstrap'),
					'description' => __('Ubah item slider agar dapat menampilkan postingan sesuai jumlah yang diinginkan.', 'wowstrap') . '<div class="notice notice-warning">' . __('Opsi ini hanya dapat dijalankan jika anda memilih opsi <strong>Tampilkan Kepala Laman</strong>.', 'wowstrap') . '</div>',
					'section'     => 'header_sections',
					'default'     => '5'
				]);
}