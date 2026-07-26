<?php
/**
 * Strengths section.
 *
 * @package BMT_Kaitori
 */

$items = bmt_kaitori_strength_items();
?>

<section class="section section-strengths" id="strengths">
	<div class="container">
		<h2><span class="section-label-en">STRENGTH</span><?php echo esc_html( bmt_t( 'strength_title' ) ); ?></h2>
		<div class="card-grid">
			<?php foreach ( $items as $item ) : ?>
				<div class="info-card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
