<?php
/**
 * Template Name: 必要書類ガイド
 *
 * @package MMA_Kaitori
 */

get_header();
$docs = mma_document_lists();
?>
<section class="page-hero">
	<div class="container">
		<h1>必要書類ガイド</h1>
		<p>普通車・軽自動車で必要な基本書類です。状況により追加がある場合があります。</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="docs-grid">
			<article class="docs-card">
				<h2>普通車</h2>
				<ul>
					<?php foreach ( $docs['normal'] as $doc ) : ?>
						<li><?php echo esc_html( $doc ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
			<article class="docs-card">
				<h2>軽自動車</h2>
				<ul>
					<?php foreach ( $docs['kei'] as $doc ) : ?>
						<li><?php echo esc_html( $doc ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>

		<div class="narrow page-content" style="margin-top:2rem">
			<h2>よく使う書類のポイント</h2>
			<ul>
				<li><strong>車検証</strong> … 車両情報の確認に必須です。</li>
				<li><strong>自賠責保険証明書</strong> … 残存期間がある場合、返戻の対象になることがあります。</li>
				<li><strong>印鑑証明書 / 実印</strong> … 普通車の譲渡・抹消手続きで必要になることが多いです。</li>
			</ul>
			<p>詳しいご案内は査定申込後にお伝えします。</p>
			<ul>
				<li><a href="<?php echo esc_url( mma_page_url( 'doc-transfer' ) ); ?>">譲渡証明書について</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'doc-proxy' ) ); ?>">委任状について</a></li>
			</ul>
		</div>
	</div>
</section>

<?php
get_footer();
