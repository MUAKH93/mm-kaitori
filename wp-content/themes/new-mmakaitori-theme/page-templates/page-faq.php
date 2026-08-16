<?php
/**
 * Template Name: よくあるご質問
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="page-hero">
	<div class="container">
		<h1>よくあるご質問</h1>
		<p>廃車買取・引き取りに関するよくあるご質問をまとめました。</p>
	</div>
</section>

<section class="section">
	<div class="container narrow">
		<div class="faq-list">
			<?php foreach ( mma_faq_items() as $faq ) : ?>
				<details class="faq-item">
					<summary><?php echo esc_html( $faq['q'] ); ?></summary>
					<p><?php echo esc_html( $faq['a'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
