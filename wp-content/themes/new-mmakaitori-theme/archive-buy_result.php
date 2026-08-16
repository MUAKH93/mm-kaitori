<?php
/**
 * Buy results archive.
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="page-hero">
	<div class="container">
		<h1>買取実績</h1>
		<p>これまでの廃車・車両買取事例です。</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="results-grid">
				<?php while ( have_posts() ) : ?>
					<?php
					the_post();
					$maker   = get_post_meta( get_the_ID(), '_mma_maker', true );
					$model   = get_post_meta( get_the_ID(), '_mma_model', true );
					$year    = get_post_meta( get_the_ID(), '_mma_year', true );
					$mileage = get_post_meta( get_the_ID(), '_mma_mileage', true );
					$price   = get_post_meta( get_the_ID(), '_mma_price', true );
					?>
					<article class="result-card">
						<h2 class="result-card__title"><?php echo esc_html( trim( $maker . ' ' . $model ) ?: get_the_title() ); ?></h2>
						<ul>
							<li><span>年式</span><?php echo esc_html( $year ?: '—' ); ?></li>
							<li><span>距離</span><?php echo esc_html( $mileage ?: '—' ); ?></li>
						</ul>
						<p class="result-card__price">
							買取価格
							<strong><?php echo esc_html( $price !== '' ? number_format_i18n( (int) $price ) : '—' ); ?><small>円</small></strong>
						</p>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>実績がまだ登録されていません。</p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
