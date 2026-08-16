<?php
/**
 * Default index.
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class( 'content-card' ); ?>>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<p>コンテンツがありません。</p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
