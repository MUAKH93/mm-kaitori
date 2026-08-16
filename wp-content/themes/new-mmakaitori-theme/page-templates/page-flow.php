<?php
/**
 * Template Name: 買取の流れ
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="page-hero">
	<div class="container">
		<h1>買取の流れ</h1>
		<p>お問い合わせから手続き完了まで、MMA買い取りの流れをご説明します。</p>
	</div>
</section>

<section class="section">
	<div class="container narrow">
		<ol class="flow-steps flow-steps--detailed">
			<?php foreach ( mma_flow_steps() as $i => $step ) : ?>
				<li class="flow-step">
					<span class="flow-step__num">STEP <?php echo esc_html( (string) ( $i + 1 ) ); ?></span>
					<h2><?php echo esc_html( $step['title'] ); ?></h2>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<?php
get_footer();
