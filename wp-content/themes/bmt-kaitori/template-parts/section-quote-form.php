<?php
/**
 * Homepage quote form section (full CF7 form).
 *
 * @package BMT_Kaitori
 */
?>

<section class="section section-quote-form" id="quote-form">
	<div class="container">
		<h2><span class="section-label-en">QUOTE</span><?php echo esc_html( bmt_t( 'quote_section_title' ) ); ?></h2>
		<p class="section-lead"><?php echo esc_html( bmt_t( 'quote_section_lead' ) ); ?></p>

		<div class="content-area quote-form-wrap">
			<?php echo bmt_kaitori_get_quote_form_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<p class="form-note"><?php echo esc_html( bmt_t( 'quote_section_note' ) ); ?></p>
		</div>
	</div>
</section>
