<?php
/**
 * Strengths.
 *
 * @package MMA_Kaitori
 */
?>
<section class="section section-strengths" id="strengths">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'strengths_title' ) ); ?></h2>
		<p class="section-lead"><?php echo esc_html( mma_content( 'strengths_lead' ) ); ?></p>
		<div class="card-grid card-grid--strengths">
			<?php foreach ( mma_strength_items() as $item ) : ?>
				<article class="strength-card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="section-more">
			<a class="text-link" href="<?php echo esc_url( mma_page_url( 'strengths', 'strengths' ) ); ?>">強みをもっと見る</a>
		</p>
	</div>
</section>
