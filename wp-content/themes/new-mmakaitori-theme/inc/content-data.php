<?php
/**
 * Content helpers — reads from MMA Contents admin panel.
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Car makers for quote forms.
 *
 * @return string[]
 */
function mma_car_makers() {
	return array(
		'トヨタ', 'レクサス', '日産', 'ホンダ', 'マツダ', 'スバル', 'スズキ', '三菱', 'ダイハツ',
		'いすゞ', '日野自動車', 'UDトラックス', 'メルセデス・ベンツ', 'BMW', 'アウディ',
		'フォルクスワーゲン', 'ポルシェ', 'その他・不明',
	);
}

/**
 * Prefectures.
 *
 * @return string[]
 */
function mma_prefectures() {
	return array(
		'北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
		'茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
		'新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県',
		'岐阜県', '静岡県', '愛知県', '三重県',
		'滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
		'鳥取県', '島根県', '岡山県', '広島県', '山口県',
		'徳島県', '香川県', '愛媛県', '高知県',
		'福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県',
	);
}

/**
 * Trust strip items.
 *
 * @return array<int, array{label:string,value:string}>
 */
function mma_trust_items() {
	return array(
		array( 'value' => mma_content( 'trust_1_value', '全国対応' ), 'label' => mma_content( 'trust_1_label', 'どこでもお引き取り' ) ),
		array( 'value' => mma_content( 'trust_2_value', '最短対応' ), 'label' => mma_content( 'trust_2_label', 'スピーディーな査定' ) ),
		array( 'value' => mma_content( 'trust_3_value', 'お客様負担0円' ), 'label' => mma_content( 'trust_3_label', 'レッカー・手続き込み' ) ),
	);
}

/**
 * Strength cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function mma_strength_items() {
	$items = array();
	for ( $i = 1; $i <= 5; $i++ ) {
		$title = mma_content( "strength_{$i}_title" );
		$text  = mma_content( "strength_{$i}_text" );
		if ( $title || $text ) {
			$items[] = array( 'title' => $title, 'text' => $text );
		}
	}
	return $items;
}

/**
 * Why we can buy high.
 *
 * @return array<int, array{title:string,text:string}>
 */
function mma_reason_items() {
	$items = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		$items[] = array(
			'title' => mma_content( "reason_{$i}_title" ),
			'text'  => mma_content( "reason_{$i}_text" ),
		);
	}
	return $items;
}

/**
 * Worry cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function mma_worry_items() {
	$items = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		$items[] = array(
			'title' => mma_content( "worry_{$i}_title" ),
			'text'  => mma_content( "worry_{$i}_text" ),
		);
	}
	return $items;
}

/**
 * Flow steps.
 *
 * @return array<int, array{title:string,text:string}>
 */
function mma_flow_steps() {
	$items = array();
	for ( $i = 1; $i <= 5; $i++ ) {
		$items[] = array(
			'title' => mma_content( "flow_{$i}_title" ),
			'text'  => mma_content( "flow_{$i}_text" ),
		);
	}
	return $items;
}

/**
 * Document lists.
 *
 * @return array{normal:string[],kei:string[]}
 */
function mma_document_lists() {
	return array(
		'normal' => mma_lines( mma_content( 'docs_normal' ) ),
		'kei'    => mma_lines( mma_content( 'docs_kei' ) ),
	);
}

/**
 * FAQ items.
 *
 * @return array<int, array{q:string,a:string}>
 */
function mma_faq_items() {
	$items = array();
	for ( $i = 1; $i <= 8; $i++ ) {
		$q = mma_content( "faq_{$i}_q" );
		$a = mma_content( "faq_{$i}_a" );
		if ( $q || $a ) {
			$items[] = array( 'q' => $q, 'a' => $a );
		}
	}
	return $items;
}

/**
 * Print title with optional line breaks.
 *
 * @param string $text Text with \n.
 */
function mma_echo_breaks( $text ) {
	$lines = mma_lines( $text );
	echo wp_kses_post( implode( '<br />', array_map( 'esc_html', $lines ) ) );
}
