<?php
/**
 * Customer testimonials.
 *
 * @package MMA_Kaitori
 */

$query = new WP_Query(
	array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 4,
		'post_status'    => 'publish',
	)
);
?>
<section class="section section-voices" id="voices">
	<div class="container">
		<h2><?php echo esc_html( mma_content( 'voices_title' ) ); ?></h2>
		<p class="section-lead"><?php echo esc_html( mma_content( 'voices_lead' ) ); ?></p>
		<div class="voices-grid">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php
					$query->the_post();
					$pref  = get_post_meta( get_the_ID(), '_mma_pref', true );
					$score = (int) get_post_meta( get_the_ID(), '_mma_score', true );
					?>
					<article class="voice-card">
						<p class="voice-card__meta">
							<?php echo esc_html( $pref ? $pref . 'のお客様' : get_the_title() ); ?>
							<?php if ( $score ) : ?>
								<span class="voice-card__score">満足度 <?php echo esc_html( (string) $score ); ?>/5</span>
							<?php endif; ?>
						</p>
						<div class="voice-card__body"><?php the_content(); ?></div>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<article class="voice-card">
					<p class="voice-card__meta">福岡県のお客様 <span class="voice-card__score">満足度 5/5</span></p>
					<div class="voice-card__body"><p>費用の心配がなく、丁寧な対応で安心してお任せできました。</p></div>
				</article>
			<?php endif; ?>
		</div>
	</div>
</section>
