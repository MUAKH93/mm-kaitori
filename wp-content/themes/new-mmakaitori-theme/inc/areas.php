<?php
/**
 * Area SEO pages (prefecture landings).
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Region labels.
 *
 * @return array<string, string>
 */
function mma_area_regions() {
	return array(
		'hokkaido_tohoku' => '北海道・東北',
		'kanto'           => '関東',
		'chubu'           => '中部・北陸',
		'kinki'           => '近畿',
		'chugoku_shikoku' => '中国・四国',
		'kyushu'          => '九州・沖縄',
	);
}

/**
 * Prefecture definitions (slug => meta).
 *
 * @return array<string, array{name:string,region:string}>
 */
function mma_area_prefecture_defs() {
	return array(
		'hokkaido'  => array( 'name' => '北海道', 'region' => 'hokkaido_tohoku' ),
		'aomori'    => array( 'name' => '青森県', 'region' => 'hokkaido_tohoku' ),
		'iwate'     => array( 'name' => '岩手県', 'region' => 'hokkaido_tohoku' ),
		'miyagi'    => array( 'name' => '宮城県', 'region' => 'hokkaido_tohoku' ),
		'akita'     => array( 'name' => '秋田県', 'region' => 'hokkaido_tohoku' ),
		'yamagata'  => array( 'name' => '山形県', 'region' => 'hokkaido_tohoku' ),
		'fukushima' => array( 'name' => '福島県', 'region' => 'hokkaido_tohoku' ),
		'ibaraki'   => array( 'name' => '茨城県', 'region' => 'kanto' ),
		'tochigi'   => array( 'name' => '栃木県', 'region' => 'kanto' ),
		'gunma'     => array( 'name' => '群馬県', 'region' => 'kanto' ),
		'saitama'   => array( 'name' => '埼玉県', 'region' => 'kanto' ),
		'chiba'     => array( 'name' => '千葉県', 'region' => 'kanto' ),
		'tokyo'     => array( 'name' => '東京都', 'region' => 'kanto' ),
		'kanagawa'  => array( 'name' => '神奈川県', 'region' => 'kanto' ),
		'niigata'   => array( 'name' => '新潟県', 'region' => 'chubu' ),
		'toyama'    => array( 'name' => '富山県', 'region' => 'chubu' ),
		'ishikawa'  => array( 'name' => '石川県', 'region' => 'chubu' ),
		'fukui'     => array( 'name' => '福井県', 'region' => 'chubu' ),
		'yamanashi' => array( 'name' => '山梨県', 'region' => 'chubu' ),
		'nagano'    => array( 'name' => '長野県', 'region' => 'chubu' ),
		'gifu'      => array( 'name' => '岐阜県', 'region' => 'chubu' ),
		'shizuoka'  => array( 'name' => '静岡県', 'region' => 'chubu' ),
		'aichi'     => array( 'name' => '愛知県', 'region' => 'chubu' ),
		'mie'       => array( 'name' => '三重県', 'region' => 'kinki' ),
		'shiga'     => array( 'name' => '滋賀県', 'region' => 'kinki' ),
		'kyoto'     => array( 'name' => '京都府', 'region' => 'kinki' ),
		'osaka'     => array( 'name' => '大阪府', 'region' => 'kinki' ),
		'hyogo'     => array( 'name' => '兵庫県', 'region' => 'kinki' ),
		'nara'      => array( 'name' => '奈良県', 'region' => 'kinki' ),
		'wakayama'  => array( 'name' => '和歌山県', 'region' => 'kinki' ),
		'tottori'   => array( 'name' => '鳥取県', 'region' => 'chugoku_shikoku' ),
		'shimane'   => array( 'name' => '島根県', 'region' => 'chugoku_shikoku' ),
		'okayama'   => array( 'name' => '岡山県', 'region' => 'chugoku_shikoku' ),
		'hiroshima' => array( 'name' => '広島県', 'region' => 'chugoku_shikoku' ),
		'yamaguchi' => array( 'name' => '山口県', 'region' => 'chugoku_shikoku' ),
		'tokushima' => array( 'name' => '徳島県', 'region' => 'chugoku_shikoku' ),
		'kagawa'    => array( 'name' => '香川県', 'region' => 'chugoku_shikoku' ),
		'ehime'     => array( 'name' => '愛媛県', 'region' => 'chugoku_shikoku' ),
		'kochi'     => array( 'name' => '高知県', 'region' => 'chugoku_shikoku' ),
		'fukuoka'   => array( 'name' => '福岡県', 'region' => 'kyushu' ),
		'saga'      => array( 'name' => '佐賀県', 'region' => 'kyushu' ),
		'nagasaki'  => array( 'name' => '長崎県', 'region' => 'kyushu' ),
		'kumamoto'  => array( 'name' => '熊本県', 'region' => 'kyushu' ),
		'oita'      => array( 'name' => '大分県', 'region' => 'kyushu' ),
		'miyazaki'  => array( 'name' => '宮崎県', 'region' => 'kyushu' ),
		'kagoshima' => array( 'name' => '鹿児島県', 'region' => 'kyushu' ),
		'okinawa'   => array( 'name' => '沖縄県', 'region' => 'kyushu' ),
	);
}

/**
 * Register area CPT.
 */
function mma_register_area_cpt() {
	register_post_type(
		'area',
		array(
			'labels'       => array(
				'name'          => '対応エリア',
				'singular_name' => 'エリア',
				'add_new_item'  => 'エリアを追加',
				'edit_item'     => 'エリアを編集',
				'view_item'     => 'エリアを表示',
				'search_items'  => 'エリアを検索',
			),
			'public'       => true,
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'area' ),
			'menu_icon'    => 'dashicons-location-alt',
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'mma_register_area_cpt' );

/**
 * Area meta box.
 */
function mma_area_add_meta_boxes() {
	add_meta_box( 'mma_area_meta', 'エリア設定', 'mma_area_meta_box', 'area', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'mma_area_add_meta_boxes' );

/**
 * Meta box HTML.
 *
 * @param WP_Post $post Post.
 */
function mma_area_meta_box( $post ) {
	wp_nonce_field( 'mma_area_meta', 'mma_area_nonce' );
	$region  = get_post_meta( $post->ID, '_mma_region', true );
	$pref    = get_post_meta( $post->ID, '_mma_pref_name', true );
	$regions = mma_area_regions();
	?>
	<p>
		<label>都道府県名<br />
			<input type="text" name="mma_pref_name" value="<?php echo esc_attr( $pref ); ?>" class="widefat" placeholder="福岡県" />
		</label>
	</p>
	<p>
		<label>地方区分<br />
			<select name="mma_region" class="widefat">
				<option value="">選択</option>
				<?php foreach ( $regions as $key => $label ) : ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $region, $key ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
			</select>
		</label>
	</p>
	<?php
}

/**
 * Save area meta.
 *
 * @param int $post_id Post ID.
 */
function mma_area_save_meta( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['mma_area_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mma_area_nonce'] ) ), 'mma_area_meta' ) ) {
		return;
	}
	if ( isset( $_POST['mma_pref_name'] ) ) {
		update_post_meta( $post_id, '_mma_pref_name', sanitize_text_field( wp_unslash( $_POST['mma_pref_name'] ) ) );
	}
	if ( isset( $_POST['mma_region'] ) ) {
		$region = sanitize_key( wp_unslash( $_POST['mma_region'] ) );
		if ( array_key_exists( $region, mma_area_regions() ) ) {
			update_post_meta( $post_id, '_mma_region', $region );
		}
	}
}
add_action( 'save_post_area', 'mma_area_save_meta' );

/**
 * Build default area body copy.
 *
 * @param string $name Prefecture name.
 * @return string
 */
function mma_area_default_content( $name ) {
	$brand = 'MMA買い取り';
	return '<p>' . $name . 'で廃車・不動車・事故車の買取をご検討なら、' . $brand . 'へご相談ください。</p>'
		. '<p>ご自宅や修理工場など、指定の場所までお引き取りに伺います。レッカー代・廃車手続き費用など、お客様負担は原則0円です。</p>'
		. '<p>' . $name . '内はもちろん、日本全国どこでも対応可能です。電話・WEB・LINEから無料査定をお申し込みください。査定後にご納得いただけた場合のみご契約となります。</p>'
		. '<h2>' . $name . 'でよくあるご相談</h2>'
		. '<ul><li>動かない車・古い車でも買い取ってもらえるか</li>'
		. '<li>ローン残債や所有権がある場合の手続き</li>'
		. '<li>自動車税の還付や必要書類について</li></ul>'
		. '<p>状況に合わせてわかりやすくご案内します。まずはお気軽にお問い合わせください。</p>';
}

/**
 * Seed all prefecture area pages once.
 */
function mma_seed_area_pages() {
	if ( get_option( 'mma_kaitori_phase3_seeded' ) ) {
		return;
	}

	foreach ( mma_area_prefecture_defs() as $slug => $def ) {
		$existing = get_page_by_path( $slug, OBJECT, 'area' );
		if ( $existing ) {
			continue;
		}

		$id = wp_insert_post(
			array(
				'post_type'    => 'area',
				'post_name'    => $slug,
				'post_title'   => $def['name'] . 'の廃車買取',
				'post_excerpt' => $def['name'] . 'の廃車・不動車を全国対応で買取。お客様負担0円で無料査定。',
				'post_content' => mma_area_default_content( $def['name'] ),
				'post_status'  => 'publish',
			)
		);

		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_mma_pref_name', $def['name'] );
			update_post_meta( $id, '_mma_region', $def['region'] );
		}
	}

	mma_seed_phase3_pages();
	update_option( 'mma_kaitori_phase3_seeded', 1 );
	flush_rewrite_rules( false );
}
add_action( 'after_switch_theme', 'mma_seed_area_pages' );
add_action( 'init', 'mma_maybe_seed_area_pages', 25 );

/**
 * Ensure Phase 3 helper pages exist with templates.
 */
function mma_seed_phase3_pages() {
	$pages = array(
		array(
			'slug'     => 'sitemap',
			'title'    => 'サイトマップ',
			'template' => 'page-templates/page-sitemap.php',
		),
		array(
			'slug'     => 'doc-transfer',
			'title'    => '譲渡証明書について',
			'template' => 'page-templates/page-doc-transfer.php',
		),
		array(
			'slug'     => 'doc-proxy',
			'title'    => '委任状について',
			'template' => 'page-templates/page-doc-proxy.php',
		),
	);

	foreach ( $pages as $page ) {
		$existing = get_page_by_path( $page['slug'] );
		if ( $existing ) {
			update_post_meta( $existing->ID, '_wp_page_template', $page['template'] );
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_name'    => $page['slug'],
				'post_title'   => $page['title'],
				'post_status'  => 'publish',
				'post_content' => '',
			)
		);
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_wp_page_template', $page['template'] );
		}
	}
}

/**
 * Seed Phase 3 when theme already active.
 */
function mma_maybe_seed_area_pages() {
	if ( ! get_option( 'mma_kaitori_phase3_seeded' ) && 'new-mmakaitori-theme' === get_option( 'stylesheet' ) ) {
		mma_seed_area_pages();
	}
}

/**
 * Areas grouped by region (published).
 *
 * @return array<string, WP_Post[]>
 */
function mma_areas_by_region() {
	$query = new WP_Query(
		array(
			'post_type'      => 'area',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'orderby'        => 'title',
			'order'          => 'ASC',
		)
	);

	$grouped = array();
	foreach ( array_keys( mma_area_regions() ) as $key ) {
		$grouped[ $key ] = array();
	}

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$region = get_post_meta( get_the_ID(), '_mma_region', true );
			if ( ! isset( $grouped[ $region ] ) ) {
				$grouped[ $region ] = array();
			}
			$grouped[ $region ][] = get_post();
		}
		wp_reset_postdata();
	}

	return $grouped;
}

/**
 * Pref name for an area post.
 *
 * @param int|null $post_id Post ID.
 * @return string
 */
function mma_area_pref_name( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$name    = get_post_meta( $post_id, '_mma_pref_name', true );
	if ( $name ) {
		return $name;
	}
	$title = get_the_title( $post_id );
	return preg_replace( '/の廃車買取$/u', '', $title );
}

/**
 * Sibling areas in same region.
 *
 * @param int $post_id Current area.
 * @param int $limit   Max.
 * @return WP_Post[]
 */
function mma_area_siblings( $post_id, $limit = 8 ) {
	$region = get_post_meta( $post_id, '_mma_region', true );
	$q      = new WP_Query(
		array(
			'post_type'      => 'area',
			'posts_per_page' => $limit + 1,
			'post_status'    => 'publish',
			'post__not_in'   => array( $post_id ),
			'meta_key'       => '_mma_region',
			'meta_value'     => $region,
			'orderby'        => 'title',
			'order'          => 'ASC',
		)
	);
	return $q->posts;
}
