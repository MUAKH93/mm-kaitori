<?php
/**
 * Quote form page template.
 *
 * Template Name: 無料査定フォーム
 *
 * @package BMT_Kaitori
 */

get_header();
?>

<section class="section page-header page-header-quote">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<p>お車の査定に必要な情報の入力をお願いいたします。<strong>※必須</strong>の項目は必ず入力してください。</p>
	</div>
</section>

<section class="section">
	<div class="container content-area quote-form-wrap">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
		<p class="form-note">確認画面は表示されません。上記内容にて送信しますので、よろしければ同意チェックを入れてください。</p>
	</div>
</section>

<?php
get_footer();
