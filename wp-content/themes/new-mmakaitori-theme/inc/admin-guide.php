<?php
/**
 * In-app editor tutorial (wp-admin).
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register tutorial submenu under MMA Contents.
 */
function mma_guide_admin_menu() {
	add_submenu_page(
		'mma-contents',
		'使い方ガイド',
		'使い方ガイド',
		'edit_theme_options',
		'mma-editor-guide',
		'mma_guide_admin_page'
	);
}
add_action( 'admin_menu', 'mma_guide_admin_menu', 20 );

/**
 * Admin styles for guide page.
 *
 * @param string $hook Hook.
 */
function mma_guide_admin_assets( $hook ) {
	if ( false === strpos( $hook, 'mma-editor-guide' ) ) {
		return;
	}
	$css = '
	.mma-guide-wrap{max-width:920px}
	.mma-guide-hero{background:linear-gradient(135deg,#0c2340,#0077c8);color:#fff;padding:22px 24px;border-radius:12px;margin:16px 0 20px}
	.mma-guide-hero h1{color:#fff;margin:0 0 8px;font-size:1.6rem}
	.mma-guide-hero p{margin:0;opacity:.92}
	.mma-guide-toc{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:8px;margin:0 0 22px}
	.mma-guide-toc a{display:block;background:#fff;border:1px solid #c3c4c7;border-radius:8px;padding:10px 12px;text-decoration:none;color:#1d2327;font-weight:600}
	.mma-guide-toc a:hover{border-color:#0077c8;color:#0077c8}
	.mma-guide-card{background:#fff;border:1px solid #c3c4c7;border-radius:12px;padding:18px 20px;margin:0 0 16px}
	.mma-guide-card h2{margin-top:0;padding-bottom:8px;border-bottom:2px solid #0077c8}
	.mma-guide-card table{width:100%;border-collapse:collapse;margin:10px 0}
	.mma-guide-card th,.mma-guide-card td{border:1px solid #dcdcde;padding:8px 10px;text-align:left;vertical-align:top}
	.mma-guide-card th{background:#f0f6fc;width:42%}
	.mma-guide-card ol,.mma-guide-card ul{margin:8px 0 8px 1.2rem}
	.mma-guide-card code{background:#f0f0f1;padding:1px 5px;border-radius:4px}
	.mma-guide-badge{display:inline-block;background:#00a32a;color:#fff;font-size:11px;font-weight:700;padding:2px 8px;border-radius:999px;margin-left:6px;vertical-align:middle}
	.mma-guide-note{background:#fff8e5;border-left:4px solid #dba617;padding:10px 12px;margin:12px 0}
	';
	wp_register_style( 'mma-guide-admin', false, array(), MMA_KAITORI_VERSION );
	wp_enqueue_style( 'mma-guide-admin' );
	wp_add_inline_style( 'mma-guide-admin', $css );
}
add_action( 'admin_enqueue_scripts', 'mma_guide_admin_assets' );

/**
 * Dashboard widget shortcut.
 */
function mma_guide_dashboard_widget() {
	wp_add_dashboard_widget(
		'mma_editor_guide_widget',
		'MMA買い取り — 使い方ガイド',
		'mma_guide_dashboard_widget_render'
	);
}
add_action( 'wp_dashboard_setup', 'mma_guide_dashboard_widget' );

/**
 * Dashboard widget content.
 */
function mma_guide_dashboard_widget_render() {
	$url = admin_url( 'admin.php?page=mma-editor-guide' );
	echo '<p>ホームページ文言・買取実績・エリアページなどを、コードなしで編集する手順です。</p>';
	echo '<p><a class="button button-primary" href="' . esc_url( $url ) . '">使い方ガイドを開く</a> ';
	echo '<a class="button" href="' . esc_url( admin_url( 'admin.php?page=mma-contents' ) ) . '">MMA Contents</a></p>';
}

/**
 * Render in-app guide page.
 */
function mma_guide_admin_page() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	$customizer = admin_url( 'customize.php?autofocus[section]=mma_contact' );
	$contents   = admin_url( 'admin.php?page=mma-contents' );
	$menus      = admin_url( 'nav-menus.php' );
	$permalinks = admin_url( 'options-permalink.php' );
	$identity   = admin_url( 'customize.php?autofocus[section]=title_tagline' );
	?>
	<div class="wrap mma-guide-wrap">
		<div class="mma-guide-hero">
			<h1>MMA買い取り 使い方ガイド <span class="mma-guide-badge">v<?php echo esc_html( MMA_KAITORI_VERSION ); ?></span></h1>
			<p>コーディング不要でサイトを編集するための手順書です。左メニュー <strong>MMA Contents → 使い方ガイド</strong> からもいつでも開けます。</p>
		</div>

		<nav class="mma-guide-toc" aria-label="ガイド目次">
			<a href="#g-map">1. どこを編集？</a>
			<a href="#g-setup">2. 初回セットアップ</a>
			<a href="#g-contact">3. 連絡先・ロゴ</a>
			<a href="#g-contents">4. MMA Contents</a>
			<a href="#g-cpt">5. 実績・声・投稿</a>
			<a href="#g-area">6. 対応エリア</a>
			<a href="#g-pages">7. 固定ページ</a>
			<a href="#g-form">8. 査定フォーム</a>
			<a href="#g-tips">9. トラブル対処</a>
		</nav>

		<div class="mma-guide-card" id="g-map">
			<h2>1. どこを編集？（早見表）</h2>
			<table>
				<tr><th>変えたいもの</th><th>管理画面の場所</th></tr>
				<tr><td>ロゴ</td><td><a href="<?php echo esc_url( $identity ); ?>">外観 → カスタマイズ → サイト基本情報</a></td></tr>
				<tr><td>屋号（MMA買い取り）・電話・LINE・住所・メール</td><td><a href="<?php echo esc_url( $customizer ); ?>">外観 → カスタマイズ → MMA Contact</a></td></tr>
				<tr><td>ホームページの文章（FAQ・強み・流れなど）</td><td><a href="<?php echo esc_url( $contents ); ?>">MMA Contents</a></td></tr>
				<tr><td>買取実績カード</td><td>左メニュー <strong>買取実績</strong></td></tr>
				<tr><td>お客様の声</td><td>左メニュー <strong>お客様の声</strong></td></tr>
				<tr><td>お知らせ</td><td><strong>投稿</strong></td></tr>
				<tr><td>コラム</td><td>左メニュー <strong>コラム</strong></td></tr>
				<tr><td>都道府県SEOページ</td><td>左メニュー <strong>対応エリア</strong></td></tr>
				<tr><td>メニュー（ナビ）</td><td><a href="<?php echo esc_url( $menus ); ?>">外観 → メニュー</a></td></tr>
				<tr><td>会社概要・プライバシーなど</td><td><strong>固定ページ</strong></td></tr>
			</table>
		</div>

		<div class="mma-guide-card" id="g-setup">
			<h2>2. 初回セットアップ（テーマ反映後）</h2>
			<ol>
				<li><strong>外観 → テーマ</strong> で「New MMA Kaitori Theme」を有効化</li>
				<li><a href="<?php echo esc_url( $permalinks ); ?>"><strong>設定 → パーマリンク</strong></a> を開いて <strong>変更を保存</strong>（必須：<code>/area/</code> などが404になるのを防ぐ）</li>
				<li><a href="<?php echo esc_url( $customizer ); ?>">MMA Contact</a> で電話・メール・LINE・住所を確認</li>
				<li>ロゴをアップロード</li>
				<li>本番では Hostinger キャッシュを削除</li>
				<li>古いファイル <code>wp-content/mu-plugins/bmt-live-fixes.php</code> があれば削除</li>
			</ol>
		</div>

		<div class="mma-guide-card" id="g-contact">
			<h2>3. 連絡先・ブランディング（カスタマイザー）</h2>
			<p><a class="button button-primary" href="<?php echo esc_url( $customizer ); ?>">MMA Contact を開く</a></p>
			<table>
				<tr><th>項目</th><th>サイト上の表示</th></tr>
				<tr><td>Brand name / 屋号</td><td>ヘッダーのサイト名、フッター</td></tr>
				<tr><td>Mobile / 携帯電話</td><td>ヘッダー電話・スマホ固定バー・下部CTA</td></tr>
				<tr><td>TEL/FAX</td><td>フッター</td></tr>
				<tr><td>Email</td><td>無料査定フォームの送信先</td></tr>
				<tr><td>LINE URL</td><td>ヘッダー / フッター / 固定バーのLINEボタン</td></tr>
				<tr><td>Hours / Closed / Address / License</td><td>フッター・会社情報まわり</td></tr>
			</table>
			<div class="mma-guide-note">編集後はカスタマイザー右上の <strong>公開</strong> を押してください。</div>
		</div>

		<div class="mma-guide-card" id="g-contents">
			<h2>4. ホームページ文言 — MMA Contents</h2>
			<p><a class="button button-primary" href="<?php echo esc_url( $contents ); ?>">MMA Contents を開く</a></p>
			<p>タブごとにヒーロー周辺テキスト、信頼帯、還付金、強み、流れ、書類、FAQ、CTAなどを編集できます。</p>
			<ul>
				<li>見出しで改行したい → フィールド内で Enter</li>
				<li>書類リストなど → <strong>1行に1項目</strong></li>
				<li>空欄にするとテーマの日本語デフォルトに戻ります</li>
				<li>保存後、サイトを Ctrl+F5 で再読み込み</li>
			</ul>
			<div class="mma-guide-note">トップの大きな2枚のバナー画像はテーマ内画像です。差し替えは画像ファイル更新（または開発者へ依頼）が必要です。</div>
		</div>

		<div class="mma-guide-card" id="g-cpt">
			<h2>5. 買取実績・お客様の声・投稿・コラム</h2>
			<h3>買取実績</h3>
			<ol>
				<li>左メニュー <strong>買取実績 → 新規追加</strong></li>
				<li>タイトル例：<code>トヨタ プリウス</code></li>
				<li>メタ欄：メーカー / 車種 / 年式 / 走行距離 / 買取価格（円は数字のみ <code>230000</code>）</li>
				<li>公開 → トップと <code>/jisseki/</code> に表示</li>
			</ol>
			<h3>お客様の声</h3>
			<ol>
				<li><strong>お客様の声 → 新規追加</strong></li>
				<li>本文に感想、サイドバーで都道府県・満足度(1〜5)</li>
			</ol>
			<h3>お知らせ / コラム</h3>
			<ul>
				<li>お知らせ → <strong>投稿</strong></li>
				<li>コラム → <strong>コラム</strong>（アーカイブ <code>/column/</code>）</li>
			</ul>
		</div>

		<div class="mma-guide-card" id="g-area">
			<h2>6. 対応エリア（都道府県SEO）</h2>
			<ol>
				<li>左メニュー <strong>対応エリア</strong></li>
				<li>例：福岡 → URL <code>/area/fukuoka/</code></li>
				<li>タイトル・本文・抜粋を編集</li>
				<li>サイドバー「エリア設定」で都道府県名・地方区分</li>
			</ol>
			<p>トップでは九州を優先表示し、一覧は <code>/area/</code> です。</p>
		</div>

		<div class="mma-guide-card" id="g-pages">
			<h2>7. 固定ページとメニュー</h2>
			<p>主なページ：買取の流れ / FAQ / 運営会社 / 無料査定 / プライバシー / 必要書類 / 強み / はじめての方へ / サイトマップ など。</p>
			<p>テンプレート変更：固定ページ編集 → ページ属性のテンプレート → 更新。</p>
			<p><a class="button" href="<?php echo esc_url( $menus ); ?>">メニューを編集</a></p>
		</div>

		<div class="mma-guide-card" id="g-form">
			<h2>8. 無料査定フォーム</h2>
			<ul>
				<li>トップ（バナー下）と <code>/quote/</code> に表示</li>
				<li><strong>2ステップ</strong>：車両情報 → お客様情報</li>
				<li>送信先メール = MMA Contact の Email</li>
				<li>件名例：<code>[MMA買い取り] 無料査定依頼 — トヨタ / 山田</code></li>
				<li>スパム対策あり（通常の入力では影響なし）</li>
			</ul>
			<div class="mma-guide-note">公開後は必ず自分で1件テスト送信し、受信を確認してください。</div>
		</div>

		<div class="mma-guide-card" id="g-tips">
			<h2>9. トラブル対処</h2>
			<table>
				<tr><th>症状</th><th>対処</th></tr>
				<tr><td><code>/area/</code> が404</td><td>設定 → パーマリンク → 保存</td></tr>
				<tr><td>デザインが古い</td><td>Hostingerキャッシュ削除 + Ctrl+F5</td></tr>
				<tr><td>LINEが開かない</td><td>MMA Contact の LINE URL を確認</td></tr>
				<tr><td>フォーム送信なのにメールなし</td><td>迷惑メール、Email設定、サーバー送信制限を確認</td></tr>
				<tr><td>住所・電話が違う</td><td>MMA Contact（会社ページの本文も確認）</td></tr>
			</table>
			<p style="margin-top:16px">
				<a class="button button-primary" href="<?php echo esc_url( $contents ); ?>">MMA Contents へ</a>
				<a class="button" href="<?php echo esc_url( $customizer ); ?>">連絡先を編集</a>
			</p>
		</div>
	</div>
	<?php
}
