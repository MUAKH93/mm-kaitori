<?php
/**
 * Single post template.
 *
 * @package BMT_Kaitori
 */

get_header();
?>

<section class="section page-header">
	<div class="container">
		<p class="breadcrumb"><a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/news/' ) ); ?>">お知らせ</a></p>
		<h1><?php the_title(); ?></h1>
		<p class="post-date"><?php echo esc_html( get_the_date( 'Y/m/d' ) ); ?></p>
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
