<?php
/**
 * Bottom CTA.
 *
 * @package MMA_Kaitori
 */

$c = mma_contact();
?>
<section class="section section-bottom-cta" id="contact-cta">
	<div class="container bottom-cta-inner">
		<h2><?php echo esc_html( mma_content( 'cta_title' ) ); ?></h2>
		<p><?php echo esc_html( $c['hours'] ); ?> · <?php echo esc_html( $c['closed'] ); ?></p>
		<a class="bottom-cta-phone" href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>"><?php echo esc_html( $c['phone'] ); ?></a>
		<div class="bottom-cta-actions">
			<a class="btn btn-cta-yellow" href="<?php echo esc_url( mma_page_url( 'quote' ) ); ?>">WEBで無料査定</a>
			<a class="btn btn-cta-green" href="<?php echo esc_url( $c['line_url'] ); ?>" target="_blank" rel="noopener">LINEで無料査定</a>
		</div>
	</div>
</section>
