<?php
/**
 * Contact CTA section.
 *
 * @package BMT_Kaitori
 */

$contact = bmt_kaitori_contact_info();
?>

<section class="section section-contact" id="contact">
	<div class="container contact-panel">
		<div>
			<h2><span class="section-label-en section-label-en-light">CONTACT</span><?php echo esc_html( bmt_t( 'contact_title' ) ); ?></h2>
			<p><?php echo esc_html( bmt_t( 'contact_lead' ) ); ?></p>
			<p><strong><?php echo esc_html( bmt_t( 'contact_hours' ) ); ?></strong> <?php echo esc_html( $contact['hours'] ); ?></p>
			<p><strong><?php echo esc_html( bmt_t( 'contact_closed' ) ); ?></strong> <?php echo esc_html( $contact['closed'] ); ?></p>
		</div>
		<div class="contact-actions">
			<a class="btn btn-light" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['phone'] ) ); ?>"><?php echo esc_html( bmt_t( 'btn_phone' ) ); ?></a>
			<a class="btn btn-accent" href="#quote-form"><?php echo esc_html( bmt_t( 'btn_web' ) ); ?></a>
			<a class="btn btn-line" href="<?php echo esc_url( $contact['line_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( bmt_t( 'btn_line' ) ); ?></a>
		</div>
	</div>
</section>
