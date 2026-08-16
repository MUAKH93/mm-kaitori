<?php
/**
 * Simple automobile tax refund estimator (ordinary cars).
 *
 * @package MMA_Kaitori
 */

$bands = mma_refund_tax_bands();
$months = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 );
?>
<section class="section section-refund-calc" id="refund-calc">
	<div class="container narrow">
		<h2>自動車税還付金かんたん計算</h2>
		<p class="section-lead">普通自動車の自動車税（年額）の目安です。抹消登録の翌月から3月までの月割で概算します。軽自動車税には還付制度がありません。</p>

		<form class="refund-calc" id="mma-refund-calc" novalidate>
			<label class="quote-field">
				<span class="quote-field__label">排気量区分</span>
				<select name="band" id="mma-refund-band" required>
					<option value="">選択してください</option>
					<?php foreach ( $bands as $label => $yen ) : ?>
						<option value="<?php echo esc_attr( (string) $yen ); ?>"><?php echo esc_html( $label . 'cc相当 · 年額 ' . number_format_i18n( $yen ) . '円' ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>

			<label class="quote-field">
				<span class="quote-field__label">廃車（抹消）予定月</span>
				<select name="month" id="mma-refund-month" required>
					<?php foreach ( $months as $m ) : ?>
						<option value="<?php echo esc_attr( (string) $m ); ?>" <?php selected( $m, (int) gmdate( 'n' ) ); ?>><?php echo esc_html( $m . '月' ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>

			<button type="button" class="btn btn-cta-yellow" id="mma-refund-run">概算を見る</button>
		</form>

		<div class="refund-calc__result" id="mma-refund-result" hidden>
			<p>還付の目安：<strong id="mma-refund-amount">—</strong>円</p>
			<p class="refund-calc__note">※あくまで概算です。排気量・用途区分・抹消時期・都道府県により異なります。詳細は無料査定時にご案内します。</p>
		</div>
	</div>
</section>
