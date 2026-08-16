<?php
/**
 * Template Name: サイトマップ
 *
 * @package MMA_Kaitori
 */

get_header();

$regions = mma_area_regions();
$grouped = mma_areas_by_region();
?>
<section class="page-hero">
	<div class="container">
		<h1>サイトマップ</h1>
		<p>MMA買い取りサイトの主要ページ一覧です。</p>
	</div>
</section>

<section class="section">
	<div class="container sitemap-grid">
		<div>
			<h2>メイン</h2>
			<ul class="teaser-list">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'flow', 'flow' ) ); ?>">買取の流れ</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'strengths', 'strengths' ) ); ?>">私たちの強み</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'hajimete' ) ); ?>">はじめての方へ</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'documents', 'documents' ) ); ?>">必要書類ガイド</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'faq', 'faq' ) ); ?>">よくあるご質問</a></li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'buy_result' ) ); ?>">買取実績</a></li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'column' ) ); ?>">コラム</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'company' ) ); ?>">運営会社</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'quote' ) ); ?>">無料査定</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'privacy' ) ); ?>">プライバシーポリシー</a></li>
			</ul>
		</div>
		<div>
			<h2>対応エリア</h2>
			<p><a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'area' ) ); ?>">対応地域一覧</a></p>
			<?php foreach ( $regions as $key => $label ) : ?>
				<?php if ( empty( $grouped[ $key ] ) ) : ?>
					<?php continue; ?>
				<?php endif; ?>
				<h3><?php echo esc_html( $label ); ?></h3>
				<ul class="area-pref-list">
					<?php foreach ( $grouped[ $key ] as $area ) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $area ) ); ?>"><?php echo esc_html( mma_area_pref_name( $area->ID ) ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
