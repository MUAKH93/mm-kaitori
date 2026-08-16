<?php
/**
 * Buy results section.
 *
 * @package MMA_Kaitori
 */

$query = new WP_Query(
	array(
		'post_type'      => 'buy_result',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
	)
);

$fallback = array(
	array( 'maker' => 'トヨタ', 'model' => 'プリウス', 'year' => '2008（H20）', 'mileage' => '220,000km', 'price' => '230000' ),
	array( 'maker' => 'ホンダ', 'model' => 'フィット', 'year' => '2013（H25）', 'mileage' => '110,000km', 'price' => '90000' ),
	array( 'maker' => 'スズキ', 'model' => 'ワゴンR', 'year' => '2011（H23）', 'mileage' => '95,000km', 'price' => '70000' ),
);
?>
<section class="section section-results" id="results">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'results_title' ) ); ?></h2>
		<p class="section-lead"><?php echo esc_html( mma_content( 'results_lead' ) ); ?></p>
		<div class="results-grid">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php
					$query->the_post();
					$maker   = get_post_meta( get_the_ID(), '_mma_maker', true );
					$model   = get_post_meta( get_the_ID(), '_mma_model', true );
					$year    = get_post_meta( get_the_ID(), '_mma_year', true );
					$mileage = get_post_meta( get_the_ID(), '_mma_mileage', true );
					$price   = get_post_meta( get_the_ID(), '_mma_price', true );
					?>
					<article class="result-card">
						<h3><?php echo esc_html( trim( $maker . ' ' . $model ) ?: get_the_title() ); ?></h3>
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
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<?php foreach ( $fallback as $item ) : ?>
					<article class="result-card">
						<h3><?php echo esc_html( $item['maker'] . ' ' . $item['model'] ); ?></h3>
						<ul>
							<li><span>年式</span><?php echo esc_html( $item['year'] ); ?></li>
							<li><span>距離</span><?php echo esc_html( $item['mileage'] ); ?></li>
						</ul>
						<p class="result-card__price">
							買取価格
							<strong><?php echo esc_html( number_format_i18n( (int) $item['price'] ) ); ?><small>円</small></strong>
						</p>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<p class="section-more">
			<a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'buy_result' ) ); ?>">買取実績一覧を見る</a>
		</p>
	</div>
</section>
