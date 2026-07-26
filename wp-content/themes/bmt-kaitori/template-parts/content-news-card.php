<?php
/**
 * News card partial.
 *
 * @package BMT_Kaitori
 */
?>

<article <?php post_class( 'news-card' ); ?>>
	<p class="news-date"><?php echo esc_html( get_the_date() ); ?></p>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php if ( has_excerpt() || get_the_content() ) : ?>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
	<?php endif; ?>
</article>
