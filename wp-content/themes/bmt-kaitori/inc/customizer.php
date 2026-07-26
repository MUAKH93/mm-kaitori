<?php
/**
 * Theme Customizer — contact info, images, and CTAs.
 *
 * @package BMT_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function bmt_kaitori_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'bmt_images', array(
		'title'       => 'Site Images / 画像設定',
		'description' => 'Upload your company banner and logo for the homepage.',
		'priority'    => 25,
	) );

	$wp_customize->add_setting( 'bmt_banner_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bmt_banner_image',
			array(
				'label'       => 'Company Banner / 会社バナー',
				'description' => 'Shown in the About section on the homepage.',
				'section'     => 'bmt_images',
			)
		)
	);

	$wp_customize->add_setting( 'bmt_logo_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bmt_logo_image',
			array(
				'label'       => 'Logo (extra) / ロゴ画像',
				'description' => 'Optional. You can also set logo under Site Identity.',
				'section'     => 'bmt_images',
			)
		)
	);

	$wp_customize->add_section( 'bmt_contact', array(
		'title'    => 'Contact Info / 連絡先情報',
		'priority' => 30,
	) );

	$fields = array(
		'bmt_phone'          => array( 'label' => 'Mobile / 携帯電話', 'default' => '070-2165-7991' ),
		'bmt_phone_landline' => array( 'label' => 'TEL/FAX', 'default' => '0948-43-8080' ),
		'bmt_email'          => array( 'label' => 'Email / メール', 'default' => 'mmatrading.jp@gmail.com' ),
		'bmt_phone_label'    => array( 'label' => 'Phone button label', 'default' => '電話査定' ),
		'bmt_line_url'       => array( 'label' => 'LINE URL', 'default' => '#' ),
		'bmt_line_label'     => array( 'label' => 'LINE button label', 'default' => 'LINEから査定' ),
		'bmt_hours'          => array( 'label' => 'Business hours / 営業時間', 'default' => '24時間対応' ),
		'bmt_closed'         => array( 'label' => 'Closed days / 定休日', 'default' => '無休' ),
		'bmt_address'        => array( 'label' => 'Address / 所在地', 'default' => '820-0701 福岡県飯塚市長尾1470-4' ),
		'bmt_maps_url'       => array( 'label' => 'Google Maps link', 'default' => 'https://maps.app.goo.gl/AbCSyFvgbnYt1Tc8A' ),
	);

	foreach ( $fields as $id => $field ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $field['default'],
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( $id, array(
			'label'   => $field['label'],
			'section' => 'bmt_contact',
			'type'    => 'text',
		) );
	}
}
add_action( 'customize_register', 'bmt_kaitori_customize_register' );
