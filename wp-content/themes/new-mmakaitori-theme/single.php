<?php
/**
 * Single post / column.
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="section">
	<div class="container narrow">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class( 'single-article' ); ?>>
				<p class="single-meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y/m/d' ) ); ?></time></p>
				<h1><?php the_title(); ?></h1>
				<div class="page-content"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
