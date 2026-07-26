<?php
/**
 * Generic page template.
 *
 * @package BMT_Kaitori
 */

get_header();
?>

<section class="section page-header">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</section>

<section class="section">
	<div class="container content-area">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</div>
</section>

<?php
get_footer();
