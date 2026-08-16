<?php
/**
 * Template Name: 運営会社
 *
 * @package MMA_Kaitori
 */

get_header();
$c = mma_contact();
?>
<section class="page-hero">
	<div class="container">
		<h1>運営会社</h1>
		<p><?php echo esc_html( $c['brand'] ); ?>は、<?php echo esc_html( $c['company'] ); ?>によって運営されています。</p>
	</div>
</section>

<section class="section">
	<div class="container narrow">
		<h2>会社概要</h2>
		<table class="outline-table">
			<tbody>
				<tr><th>屋号</th><td><?php echo esc_html( $c['brand'] ); ?></td></tr>
				<tr><th>運営会社</th><td><?php echo esc_html( $c['company'] ); ?></td></tr>
				<tr><th>代表社員</th><td><?php echo esc_html( $c['rep'] ); ?></td></tr>
				<tr><th>所在地</th><td><?php echo esc_html( $c['address'] ); ?></td></tr>
				<tr><th>携帯</th><td><a href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>"><?php echo esc_html( $c['phone'] ); ?></a></td></tr>
				<tr><th>TEL/FAX</th><td><?php echo esc_html( $c['phone_landline'] ); ?></td></tr>
				<tr><th>メール</th><td><a href="mailto:<?php echo esc_attr( $c['email'] ); ?>"><?php echo esc_html( $c['email'] ); ?></a></td></tr>
				<tr><th>営業時間</th><td><?php echo esc_html( $c['hours'] ); ?> · <?php echo esc_html( $c['closed'] ); ?></td></tr>
				<tr><th>事業内容</th><td>中古車・重機 販売・買取・輸出貿易・下取り</td></tr>
			</tbody>
		</table>

		<h2>古物営業法に基づく表示</h2>
		<table class="outline-table">
			<tbody>
				<tr><th>氏名または名称</th><td><?php echo esc_html( $c['company'] ); ?></td></tr>
				<tr><th>許可</th><td><?php echo esc_html( $c['license'] ); ?></td></tr>
			</tbody>
		</table>
	</div>
</section>

<?php
get_footer();
