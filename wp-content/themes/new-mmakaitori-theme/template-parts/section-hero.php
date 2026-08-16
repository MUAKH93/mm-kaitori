<?php
/**
 * Hero — stacked banner images + appraisal form.
 *
 * @package MMA_Kaitori
 */

$c = mma_contact();

$first_default  = MMA_KAITORI_URI . '/assets/images/hero-first.png';
$second_default = MMA_KAITORI_URI . '/assets/images/hero-second.png';
$first          = get_theme_mod( 'mma_banner_first', '' );
$second         = get_theme_mod( 'mma_banner_second', '' );
if ( ! $first ) {
	$first = $first_default;
}
if ( ! $second ) {
	$second = $second_default;
}
?>
<section class="hero hero--banners" id="top">
	<div class="hero-banners">
		<img
			class="hero-banner-img hero-banner-img--first"
			src="<?php echo esc_url( $first ); ?>"
			alt="<?php echo esc_attr( $c['brand'] . ' — 中古車・重機の高価買取' ); ?>"
			width="1920"
			height="700"
			loading="eager"
			decoding="async"
		/>
		<a class="hero-banner-link" href="#quote" aria-label="無料査定フォームへ">
			<img
				class="hero-banner-img hero-banner-img--second"
				src="<?php echo esc_url( $second ); ?>"
				alt="スマホでカンタン！愛車を無料査定 たったの20秒"
				width="1920"
				height="600"
				loading="eager"
				decoding="async"
			/>
		</a>
	</div>

	<div class="hero-form-band" id="quote">
		<div class="container hero-form-band__inner">
			<?php mma_render_quote_form( 'hero' ); ?>
		</div>
	</div>
</section>
