<?php
/**
 * About section.
 *
 * @package BMT_Kaitori
 */

$banner_url = bmt_kaitori_get_banner_url();
$logo_url   = bmt_kaitori_get_logo_url();
?>

<section class="section section-about" id="about">
	<div class="container">
		<h2><span class="section-label-en">ABOUT US</span>MMAトレーディング合同会社</h2>
		<div class="about-grid">
			<div class="about-copy">
				<p>MMAトレーディング合同会社は、中古車・重機の販売・買取・輸出貿易・下取りを行っています。福岡県飯塚市を拠点に、建設重機、発電機、コンプレッサー、中古車、トラック、バスなど幅広く対応しています。</p>
				<p>ランクル、パジェロなどの四駆車、事故車、不動車、トラクター、フォークリフト、ユンボ、ダンプ、冷凍車、ロードローラー、ブルドーザーなど、状態を問わずご相談ください。</p>
				<p><strong>24時間いつでもご連絡ください。</strong> WEB・LINE・電話・WhatsAppでお気軽にお問い合わせいただけます。</p>
			</div>
			<div class="about-gallery">
				<?php if ( $banner_url ) : ?>
					<img src="<?php echo esc_url( $banner_url ); ?>" alt="MMA Trading — 中古車・重機販売買取" class="about-banner">
				<?php else : ?>
					<div class="gallery-placeholder">会社バナー画像 — upload in Appearance → Customize → Site Images</div>
				<?php endif; ?>
				<?php if ( $logo_url ) : ?>
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="MMA Trading Logo" class="about-logo">
				<?php else : ?>
					<div class="gallery-placeholder">MMA ロゴ — upload in Customize → Site Identity or Site Images</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
