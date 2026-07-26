<?php
/**
 * Theme translations (Japanese / English).
 *
 * @package BMT_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle language switch via ?lang=en or ?lang=ja
 */
function bmt_kaitori_handle_language_switch() {
	if ( ! isset( $_GET['lang'] ) ) {
		return;
	}

	$lang = sanitize_text_field( wp_unslash( $_GET['lang'] ) );
	if ( ! in_array( $lang, array( 'en', 'ja' ), true ) ) {
		return;
	}

	setcookie( 'bmt_lang', $lang, time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true );
	$_COOKIE['bmt_lang'] = $lang;
}
add_action( 'init', 'bmt_kaitori_handle_language_switch' );

/**
 * Current front-end language.
 *
 * @return string
 */
function bmt_kaitori_get_lang() {
	if ( isset( $_COOKIE['bmt_lang'] ) && 'en' === $_COOKIE['bmt_lang'] ) {
		return 'en';
	}
	return 'ja';
}

/**
 * Translate a string key.
 *
 * @param string $key String key.
 * @return string
 */
function bmt_t( $key ) {
	$strings = bmt_kaitori_translation_strings();
	$lang    = bmt_kaitori_get_lang();

	if ( isset( $strings[ $lang ][ $key ] ) ) {
		return $strings[ $lang ][ $key ];
	}

	return $strings['ja'][ $key ] ?? $key;
}

/**
 * Language switch URL.
 *
 * @param string $lang Language code.
 * @return string
 */
function bmt_kaitori_lang_url( $lang ) {
	return add_query_arg( 'lang', $lang, home_url( '/' ) );
}

/**
 * Get Contact Form 7 quote form HTML.
 *
 * @return string
 */
function bmt_kaitori_get_quote_form_html() {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		return '<p class="form-missing">' . esc_html( bmt_t( 'form_install_cf7' ) ) . '</p>';
	}

	$forms = get_posts( array(
		'post_type'      => 'wpcf7_contact_form',
		'posts_per_page' => 20,
		'post_status'    => 'publish',
	) );

	foreach ( $forms as $form_post ) {
		if ( in_array( $form_post->post_title, array( '無料査定フォーム', 'Free Quote Form' ), true ) ) {
			return do_shortcode( '[contact-form-7 id="' . (int) $form_post->ID . '" title="' . esc_attr( $form_post->post_title ) . '"]' );
		}
	}

	return '<p class="form-missing">' . esc_html( bmt_t( 'form_not_found' ) ) . '</p>';
}

/**
 * Strength items for current language.
 *
 * @return array<int, array<string, string>>
 */
function bmt_kaitori_strength_items() {
	if ( 'en' === bmt_kaitori_get_lang() ) {
		return array(
			array( 'title' => 'Top prices for cars & machinery', 'text' => 'We buy used cars and heavy equipment at competitive prices through domestic and export channels.' ),
			array( 'title' => 'Export trade supported', 'text' => 'We actively purchase vehicles and machinery with strong overseas demand.' ),
			array( 'title' => 'Open 24 hours', 'text' => 'Contact us anytime — we respond around the clock.' ),
			array( 'title' => 'Wide range of vehicles & machines', 'text' => 'Construction machinery, generators, trucks, buses, excavators, dump trucks, bulldozers, and more.' ),
			array( 'title' => 'Any condition accepted', 'text' => 'Running or not, accident-damaged, flood-damaged — please ask us.' ),
		);
	}

	return array(
		array( 'title' => '中古車・重機 高価買取！', 'text' => '中古車から建設重機まで、国内外の販路を活かし高価買取を実現します。' ),
		array( 'title' => '輸出貿易に対応！', 'text' => '中古車・重機の輸出貿易を行っており、海外需要のある車両・機械を積極的に買取しています。' ),
		array( 'title' => '24時間受付！', 'text' => '24時間いつでもご連絡ください。お客様のご都合に合わせて対応いたします。' ),
		array( 'title' => '幅広い車種・重機に対応！', 'text' => '建設重機、発電機、トラック、バス、ユンボ、ダンプ、冷凍車、ブルドーザーなど多種多様に対応。' ),
		array( 'title' => '事故車・不動車もOK！', 'text' => '走行可能なお車はもちろん、事故車・不動車・水没車など状態を問わずご相談ください。' ),
	);
}

/**
 * FAQ items for current language.
 *
 * @return array<int, array<string, string>>
 */
function bmt_kaitori_faq_items() {
	if ( 'en' === bmt_kaitori_get_lang() ) {
		return array(
			array( 'q' => 'Q1. Why can you buy scrap or damaged vehicles?', 'a' => 'We export usable cars and parts worldwide, so even end-of-life vehicles retain value.' ),
			array( 'q' => 'Q2. When do I receive automobile tax refunds after scrapping?', 'a' => 'Refunds typically arrive within about two months after deregistration.' ),
			array( 'q' => 'Q3. Do you pick up non-running cars for free?', 'a' => 'Yes, in most cases we collect with a carrier at no extra charge, subject to access conditions.' ),
			array( 'q' => 'Q4. Are there tax or insurance refunds?', 'a' => 'Depending on timing, you may qualify for automobile tax, weight tax, or insurance refunds.' ),
			array( 'q' => 'Q5. What documents are required?', 'a' => 'Requirements vary. We provide a checklist after you apply.' ),
		);
	}

	return array(
		array( 'q' => 'Q1. なぜ廃車でも買取りができるのですか？', 'a' => '中古車として海外輸出、または分解してパーツとして輸出、修理して国内再販など、複数の販路があるため、廃車であっても買取が可能です。' ),
		array( 'q' => 'Q2. 廃車の後の自動車税還付金はいつ受け取れますか？', 'a' => '廃車登録からおおむね2ヶ月程度で、各都道府県税事務所から還付通知が届きます。' ),
		array( 'q' => 'Q3. 動かない中古車なのですが、無料で引き取っていただけますか？', 'a' => 'はい。動かない車・事故車でも原則無料で積載車による引取りに伺います。※道幅などによりお断りする場合があります。' ),
		array( 'q' => 'Q4. 自分の車を廃車にしたら、税金の還付はありますか？', 'a' => 'はい。車両買取価格とは別に、自動車税・自賠責保険・重量税などの還付が受け取れる場合があります。' ),
		array( 'q' => 'Q5. 廃車するにはどんな書類が必要ですか？', 'a' => 'お客様の状況によって異なります。ご依頼後に必要書類をご案内しますのでご安心ください。' ),
	);
}

/**
 * All UI translation strings.
 *
 * @return array<string, array<string, string>>
 */
function bmt_kaitori_translation_strings() {
	return array(
		'ja' => array(
			'lang_ja'            => '日本語',
			'lang_en'            => 'English',
			'menu_home'          => 'ホーム',
			'menu_news'          => 'お知らせ',
			'menu_quote'         => '無料査定',
			'menu_faq'           => 'FAQ',
			'hero_eyebrow'       => '中古車・重機 販売・買取・輸出貿易',
			'hero_title'         => 'MMAトレーディング合同会社',
			'hero_title_sub'     => '24時間いつでもご連絡ください',
			'hero_lead'          => '中古車から建設重機まで、買取・販売・輸出・下取りに対応。WEB・LINE・電話・WhatsAppで無料査定を承ります。',
			'btn_web_quote'      => 'WEBで無料見積り',
			'btn_line_quote'     => 'LINEで簡単！無料見積り',
			'hero_phone_label'   => 'お電話での無料査定',
			'hero_hours'         => '【営業時間】',
			'news_title'         => 'お知らせ',
			'news_view_all'      => '一覧を見る',
			'news_empty'         => 'お知らせは準備中です。',
			'strength_title'     => '私たちの強み',
			'flow_title'         => 'WEB・LINE・電話査定の流れ',
			'faq_title'          => 'よくある質問',
			'about_title'        => 'MMAトレーディング合同会社',
			'outline_title'      => '概要',
			'map_title'          => 'アクセス・所在地',
			'map_open'           => 'Google Mapsで開く',
			'contact_title'      => 'お問い合わせ',
			'contact_lead'       => 'お電話・WEBフォーム・LINEからお気軽にご連絡ください。',
			'contact_hours'      => '【営業時間】',
			'contact_closed'     => '【定休日】',
			'btn_phone'          => '電話査定',
			'btn_web'            => 'WEB査定',
			'btn_line'           => 'LINEから査定',
			'quote_section_title'=> '無料査定フォーム',
			'quote_section_lead' => 'お車・重機の査定に必要な情報を入力してください。※必須項目は必ずご入力ください。',
			'quote_section_note' => '確認画面は表示されません。上記内容にて送信しますので、よろしければ同意チェックを入れてください。',
			'form_install_cf7'   => 'Contact Form 7 プラグインをインストールして有効化してください。',
			'form_not_found'     => '査定フォームが見つかりません。Contact Form 7 を確認してください。',
			'legal_title'        => '古物営業法に基づく表示',
		),
		'en' => array(
			'lang_ja'            => '日本語',
			'lang_en'            => 'English',
			'menu_home'          => 'Home',
			'menu_news'          => 'News',
			'menu_quote'         => 'Free Quote',
			'menu_faq'           => 'FAQ',
			'hero_eyebrow'       => 'Used cars & heavy machinery — buy, sell, export',
			'hero_title'         => 'MMA Trading LLC',
			'hero_title_sub'     => 'Contact us anytime — 24 hours',
			'hero_lead'          => 'We buy, sell, export, and trade in used cars and heavy machinery. Free quotes via web, LINE, phone, or WhatsApp.',
			'btn_web_quote'      => 'Free web quote',
			'btn_line_quote'     => 'Quote via LINE',
			'hero_phone_label'   => 'Free phone quote',
			'hero_hours'         => 'Hours:',
			'news_title'         => 'News',
			'news_view_all'      => 'View all',
			'news_empty'         => 'No news posts yet.',
			'strength_title'     => 'Why choose us',
			'flow_title'         => 'How to get a free quote',
			'faq_title'          => 'FAQ',
			'about_title'        => 'About MMA Trading LLC',
			'outline_title'      => 'Company info',
			'map_title'          => 'Location & access',
			'map_open'           => 'Open in Google Maps',
			'contact_title'      => 'Contact',
			'contact_lead'       => 'Reach us by phone, web form, LINE, or WhatsApp.',
			'contact_hours'      => 'Hours:',
			'contact_closed'     => 'Closed:',
			'btn_phone'          => 'Phone quote',
			'btn_web'            => 'Web quote',
			'btn_line'           => 'Quote via LINE',
			'quote_section_title'=> 'Free quote form',
			'quote_section_lead' => 'Please enter the details required for your vehicle or machinery appraisal. Required fields must be completed.',
			'quote_section_note' => 'There is no confirmation screen. Please check the agreement box before submitting.',
			'form_install_cf7'   => 'Please install and activate the Contact Form 7 plugin.',
			'form_not_found'     => 'Quote form not found. Please check Contact Form 7.',
			'legal_title'        => 'Secondhand Dealer Act disclosure',
		),
	);
}
