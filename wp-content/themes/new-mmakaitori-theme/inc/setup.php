<?php
/**
 * Theme setup & assets.
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme supports and menus.
 */
function mma_kaitori_setup() {
	load_theme_textdomain( 'mma-kaitori', MMA_KAITORI_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'mma-kaitori' ),
			'footer'  => __( 'Footer Menu', 'mma-kaitori' ),
		)
	);
}
add_action( 'after_setup_theme', 'mma_kaitori_setup' );

/**
 * Enqueue front-end assets.
 */
function mma_kaitori_assets() {
	wp_enqueue_style(
		'mma-kaitori-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'mma-kaitori-main',
		MMA_KAITORI_URI . '/assets/css/main.css',
		array( 'mma-kaitori-fonts' ),
		MMA_KAITORI_VERSION
	);

	wp_enqueue_script(
		'mma-kaitori-main',
		MMA_KAITORI_URI . '/assets/js/main.js',
		array(),
		MMA_KAITORI_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'mma_kaitori_assets' );

/**
 * Strip leftover live patches from old bmt-kaitori / mu-plugin.
 */
function mma_kaitori_remove_legacy_patches() {
	wp_dequeue_style( 'bmt-kaitori-custom-fixes' );
	wp_deregister_style( 'bmt-kaitori-custom-fixes' );

	remove_action( 'wp_head', 'bmt_live_fixes_inline_header_css', 99 );
	remove_action( 'wp_enqueue_scripts', 'bmt_live_fixes_enqueue_assets', 99 );
	remove_action( 'template_redirect', 'bmt_live_fixes_start_buffer', 0 );
	remove_filter( 'locate_template', 'bmt_live_fixes_swap_home_hero', 20 );
}
add_action( 'wp_enqueue_scripts', 'mma_kaitori_remove_legacy_patches', 999 );
add_action( 'template_redirect', 'mma_kaitori_remove_legacy_patches', 1 );

/**
 * Register page templates.
 *
 * @param array<string, string> $templates Templates.
 * @return array<string, string>
 */
function mma_kaitori_page_templates( $templates ) {
	$templates['page-templates/page-flow.php']         = '買取の流れ';
	$templates['page-templates/page-faq.php']          = 'よくあるご質問';
	$templates['page-templates/page-company.php']      = '運営会社';
	$templates['page-templates/page-quote.php']        = '無料査定フォーム';
	$templates['page-templates/page-privacy.php']      = 'プライバシーポリシー';
	$templates['page-templates/page-strengths.php']    = '私たちの強み';
	$templates['page-templates/page-hajimete.php']     = 'はじめての方へ';
	$templates['page-templates/page-documents.php']    = '必要書類ガイド';
	$templates['page-templates/page-doc-transfer.php'] = '必要書類 — 譲渡証明書';
	$templates['page-templates/page-doc-proxy.php']    = '必要書類 — 委任状';
	$templates['page-templates/page-sitemap.php']      = 'サイトマップ';
	return $templates;
}
add_filter( 'theme_page_templates', 'mma_kaitori_page_templates' );

/**
 * Ensure Phase 2 page templates are assigned.
 */
function mma_kaitori_assign_phase2_templates() {
	if ( get_option( 'mma_kaitori_phase2_templates' ) ) {
		return;
	}

	$map = array(
		'documents' => 'page-templates/page-documents.php',
		'strengths' => 'page-templates/page-strengths.php',
		'hajimete'  => 'page-templates/page-hajimete.php',
	);

	foreach ( $map as $slug => $template ) {
		$page = get_page_by_path( $slug );
		if ( ! $page ) {
			$id = wp_insert_post(
				array(
					'post_title'  => 'hajimete' === $slug ? 'はじめての方へ' : ( 'documents' === $slug ? '必要書類ガイド' : '私たちの強み' ),
					'post_name'   => $slug,
					'post_status' => 'publish',
					'post_type'   => 'page',
				)
			);
			if ( $id && ! is_wp_error( $id ) ) {
				update_post_meta( $id, '_wp_page_template', $template );
			}
			continue;
		}
		update_post_meta( $page->ID, '_wp_page_template', $template );
	}

	update_option( 'mma_kaitori_phase2_templates', 1 );
}
add_action( 'init', 'mma_kaitori_assign_phase2_templates', 30 );

/**
 * Create core pages on theme activation.
 */
function mma_kaitori_create_pages() {
	if ( get_option( 'mma_kaitori_pages_seeded' ) ) {
		return;
	}

	$pages = array(
		'flow'      => array( 'title' => '買取の流れ', 'template' => 'page-templates/page-flow.php' ),
		'faq'       => array( 'title' => 'よくあるご質問', 'template' => 'page-templates/page-faq.php' ),
		'company'   => array( 'title' => '運営会社', 'template' => 'page-templates/page-company.php' ),
		'quote'     => array( 'title' => '無料査定', 'template' => 'page-templates/page-quote.php' ),
		'privacy'   => array( 'title' => 'プライバシーポリシー', 'template' => 'page-templates/page-privacy.php' ),
		'documents' => array( 'title' => '必要書類ガイド', 'template' => 'page-templates/page-documents.php' ),
		'strengths' => array( 'title' => '私たちの強み', 'template' => 'page-templates/page-strengths.php' ),
		'hajimete'  => array( 'title' => 'はじめての方へ', 'template' => 'page-templates/page-hajimete.php' ),
	);

	foreach ( $pages as $slug => $page ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			continue;
		}

		$id = wp_insert_post(
			array(
				'post_title'   => $page['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);

		if ( $id && ! is_wp_error( $id ) && $page['template'] ) {
			update_post_meta( $id, '_wp_page_template', $page['template'] );
		}
	}

	$home = get_page_by_path( 'home' );
	if ( ! $home ) {
		$home_id = wp_insert_post(
			array(
				'post_title'  => 'ホーム',
				'post_name'   => 'home',
				'post_status' => 'publish',
				'post_type'   => 'page',
			)
		);
		if ( $home_id && ! is_wp_error( $home_id ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $home_id );
		}
	}

	update_option( 'mma_kaitori_pages_seeded', 1 );
}
add_action( 'after_switch_theme', 'mma_kaitori_create_pages' );

/**
 * One-time contact/LINE/address corrections (overrides stale Customizer values).
 */
function mma_kaitori_patch_contact_details() {
	if ( get_option( 'mma_contact_details_patched_v141' ) ) {
		return;
	}

	$set = array(
		'mma_line_url'       => 'https://line.me/ti/p/lOU38xFUl2',
		'mma_phone_landline' => '0948-52-3646',
		'mma_address'        => '〒820-0701 福岡県飯塚市長尾1370-4',
	);

	foreach ( $set as $mod => $value ) {
		set_theme_mod( $mod, $value );
	}

	update_option( 'mma_contact_details_patched_v141', 1 );
}
add_action( 'after_setup_theme', 'mma_kaitori_patch_contact_details', 20 );
