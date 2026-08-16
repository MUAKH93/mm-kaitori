<?php
/**
 * Sticky mobile CTA.
 *
 * @package MMA_Kaitori
 */

$c = mma_contact();
?>
<div class="sticky-cta" aria-label="クイックアクション">
	<a class="sticky-cta__phone" href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>">電話査定</a>
	<a class="sticky-cta__web" href="<?php echo esc_url( mma_page_url( 'quote' ) ); ?>">WEB査定</a>
	<a class="sticky-cta__line" href="<?php echo esc_url( $c['line_url'] ); ?>" target="_blank" rel="noopener noreferrer">LINE査定</a>
</div>
