<?php
/**
 * Cancel policy note.
 *
 * @package MMA_Kaitori
 */
?>
<section class="section section-cancel" id="cancel-policy">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'cancel_title' ) ); ?></h2>
		<p><?php echo esc_html( mma_content( 'cancel_text', get_theme_mod( 'mma_cancel_note', '' ) ) ); ?></p>
	</div>
</section>
