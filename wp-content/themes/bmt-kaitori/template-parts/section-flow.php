<?php
/**
 * Process flow section.
 *
 * @package BMT_Kaitori
 */

$contact    = bmt_kaitori_contact_info();
$quote_page = get_page_by_path( 'contact' );
$quote_url  = $quote_page ? get_permalink( $quote_page ) : home_url( '/contact/' );
?>

<section class="section section-flow" id="flow">
	<div class="container">
		<h2><span class="section-label-en">FLOW</span>WEB・LINE・電話査定の流れ</h2>

		<ol class="flow-steps">
			<li>
				<h3>1. WEB・LINE・電話から無料査定依頼</h3>
				<p>無料見積りフォームから必要事項を入力して送信するか、お電話にて必要事項をお伺いします。</p>
				<div class="flow-actions">
					<a class="btn btn-accent btn-sm" href="<?php echo esc_url( $quote_url ); ?>">WEBで無料見積り</a>
					<a class="btn btn-line btn-sm" href="<?php echo esc_url( $contact['line_url'] ); ?>" target="_blank" rel="noopener noreferrer">LINEで簡単！無料見積り</a>
					<a class="btn btn-outline btn-sm" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['phone'] ) ); ?>">TEL <?php echo esc_html( $contact['phone'] ); ?></a>
				</div>
			</li>
			<li>
				<h3>2. 査定のご連絡</h3>
				<p>お客様の入力内容をもとに査定を行い、見積りができ次第ご連絡いたします。</p>
			</li>
			<li>
				<h3>3. 成約後、お引き取り</h3>
				<p>お見積りにご納得いただけましたらご成約。引き取り日程を調整し、現金またはお振込みでお支払いします。</p>
			</li>
			<li>
				<h3>4. 必要書類の準備</h3>
				<div class="doc-columns">
					<div>
						<h4>売る時に必要な書類</h4>
						<ul>
							<li>自動車検査証（車検証）</li>
							<li>自賠責保険証明書</li>
							<li>自動車リサイクル券</li>
							<li>自動車納税証明書</li>
							<li>実印・印鑑登録証明書</li>
							<li>委任状・譲渡証明書</li>
						</ul>
					</div>
					<div>
						<h4>廃車する時に必要な書類</h4>
						<ul>
							<li>運転免許証のコピー</li>
							<li>自動車検査証</li>
							<li>認印（車検証と同一のもの）</li>
							<li>自賠責保険（原本）</li>
							<li>印鑑証明書（3ヶ月以内）</li>
							<li>実印（印鑑証明書と同一のもの）</li>
						</ul>
					</div>
				</div>
				<p class="flow-note">※状況により追加書類が必要な場合があります。詳しくはお問い合わせください。</p>
			</li>
			<li>
				<h3>5. お振込み・抹消手続き完了</h3>
				<p>車両引き取り後、廃車の場合は抹消手続きまで完了し、お見積り金額を現金または銀行振込でお支払いします。</p>
			</li>
		</ol>
	</div>
</section>
