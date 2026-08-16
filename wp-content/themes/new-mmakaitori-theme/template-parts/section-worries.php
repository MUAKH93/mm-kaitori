<?php
/**
 * Customer worries.
 *
 * @package MMA_Kaitori
 */
?>
<section class="section section-worries" id="worries">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'worries_title' ) ); ?></h2>
		<div class="card-grid card-grid--3">
			<?php foreach ( mma_worry_items() as $item ) : ?>
				<article class="worry-card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
