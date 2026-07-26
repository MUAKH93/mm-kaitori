<?php
/**
 * Company outline section.
 *
 * @package BMT_Kaitori
 */

$contact  = bmt_kaitori_contact_info();
$location = bmt_kaitori_location_info();
?>

<section class="section section-outline" id="outline">
	<div class="container">
		<h2><span class="section-label-en">OUTLINE</span>概要</h2>

		<div class="outline-grid">
			<div class="outline-card">
				<h3>本社</h3>
				<table class="info-table">
					<tbody>
						<tr><th>屋号</th><td>MMA Trading</td></tr>
						<tr><th>運営会社</th><td>MMAトレーディング合同会社</td></tr>
						<tr><th>代表社員</th><td>ラザ アリ</td></tr>
						<tr><th>所在地</th><td>〒<?php echo esc_html( preg_replace( '/^〒\s*/', '', $location['address'] ) ); ?></td></tr>
						<tr><th>携帯</th><td><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['phone'] ) ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></td></tr>
						<tr><th>TEL/FAX</th><td><?php echo esc_html( $contact['phone_landline'] ); ?></td></tr>
						<tr><th>メール</th><td><a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></td></tr>
						<tr><th>営業時間</th><td><?php echo esc_html( $contact['hours'] ); ?></td></tr>
						<tr><th>定休日</th><td><?php echo esc_html( $contact['closed'] ); ?></td></tr>
						<tr><th>事業内容</th><td>中古車・重機 販売・買取・輸出貿易・下取り</td></tr>
					</tbody>
				</table>
			</div>

			<div class="outline-card">
				<h3>取扱商品</h3>
				<p class="outline-services">建設重機、発電機、コンプレッサー、中古車、ランクル、パジェロ（四駆）、事故車、不動車、トラクター、フォークリフト、ユンボ、タイヤショベル、ラフタークレーン、トレーラー、バス、平ボディ、ルーフ車、ユニック車、ダンプ、冷凍車、ロードローラー、ブルドーザー など</p>
				<table class="info-table">
					<tbody>
						<tr><th>対応</th><td>24時間いつでもご連絡ください</td></tr>
						<tr><th>査定方法</th><td>WEB・LINE・電話・WhatsApp</td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<section class="section section-legal" id="legal">
	<div class="container">
		<h2>古物営業法に基づく表示</h2>
		<table class="info-table info-table-compact">
			<tbody>
				<tr><th>氏名または名称</th><td>MMAトレーディング合同会社</td></tr>
				<tr><th>許可公安委員会</th><td>福岡県公安委員会</td></tr>
						<tr><th>許可番号</th><td>第901031810041号</td></tr>
			</tbody>
		</table>
	</div>
</section>
