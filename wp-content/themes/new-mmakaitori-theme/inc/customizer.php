<?php
/**
 * Theme Customizer.
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function mma_kaitori_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'mma_homepage_banners',
		array(
			'title'       => 'Homepage banners / トップ画像',
			'description' => 'Upload the two big pictures at the top of the homepage. English: Appearance → Customize → Homepage banners.',
			'priority'    => 25,
		)
	);

	$wp_customize->add_setting(
		'mma_banner_first',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'mma_banner_first',
			array(
				'label'       => 'TOP image 1 (main banner)',
				'description' => 'First big picture under the header. Recommended wide image (about 1920px).',
				'section'     => 'mma_homepage_banners',
			)
		)
	);

	$wp_customize->add_setting(
		'mma_banner_second',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'mma_banner_second',
			array(
				'label'       => 'TOP image 2 (free appraisal banner)',
				'description' => 'Second picture under image 1 (no gap). Clicking it scrolls to the form.',
				'section'     => 'mma_homepage_banners',
			)
		)
	);

	$wp_customize->add_section(
		'mma_contact',
		array(
			'title'    => 'MMA Contact / 連絡先',
			'priority' => 30,
		)
	);

	$fields = array(
		'mma_brand'          => array( 'label' => 'Brand name / 屋号', 'default' => 'MMA買い取り' ),
		'mma_company'        => array( 'label' => 'Company / 運営会社', 'default' => 'MMAトレーディング合同会社' ),
		'mma_rep'            => array( 'label' => 'Representative / 代表', 'default' => 'ラザ アリ' ),
		'mma_phone'          => array( 'label' => 'Mobile / 携帯電話', 'default' => '070-2165-7991' ),
		'mma_phone_landline' => array( 'label' => 'TEL/FAX', 'default' => '0948-52-3646' ),
		'mma_email'          => array( 'label' => 'Email', 'default' => 'mmatrading.jp@gmail.com' ),
		'mma_line_url'       => array( 'label' => 'LINE URL', 'default' => 'https://line.me/ti/p/lOU38xFUl2' ),
		'mma_hours'          => array( 'label' => 'Hours', 'default' => '24時間対応' ),
		'mma_closed'         => array( 'label' => 'Closed days', 'default' => '無休' ),
		'mma_address'        => array( 'label' => 'Address', 'default' => '〒820-0701 福岡県飯塚市長尾1370-4' ),
		'mma_license'        => array( 'label' => 'Antique dealer license', 'default' => '福岡県公安委員会 第901031810041号' ),
		'mma_trust_1'        => array( 'label' => 'Trust stat 1', 'default' => '全国対応' ),
		'mma_trust_2'        => array( 'label' => 'Trust stat 2', 'default' => '最短対応' ),
		'mma_trust_3'        => array( 'label' => 'Trust stat 3', 'default' => 'お客様負担0円' ),
		'mma_cancel_note'    => array(
			'label'   => 'Cancel policy note',
			'default' => 'ご成約後のキャンセルについては、事前にご案内するキャンセルポリシーに従います。詳細はお申し込み時にご確認ください。',
		),
		'mma_refund_amount'  => array( 'label' => 'Refund banner max amount', 'default' => '26,200' ),
	);

	foreach ( $fields as $id => $field ) {
		$sanitize = ( false !== strpos( $id, 'note' ) || false !== strpos( $id, 'address' ) )
			? 'sanitize_textarea_field'
			: 'sanitize_text_field';

		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => $sanitize,
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $field['label'],
				'section' => 'mma_contact',
				'type'    => false !== strpos( $id, 'note' ) || false !== strpos( $id, 'address' ) ? 'textarea' : 'text',
			)
		);
	}
}
add_action( 'customize_register', 'mma_kaitori_customize_register' );
