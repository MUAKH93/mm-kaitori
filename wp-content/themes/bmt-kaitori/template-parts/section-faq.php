<?php
/**
 * FAQ section.
 *
 * @package BMT_Kaitori
 */

$faqs = bmt_kaitori_faq_items();
?>

<section class="section section-faq" id="faq">
	<div class="container">
		<h2><span class="section-label-en">FAQ</span><?php echo esc_html( bmt_t( 'faq_title' ) ); ?></h2>
		<div class="faq-list">
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<details class="faq-item" <?php echo 0 === $index ? 'open' : ''; ?>>
					<summary><?php echo esc_html( $faq['q'] ); ?></summary>
					<p><?php echo esc_html( $faq['a'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
