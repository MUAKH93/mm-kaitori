<?php
/**
 * Trust strip.
 *
 * @package MMA_Kaitori
 */
?>
<section class="trust-strip" aria-label="安心ポイント">
	<div class="container trust-strip-inner">
		<?php foreach ( mma_trust_items() as $item ) : ?>
			<div class="trust-item">
				<strong><?php echo esc_html( $item['value'] ); ?></strong>
				<span><?php echo esc_html( $item['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>
