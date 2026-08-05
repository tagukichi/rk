<?php
/**
 * カスタマイザー設定。
 *
 * サイト内の全テキスト・画像を「外観 > カスタマイズ」から編集できるようにする。
 * 追加プラグイン（ACF 等）は不要。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 編集項目の定義。
 *
 * type: text | textarea | image | email | tel
 *
 * @return array<string, array<string, mixed>>
 */
function office_rk_customizer_map() {
	return [
		'hero'    => [
			'title'  => __( '① ファーストビュー', 'office-rk' ),
			'fields' => [
				'hero_label'        => [ 'label' => __( '英語ラベル', 'office-rk' ), 'type' => 'text', 'default' => 'Real Estate &amp; Consulting' ],
				'hero_title_1'      => [ 'label' => __( '見出し（1行目）', 'office-rk' ), 'type' => 'text', 'default' => '土地と不動産に、' ],
				'hero_title_accent' => [ 'label' => __( '見出し（強調部分）', 'office-rk' ), 'type' => 'text', 'default' => '確かな価値' ],
				'hero_title_2'      => [ 'label' => __( '見出し（強調の後）', 'office-rk' ), 'type' => 'text', 'default' => 'を。' ],
				'hero_lead_1'       => [ 'label' => __( 'リード文1段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '株式会社オフィスＲＫは、東京都荒川区西日暮里を拠点に、<br class="br-pc">土地・事業用不動産を中心とした売買仲介、不動産コンサルティングを行っています。' ],
				'hero_lead_2'       => [ 'label' => __( 'リード文2段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '豊富なネットワークと交渉力を活かし、お客様一人ひとりに最適なご提案をいたします。' ],
				'hero_btn_label'    => [ 'label' => __( 'ボタンの文言', 'office-rk' ), 'type' => 'text', 'default' => '事業内容を見る' ],
				'hero_btn_url'      => [ 'label' => __( 'ボタンのリンク先', 'office-rk' ), 'type' => 'text', 'default' => '#service' ],
				'hero_image'        => [ 'label' => __( '背景画像', 'office-rk' ), 'type' => 'image', 'default' => 'fv2.png' ],
			],
		],
		'about'   => [
			'title'  => __( '② 私たちについて', 'office-rk' ),
			'fields' => [
				'about_catch' => [ 'label' => __( 'キャッチコピー', 'office-rk' ), 'type' => 'textarea', 'default' => '一つひとつのご縁を大切に、<br>確かな不動産取引を。' ],
				'about_text_1' => [ 'label' => __( '本文1段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '株式会社オフィスＲＫは、土地・事業用不動産を中心とした売買仲介および不動産コンサルティングを手掛けています。' ],
				'about_text_2' => [ 'label' => __( '本文2段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '不動産取引は、物件だけではなく、多くの人の想いや事情が関わる仕事です。' ],
				'about_text_3' => [ 'label' => __( '本文3段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '私たちは一つひとつの案件に真摯に向き合い、培ってきた経験とネットワークを活かして、お客様にとって最適なご提案と円滑な取引を実現します。' ],
				'about_image'  => [ 'label' => __( '画像', 'office-rk' ), 'type' => 'image', 'default' => 'aboutrk.png' ],
			],
		],
		'service' => [
			'title'  => __( '③ 事業内容', 'office-rk' ),
			'fields' => [
				'service_catch'  => [ 'label' => __( '見出し', 'office-rk' ), 'type' => 'textarea', 'default' => '不動産に関する多様な課題に、専門的な視点で対応します。' ],
				'service_lead'   => [ 'label' => __( '本文', 'office-rk' ), 'type' => 'textarea', 'default' => '土地・戸建・マンション・収益物件・事業用不動産など、幅広い不動産取引を通じて、お客様の目的や状況に合わせた最適なご提案を行います。' ],

				'service_1_title' => [ 'label' => __( '01 見出し', 'office-rk' ), 'type' => 'text', 'default' => '不動産売買仲介' ],
				'service_1_text1' => [ 'label' => __( '01 本文1', 'office-rk' ), 'type' => 'textarea', 'default' => '土地・戸建・区分マンション・一棟収益物件など、不動産売買に関する仲介業務を行っています。' ],
				'service_1_text2' => [ 'label' => __( '01 本文2', 'office-rk' ), 'type' => 'textarea', 'default' => '物件の特性や市場動向を踏まえ、売主様・買主様双方の目的を理解したうえで、調査・条件調整・交渉・契約まで一貫してサポートいたします。' ],

				'service_2_title' => [ 'label' => __( '02 見出し', 'office-rk' ), 'type' => 'text', 'default' => '不動産買取' ],
				'service_2_text1' => [ 'label' => __( '02 本文1', 'office-rk' ), 'type' => 'textarea', 'default' => '土地・中古戸建・区分マンション・収益物件など、不動産の直接買取にも対応しています。' ],
				'service_2_text2' => [ 'label' => __( '02 本文2', 'office-rk' ), 'type' => 'textarea', 'default' => '早期売却をご希望の方、周囲に知られず売却したい方、相続や資産整理をお考えの方など、それぞれの状況に合わせた柔軟な売却方法をご提案いたします。' ],

				'service_3_title' => [ 'label' => __( '03 見出し', 'office-rk' ), 'type' => 'text', 'default' => '不動産コンサルティング' ],
				'service_3_text1' => [ 'label' => __( '03 本文1', 'office-rk' ), 'type' => 'textarea', 'default' => '相続、資産整理、土地活用、権利関係が複雑な不動産など、不動産に関する様々な課題に対応します。' ],
				'service_3_text2' => [ 'label' => __( '03 本文2', 'office-rk' ), 'type' => 'textarea', 'default' => '専門家や不動産会社とのネットワークを活かし、売買だけにとどまらない長期的な視点で、お客様にとって最適な解決策をご提案いたします。' ],

				'service_4_title' => [ 'label' => __( '04 見出し', 'office-rk' ), 'type' => 'text', 'default' => '資産・経営サポート' ],
				'service_4_text1' => [ 'label' => __( '04 本文1', 'office-rk' ), 'type' => 'textarea', 'default' => '不動産を中心とした資産運用、保険、事業承継、M&amp;Aなど、各分野の専門家と連携し、お客様の資産形成や経営課題の解決をサポートします。' ],
				'service_4_text2' => [ 'label' => __( '04 本文2（空欄可）', 'office-rk' ), 'type' => 'textarea', 'default' => '' ],
			],
		],
		'works'   => [
			'title'  => __( '④ 実績事例', 'office-rk' ),
			'fields' => [
				'works_catch' => [ 'label' => __( '見出し', 'office-rk' ), 'type' => 'textarea', 'default' => '首都圏を中心に、土地・収益物件・事業用不動産など幅広い取引をサポートしています。' ],

				'works_1_tag'   => [ 'label' => __( '01 ラベル', 'office-rk' ), 'type' => 'text', 'default' => '土地売買仲介' ],
				'works_1_title' => [ 'label' => __( '01 見出し', 'office-rk' ), 'type' => 'text', 'default' => '土地・戸建・区分マンションの売却サポート' ],
				'works_1_text'  => [ 'label' => __( '01 本文', 'office-rk' ), 'type' => 'textarea', 'default' => '市場動向や物件の特性を踏まえた査定・販売戦略の立案から、購入希望者との条件調整、契約まで一貫してサポートいたします。' ],
				'works_1_image' => [ 'label' => __( '01 画像', 'office-rk' ), 'type' => 'image', 'default' => 'service2.jpg' ],

				'works_2_tag'   => [ 'label' => __( '02 ラベル', 'office-rk' ), 'type' => 'text', 'default' => '収益・事業用不動産' ],
				'works_2_title' => [ 'label' => __( '02 見出し', 'office-rk' ), 'type' => 'text', 'default' => '一棟収益物件・事業用不動産の売買サポート' ],
				'works_2_text'  => [ 'label' => __( '02 本文', 'office-rk' ), 'type' => 'textarea', 'default' => '投資目的や収益性、将来的な資産価値を考慮し、買主様・売主様双方の条件を調整しながら、円滑な取引をサポートしました。' ],
				'works_2_image' => [ 'label' => __( '02 画像', 'office-rk' ), 'type' => 'image', 'default' => 'service1.jpg' ],

				'works_3_tag'   => [ 'label' => __( '03 ラベル', 'office-rk' ), 'type' => 'text', 'default' => '不動産コンサルティング' ],
				'works_3_title' => [ 'label' => __( '03 見出し', 'office-rk' ), 'type' => 'text', 'default' => '相続・資産整理に伴う不動産活用相談' ],
				'works_3_text'  => [ 'label' => __( '03 本文', 'office-rk' ), 'type' => 'textarea', 'default' => '相続や資産整理に伴う不動産について、売却・保有・活用など複数の選択肢を比較し、お客様の状況に合わせた解決方法をご提案しました。' ],
				'works_3_image' => [ 'label' => __( '03 画像', 'office-rk' ), 'type' => 'image', 'default' => 'service3.jpg' ],
			],
		],
		'company' => [
			'title'  => __( '⑤ 会社概要', 'office-rk' ),
			'fields' => [
				'company_name'    => [ 'label' => __( '会社名', 'office-rk' ), 'type' => 'text', 'default' => '株式会社オフィスＲＫ' ],
				'company_ceo'     => [ 'label' => __( '代表者', 'office-rk' ), 'type' => 'text', 'default' => '代表取締役　桑原 健二／桑原 隆介' ],
				'company_address' => [ 'label' => __( '所在地', 'office-rk' ), 'type' => 'textarea', 'default' => '〒116-0013<br>東京都荒川区西日暮里4丁目1-20 西日暮里エーシービル106F' ],
				'company_tel'     => [ 'label' => __( '電話番号', 'office-rk' ), 'type' => 'tel', 'default' => '03-6820-7697' ],
				'company_founded' => [ 'label' => __( '設立', 'office-rk' ), 'type' => 'text', 'default' => '2024年10月' ],
				'company_biz'     => [ 'label' => __( '事業内容', 'office-rk' ), 'type' => 'textarea', 'default' => '不動産売買仲介事業<br>不動産買取事業<br>不動産コンサルティング事業<br>収益不動産・事業用不動産取引' ],
				'company_license' => [ 'label' => __( '宅地建物取引業免許', 'office-rk' ), 'type' => 'text', 'default' => '東京都知事（1）第112583号' ],
			],
		],
		'contact' => [
			'title'  => __( '⑥ お問い合わせ', 'office-rk' ),
			'fields' => [
				'contact_heading' => [ 'label' => __( '見出し', 'office-rk' ), 'type' => 'textarea', 'default' => '不動産に関するご相談は、<br>お気軽にお問い合わせください。' ],
				'contact_text_1'  => [ 'label' => __( '本文1段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '土地・戸建・マンション・収益物件・事業用不動産の売買、買取、資産活用など、不動産に関する様々なご相談を承っております。' ],
				'contact_text_2'  => [ 'label' => __( '本文2段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '売却をご検討されている方、購入をお考えの方、相続や資産整理など不動産に関するお悩みをお持ちの方まで、専門的な視点から丁寧に対応いたします。' ],
				'contact_text_3'  => [ 'label' => __( '本文3段落目', 'office-rk' ), 'type' => 'textarea', 'default' => '不動産会社様からの共同仲介・物件情報に関するお問い合わせも歓迎しております。' ],
				'contact_email'   => [ 'label' => __( 'メールアドレス', 'office-rk' ), 'type' => 'email', 'default' => 'office-rk.est@ymail.ne.jp' ],
				'contact_tel'     => [ 'label' => __( '電話番号', 'office-rk' ), 'type' => 'tel', 'default' => '03-6820-7697' ],
				'contact_hours'   => [ 'label' => __( '受付時間の注記', 'office-rk' ), 'type' => 'text', 'default' => '（平日 9:00〜18:00）' ],
			],
		],
		'footer'  => [
			'title'  => __( '⑦ フッター', 'office-rk' ),
			'fields' => [
				'footer_logo'      => [ 'label' => __( 'フッター用ロゴ（濃紺背景に映える画像／未設定ならテキストロゴ）', 'office-rk' ), 'type' => 'image', 'default' => '' ],
				'footer_address_1' => [ 'label' => __( '住所1行目', 'office-rk' ), 'type' => 'text', 'default' => '〒116-0013　東京都荒川区西日暮里4丁目1-20' ],
				'footer_address_2' => [ 'label' => __( '住所2行目', 'office-rk' ), 'type' => 'text', 'default' => '西日暮里エーシービル106F' ],
				'footer_tel'       => [ 'label' => __( '電話番号', 'office-rk' ), 'type' => 'tel', 'default' => '03-6820-7697' ],
				'footer_fax'       => [ 'label' => __( 'FAX番号', 'office-rk' ), 'type' => 'tel', 'default' => '03-6820-7698' ],
				'footer_email'     => [ 'label' => __( 'メールアドレス', 'office-rk' ), 'type' => 'email', 'default' => 'office-rk.est@ymail.ne.jp' ],
				'footer_copyright' => [ 'label' => __( 'コピーライト', 'office-rk' ), 'type' => 'text', 'default' => '© 2026 Office RK Inc. All Rights Reserved.' ],
			],
		],
	];
}

/**
 * カスタマイザーへセクション・設定・コントロールを登録する。
 */
add_action(
	'customize_register',
	function ( $wp_customize ) {
		$description = __( 'トップページに表示されるテキストと画像を編集できます。', 'office-rk' );

		if ( function_exists( 'get_field' ) ) {
			$description .= '<br><strong>' . esc_html__( 'ACF が有効です。', 'office-rk' ) . '</strong>'
				. esc_html__( '「固定ページ」でフロントページを編集した内容が優先されます。こちらは未入力項目の予備として機能します。', 'office-rk' );
		}

		$wp_customize->add_panel(
			'office_rk_panel',
			[
				'title'       => __( 'サイトの内容', 'office-rk' ),
				'description' => $description,
				'priority'    => 20,
			]
		);

		$priority = 10;

		foreach ( office_rk_customizer_map() as $section_id => $section ) {
			$wp_customize->add_section(
				'office_rk_' . $section_id,
				[
					'title'    => $section['title'],
					'panel'    => 'office_rk_panel',
					'priority' => $priority,
				]
			);
			$priority += 10;

			foreach ( $section['fields'] as $key => $field ) {
				$is_image = ( 'image' === $field['type'] );

				$wp_customize->add_setting(
					$key,
					[
						'default'           => $is_image ? office_rk_default_image_url( $field['default'] ) : $field['default'],
						'sanitize_callback' => office_rk_sanitize_callback( $field['type'] ),
						'transport'         => 'refresh',
					]
				);

				if ( $is_image ) {
					$wp_customize->add_control(
						new WP_Customize_Image_Control(
							$wp_customize,
							$key,
							[
								'label'   => $field['label'],
								'section' => 'office_rk_' . $section_id,
							]
						)
					);
					continue;
				}

				$wp_customize->add_control(
					$key,
					[
						'label'       => $field['label'],
						'section'     => 'office_rk_' . $section_id,
						'type'        => ( 'textarea' === $field['type'] ) ? 'textarea' : 'text',
						'description' => ( 'textarea' === $field['type'] ) ? __( '改行タグ &lt;br&gt; が使用できます。', 'office-rk' ) : '',
					]
				);
			}
		}
	}
);

/**
 * 項目の型に応じたサニタイズ関数名を返す。
 *
 * @param string $type フィールド型。
 * @return callable
 */
function office_rk_sanitize_callback( $type ) {
	switch ( $type ) {
		case 'image':
			return 'esc_url_raw';
		case 'email':
			return 'sanitize_email';
		case 'tel':
			return 'sanitize_text_field';
		default:
			return 'office_rk_sanitize_html';
	}
}

/**
 * 限定的な HTML（改行・強調など）だけを許可してサニタイズする。
 *
 * @param string $value 入力値。
 * @return string
 */
function office_rk_sanitize_html( $value ) {
	return wp_kses( $value, office_rk_allowed_html() );
}

/**
 * 出力時に許可する HTML タグ。
 *
 * @return array<string, array<string, array<int, string>>>
 */
function office_rk_allowed_html() {
	return [
		'br'     => [ 'class' => [] ],
		'span'   => [ 'class' => [] ],
		'strong' => [],
		'em'     => [],
		'small'  => [],
		'a'      => [
			'href'   => [],
			'class'  => [],
			'target' => [],
			'rel'    => [],
		],
	];
}

/**
 * テーマ同梱画像の URL を返す。
 *
 * @param string $filename ファイル名。
 * @return string
 */
function office_rk_default_image_url( $filename ) {
	if ( '' === $filename ) {
		return '';
	}
	return OFFICE_RK_URI . '/assets/images/' . $filename;
}
