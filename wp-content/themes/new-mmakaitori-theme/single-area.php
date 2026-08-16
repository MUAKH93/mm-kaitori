<?php
/**
 * Single area (prefecture) SEO page.
 *
 * @package MMA_Kaitori
 */

get_header();

$pref     = mma_area_pref_name();
$siblings = mma_area_siblings( get_the_ID() );
$c        = mma_contact();
?>
<section class="page-hero page-hero--area">
	<div class="container">
		<p class="hero-badge"><?php echo esc_html( $pref ); ?>対応</p>
		<h1><?php echo esc_html( get_the_title() ); ?></h1>
		<p><?php echo esc_html( get_the_excerpt() ?: ( $pref . 'の廃車・不動車を全国対応で買取。お客様負担0円で無料査定。' ) ); ?></p>
	</div>
</section>

<section class="section section-area-single">
	<div class="container area-single-grid">
		<div class="area-single-copy page-content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>

			<div class="area-highlights">
				<h2><?php echo esc_html( $pref ); ?>での買取ポイント</h2>
				<ul>
					<li>指定場所まで積載車でお引き取り</li>
					<li>レッカー代・廃車手続き費用は原則0円</li>
					<li>事故車・不動車・年式の古い車も査定対象</li>
					<li><?php echo esc_html( $c['hours'] ); ?> · <?php echo esc_html( $c['closed'] ); ?></li>
				</ul>
			</div>

			<?php if ( $siblings ) : ?>
				<div class="area-nearby">
					<h2>近隣エリア</h2>
					<ul class="area-pref-list">
						<?php foreach ( $siblings as $sib ) : ?>
							<li><a href="<?php echo esc_url( get_permalink( $sib ) ); ?>"><?php echo esc_html( mma_area_pref_name( $sib->ID ) ); ?></a></li>
						<?php endforeach; ?>
					</ul>
					<p class="section-more">
						<a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'area' ) ); ?>">対応地域一覧を見る</a>
					</p>
				</div>
			<?php endif; ?>
		</div>

		<aside class="area-single-form" id="quote">
			<?php mma_render_quote_form( 'area' ); ?>
		</aside>
	</div>
</section>

<?php
get_footer();
