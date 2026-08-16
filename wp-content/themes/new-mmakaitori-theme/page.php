<?php
/**
 * Default page.
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="section page-default">
	<div class="container narrow">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
