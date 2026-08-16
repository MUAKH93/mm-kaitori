<?php
/**
 * Template Name: 必要書類 — 委任状
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="page-hero">
	<div class="container">
		<h1>委任状について</h1>
		<p>手続きを代行する場合に必要になることがあります。</p>
	</div>
</section>

<section class="section">
	<div class="container narrow page-content">
		<p>委任状は、所有者ご本人に代わって廃車・名義変更などの手続きを行う権限を委任する書類です。来庁が難しい場合や、買取業者に手続きを依頼する場合に使用します。</p>
		<h2>ポイント</h2>
		<ul>
			<li>委任する内容（抹消登録・名義変更など）を明確に記載します。</li>
			<li>普通車では実印と印鑑証明書がセットになることが多いです。</li>
			<li>軽自動車は認印で足りるケースもありますが、状況により異なります。</li>
		</ul>
		<p>必要書類は車両や名義の状況で変わるため、お申し込み後に個別にご案内します。</p>
		<p class="section-more">
			<a class="text-link" href="<?php echo esc_url( mma_page_url( 'documents' ) ); ?>">必要書類ガイドに戻る</a>
		</p>
	</div>
</section>

<?php
get_footer();
