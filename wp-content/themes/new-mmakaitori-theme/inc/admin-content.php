<?php
/**
 * Admin content panel — editable homepage/section copy (no coding).
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default editable site content.
 *
 * @return array<string, mixed>
 */
function mma_content_defaults() {
	return array(
		'hero_badge'   => 'らくらく · 簡単・安心',
		'hero_title'   => "お家で待つだけの\nらくらく廃車買取",
		'hero_points'  => "来店不要！指定の場所での引き取りOK\n電話一本でまるっとお任せ\n日本全国どこでも対応\nお客様負担 0円",
		'hero_sub'     => '中古車・重機の買取・販売・輸出・下取り。WEB・LINE・電話で無料査定。',
		'hero_card'    => '廃車・不動車も高価買取',
		'form_title'   => 'まずは愛車を無料査定！',
		'form_badge'   => 'たった20秒!',

		'trust_1_value' => '全国対応',
		'trust_1_label' => 'どこでもお引き取り',
		'trust_2_value' => '最短対応',
		'trust_2_label' => 'スピーディーな査定',
		'trust_3_value' => 'お客様負担0円',
		'trust_3_label' => 'レッカー・手続き込み',

		'results_title' => '廃車買取実績',
		'results_lead'  => '実際の買取事例です。状態を問わずご相談ください。',

		'refund_eyebrow' => '今月中の廃車で還付金チャンス',
		'refund_title'   => '自動車税の還付金について知る',
		'refund_text'    => '普通自動車は廃車時期により還付を受けられる場合があります（軽自動車税は還付制度なし）。',
		'refund_note'    => '※排気量・抹消時期等により異なります。自賠責・重量税の返戻は買取提示に含む場合があります。',
		'refund_amount'  => '26,200',

		'reasons_title' => "独自ネットワークで\n廃車の価値を最大限に",
		'reasons_lead'  => '輸出・部品再利用・再販の販路があるから、状態を問わず高価買取できます。',
		'reason_1_title'=> '海外輸出への販売',
		'reason_1_text' => '国内需要が少ない車でも、海外販路を活かして価値を引き出します。',
		'reason_2_title'=> '中古部品として再利用',
		'reason_2_text' => 'そのまま乗れない車も、パーツや鉄資源として再利用し買取につなげます。',
		'reason_3_title'=> '中古車としての再販',
		'reason_3_text' => '軽い傷・凹みの車は整備のうえ再販し、高価買取を実現します。',

		'worries_title'  => 'こんなお悩みありませんか？',
		'worry_1_title'  => '費用や時間をかけたくない',
		'worry_1_text'   => 'お家で待つだけ。来店不要で手続きもおまかせ。',
		'worry_2_title'  => '古い車・故障車でも売れる？',
		'worry_2_text'   => '状態を問わず査定。廃車でも買取・無料引取に対応。',
		'worry_3_title'  => '不動車を早く引き取ってほしい',
		'worry_3_text'   => '指定場所まで積載車でお伺いします。',

		'strengths_title' => 'MMA買い取りの強み',
		'strengths_lead'  => '初めての廃車でも安心。面倒な手続きはすべておまかせください。',
		'strength_1_title'=> '面倒な手続きがスピーディーに完結',
		'strength_1_text' => '査定から買取金のお支払いまでスムーズに対応。お電話・WEB・LINEで完結できます。',
		'strength_2_title'=> '買取金額からの減額は一切なし',
		'strength_2_text' => 'ご契約後や実車確認後の減額は行いません。提示金額に安心してご依頼ください。',
		'strength_3_title'=> '査定落ちの車も高価買取',
		'strength_3_text' => '事故車・不動車・古い車も、輸出や部品再利用の販路を活かし積極買取します。',
		'strength_4_title'=> 'お客様負担0円をお約束',
		'strength_4_text' => 'レッカー代・廃車手続き費用など、お客様負担は原則0円です。',
		'strength_5_title'=> '24時間いつでもご相談OK',
		'strength_5_text' => '年中無休・24時間対応。ご都合の良いタイミングでお問い合わせください。',

		'flow_title' => '買取の流れ',
		'flow_lead'  => 'お申し込みからお支払いまで、わかりやすく5ステップ。',
		'flow_1_title'=> '無料査定の申込',
		'flow_1_text' => 'お電話・WEBフォーム・LINEよりお申し込みください。最短で概算金額がわかります。',
		'flow_2_title'=> '査定額を確認・ご契約',
		'flow_2_text' => '車両情報をお伺いし査定額をご提示。ご納得いただいた場合のみご契約です。',
		'flow_3_title'=> '必要書類の準備',
		'flow_3_text' => '廃車・買取に必要な書類をご案内します。状況に応じて追加書類がある場合があります。',
		'flow_4_title'=> 'お車の引き取り',
		'flow_4_text' => 'ご自宅や修理工場など、指定の場所でお車を引き取ります。',
		'flow_5_title'=> '買取金のお支払い',
		'flow_5_text' => '引き取り・書類確認後、現金またはお振込みでお支払いします。抹消手続きも代行可能です。',

		'docs_title'  => '廃車に必要な書類',
		'docs_lead'   => '状況により追加書類が必要な場合があります。お申し込み時にご案内します。',
		'docs_normal' => "自動車検査証（車検証）\n自賠責保険証明書\n印鑑証明書\n実印",
		'docs_kei'    => "自動車検査証（車検証）\n自賠責保険証明書\n認印",

		'faq_title' => 'よくあるご質問',
		'faq_1_q' => '本当に廃車費用はかかりませんか？',
		'faq_1_a' => 'はい。原則としてレッカー代・廃車手続き費用などお客様負担は0円です。状況により例外がある場合は事前にご説明します。',
		'faq_2_q' => '最短いつ引取してもらえますか？',
		'faq_2_a' => 'スケジュールに空きがあれば最短でのお引き取りも可能です。お申し込み時にご相談ください。',
		'faq_3_q' => 'ローンの残りがあっても廃車できますか？',
		'faq_3_a' => '所有権の状況により対応が異なります。ローン会社との手続きが必要な場合もご案内しますので、まずはご相談ください。',
		'faq_4_q' => '車検証がなくても廃車できますか？',
		'faq_4_a' => '再交付など別手続きが必要になる場合があります。お問い合わせいただければ必要書類をご案内します。',
		'faq_5_q' => '廃車が完了した証明書はもらえますか？',
		'faq_5_a' => 'はい。廃車手続き完了後、証明書の発行・郵送に対応できます。',
		'faq_6_q' => '車両の引き渡し時は立合いが必要ですか？',
		'faq_6_a' => '基本的には立合いをお願いしていますが、鍵や必要書類の受け渡し方法など状況に応じてご相談可能です。',
		'faq_7_q' => '廃車手続き後、自動車税の還付金はいつ頃もらえますか？',
		'faq_7_a' => '普通車の場合、廃車登録からおおむね2ヶ月前後で都道府県税事務所から還付通知が届くことが多いです。軽自動車税には還付制度がありません。',
		'faq_8_q' => '車の所有者ではないけど買取可能ですか？',
		'faq_8_a' => '所有者の委任状や必要書類が揃えば対応できる場合があります。まずは状況をお聞かせください。',

		'voices_title' => 'お客様の声',
		'voices_lead'  => 'ご利用いただいたお客様からの声をご紹介します。',

		'news_title'   => 'お知らせ',
		'column_title' => '廃車に関する豆知識コラム',

		'cancel_title' => 'キャンセルポリシー',
		'cancel_text'  => 'ご成約後のキャンセルについては、事前にご案内するキャンセルポリシーに従います。詳細はお申し込み時にご確認ください。',

		'cta_title' => '無料見積もりはこちらから',
	);
}

/**
 * Get merged content (saved + defaults).
 *
 * @return array<string, mixed>
 */
function mma_get_content() {
	$saved = get_option( 'mma_site_content', array() );
	if ( ! is_array( $saved ) ) {
		$saved = array();
	}
	return array_merge( mma_content_defaults(), $saved );
}

/**
 * Get one content value.
 *
 * @param string $key     Key.
 * @param string $default Fallback.
 * @return string
 */
function mma_content( $key, $default = '' ) {
	$all = mma_get_content();
	if ( isset( $all[ $key ] ) && '' !== $all[ $key ] ) {
		return (string) $all[ $key ];
	}
	return $default;
}

/**
 * Split multiline text to non-empty lines.
 *
 * @param string $text Text.
 * @return string[]
 */
function mma_lines( $text ) {
	$lines = preg_split( '/\r\n|\r|\n/', (string) $text );
	$out   = array();
	foreach ( (array) $lines as $line ) {
		$line = trim( $line );
		if ( '' !== $line ) {
			$out[] = $line;
		}
	}
	return $out;
}

/**
 * Register menu.
 */
function mma_content_admin_menu() {
	add_menu_page(
		'MMA Contents',
		'MMA Contents',
		'edit_theme_options',
		'mma-contents',
		'mma_content_admin_page',
		'dashicons-edit-page',
		59
	);
}
add_action( 'admin_menu', 'mma_content_admin_menu' );

/**
 * Save handler.
 */
function mma_content_admin_save() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	if ( empty( $_POST['mma_content_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mma_content_nonce'] ) ), 'mma_save_content' ) ) {
		return;
	}

	$defaults = mma_content_defaults();
	$saved    = array();

	foreach ( array_keys( $defaults ) as $key ) {
		if ( ! isset( $_POST[ $key ] ) ) {
			continue;
		}
		$raw = wp_unslash( $_POST[ $key ] );
		$saved[ $key ] = is_string( $raw ) ? sanitize_textarea_field( $raw ) : '';
	}

	update_option( 'mma_site_content', $saved, false );

	// Keep Customizer trust/cancel/refund in sync when present.
	if ( isset( $saved['trust_1_value'] ) ) {
		set_theme_mod( 'mma_trust_1', $saved['trust_1_value'] );
	}
	if ( isset( $saved['trust_2_value'] ) ) {
		set_theme_mod( 'mma_trust_2', $saved['trust_2_value'] );
	}
	if ( isset( $saved['trust_3_value'] ) ) {
		set_theme_mod( 'mma_trust_3', $saved['trust_3_value'] );
	}
	if ( isset( $saved['cancel_text'] ) ) {
		set_theme_mod( 'mma_cancel_note', $saved['cancel_text'] );
	}
	if ( isset( $saved['refund_amount'] ) ) {
		set_theme_mod( 'mma_refund_amount', $saved['refund_amount'] );
	}

	wp_safe_redirect( add_query_arg( array( 'page' => 'mma-contents', 'updated' => '1' ), admin_url( 'admin.php' ) ) );
	exit;
}
add_action( 'admin_post_mma_save_content', 'mma_content_admin_save' );

/**
 * Render a text field.
 *
 * @param string $key   Key.
 * @param string $label Label.
 * @param array  $content Content.
 * @param bool   $area  Textarea.
 */
function mma_content_field( $key, $label, $content, $area = false ) {
	$value = isset( $content[ $key ] ) ? $content[ $key ] : '';
	echo '<p class="mma-field"><label for="' . esc_attr( $key ) . '"><strong>' . esc_html( $label ) . '</strong></label><br />';
	if ( $area ) {
		echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="4" class="large-text">' . esc_textarea( $value ) . '</textarea>';
	} else {
		echo '<input type="text" class="large-text" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" />';
	}
	echo '</p>';
}

/**
 * Admin page UI.
 */
function mma_content_admin_page() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	$content = mma_get_content();
	$tab     = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : 'hero';
	$tabs    = array(
		'hero'      => 'ヒーロー',
		'trust'     => '安心ポイント',
		'results'   => '買取実績見出し',
		'refund'    => '還付金バナー',
		'reasons'   => 'ネットワーク',
		'worries'   => 'お悩み',
		'strengths' => '強み',
		'flow'      => '買取の流れ',
		'docs'      => '必要書類',
		'faq'       => 'FAQ',
		'voices'    => 'お客様の声見出し',
		'news'      => 'お知らせ/コラム',
		'cancel'    => 'キャンセル',
		'cta'       => '下部CTA',
	);
	?>
	<div class="wrap">
		<h1>MMA Contents — サイト文言編集</h1>
		<p>プログラマー不要でホームページの文章を変更できます。変更後は必ず「保存」を押してください。</p>
		<?php if ( ! empty( $_GET['updated'] ) ) : ?>
			<div class="notice notice-success is-dismissible"><p>保存しました。サイトを更新して確認してください。</p></div>
		<?php endif; ?>

		<h2 class="nav-tab-wrapper">
			<?php foreach ( $tabs as $id => $label ) : ?>
				<a class="nav-tab <?php echo $tab === $id ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=mma-contents&tab=' . $id ) ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</h2>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="mma_save_content" />
			<?php wp_nonce_field( 'mma_save_content', 'mma_content_nonce' ); ?>

			<?php
			// Keep all fields in the form so other tabs aren't wiped: render hidden inputs for non-active tabs' keys... 
			// Simpler: save only current tab fields merged with existing saved content.
			?>

			<div style="max-width:920px;background:#fff;padding:20px;border:1px solid #c3c4c7;margin-top:12px;">
				<?php if ( 'hero' === $tab ) : ?>
					<?php
					mma_content_field( 'hero_badge', 'バッジ', $content );
					mma_content_field( 'hero_title', '見出し（改行可）', $content, true );
					mma_content_field( 'hero_points', 'ポイント（1行ずつ）', $content, true );
					mma_content_field( 'hero_sub', '説明文', $content, true );
					mma_content_field( 'hero_card', '画像なし時のカード文言', $content );
					mma_content_field( 'form_title', 'フォーム見出し', $content );
					mma_content_field( 'form_badge', 'フォーム右側ラベル', $content );
					?>
				<?php elseif ( 'trust' === $tab ) : ?>
					<?php
					for ( $i = 1; $i <= 3; $i++ ) {
						mma_content_field( "trust_{$i}_value", "項目{$i} 太字", $content );
						mma_content_field( "trust_{$i}_label", "項目{$i} 説明", $content );
					}
					?>
				<?php elseif ( 'results' === $tab ) : ?>
					<?php
					mma_content_field( 'results_title', '見出し', $content );
					mma_content_field( 'results_lead', 'リード文', $content, true );
					echo '<p class="description">個別の買取カードは「買取実績」メニューから追加・編集します。</p>';
					?>
				<?php elseif ( 'refund' === $tab ) : ?>
					<?php
					mma_content_field( 'refund_eyebrow', '上ラベル', $content );
					mma_content_field( 'refund_title', '見出し', $content );
					mma_content_field( 'refund_text', '本文', $content, true );
					mma_content_field( 'refund_note', '注記', $content, true );
					mma_content_field( 'refund_amount', '最大金額表示（例: 26,200）', $content );
					?>
				<?php elseif ( 'reasons' === $tab ) : ?>
					<?php
					mma_content_field( 'reasons_title', '見出し（改行可）', $content, true );
					mma_content_field( 'reasons_lead', 'リード文', $content, true );
					for ( $i = 1; $i <= 3; $i++ ) {
						mma_content_field( "reason_{$i}_title", "カード{$i} 見出し", $content );
						mma_content_field( "reason_{$i}_text", "カード{$i} 本文", $content, true );
					}
					?>
				<?php elseif ( 'worries' === $tab ) : ?>
					<?php
					mma_content_field( 'worries_title', '見出し', $content );
					for ( $i = 1; $i <= 3; $i++ ) {
						mma_content_field( "worry_{$i}_title", "カード{$i} 見出し", $content );
						mma_content_field( "worry_{$i}_text", "カード{$i} 本文", $content, true );
					}
					?>
				<?php elseif ( 'strengths' === $tab ) : ?>
					<?php
					mma_content_field( 'strengths_title', '見出し', $content );
					mma_content_field( 'strengths_lead', 'リード文', $content, true );
					for ( $i = 1; $i <= 5; $i++ ) {
						mma_content_field( "strength_{$i}_title", "強み{$i} 見出し", $content );
						mma_content_field( "strength_{$i}_text", "強み{$i} 本文", $content, true );
					}
					?>
				<?php elseif ( 'flow' === $tab ) : ?>
					<?php
					mma_content_field( 'flow_title', '見出し', $content );
					mma_content_field( 'flow_lead', 'リード文', $content, true );
					for ( $i = 1; $i <= 5; $i++ ) {
						mma_content_field( "flow_{$i}_title", "STEP{$i} 見出し", $content );
						mma_content_field( "flow_{$i}_text", "STEP{$i} 本文", $content, true );
					}
					?>
				<?php elseif ( 'docs' === $tab ) : ?>
					<?php
					mma_content_field( 'docs_title', '見出し', $content );
					mma_content_field( 'docs_lead', 'リード文', $content, true );
					mma_content_field( 'docs_normal', '普通車の書類（1行ずつ）', $content, true );
					mma_content_field( 'docs_kei', '軽自動車の書類（1行ずつ）', $content, true );
					?>
				<?php elseif ( 'faq' === $tab ) : ?>
					<?php
					mma_content_field( 'faq_title', '見出し', $content );
					for ( $i = 1; $i <= 8; $i++ ) {
						mma_content_field( "faq_{$i}_q", "Q{$i}", $content );
						mma_content_field( "faq_{$i}_a", "A{$i}", $content, true );
					}
					?>
				<?php elseif ( 'voices' === $tab ) : ?>
					<?php
					mma_content_field( 'voices_title', '見出し', $content );
					mma_content_field( 'voices_lead', 'リード文', $content, true );
					echo '<p class="description">個別の声は「お客様の声」メニューから追加・編集します。</p>';
					?>
				<?php elseif ( 'news' === $tab ) : ?>
					<?php
					mma_content_field( 'news_title', 'お知らせ見出し', $content );
					mma_content_field( 'column_title', 'コラム見出し', $content );
					echo '<p class="description">記事本文は「投稿」と「コラム」から編集します。</p>';
					?>
				<?php elseif ( 'cancel' === $tab ) : ?>
					<?php
					mma_content_field( 'cancel_title', '見出し', $content );
					mma_content_field( 'cancel_text', '本文', $content, true );
					?>
				<?php else : ?>
					<?php mma_content_field( 'cta_title', '下部CTA見出し', $content ); ?>
				<?php endif; ?>

				<?php
				// Preserve other tab values.
				foreach ( $content as $key => $val ) {
					$active_keys = mma_content_tab_keys( $tab );
					if ( in_array( $key, $active_keys, true ) ) {
						continue;
					}
					echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
				}
				?>
			</div>

			<?php submit_button( 'この内容を保存' ); ?>
		</form>

		<hr />
		<h2>その他の編集場所（覚えておく）</h2>
		<ul>
			<li><strong>買取実績</strong> … 左メニュー「買取実績」</li>
			<li><strong>お客様の声</strong> … 左メニュー「お客様の声」</li>
			<li><strong>お知らせ</strong> … 「投稿」</li>
			<li><strong>コラム</strong> … 「コラム」</li>
			<li><strong>ロゴ・電話・LINE</strong> … 外観 → カスタマイズ → MMA Contact</li>
			<li><strong>メニュー</strong> … 外観 → メニュー</li>
		</ul>
	</div>
	<?php
}

/**
 * Keys belonging to a tab.
 *
 * @param string $tab Tab id.
 * @return string[]
 */
function mma_content_tab_keys( $tab ) {
	$map = array(
		'hero'      => array( 'hero_badge', 'hero_title', 'hero_points', 'hero_sub', 'hero_card', 'form_title', 'form_badge' ),
		'trust'     => array( 'trust_1_value', 'trust_1_label', 'trust_2_value', 'trust_2_label', 'trust_3_value', 'trust_3_label' ),
		'results'   => array( 'results_title', 'results_lead' ),
		'refund'    => array( 'refund_eyebrow', 'refund_title', 'refund_text', 'refund_note', 'refund_amount' ),
		'reasons'   => array( 'reasons_title', 'reasons_lead', 'reason_1_title', 'reason_1_text', 'reason_2_title', 'reason_2_text', 'reason_3_title', 'reason_3_text' ),
		'worries'   => array( 'worries_title', 'worry_1_title', 'worry_1_text', 'worry_2_title', 'worry_2_text', 'worry_3_title', 'worry_3_text' ),
		'strengths' => array( 'strengths_title', 'strengths_lead', 'strength_1_title', 'strength_1_text', 'strength_2_title', 'strength_2_text', 'strength_3_title', 'strength_3_text', 'strength_4_title', 'strength_4_text', 'strength_5_title', 'strength_5_text' ),
		'flow'      => array( 'flow_title', 'flow_lead', 'flow_1_title', 'flow_1_text', 'flow_2_title', 'flow_2_text', 'flow_3_title', 'flow_3_text', 'flow_4_title', 'flow_4_text', 'flow_5_title', 'flow_5_text' ),
		'docs'      => array( 'docs_title', 'docs_lead', 'docs_normal', 'docs_kei' ),
		'faq'       => array( 'faq_title', 'faq_1_q', 'faq_1_a', 'faq_2_q', 'faq_2_a', 'faq_3_q', 'faq_3_a', 'faq_4_q', 'faq_4_a', 'faq_5_q', 'faq_5_a', 'faq_6_q', 'faq_6_a', 'faq_7_q', 'faq_7_a', 'faq_8_q', 'faq_8_a' ),
		'voices'    => array( 'voices_title', 'voices_lead' ),
		'news'      => array( 'news_title', 'column_title' ),
		'cancel'    => array( 'cancel_title', 'cancel_text' ),
		'cta'       => array( 'cta_title' ),
	);
	return isset( $map[ $tab ] ) ? $map[ $tab ] : array();
}
