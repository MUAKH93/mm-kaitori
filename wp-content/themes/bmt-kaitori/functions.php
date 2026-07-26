<?php
/**
 * BMT Kaitori theme functions.
 *
 * @package BMT_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BMT_KAITORI_VERSION', '1.2.0' );

/**
 * Theme setup.
 */
function bmt_kaitori_setup() {
	load_theme_textdomain( 'bmt-kaitori', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bmt-kaitori' ),
		'footer'  => __( 'Footer Menu', 'bmt-kaitori' ),
	) );
}
add_action( 'after_setup_theme', 'bmt_kaitori_setup' );

/**
 * Enqueue scripts and styles.
 */
function bmt_kaitori_scripts() {
	wp_enqueue_style(
		'bmt-kaitori-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'bmt-kaitori-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'bmt-kaitori-fonts' ),
		BMT_KAITORI_VERSION
	);

	wp_enqueue_script(
		'bmt-kaitori-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		BMT_KAITORI_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'bmt_kaitori_scripts' );

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/i18n.php';
require get_template_directory() . '/inc/setup-content.php';
require get_template_directory() . '/inc/admin-setup.php';

/**
 * Get theme contact settings with defaults.
 *
 * @return array<string, string>
 */
function bmt_kaitori_contact_info() {
	return array(
		'phone'        => get_theme_mod( 'bmt_phone', '070-2165-7991' ),
		'phone_landline' => get_theme_mod( 'bmt_phone_landline', '0948-43-8080' ),
		'email'        => get_theme_mod( 'bmt_email', 'mmatrading.jp@gmail.com' ),
		'phone_label'  => get_theme_mod( 'bmt_phone_label', '電話査定' ),
		'line_url'     => get_theme_mod( 'bmt_line_url', '#' ),
		'line_label'   => get_theme_mod( 'bmt_line_label', 'LINEから査定' ),
		'hours'        => get_theme_mod( 'bmt_hours', '24時間対応' ),
		'closed'       => get_theme_mod( 'bmt_closed', '無休' ),
	);
}

/**
 * Get business location settings.
 *
 * @return array<string, string>
 */
function bmt_kaitori_location_info() {
	$address = get_theme_mod( 'bmt_address', '820-0701 福岡県飯塚市長尾1470-4' );
	$maps_url = get_theme_mod( 'bmt_maps_url', 'https://maps.app.goo.gl/AbCSyFvgbnYt1Tc8A' );
	$embed_url = get_theme_mod( 'bmt_map_embed_url', '' );

	if ( empty( $embed_url ) ) {
		$embed_url = 'https://maps.google.com/maps?q=' . rawurlencode( $address ) . '&hl=ja&z=16&output=embed';
	}

	return array(
		'address'   => $address,
		'maps_url'  => $maps_url,
		'embed_url' => $embed_url,
	);
}

/**
 * Register page templates.
 *
 * @param array<string, string> $templates Templates.
 * @return array<string, string>
 */
function bmt_kaitori_page_templates( $templates ) {
	$templates['page-templates/page-quote.php'] = '無料査定フォーム';
	return $templates;
}
add_filter( 'theme_page_templates', 'bmt_kaitori_page_templates' );

/**
 * Get banner image URL (Customizer upload or theme file).
 *
 * @return string
 */
function bmt_kaitori_get_banner_url() {
	$custom = get_theme_mod( 'bmt_banner_image', '' );
	if ( $custom ) {
		return $custom;
	}

	$path = get_template_directory() . '/assets/images/banner.png';
	if ( file_exists( $path ) ) {
		return get_template_directory_uri() . '/assets/images/banner.png';
	}

	return '';
}

/**
 * Get logo URL (Customizer site logo, image setting, or theme file).
 *
 * @return string
 */
function bmt_kaitori_get_logo_url() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$logo = wp_get_attachment_image_url( $custom_logo_id, 'full' );
		if ( $logo ) {
			return $logo;
		}
	}

	$custom = get_theme_mod( 'bmt_logo_image', '' );
	if ( $custom ) {
		return $custom;
	}

	$path = get_template_directory() . '/assets/images/logo.png';
	if ( file_exists( $path ) ) {
		return get_template_directory_uri() . '/assets/images/logo.png';
	}

	return '';
}

/**
 * Fallback menu when no menu is assigned.
 */
function bmt_kaitori_fallback_menu() {
	$contact_page = get_page_by_path( 'contact' );
	$quote_url    = $contact_page ? get_permalink( $contact_page ) : home_url( '/#quote-form' );

	echo '<ul>';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( bmt_t( 'menu_home' ) ) . '</a></li>';

	$posts_page = get_option( 'page_for_posts' );
	if ( $posts_page ) {
		echo '<li><a href="' . esc_url( get_permalink( $posts_page ) ) . '">' . esc_html( bmt_t( 'menu_news' ) ) . '</a></li>';
	}

	echo '<li><a href="' . esc_url( home_url( '/#quote-form' ) ) . '">' . esc_html( bmt_t( 'menu_quote' ) ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#faq' ) ) . '">' . esc_html( bmt_t( 'menu_faq' ) ) . '</a></li>';
	echo '</ul>';
}
