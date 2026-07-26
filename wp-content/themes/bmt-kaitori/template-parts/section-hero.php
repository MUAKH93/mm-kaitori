<?php
/**
 * Hero section.
 *
 * @package BMT_Kaitori
 */

$contact  = bmt_kaitori_contact_info();
$logo_url = bmt_kaitori_get_logo_url();
?>

<section class="hero">
	<div class="container hero-inner">
		<div class="hero-copy">
			<?php if ( $logo_url ) : ?>
				<img class="hero-logo" src="<?php echo esc_url( $logo_url ); ?>" alt="MMA Trading" width="120" height="80">
			<?php endif; ?>
			<p class="eyebrow"><?php echo esc_html( bmt_t( 'hero_eyebrow' ) ); ?></p>
			<h1><?php echo esc_html( bmt_t( 'hero_title' ) ); ?><br><?php echo esc_html( bmt_t( 'hero_title_sub' ) ); ?></h1>
			<p class="lead"><?php echo esc_html( bmt_t( 'hero_lead' ) ); ?></p>
			<div class="hero-actions">
				<a class="btn btn-accent" href="#quote-form"><?php echo esc_html( bmt_t( 'btn_web_quote' ) ); ?></a>
				<a class="btn btn-line" href="<?php echo esc_url( $contact['line_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( bmt_t( 'btn_line_quote' ) ); ?></a>
			</div>
		</div>
		<div class="hero-card">
			<p class="hero-card-label"><?php echo esc_html( bmt_t( 'hero_phone_label' ) ); ?></p>
			<a class="hero-phone" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['phone'] ) ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a>
			<p class="hero-hours">TEL/FAX: <?php echo esc_html( $contact['phone_landline'] ); ?></p>
			<p class="hero-hours"><a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>" style="color:#fff;"><?php echo esc_html( $contact['email'] ); ?></a></p>
			<p class="hero-hours"><?php echo esc_html( bmt_t( 'hero_hours' ) ); ?> <?php echo esc_html( $contact['hours'] ); ?> · <?php echo esc_html( $contact['closed'] ); ?></p>
		</div>
	</div>
</section>
