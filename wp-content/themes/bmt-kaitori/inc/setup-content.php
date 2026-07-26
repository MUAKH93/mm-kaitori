<?php
/**
 * One-time site bootstrap: pages, reading settings, sample news, CF7 form.
 *
 * @package BMT_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Run after theme switch.
 */
function bmt_kaitori_after_switch_theme() {
	bmt_kaitori_create_core_pages();
	bmt_kaitori_create_sample_news();
	bmt_kaitori_maybe_create_cf7_form();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bmt_kaitori_after_switch_theme' );

/**
 * Create homepage, news, and quote pages if missing.
 */
function bmt_kaitori_create_core_pages() {
	$home_id = bmt_kaitori_ensure_page(
		'home',
		'ホーム',
		''
	);

	$news_id = bmt_kaitori_ensure_page(
		'news',
		'お知らせ',
		''
	);

	$quote_id = bmt_kaitori_ensure_page(
		'contact',
		'無料査定',
		bmt_kaitori_quote_page_content(),
		'page-templates/page-quote.php'
	);

	if ( $home_id && $news_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
		update_option( 'page_for_posts', $news_id );
	}

	if ( $quote_id ) {
		bmt_kaitori_attach_cf7_to_quote_page( $quote_id );
	}

	bmt_kaitori_create_primary_menu( $home_id, $news_id, $quote_id );
}

/**
 * Ensure a page exists by slug.
 *
 * @param string      $slug     Page slug.
 * @param string      $title    Page title.
 * @param string      $content  Page content.
 * @param string|null $template Optional page template.
 * @return int Page ID.
 */
function bmt_kaitori_ensure_page( $slug, $title, $content, $template = null ) {
	$existing = get_page_by_path( $slug );

	if ( $existing ) {
		return (int) $existing->ID;
	}

	$page_id = wp_insert_post( array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => $title,
		'post_name'    => $slug,
		'post_content' => $content,
	) );

	if ( $page_id && ! is_wp_error( $page_id ) && $template ) {
		update_post_meta( $page_id, '_wp_page_template', $template );
	}

	return is_wp_error( $page_id ) ? 0 : (int) $page_id;
}

/**
 * Quote page placeholder content until CF7 shortcode is attached.
 *
 * @return string
 */
function bmt_kaitori_quote_page_content() {
	return '<!-- wp:paragraph --><p>査定フォームを読み込んでいます。Contact Form 7 を有効化すると自動で表示されます。</p><!-- /wp:paragraph -->';
}

/**
 * Create sample news post.
 */
function bmt_kaitori_create_sample_news() {
	if ( get_posts( array( 'post_type' => 'post', 'posts_per_page' => 1 ) ) ) {
		return;
	}

	wp_insert_post( array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_title'   => 'ホームページを公開しました',
		'post_content' => '車両買取サービスの公式サイトを公開しました。今後もお知らせを更新していきます。',
		'post_date'    => '2022-12-05 10:00:00',
	) );
}

/**
 * Create primary navigation menu.
 *
 * @param int $home_id  Home page ID.
 * @param int $news_id  News page ID.
 * @param int $quote_id Quote page ID.
 */
function bmt_kaitori_create_primary_menu( $home_id, $news_id, $quote_id ) {
	$menu_name = 'メインメニュー';
	$menu      = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
	} else {
		$menu_id = $menu->term_id;
	}

	if ( is_wp_error( $menu_id ) || ! $menu_id ) {
		return;
	}

	$items = wp_get_nav_menu_items( $menu_id );
	if ( ! empty( $items ) ) {
		return;
	}

	$links = array(
		array( 'title' => 'ホーム', 'url' => home_url( '/' ) ),
		array( 'title' => 'お知らせ', 'url' => $news_id ? get_permalink( $news_id ) : home_url( '/news/' ) ),
		array( 'title' => '無料査定', 'url' => $quote_id ? get_permalink( $quote_id ) : home_url( '/contact/' ) ),
		array( 'title' => 'FAQ', 'url' => home_url( '/#faq' ) ),
	);

	foreach ( $links as $link ) {
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => $link['title'],
			'menu-item-url'    => $link['url'],
			'menu-item-status' => 'publish',
		) );
	}

	$locations           = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Create Contact Form 7 form when plugin is available.
 */
function bmt_kaitori_maybe_create_cf7_form() {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		return;
	}

	$form_id  = 0;
	$existing = get_posts( array(
		'post_type'      => 'wpcf7_contact_form',
		'posts_per_page' => 20,
		'post_status'    => 'publish',
	) );

	foreach ( $existing as $form_post ) {
		if ( '無料査定フォーム' === $form_post->post_title ) {
			$form_id = $form_post->ID;
			break;
		}
	}

	if ( empty( $form_id ) ) {
		$form_id = bmt_kaitori_insert_cf7_form();
	}

	if ( $form_id ) {
		$quote_page = get_page_by_path( 'contact' );
		if ( $quote_page ) {
			bmt_kaitori_attach_cf7_to_quote_page( (int) $quote_page->ID, $form_id );
		}
	}
}

/**
 * Insert CF7 form using the official API when possible.
 *
 * @return int Form post ID.
 */
function bmt_kaitori_insert_cf7_form() {
	$template_path = get_template_directory() . '/config/contact-form-7-quote.txt';

	if ( ! file_exists( $template_path ) ) {
		return 0;
	}

	$sections = bmt_kaitori_parse_cf7_template( file_get_contents( $template_path ) );

	if ( class_exists( 'WPCF7_ContactForm' ) ) {
		$contact_form = WPCF7_ContactForm::get_template(
			array( 'title' => '無料査定フォーム' )
		);

		$properties = $contact_form->get_properties();

		if ( ! empty( $sections['form'] ) ) {
			$properties['form'] = $sections['form'];
		}

		$properties['mail'] = array_merge( $properties['mail'], bmt_kaitori_default_cf7_mail() );

		if ( ! empty( $sections['messages'] ) ) {
			$properties['messages'] = array_merge( $properties['messages'], $sections['messages'] );
		}

		$contact_form->set_properties( $properties );
		$contact_form->save();

		return (int) $contact_form->id();
	}

	return 0;
}

/**
 * Default CF7 mail settings for quote form.
 *
 * @return array<string, string>
 */
function bmt_kaitori_default_cf7_mail() {
	return array(
		'subject'            => '【無料査定】新規お問い合わせ - [your-name] 様',
		'sender'             => '[_site_title] <wordpress@[_site_url]>',
		'recipient'          => 'mmatrading.jp@gmail.com',
		'body'               => "無料査定フォームから送信がありました。\n\n"
			. "お名前: [your-name]\n"
			. "メール: [your-email]\n"
			. "電話番号: [your-phone]\n"
			. "ご住所: [your-address]\n"
			. "メーカー: [car-maker]\n"
			. "車種・グレード: [car-model]\n"
			. "走行距離: [mileage]\n"
			. "年式: [car-year]\n"
			. "ハンドル: [steering]\n"
			. "車検（期限）: [inspection]\n"
			. "備考:\n[your-message]\n\n"
			. '--' . "\n"
			. '送信日時: [_date] [_time]' . "\n"
			. '送信元URL: [_url]',
		'additional_headers' => '',
		'attachments'        => '[car-image]',
		'use_html'           => 0,
		'exclude_blank'      => 0,
	);
}

/**
 * Parse CF7 export-style template file.
 *
 * @param string $raw Raw file contents.
 * @return array<string, mixed>
 */
function bmt_kaitori_parse_cf7_template( $raw ) {
	$parts = preg_split( '/^---\s*(form|mail|mail_2|messages)\s*---\s*$/m', $raw, -1, PREG_SPLIT_DELIM_CAPTURE );
	$result = array(
		'form'     => '',
		'mail'     => array(),
		'mail_2'   => array(),
		'messages' => array(),
	);

	for ( $i = 1; $i < count( $parts ); $i += 2 ) {
		$key   = trim( $parts[ $i ] );
		$value = trim( $parts[ $i + 1 ] ?? '' );

		if ( 'form' === $key ) {
			$result['form'] = $value;
			continue;
		}

		if ( 'messages' === $key ) {
			parse_str( str_replace( array( "\r\n", "\n" ), '&', $value ), $messages );
			$result['messages'] = $messages;
			continue;
		}

		$parsed = array();
		foreach ( preg_split( '/\r\n|\r|\n/', $value ) as $line ) {
			if ( false !== strpos( $line, ':' ) ) {
				list( $field, $line_value ) = explode( ':', $line, 2 );
				$parsed[ trim( $field ) ] = trim( $line_value );
			}
		}

		$result[ $key ] = $parsed;
	}

	return $result;
}

/**
 * Attach CF7 shortcode to quote page.
 *
 * @param int      $page_id Page ID.
 * @param int|null $form_id Optional form ID.
 */
function bmt_kaitori_attach_cf7_to_quote_page( $page_id, $form_id = null ) {
	if ( ! $form_id ) {
		$forms = get_posts( array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => 1,
			'title'          => '無料査定フォーム',
		) );
		$form_id = ! empty( $forms ) ? $forms[0]->ID : 0;
	}

	if ( ! $form_id ) {
		return;
	}

	wp_update_post( array(
		'ID'           => $page_id,
		'post_content' => '[contact-form-7 id="' . (int) $form_id . '" title="無料査定フォーム"]',
	) );
}

/**
 * Admin notice to install recommended plugins.
 */
function bmt_kaitori_admin_setup_notice() {
	if ( ! current_user_can( 'install_plugins' ) ) {
		return;
	}

	if ( class_exists( 'WPCF7' ) ) {
		return;
	}

	echo '<div class="notice notice-info"><p>';
	echo esc_html__( 'BMT Kaitori: Contact Form 7 をインストールして有効化すると、無料査定フォームが自動作成されます。', 'bmt-kaitori' );
	echo ' <a href="' . esc_url( admin_url( 'plugin-install.php?s=contact+form+7&tab=search&type=term' ) ) . '">Contact Form 7</a>';
	echo '</p></div>';
}
add_action( 'admin_notices', 'bmt_kaitori_admin_setup_notice' );

/**
 * Re-run CF7 setup when CF7 is activated.
 */
function bmt_kaitori_cf7_activated() {
	bmt_kaitori_maybe_create_cf7_form();
}
add_action( 'activated_plugin', function ( $plugin ) {
	if ( 'contact-form-7/wp-contact-form-7.php' === $plugin ) {
		bmt_kaitori_cf7_activated();
	}
} );
