<?php
/**
 * ACF（Advanced Custom Fields）連携。
 *
 * 固定ページ（フロントページ）の編集画面に、サイト内の全テキスト・画像の
 * 入力欄を表示する。ACF 無料版で動作するフィールドのみを使用しており、
 * リピーター等の有料機能には依存しない。
 *
 * ACF が未インストールでもテーマは動作する（その場合はカスタマイザーで編集）。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * カスタマイザーの項目定義から ACF フィールドグループを自動生成する。
 */
add_action(
	'acf/init',
	function () {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		$menu_order = 0;

		foreach ( office_rk_customizer_map() as $section_id => $section ) {
			$fields = [];

			foreach ( $section['fields'] as $key => $field ) {
				$fields[] = office_rk_acf_field( $key, $field );
			}

			acf_add_local_field_group(
				[
					'key'                   => 'group_office_rk_' . $section_id,
					'title'                 => $section['title'],
					'fields'                => $fields,
					'location'              => [
						[
							[
								'param'    => 'page_type',
								'operator' => '==',
								'value'    => 'front_page',
							],
						],
					],
					'menu_order'            => $menu_order,
					'position'              => 'normal',
					'style'                 => 'default',
					'label_placement'       => 'top',
					'instruction_placement' => 'label',
					'active'                => true,
					'description'           => __( 'トップページに表示される内容です。空欄にするとその項目は非表示になります。', 'office-rk' ),
				]
			);

			$menu_order++;
		}
	}
);

/**
 * 1件分の ACF フィールド定義を組み立てる。
 *
 * @param string               $key   フィールド名（カスタマイザーのキーと共通）。
 * @param array<string, mixed> $field 項目定義。
 * @return array<string, mixed>
 */
function office_rk_acf_field( $key, $field ) {
	$base = [
		'key'   => 'field_office_rk_' . $key,
		'label' => $field['label'],
		'name'  => $key,
		'wrapper' => [ 'width' => '' ],
	];

	switch ( $field['type'] ) {
		case 'image':
			return $base + [
				'type'          => 'image',
				'return_format' => 'url',
				'preview_size'  => 'medium',
				'library'       => 'all',
				'instructions'  => __( '未設定の場合はテーマ同梱の初期画像を表示します。', 'office-rk' ),
			];

		case 'textarea':
			return $base + [
				'type'         => 'textarea',
				'rows'         => 3,
				'new_lines'    => '',
				'default_value' => $field['default'],
				'instructions' => __( '改行タグ &lt;br&gt; が使えます。PCだけで改行したい場合は &lt;br class="br-pc"&gt; を使用します。', 'office-rk' ),
			];

		case 'email':
			return $base + [
				'type'          => 'email',
				'default_value' => $field['default'],
			];

		default:
			return $base + [
				'type'          => 'text',
				'default_value' => $field['default'],
			];
	}
}

/**
 * ACF に保存された値を取得する。
 *
 * フロントページに紐づく値のみを対象とする。
 * ACF 未導入・値なしの場合は null を返す（呼び出し元でカスタマイザーへフォールバック）。
 *
 * @param string $key フィールド名。
 * @return string|null
 */
function office_rk_acf_value( $key ) {
	if ( ! function_exists( 'get_field' ) ) {
		return null;
	}

	$front_id = (int) get_option( 'page_on_front' );

	if ( ! $front_id ) {
		return null;
	}

	$value = get_field( $key, $front_id );

	// 画像フィールドが配列で返る設定の場合に備える。
	if ( is_array( $value ) ) {
		$value = $value['url'] ?? '';
	}

	if ( null === $value || false === $value || '' === $value ) {
		return null;
	}

	return (string) $value;
}
