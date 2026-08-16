<?php
/**
 * Buy flow summary.
 *
 * @package MMA_Kaitori
 */

$c = mma_contact();
?>
<section class="section section-flow" id="flow">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'flow_title' ) ); ?></h2>
		<p class="section-lead"><?php echo esc_html( mma_content( 'flow_lead' ) ); ?></p>
		<ol class="flow-steps">
			<?php foreach ( mma_flow_steps() as $i => $step ) : ?>
				<li class="flow-step">
					<span class="flow-step__num">STEP <?php echo esc_html( (string) ( $i + 1 ) ); ?></span>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
		<div class="flow-cta">
			<a class="btn btn-outline" href="<?php echo esc_url( mma_page_url( 'flow' ) ); ?>">買取の流れを詳しく見る</a>
			<a class="btn btn-cta-yellow" href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>">電話で相談 <?php echo esc_html( $c['phone'] ); ?></a>
		</div>
	</div>
</section>
