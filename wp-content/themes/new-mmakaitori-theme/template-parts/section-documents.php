<?php
/**
 * Required documents.
 *
 * @package MMA_Kaitori
 */

$docs = mma_document_lists();
?>
<section class="section section-documents" id="documents">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'docs_title' ) ); ?></h2>
		<p class="section-lead"><?php echo esc_html( mma_content( 'docs_lead' ) ); ?></p>
		<div class="docs-grid">
			<article class="docs-card">
				<h3>普通車</h3>
				<ul>
					<?php foreach ( $docs['normal'] as $doc ) : ?>
						<li><?php echo esc_html( $doc ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
			<article class="docs-card">
				<h3>軽自動車</h3>
				<ul>
					<?php foreach ( $docs['kei'] as $doc ) : ?>
						<li><?php echo esc_html( $doc ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>
		<p class="section-more">
			<a class="text-link" href="<?php echo esc_url( mma_page_url( 'documents' ) ); ?>">必要書類ガイドを見る</a>
			<span aria-hidden="true"> · </span>
			<a class="text-link" href="<?php echo esc_url( mma_page_url( 'doc-transfer' ) ); ?>">譲渡証明書</a>
			<span aria-hidden="true"> · </span>
			<a class="text-link" href="<?php echo esc_url( mma_page_url( 'doc-proxy' ) ); ?>">委任状</a>
		</p>
	</div>
</section>
