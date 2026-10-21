<?php
/**
 * Plugin Name: OCSI Core
 * Description: Branch directory and job vacancies for the OCSI website.
 * Version: 0.1.0
 * Requires at least: 6.6
 * Requires PHP: 8.0
 * Author: OCSI
 * Text Domain: ocsi-core
 *
 * @package OCSI_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the branch and job content types.
 */
function ocsi_core_register_post_types() {
	register_post_type(
		'branch',
		array(
			'labels'              => ocsi_core_labels( 'Branch', 'Branches' ),
			'public'              => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-location',
			'menu_position'       => 21,
			'has_archive'         => true,
			'rewrite'             => array( 'slug' => 'branches' ),
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			'exclude_from_search' => false,
		)
	);

	register_post_type(
		'job',
		array(
			'labels'              => ocsi_core_labels( 'Vacancy', 'Vacancies' ),
			'public'              => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-id',
			'menu_position'       => 22,
			'has_archive'         => true,
			'rewrite'             => array( 'slug' => 'jobs' ),
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'supports'            => array( 'title', 'editor', 'excerpt', 'revisions' ),
			'exclude_from_search' => false,
		)
	);
}
add_action( 'init', 'ocsi_core_register_post_types' );

/**
 * Build post type labels.
 *
 * @param string $singular Singular label.
 * @param string $plural   Plural label.
 * @return array<string, string>
 */
function ocsi_core_labels( $singular, $plural ) {
	return array(
		'name'          => $plural,
		'singular_name' => $singular,
		'add_new_item'  => 'Add new ' . strtolower( $singular ),
		'edit_item'     => 'Edit ' . strtolower( $singular ),
		'view_item'     => 'View ' . strtolower( $singular ),
		'search_items'  => 'Search ' . strtolower( $plural ),
		'not_found'     => 'No ' . strtolower( $plural ) . ' found.',
	);
}

/**
 * Field definitions for a post type.
 *
 * Responsibilities and qualifications for a vacancy belong in the post
 * editor. This plugin does not accept CV uploads.
 *
 * @param string $post_type Post type name.
 * @return array<int, array<string, mixed>>
 */
function ocsi_core_fields( $post_type ) {
	if ( 'branch' === $post_type ) {
		return array(
			array(
				'key'   => '_ocsi_address',
				'label' => 'Address',
				'type'  => 'text',
			),
			array(
				'key'   => '_ocsi_region',
				'label' => 'Region or service area',
				'type'  => 'text',
			),
			array(
				'key'   => '_ocsi_phone',
				'label' => 'Phone',
				'type'  => 'text',
			),
			array(
				'key'   => '_ocsi_hours',
				'label' => 'Operating hours',
				'type'  => 'text',
			),
			array(
				'key'   => '_ocsi_map_url',
				'label' => 'Map or directions link',
				'type'  => 'url',
			),
		);
	}

	if ( 'job' === $post_type ) {
		return array(
			array(
				'key'   => '_ocsi_department',
				'label' => 'Department',
				'type'  => 'text',
			),
			array(
				'key'   => '_ocsi_location',
				'label' => 'Location',
				'type'  => 'text',
			),
			array(
				'key'     => '_ocsi_employment_type',
				'label'   => 'Employment type',
				'type'    => 'select',
				'options' => array(
					''            => 'Not set',
					'full-time'   => 'Full-time',
					'contractual' => 'Contractual',
					'other'       => 'Other',
				),
			),
			array(
				'key'   => '_ocsi_closing_date',
				'label' => 'Closing date',
				'type'  => 'date',
			),
			array(
				'key'   => '_ocsi_apply_url',
				'label' => 'Apply link',
				'type'  => 'url',
			),
		);
	}

	return array();
}

/**
 * Register meta for the REST API and sanitization.
 */
function ocsi_core_register_meta() {
	foreach ( array( 'branch', 'job' ) as $post_type ) {
		foreach ( ocsi_core_fields( $post_type ) as $field ) {
			register_post_meta(
				$post_type,
				$field['key'],
				array(
					'type'              => 'string',
					'single'            => true,
					'show_in_rest'      => true,
					'sanitize_callback' => function ( $value ) use ( $field ) {
						return ocsi_core_sanitize_field( $field, $value );
					},
					'auth_callback'     => function () {
						return current_user_can( 'edit_posts' );
					},
				)
			);
		}
	}
}
add_action( 'init', 'ocsi_core_register_meta' );

/**
 * Sanitize one field value.
 *
 * @param array<string, mixed> $field Field definition.
 * @param mixed                $value Raw value.
 * @return string
 */
function ocsi_core_sanitize_field( $field, $value ) {
	$value = is_string( $value ) ? trim( $value ) : '';

	if ( 'url' === $field['type'] ) {
		return esc_url_raw( $value );
	}

	if ( 'date' === $field['type'] ) {
		return preg_match( '/^\d{4}-\d{2}-\d{2}$/', $value ) ? $value : '';
	}

	if ( 'select' === $field['type'] ) {
		$options = isset( $field['options'] ) && is_array( $field['options'] ) ? $field['options'] : array();
		return array_key_exists( $value, $options ) ? $value : '';
	}

	return sanitize_text_field( $value );
}

/**
 * Add the details meta box.
 *
 * @param string  $post_type Post type.
 * @param WP_Post $post      Post object.
 */
function ocsi_core_add_meta_box( $post_type, $post ) {
	unset( $post );
	if ( ! ocsi_core_fields( $post_type ) ) {
		return;
	}

	add_meta_box(
		'ocsi-core-details',
		'job' === $post_type ? 'Vacancy details' : 'Branch details',
		'ocsi_core_render_meta_box',
		$post_type,
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'ocsi_core_add_meta_box', 10, 2 );

/**
 * Render the details meta box.
 *
 * @param WP_Post $post Post object.
 */
function ocsi_core_render_meta_box( $post ) {
	$fields = ocsi_core_fields( $post->post_type );
	wp_nonce_field( 'ocsi_core_save', 'ocsi_core_nonce' );

	if ( 'job' === $post->post_type ) {
		echo '<p>Write responsibilities and qualifications in the main editor. Do not collect CVs on this site.</p>';
	}

	echo '<table class="form-table" role="presentation"><tbody>';
	foreach ( $fields as $field ) {
		$key   = $field['key'];
		$value = get_post_meta( $post->ID, $key, true );
		$value = is_string( $value ) ? $value : '';
		$id    = 'ocsi-core-' . $key;

		echo '<tr><th scope="row"><label for="' . esc_attr( $id ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';

		if ( 'select' === $field['type'] ) {
			echo '<select id="' . esc_attr( $id ) . '" name="' . esc_attr( $key ) . '">';
			foreach ( $field['options'] as $option_value => $option_label ) {
				echo '<option value="' . esc_attr( $option_value ) . '" ' . selected( $value, $option_value, false ) . '>' . esc_html( $option_label ) . '</option>';
			}
			echo '</select>';
		} else {
			$type = 'date' === $field['type'] ? 'date' : ( 'url' === $field['type'] ? 'url' : 'text' );
			echo '<input class="regular-text" type="' . esc_attr( $type ) . '" id="' . esc_attr( $id ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '">';
		}

		echo '</td></tr>';
	}
	echo '</tbody></table>';
}

/**
 * Save details from the meta box.
 *
 * @param int $post_id Post ID.
 */
function ocsi_core_save( $post_id ) {
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
		return;
	}

	$fields = ocsi_core_fields( get_post_type( $post_id ) );
	if ( ! $fields ) {
		return;
	}

	if ( ! isset( $_POST['ocsi_core_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ocsi_core_nonce'] ) ), 'ocsi_core_save' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( $fields as $field ) {
		$key   = $field['key'];
		$raw   = isset( $_POST[ $key ] ) ? wp_unslash( $_POST[ $key ] ) : '';
		$value = ocsi_core_sanitize_field( $field, $raw );
		if ( '' === $value ) {
			delete_post_meta( $post_id, $key );
		} else {
			update_post_meta( $post_id, $key, $value );
		}
	}
}
add_action( 'save_post', 'ocsi_core_save' );

/**
 * Add list-table columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function ocsi_core_branch_columns( $columns ) {
	$columns['ocsi_region'] = 'Region';
	$columns['ocsi_phone']  = 'Phone';
	return $columns;
}
add_filter( 'manage_branch_posts_columns', 'ocsi_core_branch_columns' );

/**
 * Add vacancy list-table columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function ocsi_core_job_columns( $columns ) {
	$columns['ocsi_department'] = 'Department';
	$columns['ocsi_location']   = 'Location';
	return $columns;
}
add_filter( 'manage_job_posts_columns', 'ocsi_core_job_columns' );

/**
 * Render a custom list-table column.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function ocsi_core_column( $column, $post_id ) {
	$map = array(
		'ocsi_region'     => '_ocsi_region',
		'ocsi_phone'      => '_ocsi_phone',
		'ocsi_department' => '_ocsi_department',
		'ocsi_location'   => '_ocsi_location',
	);

	if ( ! isset( $map[ $column ] ) ) {
		return;
	}

	$value = get_post_meta( $post_id, $map[ $column ], true );
	echo esc_html( is_string( $value ) && '' !== $value ? $value : '—' );
}
add_action( 'manage_branch_posts_custom_column', 'ocsi_core_column', 10, 2 );
add_action( 'manage_job_posts_custom_column', 'ocsi_core_column', 10, 2 );

/**
 * Flush rewrite rules after the content types exist.
 */
function ocsi_core_activate() {
	ocsi_core_register_post_types();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ocsi_core_activate' );

/**
 * Flush rewrite rules on deactivation.
 */
function ocsi_core_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'ocsi_core_deactivate' );
