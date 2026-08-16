<?php
/**
 * Helper functions.
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Contact / CTA settings.
 *
 * @return array<string, string>
 */
function mma_contact() {
	return array(
		'phone'          => get_theme_mod( 'mma_phone', '070-2165-7991' ),
		'phone_landline' => get_theme_mod( 'mma_phone_landline', '0948-52-3646' ),
		'email'          => get_theme_mod( 'mma_email', 'mmatrading.jp@gmail.com' ),
		'line_url'       => get_theme_mod( 'mma_line_url', 'https://line.me/ti/p/lOU38xFUl2' ),
		'hours'          => get_theme_mod( 'mma_hours', '24時間対応' ),
		'closed'         => get_theme_mod( 'mma_closed', '無休' ),
		'company'        => get_theme_mod( 'mma_company', 'MMAトレーディング合同会社' ),
		'rep'            => get_theme_mod( 'mma_rep', 'ラザ アリ' ),
		'address'        => get_theme_mod( 'mma_address', '〒820-0701 福岡県飯塚市長尾1370-4' ),
		'license'        => get_theme_mod( 'mma_license', '福岡県公安委員会 第901031810041号' ),
		'brand'          => get_theme_mod( 'mma_brand', 'MMA買い取り' ),
	);
}

/**
 * Tel href from phone string.
 *
 * @param string $phone Phone.
 * @return string
 */
function mma_tel_href( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
}

/**
 * Permalink helper by slug with home fallback.
 *
 * @param string $slug Page slug.
 * @param string $hash Optional hash fallback.
 * @return string
 */
function mma_page_url( $slug, $hash = '' ) {
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( $hash ? '/#' . ltrim( $hash, '#' ) : '/' );
}

/**
 * Fallback primary menu.
 */
function mma_fallback_menu() {
	$items = array(
		array( 'url' => home_url( '/' ), 'label' => 'トップ' ),
		array( 'url' => mma_page_url( 'flow', 'flow' ), 'label' => '買取の流れ' ),
		array( 'url' => mma_page_url( 'documents', 'documents' ), 'label' => '必要書類ガイド' ),
		array( 'url' => get_post_type_archive_link( 'area' ), 'label' => '対応エリア' ),
		array( 'url' => mma_page_url( 'strengths', 'strengths' ), 'label' => '私たちの強み' ),
		array( 'url' => mma_page_url( 'faq', 'faq' ), 'label' => 'よくあるご質問' ),
		array( 'url' => mma_page_url( 'company', 'company' ), 'label' => '運営会社' ),
	);

	echo '<ul class="menu">';
	foreach ( $items as $item ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( $item['url'] ),
			esc_html( $item['label'] )
		);
	}
	echo '</ul>';
}
