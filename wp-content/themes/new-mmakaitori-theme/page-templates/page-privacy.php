<?php
/**
 * Template Name: プライバシーポリシー
 *
 * @package MMA_Kaitori
 */

get_header();
$c = mma_contact();
?>
<section class="page-hero">
	<div class="container">
		<h1>プライバシーポリシー</h1>
	</div>
</section>

<section class="section">
	<div class="container narrow page-content">
		<p><?php echo esc_html( $c['company'] ); ?>（以下「当社」）は、お客様の個人情報を適切に取り扱うため、以下のとおりプライバシーポリシーを定めます。</p>

		<h2>1. 収集する情報</h2>
		<p>無料査定・お問い合わせの際に、お名前、電話番号、メールアドレス、車両情報、都道府県などをお預かりします。</p>

		<h2>2. 利用目的</h2>
		<p>査定のご案内、お問い合わせへの回答、契約・引取・お支払いに関する連絡、サービス改善のために利用します。</p>

		<h2>3. 第三者提供</h2>
		<p>法令に基づく場合を除き、お客様の同意なく個人情報を第三者に提供しません。業務委託先には必要な範囲でのみ共有し、適切に管理します。</p>

		<h2>4. 安全管理</h2>
		<p>個人情報の漏えい・滅失・毀損防止のため、合理的な安全管理措置を講じます。</p>

		<h2>5. お問い合わせ</h2>
		<p>個人情報の取扱いに関するご質問は、<?php echo esc_html( $c['email'] ); ?> または <?php echo esc_html( $c['phone'] ); ?> までご連絡ください。</p>

		<p>運営: <?php echo esc_html( $c['company'] ); ?><br />所在地: <?php echo esc_html( $c['address'] ); ?></p>
	</div>
</section>
<?php
get_footer();
