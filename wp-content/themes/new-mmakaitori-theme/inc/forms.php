<?php
/**
 * Native quote form (no CF7 required).
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Client IP for rate limiting.
 *
 * @return string
 */
function mma_quote_client_ip() {
	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '0.0.0.0';
	return $ip ? $ip : '0.0.0.0';
}

/**
 * Soft-fail redirect (looks like success to bots).
 *
 * @param string $code Quote status code.
 */
function mma_quote_redirect( $code = 'ok' ) {
	$redirect = add_query_arg( 'quote', $code, wp_get_referer() ? wp_get_referer() : home_url( '/' ) );
	wp_safe_redirect( $redirect );
	exit;
}

/**
 * Handle quote form POST.
 */
function mma_kaitori_handle_quote_form() {
	if ( empty( $_POST['mma_quote_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mma_quote_nonce'] ) ), 'mma_quote_form' ) ) {
		wp_die( esc_html__( 'Invalid form submission.', 'mma-kaitori' ) );
	}

	$honey = isset( $_POST['mma_company_url'] ) ? trim( (string) wp_unslash( $_POST['mma_company_url'] ) ) : '';
	if ( '' !== $honey ) {
		mma_quote_redirect( 'ok' );
	}

	$started = isset( $_POST['mma_form_started'] ) ? absint( $_POST['mma_form_started'] ) : 0;
	if ( $started && ( time() - $started ) < 3 ) {
		mma_quote_redirect( 'ok' );
	}

	$ip_key = 'mma_quote_rl_' . md5( mma_quote_client_ip() );
	$count  = (int) get_transient( $ip_key );
	if ( $count >= 5 ) {
		mma_quote_redirect( 'error' );
	}
	set_transient( $ip_key, $count + 1, HOUR_IN_SECONDS );

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$tel     = isset( $_POST['tel'] ) ? sanitize_text_field( wp_unslash( $_POST['tel'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$maker   = isset( $_POST['maker'] ) ? sanitize_text_field( wp_unslash( $_POST['maker'] ) ) : '';
	$model   = isset( $_POST['model'] ) ? sanitize_text_field( wp_unslash( $_POST['model'] ) ) : '';
	$year    = isset( $_POST['year'] ) ? sanitize_text_field( wp_unslash( $_POST['year'] ) ) : '';
	$mileage = isset( $_POST['mileage'] ) ? sanitize_text_field( wp_unslash( $_POST['mileage'] ) ) : '';
	$pref    = isset( $_POST['pref'] ) ? sanitize_text_field( wp_unslash( $_POST['pref'] ) ) : '';
	$notes   = isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : '';
	$agree   = ! empty( $_POST['agree_terms'] );

	if ( ! $name || ! $tel || ! $maker || ! $agree ) {
		mma_quote_redirect( 'error' );
	}

	$digits = preg_replace( '/\D+/', '', $tel );
	if ( strlen( $digits ) < 10 || strlen( $digits ) > 15 ) {
		mma_quote_redirect( 'error' );
	}

	$to      = get_theme_mod( 'mma_email', 'mmatrading.jp@gmail.com' );
	$subject = sprintf( '[MMA買い取り] 無料査定依頼 — %s / %s', $maker, $name );
	$body    = "無料査定フォームからのお問い合わせです。\n\n"
		. "お名前: {$name}\n"
		. "電話: {$tel}\n"
		. "メール: {$email}\n"
		. "都道府県: {$pref}\n"
		. "メーカー: {$maker}\n"
		. "車種: {$model}\n"
		. "年式: {$year}\n"
		. "走行距離: {$mileage}\n"
		. "備考:\n{$notes}\n";

	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );
	if ( is_email( $email ) ) {
		$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
	}

	$sent = wp_mail( $to, $subject, $body, $headers );
	mma_quote_redirect( $sent ? 'ok' : 'fail' );
}
add_action( 'admin_post_nopriv_mma_quote_form', 'mma_kaitori_handle_quote_form' );
add_action( 'admin_post_mma_quote_form', 'mma_kaitori_handle_quote_form' );

/**
 * Mileage options (Haishall-style).
 *
 * @return string[]
 */
function mma_mileage_options() {
	return array(
		'2万km未満',
		'2万～4万km',
		'4万～6万km',
		'6万～8万km',
		'8万～10万km',
		'10万～15万km',
		'15万～20万km',
		'20万km以上',
	);
}

/**
 * Render quote form markup (2-step, Haishall-like theme).
 *
 * @param string $variant hero|full|area.
 */
function mma_render_quote_form( $variant = 'hero' ) {
	$makers   = mma_car_makers();
	$prefs    = mma_prefectures();
	$mileages = mma_mileage_options();
	$status   = isset( $_GET['quote'] ) ? sanitize_text_field( wp_unslash( $_GET['quote'] ) ) : '';
	$form_id  = 'mma-quote-' . $variant . '-' . wp_unique_id();
	?>
	<div class="mma-appraisal mma-appraisal--<?php echo esc_attr( $variant ); ?>">
		<div class="mma-appraisal__title">
			<strong>\ <?php echo esc_html( mma_content( 'form_title', 'まずは愛車を無料査定！' ) ); ?> /</strong>
			<span class="mma-appraisal__badge" aria-hidden="true">たった<br />20秒!</span>
		</div>

		<form class="quote-form quote-form--steps quote-form--<?php echo esc_attr( $variant ); ?>" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" data-mma-steps="1" novalidate>
			<input type="hidden" name="action" value="mma_quote_form" />
			<input type="hidden" name="mma_form_started" value="<?php echo esc_attr( (string) time() ); ?>" />
			<?php wp_nonce_field( 'mma_quote_form', 'mma_quote_nonce' ); ?>

			<div class="mma-hp" aria-hidden="true">
				<label for="<?php echo esc_attr( $form_id ); ?>-hp">会社URL（入力しないでください）</label>
				<input type="text" name="mma_company_url" id="<?php echo esc_attr( $form_id ); ?>-hp" value="" tabindex="-1" autocomplete="off" />
			</div>

			<?php if ( 'ok' === $status ) : ?>
				<p class="quote-form__notice quote-form__notice--ok" role="status">送信が完了しました。担当者よりご連絡いたします。</p>
			<?php elseif ( 'error' === $status || 'fail' === $status ) : ?>
				<p class="quote-form__notice quote-form__notice--err" role="alert">送信に失敗しました。必須項目をご確認のうえ、もう一度お試しください。</p>
			<?php endif; ?>

			<div class="quote-steps" aria-label="入力ステップ">
				<span class="quote-steps__item is-active" data-step-label="1">STEP1 車両</span>
				<span class="quote-steps__item" data-step-label="2">STEP2 お客様</span>
			</div>

			<p class="quote-form__step-error" role="alert" hidden></p>

			<div class="quote-step is-active" data-step="1">
				<div class="quote-lines">
					<div class="quote-line is-focus">
						<span class="quote-num" aria-hidden="true">1</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="req">必須</em><span class="u-sr-only">メーカー</span></span>
							<select name="maker" required autocomplete="organization" aria-label="メーカー">
								<option value="">メーカーを選択</option>
								<?php foreach ( $makers as $maker ) : ?>
									<option value="<?php echo esc_attr( $maker ); ?>"><?php echo esc_html( $maker ); ?></option>
								<?php endforeach; ?>
							</select>
						</label>
					</div>

					<div class="quote-line">
						<span class="quote-num" aria-hidden="true">2</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="opt">任意</em><span class="u-sr-only">車種</span></span>
							<input type="text" name="model" placeholder="車種を入力（例：プリウス）" aria-label="車種" />
						</label>
					</div>

					<div class="quote-line">
						<span class="quote-num" aria-hidden="true">3</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="opt">任意</em><span class="u-sr-only">年式</span></span>
							<input type="text" name="year" placeholder="年式を入力（例：2018）" inputmode="numeric" aria-label="年式" />
						</label>
					</div>

					<div class="quote-line">
						<span class="quote-num" aria-hidden="true">4</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="opt">任意</em><span class="u-sr-only">走行距離</span></span>
							<select name="mileage" aria-label="走行距離">
								<option value="">走行距離を選択</option>
								<?php foreach ( $mileages as $m ) : ?>
									<option value="<?php echo esc_attr( $m ); ?>"><?php echo esc_html( $m ); ?></option>
								<?php endforeach; ?>
							</select>
						</label>
					</div>

					<div class="quote-line">
						<span class="quote-num" aria-hidden="true">5</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="opt">任意</em><span class="u-sr-only">都道府県</span></span>
							<select name="pref" autocomplete="address-level1" aria-label="都道府県">
								<option value="">都道府県を選択</option>
								<?php foreach ( $prefs as $pref ) : ?>
									<option value="<?php echo esc_attr( $pref ); ?>"><?php echo esc_html( $pref ); ?></option>
								<?php endforeach; ?>
							</select>
						</label>
					</div>
				</div>

				<p class="quote-form__hint">国産車・輸入車どちらもOK／10万キロ以上でもOK</p>

				<div class="quote-step__actions">
					<button type="button" class="btn btn-cta-red quote-form__next">次へ進む</button>
				</div>
			</div>

			<div class="quote-step" data-step="2" hidden>
				<div class="quote-lines">
					<div class="quote-line is-focus">
						<span class="quote-num" aria-hidden="true">1</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="req">必須</em><span class="u-sr-only">お名前</span></span>
							<input type="text" name="name" placeholder="お名前を入力" required autocomplete="name" aria-label="お名前" />
						</label>
					</div>

					<div class="quote-line is-focus">
						<span class="quote-num" aria-hidden="true">2</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="req">必須</em><span class="u-sr-only">電話番号</span></span>
							<input type="tel" name="tel" placeholder="電話番号を入力" required autocomplete="tel" inputmode="tel" aria-label="電話番号" />
						</label>
					</div>

					<div class="quote-line">
						<span class="quote-num" aria-hidden="true">3</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="opt">任意</em><span class="u-sr-only">メールアドレス</span></span>
							<input type="email" name="email" placeholder="メールアドレスを入力" autocomplete="email" aria-label="メールアドレス" />
						</label>
					</div>

					<div class="quote-line">
						<span class="quote-num" aria-hidden="true">4</span>
						<label class="quote-field">
							<span class="quote-field__label"><em class="opt">任意</em><span class="u-sr-only">備考</span></span>
							<textarea name="notes" rows="2" placeholder="車の状態など" aria-label="備考"></textarea>
						</label>
					</div>
				</div>

				<p class="quote-form__hint">申し込み後、買取価格がすぐ分かる！</p>

				<label class="quote-agree">
					<input type="checkbox" name="agree_terms" value="1" required />
					<span><a href="<?php echo esc_url( mma_page_url( 'privacy' ) ); ?>" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>に同意する</span>
				</label>

				<div class="quote-step__actions quote-step__actions--split">
					<button type="button" class="btn btn-outline quote-form__back">戻る</button>
					<button type="submit" class="btn btn-cta-red quote-form__submit">無料査定を申し込む</button>
				</div>
			</div>
		</form>
	</div>
	<?php
}
