<?php
/**
 * Reasons / network section.
 *
 * @package MMA_Kaitori
 */
?>
<section class="section section-reasons" id="reasons">
	<div class="container">
		<h2><?php mma_echo_breaks( mma_content( 'reasons_title' ) ); ?></h2>
		<p class="section-lead"><?php echo esc_html( mma_content( 'reasons_lead' ) ); ?></p>
		<div class="card-grid card-grid--3">
			<?php foreach ( mma_reason_items() as $item ) : ?>
				<article class="info-card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
