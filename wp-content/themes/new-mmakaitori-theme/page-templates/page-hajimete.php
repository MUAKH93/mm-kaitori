<?php
/**
 * Template Name: はじめての方へ
 *
 * @package MMA_Kaitori
 */

get_header();
$c = mma_contact();
?>
<section class="page-hero">
	<div class="container">
		<h1>はじめての方へ</h1>
		<p>廃車・買取が初めてでも大丈夫。流れとポイントをまとめました。</p>
	</div>
</section>

<section class="section">
	<div class="container narrow page-content">
		<h2>MMA買い取りでできること</h2>
		<ul>
			<li>お家で待つだけの廃車・買取（来店不要）</li>
			<li>事故車・不動車・古い車も査定</li>
			<li>レッカー・手続き費用は原則お客様負担0円</li>
			<li>電話・WEB・LINEで無料査定</li>
		</ul>

		<h2>ご依頼の流れ</h2>
		<p>無料査定 → 金額確認・ご契約 → 書類準備 → 引取 → お支払い。詳しくは<a href="<?php echo esc_url( mma_page_url( 'flow' ) ); ?>">買取の流れ</a>をご覧ください。</p>

		<h2>まずは無料査定</h2>
		<p>お電話（<?php echo esc_html( $c['phone'] ); ?>）または<a href="<?php echo esc_url( mma_page_url( 'quote' ) ); ?>">WEBフォーム</a>からお気軽にどうぞ。</p>
	</div>
</section>

<?php
get_footer();
