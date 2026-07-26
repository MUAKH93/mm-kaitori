<?php
/**
 * Quick setup checklist for wp-admin (Japanese).
 *
 * @package BMT_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add setup page under Appearance.
 */
function bmt_kaitori_setup_menu() {
	add_theme_page(
		'サイトセットアップ',
		'サイトセットアップ',
		'manage_options',
		'bmt-kaitori-setup',
		'bmt_kaitori_render_setup_page'
	);
}
add_action( 'admin_menu', 'bmt_kaitori_setup_menu' );

/**
 * Render admin setup checklist.
 */
function bmt_kaitori_render_setup_page() {
	$checks = array(
		array(
			'label' => 'BMT Kaitori テーマが有効',
			'done'  => wp_get_theme()->get_stylesheet() === 'bmt-kaitori',
		),
		array(
			'label' => 'Contact Form 7 が有効',
			'done'  => class_exists( 'WPCF7' ),
		),
		array(
			'label' => '無料査定ページ（/contact/）',
			'done'  => (bool) get_page_by_path( 'contact' ),
		),
		array(
			'label' => 'お知らせページ（/news/）',
			'done'  => (bool) get_page_by_path( 'news' ),
		),
		array(
			'label' => 'フロントページ設定',
			'done'  => 'page' === get_option( 'show_on_front' ),
		),
	);

	?>
	<div class="wrap">
		<h1>BMT Kaitori — サイトセットアップ</h1>
		<p>以下のチェックリストを完了してください。</p>
		<table class="widefat striped">
			<thead>
				<tr><th>項目</th><th>状態</th></tr>
			</thead>
			<tbody>
				<?php foreach ( $checks as $check ) : ?>
					<tr>
						<td><?php echo esc_html( $check['label'] ); ?></td>
						<td><?php echo $check['done'] ? '✅ 完了' : '⬜ 未完了'; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<h2>次のステップ</h2>
		<ol>
			<li><a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=contact+form+7&tab=search&type=term' ) ); ?>">Contact Form 7 をインストール</a></li>
			<li><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bmt_contact' ) ); ?>">連絡先情報を設定</a>（電話・LINE）</li>
			<li><a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>">パーマリンクを「投稿名」に設定</a></li>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noreferrer">サイトを確認</a></li>
		</ol>

		<p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php' ) ); ?>">テーマ設定へ</a>
			<a class="button" href="<?php echo esc_url( admin_url( 'edit.php?post_type=page' ) ); ?>">固定ページ一覧</a>
		</p>
	</div>
	<?php
}
