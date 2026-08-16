<?php
/**
 * FAQ accordion.
 *
 * @package MMA_Kaitori
 */
?>
<section class="section section-faq" id="faq">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'faq_title' ) ); ?></h2>
		<div class="faq-list">
			<?php foreach ( mma_faq_items() as $i => $faq ) : ?>
				<details class="faq-item" <?php echo 0 === $i ? 'open' : ''; ?>>
					<summary><?php echo esc_html( $faq['q'] ); ?></summary>
					<p><?php echo esc_html( $faq['a'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
		<p class="section-more">
			<a class="text-link" href="<?php echo esc_url( mma_page_url( 'faq' ) ); ?>">よくある質問をもっと見る</a>
		</p>
	</div>
</section>
