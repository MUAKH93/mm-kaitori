<?php
/**
 * Template Name: 無料査定フォーム
 *
 * @package MMA_Kaitori
 */

get_header();
$c = mma_contact();
?>
<section class="page-hero">
	<div class="container">
		<h1>無料査定フォーム</h1>
		<p><?php echo esc_html( $c['hours'] ); ?> · <?php echo esc_html( $c['closed'] ); ?> — お気軽にご依頼ください。</p>
	</div>
</section>

<section class="section">
	<div class="container narrow">
		<?php mma_render_quote_form( 'full' ); ?>
		<p class="form-alt">お電話でのご依頼: <a href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>"><?php echo esc_html( $c['phone'] ); ?></a></p>
	</div>
</section>
<?php
get_footer();
