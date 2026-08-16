<?php
/**
 * Tax refund promo banner.
 *
 * @package MMA_Kaitori
 */

$amount = mma_content( 'refund_amount', get_theme_mod( 'mma_refund_amount', '26,200' ) );
?>
<section class="section section-refund" id="refund">
	<div class="container refund-banner">
		<div class="refund-banner__copy">
			<p class="refund-banner__eyebrow"><?php echo esc_html( mma_content( 'refund_eyebrow' ) ); ?></p>
			<h2><?php echo esc_html( mma_content( 'refund_title' ) ); ?></h2>
			<p><?php echo esc_html( mma_content( 'refund_text' ) ); ?></p>
			<p class="refund-banner__note"><?php echo esc_html( mma_content( 'refund_note' ) ); ?></p>
		</div>
		<div class="refund-banner__stat">
			<span>最大</span>
			<strong><?php echo esc_html( $amount ); ?><small>円</small></strong>
			<a class="btn btn-cta-yellow" href="<?php echo esc_url( get_post_type_archive_link( 'column' ) ); ?>">還付金コラムを見る</a>
		</div>
	</div>
</section>
