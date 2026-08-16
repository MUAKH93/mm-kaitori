<?php
/**
 * In-app editor tutorial (wp-admin) — English first.
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
		'How to edit (EN)',
		'How to edit (EN)',
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
	.mma-guide-hero h1{color:#fff;margin:0 0 8px;font-size:1.55rem}
	.mma-guide-hero p{margin:0;opacity:.92;line-height:1.5}
	.mma-guide-toc{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:8px;margin:0 0 22px}
	.mma-guide-toc a{display:block;background:#fff;border:1px solid #c3c4c7;border-radius:8px;padding:10px 12px;text-decoration:none;color:#1d2327;font-weight:600}
	.mma-guide-toc a:hover{border-color:#0077c8;color:#0077c8}
	.mma-guide-card{background:#fff;border:1px solid #c3c4c7;border-radius:12px;padding:18px 20px;margin:0 0 16px}
	.mma-guide-card h2{margin-top:0;padding-bottom:8px;border-bottom:2px solid #0077c8}
	.mma-guide-card table{width:100%;border-collapse:collapse;margin:10px 0}
	.mma-guide-card th,.mma-guide-card td{border:1px solid #dcdcde;padding:8px 10px;text-align:left;vertical-align:top}
	.mma-guide-card th{background:#f0f6fc;width:38%}
	.mma-guide-card ol,.mma-guide-card ul{margin:8px 0 8px 1.2rem}
	.mma-guide-card code{background:#f0f0f1;padding:1px 5px;border-radius:4px}
	.mma-guide-badge{display:inline-block;background:#00a32a;color:#fff;font-size:11px;font-weight:700;padding:2px 8px;border-radius:999px;margin-left:6px;vertical-align:middle}
	.mma-guide-note{background:#fff8e5;border-left:4px solid #dba617;padding:10px 12px;margin:12px 0}
	.mma-guide-steps{background:#f0f6fc;border:1px solid #c5d9ed;border-radius:10px;padding:14px 16px;margin:12px 0}
	.mma-guide-steps strong{color:#0c2340}
	.jp{color:#646970;font-size:12px}
	';
	wp_register_style( 'mma-guide-admin', false, array(), MMA_KAITORI_VERSION );
	wp_enqueue_style( 'mma-guide-admin' );
	wp_add_inline_style( 'mma-guide-admin', $css );
}
add_action( 'admin_enqueue_scripts', 'mma_guide_admin_assets' );

/**
 * Dashboard widget.
 */
function mma_guide_dashboard_widget() {
	wp_add_dashboard_widget(
		'mma_editor_guide_widget',
		'MMA Kaitori — How to edit (English)',
		'mma_guide_dashboard_widget_render'
	);
}
add_action( 'wp_dashboard_setup', 'mma_guide_dashboard_widget' );

/**
 * Dashboard widget content.
 */
function mma_guide_dashboard_widget_render() {
	$url = admin_url( 'admin.php?page=mma-editor-guide' );
	echo '<p><strong>Important:</strong> Do not edit the Home page content box — it stays empty on purpose. Use this guide instead.</p>';
	echo '<p><a class="button button-primary" href="' . esc_url( $url ) . '">Open English guide</a> ';
	echo '<a class="button" href="' . esc_url( admin_url( 'customize.php?autofocus[section]=mma_homepage_banners' ) ) . '">Change homepage pictures</a></p>';
}

/**
 * Render guide page.
 */
function mma_guide_admin_page() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	$banners    = admin_url( 'customize.php?autofocus[section]=mma_homepage_banners' );
	$customizer = admin_url( 'customize.php?autofocus[section]=mma_contact' );
	$contents   = admin_url( 'admin.php?page=mma-contents' );
	$identity   = admin_url( 'customize.php?autofocus[section]=title_tagline' );
	$permalinks = admin_url( 'options-permalink.php' );
	?>
	<div class="wrap mma-guide-wrap">
		<div class="mma-guide-hero">
			<h1>How to edit this website (English) <span class="mma-guide-badge">v<?php echo esc_html( MMA_KAITORI_VERSION ); ?></span></h1>
			<p>
				Left menu name in Japanese: <strong>MMA Contents → How to edit (EN)</strong><br />
				The homepage is <strong>not</strong> edited in Pages → Home (that page is empty on purpose).
			</p>
		</div>

		<nav class="mma-guide-toc" aria-label="Guide sections">
			<a href="#g-pics">Change homepage pictures</a>
			<a href="#g-map">Where to edit what</a>
			<a href="#g-text">Change homepage text</a>
			<a href="#g-contact">Phone / LINE / address</a>
			<a href="#g-cpt">Results / voices / news</a>
			<a href="#g-tips">Troubleshooting</a>
		</nav>

		<div class="mma-guide-card" id="g-pics">
			<h2>Change the 2 big homepage pictures (from wp-admin)</h2>
			<p>You can upload new images without coding.</p>
			<div class="mma-guide-steps">
				<ol>
					<li>In the left menu click <strong>Appearance</strong> <span class="jp">（外観）</span></li>
					<li>Click <strong>Customize</strong> <span class="jp">（カスタマイズ）</span></li>
					<li>Click <strong>Homepage banners / トップ画像</strong></li>
					<li>
						<strong>TOP image 1</strong> = first big banner<br />
						<strong>TOP image 2</strong> = second banner (under the first)
					</li>
					<li>Click <strong>Select image</strong> → upload or choose from Media Library</li>
					<li>Click blue <strong>Publish</strong> button at the top</li>
					<li>Open the homepage and press <strong>Ctrl + F5</strong> to refresh</li>
				</ol>
			</div>
			<p>
				<a class="button button-primary button-hero" href="<?php echo esc_url( $banners ); ?>">Open picture uploader now</a>
			</p>
			<div class="mma-guide-note">
				Tip: use wide images (about 1920px wide). Keep the same style for both so they look like one banner stack.
			</div>
		</div>

		<div class="mma-guide-card" id="g-map">
			<h2>Where to edit what (English ↔ Japanese menu)</h2>
			<table>
				<tr><th>What you want</th><th>Click this in wp-admin</th></tr>
				<tr>
					<td>Homepage pictures</td>
					<td><a href="<?php echo esc_url( $banners ); ?>">Appearance → Customize → Homepage banners</a><br /><span class="jp">外観 → カスタマイズ → トップ画像</span></td>
				</tr>
				<tr>
					<td>Logo</td>
					<td><a href="<?php echo esc_url( $identity ); ?>">Appearance → Customize → Site Identity</a><br /><span class="jp">外観 → カスタマイズ → サイト基本情報</span></td>
				</tr>
				<tr>
					<td>Phone, LINE, email, address, brand name</td>
					<td><a href="<?php echo esc_url( $customizer ); ?>">Appearance → Customize → MMA Contact</a><br /><span class="jp">外観 → カスタマイズ → MMA Contact / 連絡先</span></td>
				</tr>
				<tr>
					<td>Homepage text (FAQ, strengths, flow…)</td>
					<td><a href="<?php echo esc_url( $contents ); ?>">Left menu → MMA Contents</a></td>
				</tr>
				<tr>
					<td>Buy results cards</td>
					<td>Left menu → <strong>買取実績</strong> (Buy results)</td>
				</tr>
				<tr>
					<td>Customer reviews</td>
					<td>Left menu → <strong>お客様の声</strong> (Customer voices)</td>
				</tr>
				<tr>
					<td>News</td>
					<td>Left menu → <strong>Posts</strong> / <strong>投稿</strong></td>
				</tr>
				<tr>
					<td>Columns / tips articles</td>
					<td>Left menu → <strong>コラム</strong></td>
				</tr>
				<tr>
					<td>Prefecture SEO pages</td>
					<td>Left menu → <strong>対応エリア</strong> (Areas)</td>
				</tr>
				<tr>
					<td>Home page in Pages list</td>
					<td><strong>Do not use</strong> — it is empty by design. Use MMA Contents + banners instead.</td>
				</tr>
			</table>
		</div>

		<div class="mma-guide-card" id="g-text">
			<h2>Change homepage text</h2>
			<ol>
				<li>Left menu → <strong>MMA Contents</strong></li>
				<li>Use the top tabs (ヒーロー = Hero text, FAQ, 強み = Strengths, etc.)</li>
				<li>Edit fields → click <strong>Save / 保存</strong></li>
				<li>Refresh the website with Ctrl+F5</li>
			</ol>
			<p><a class="button button-primary" href="<?php echo esc_url( $contents ); ?>">Open MMA Contents</a></p>
		</div>

		<div class="mma-guide-card" id="g-contact">
			<h2>Change phone / LINE / address</h2>
			<ol>
				<li>Appearance → Customize → <strong>MMA Contact / 連絡先</strong></li>
				<li>Edit fields</li>
				<li>Click <strong>Publish</strong></li>
			</ol>
			<p><a class="button button-primary" href="<?php echo esc_url( $customizer ); ?>">Open contact settings</a></p>
		</div>

		<div class="mma-guide-card" id="g-cpt">
			<h2>Add buy results / customer voices / news</h2>
			<ul>
				<li><strong>買取実績</strong> = add sold-car result cards</li>
				<li><strong>お客様の声</strong> = customer reviews</li>
				<li><strong>Posts / 投稿</strong> = news</li>
				<li><strong>コラム</strong> = tip articles</li>
				<li><strong>対応エリア</strong> = prefecture pages like Fukuoka</li>
			</ul>
			<p>Click <strong>Add New / 新規追加</strong>, fill fields, then <strong>Publish / 公開</strong>.</p>
		</div>

		<div class="mma-guide-card" id="g-tips">
			<h2>Troubleshooting</h2>
			<table>
				<tr><th>Problem</th><th>Fix</th></tr>
				<tr><td>Home page editor is empty</td><td>Normal. Use banners + MMA Contents instead.</td></tr>
				<tr><td>New picture not showing</td><td>Did you click Publish? Then Ctrl+F5 on the site.</td></tr>
				<tr><td>/area/ page 404</td><td><a href="<?php echo esc_url( $permalinks ); ?>">Settings → Permalinks → Save</a></td></tr>
				<tr><td>Japanese menus confuse me</td><td>Use the blue buttons on this page — they open the right screens directly.</td></tr>
			</table>
			<p style="margin-top:14px">
				<a class="button button-primary" href="<?php echo esc_url( $banners ); ?>">Change pictures</a>
				<a class="button" href="<?php echo esc_url( $contents ); ?>">Edit homepage text</a>
				<a class="button" href="<?php echo esc_url( $customizer ); ?>">Edit phone / LINE</a>
			</p>
		</div>
	</div>
	<?php
}
