<?php
/**
 * Custom post types for Phase 2.
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register CPTs.
 */
function mma_kaitori_register_cpts() {
	register_post_type(
		'buy_result',
		array(
			'labels'       => array(
				'name'          => '買取実績',
				'singular_name' => '買取実績',
				'add_new_item'  => '買取実績を追加',
				'edit_item'     => '買取実績を編集',
			),
			'public'       => true,
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'jisseki' ),
			'menu_icon'    => 'dashicons-car',
			'supports'     => array( 'title', 'thumbnail', 'editor' ),
			'show_in_rest' => true,
		)
	);

	register_post_type(
		'testimonial',
		array(
			'labels'       => array(
				'name'          => 'お客様の声',
				'singular_name' => 'お客様の声',
				'add_new_item'  => 'お客様の声を追加',
			),
			'public'       => true,
			'has_archive'  => false,
			'rewrite'      => array( 'slug' => 'voice' ),
			'menu_icon'    => 'dashicons-format-quote',
			'supports'     => array( 'title', 'editor' ),
			'show_in_rest' => true,
		)
	);

	register_post_type(
		'column',
		array(
			'labels'       => array(
				'name'          => 'コラム',
				'singular_name' => 'コラム',
				'add_new_item'  => 'コラムを追加',
			),
			'public'       => true,
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'column' ),
			'menu_icon'    => 'dashicons-welcome-write-blog',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'mma_kaitori_register_cpts' );

/**
 * Meta boxes for buy results / testimonials.
 */
function mma_kaitori_add_meta_boxes() {
	add_meta_box( 'mma_buy_result_meta', '買取詳細', 'mma_kaitori_buy_result_meta_box', 'buy_result', 'normal', 'high' );
	add_meta_box( 'mma_testimonial_meta', 'お客様情報', 'mma_kaitori_testimonial_meta_box', 'testimonial', 'side', 'default' );
}
add_action( 'add_meta_boxes', 'mma_kaitori_add_meta_boxes' );

/**
 * Buy result fields.
 *
 * @param WP_Post $post Post.
 */
function mma_kaitori_buy_result_meta_box( $post ) {
	wp_nonce_field( 'mma_buy_result_meta', 'mma_buy_result_nonce' );
	$maker   = get_post_meta( $post->ID, '_mma_maker', true );
	$model   = get_post_meta( $post->ID, '_mma_model', true );
	$year    = get_post_meta( $post->ID, '_mma_year', true );
	$mileage = get_post_meta( $post->ID, '_mma_mileage', true );
	$price   = get_post_meta( $post->ID, '_mma_price', true );
	?>
	<p><label>メーカー<br /><input type="text" name="mma_maker" value="<?php echo esc_attr( $maker ); ?>" class="widefat" /></label></p>
	<p><label>車種<br /><input type="text" name="mma_model" value="<?php echo esc_attr( $model ); ?>" class="widefat" /></label></p>
	<p><label>年式<br /><input type="text" name="mma_year" value="<?php echo esc_attr( $year ); ?>" class="widefat" placeholder="例：2018（H30）" /></label></p>
	<p><label>走行距離<br /><input type="text" name="mma_mileage" value="<?php echo esc_attr( $mileage ); ?>" class="widefat" placeholder="例：80,000km" /></label></p>
	<p><label>買取価格（円）<br /><input type="text" name="mma_price" value="<?php echo esc_attr( $price ); ?>" class="widefat" placeholder="例：120000" /></label></p>
	<?php
}

/**
 * Testimonial fields.
 *
 * @param WP_Post $post Post.
 */
function mma_kaitori_testimonial_meta_box( $post ) {
	wp_nonce_field( 'mma_testimonial_meta', 'mma_testimonial_nonce' );
	$pref  = get_post_meta( $post->ID, '_mma_pref', true );
	$score = get_post_meta( $post->ID, '_mma_score', true );
	?>
	<p><label>都道府県<br /><input type="text" name="mma_pref" value="<?php echo esc_attr( $pref ); ?>" class="widefat" placeholder="福岡県" /></label></p>
	<p><label>満足度（1-5）<br /><input type="number" min="1" max="5" name="mma_score" value="<?php echo esc_attr( $score ? $score : '5' ); ?>" class="widefat" /></label></p>
	<?php
}

/**
 * Save meta.
 *
 * @param int $post_id Post ID.
 */
function mma_kaitori_save_meta( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['mma_buy_result_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mma_buy_result_nonce'] ) ), 'mma_buy_result_meta' ) ) {
		$fields = array( 'mma_maker' => '_mma_maker', 'mma_model' => '_mma_model', 'mma_year' => '_mma_year', 'mma_mileage' => '_mma_mileage', 'mma_price' => '_mma_price' );
		foreach ( $fields as $key => $meta ) {
			if ( isset( $_POST[ $key ] ) ) {
				update_post_meta( $post_id, $meta, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
			}
		}
	}

	if ( isset( $_POST['mma_testimonial_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mma_testimonial_nonce'] ) ), 'mma_testimonial_meta' ) ) {
		if ( isset( $_POST['mma_pref'] ) ) {
			update_post_meta( $post_id, '_mma_pref', sanitize_text_field( wp_unslash( $_POST['mma_pref'] ) ) );
		}
		if ( isset( $_POST['mma_score'] ) ) {
			update_post_meta( $post_id, '_mma_score', absint( $_POST['mma_score'] ) );
		}
	}
}
add_action( 'save_post', 'mma_kaitori_save_meta' );

/**
 * Seed demo content once.
 */
function mma_kaitori_seed_phase2_content() {
	if ( get_option( 'mma_kaitori_phase2_seeded' ) ) {
		return;
	}

	$results = array(
		array( 'title' => 'トヨタ プリウス', 'maker' => 'トヨタ', 'model' => 'プリウス', 'year' => '2008（H20）', 'mileage' => '220,000km', 'price' => '230000' ),
		array( 'title' => 'トヨタ ハリアー', 'maker' => 'トヨタ', 'model' => 'ハリアー', 'year' => '2004（H16）', 'mileage' => '60,000km', 'price' => '200000' ),
		array( 'title' => 'ホンダ ライフ', 'maker' => 'ホンダ', 'model' => 'ライフ', 'year' => '2010（H22）', 'mileage' => '67,000km', 'price' => '100000' ),
		array( 'title' => 'スズキ エブリイ', 'maker' => 'スズキ', 'model' => 'エブリイ', 'year' => '2012（H24）', 'mileage' => '98,000km', 'price' => '80000' ),
	);

	foreach ( $results as $item ) {
		$id = wp_insert_post(
			array(
				'post_type'   => 'buy_result',
				'post_title'  => $item['title'],
				'post_status' => 'publish',
				'post_content'=> '買取実績サンプルです。管理画面から編集・追加できます。',
			)
		);
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_mma_maker', $item['maker'] );
			update_post_meta( $id, '_mma_model', $item['model'] );
			update_post_meta( $id, '_mma_year', $item['year'] );
			update_post_meta( $id, '_mma_mileage', $item['mileage'] );
			update_post_meta( $id, '_mma_price', $item['price'] );
		}
	}

	$voices = array(
		array(
			'title'   => '福岡県のお客様',
			'pref'    => '福岡県',
			'score'   => 5,
			'content' => '他社では費用がかかると言われましたが、MMA買い取りさんは負担0円で引き取っていただけました。対応も丁寧で安心でした。',
		),
		array(
			'title'   => '佐賀県のお客様',
			'pref'    => '佐賀県',
			'score'   => 5,
			'content' => '不動車でしたが、指定場所まで来ていただき助かりました。査定から振込までスムーズでした。',
		),
	);

	foreach ( $voices as $voice ) {
		$id = wp_insert_post(
			array(
				'post_type'    => 'testimonial',
				'post_title'   => $voice['title'],
				'post_status'  => 'publish',
				'post_content' => $voice['content'],
			)
		);
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_mma_pref', $voice['pref'] );
			update_post_meta( $id, '_mma_score', $voice['score'] );
		}
	}

	$columns = array(
		array( 'title' => '廃車時の還付金とは？', 'excerpt' => '普通自動車の自動車税還付のしくみをわかりやすく解説します。' ),
		array( 'title' => '動かない車でも買取できる理由', 'excerpt' => '不動車・事故車でも価値が残るケースについてご紹介します。' ),
		array( 'title' => '廃車に必要な書類チェック', 'excerpt' => '普通車・軽自動車で必要な書類の違いをまとめました。' ),
	);

	foreach ( $columns as $col ) {
		wp_insert_post(
			array(
				'post_type'    => 'column',
				'post_title'   => $col['title'],
				'post_excerpt' => $col['excerpt'],
				'post_content' => $col['excerpt'] . "\n\n本文は管理画面から編集してください。",
				'post_status'  => 'publish',
			)
		);
	}

	// Ensure news sample if no posts.
	if ( ! wp_count_posts()->publish ) {
		wp_insert_post(
			array(
				'post_title'   => 'ホームページを公開しました',
				'post_content' => 'MMA買い取りの公式サイトを公開しました。廃車・中古車・重機の無料査定を受付中です。',
				'post_status'  => 'publish',
				'post_type'    => 'post',
			)
		);
	}

	update_option( 'mma_kaitori_phase2_seeded', 1 );
	flush_rewrite_rules( false );
}
add_action( 'after_switch_theme', 'mma_kaitori_seed_phase2_content' );
add_action( 'init', 'mma_kaitori_maybe_seed_phase2', 20 );

/**
 * Seed Phase 2 if theme already active.
 */
function mma_kaitori_maybe_seed_phase2() {
	if ( ! get_option( 'mma_kaitori_phase2_seeded' ) && 'new-mmakaitori-theme' === get_option( 'stylesheet' ) ) {
		mma_kaitori_seed_phase2_content();
	}
}
