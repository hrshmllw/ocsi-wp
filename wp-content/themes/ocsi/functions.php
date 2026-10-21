<?php
/**
 * OCSI theme setup.
 *
 * @package OCSI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme supports, menus, and assets.
 */
function ocsi_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 240, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );

	register_nav_menus(
		array(
			'primary' => 'Primary',
		)
	);
}
add_action( 'after_setup_theme', 'ocsi_setup' );

/**
 * Content width used by embeds.
 */
function ocsi_content_width() {
	$GLOBALS['content_width'] = 720;
}
add_action( 'after_setup_theme', 'ocsi_content_width', 0 );

/**
 * Front and editor fonts.
 */
function ocsi_enqueue_fonts() {
	wp_enqueue_style(
		'ocsi-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Manrope:wght@600;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'ocsi_enqueue_fonts' );
add_action( 'enqueue_block_editor_assets', 'ocsi_enqueue_fonts' );

/**
 * Front-end assets.
 */
function ocsi_enqueue_assets() {
	wp_enqueue_style( 'ocsi-style', get_stylesheet_uri(), array( 'ocsi-fonts' ), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'ocsi-nav', get_theme_file_uri( 'assets/js/nav.js' ), array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'ocsi_enqueue_assets' );

/**
 * Keep the public site free of comments. This is a corporate site, not a blog.
 */
function ocsi_disable_comments() {
	return false;
}
add_filter( 'comments_open', 'ocsi_disable_comments', 20 );
add_filter( 'pings_open', 'ocsi_disable_comments', 20 );

remove_action( 'wp_head', 'wp_generator' );

/**
 * Order directory archives alphabetically.
 *
 * @param WP_Query $query Main query.
 */
function ocsi_archive_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_post_type_archive( 'branch' ) || $query->is_post_type_archive( 'job' ) ) {
		$query->set( 'posts_per_page', 50 );
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'ocsi_archive_query' );

/**
 * Use the company name alone as the home page title.
 *
 * @param string $title Document title.
 * @return string
 */
function ocsi_document_title( $title ) {
	if ( is_front_page() ) {
		return 'Optimized Customer Solutions, Inc.';
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'ocsi_document_title' );

/**
 * Read a string meta value.
 *
 * @param int    $post_id Post ID.
 * @param string $key     Meta key.
 * @return string
 */
function ocsi_meta( $post_id, $key ) {
	$value = get_post_meta( $post_id, $key, true );
	return is_string( $value ) ? $value : '';
}

/**
 * Human label for an employment type slug.
 *
 * @param string $value Stored value.
 * @return string
 */
function ocsi_employment_label( $value ) {
	$labels = array(
		'full-time'   => 'Full-time',
		'contractual' => 'Contractual',
		'other'       => 'Other',
	);

	return $labels[ $value ] ?? '';
}

/**
 * Format a stored Y-m-d date with the site date format.
 *
 * @param string $value Stored date.
 * @return string
 */
function ocsi_format_date( $value ) {
	if ( ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $value ) ) {
		return '';
	}

	$timestamp = strtotime( $value . ' 00:00:00' );
	if ( ! $timestamp ) {
		return '';
	}

	return wp_date( get_option( 'date_format' ), $timestamp );
}

/**
 * Print a page's editor content when an editor has added some.
 */
function ocsi_the_editable_content() {
	$content = get_post_field( 'post_content', get_the_ID() );
	if ( ! is_string( $content ) || '' === trim( wp_strip_all_tags( $content ) ) ) {
		return;
	}

	echo '<div class="entry">';
	the_content();
	echo '</div>';
}

/**
 * Query published branches or vacancies.
 *
 * @param string $post_type branch or job.
 * @param int    $count     Maximum posts.
 * @return WP_Query
 */
function ocsi_directory_query( $post_type, $count = 50 ) {
	return new WP_Query(
		array(
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			'posts_per_page' => $count,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'no_found_rows'  => true,
		)
	);
}

/**
 * Permalink for a page slug, or the home URL.
 *
 * @param string $slug Page slug.
 * @return string
 */
function ocsi_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post ) {
		return get_permalink( $page );
	}

	return home_url( '/' );
}

/**
 * Fallback links when a menu has not been assigned.
 */
function ocsi_primary_menu_fallback() {
	$items = array(
		'about-ocsi'   => 'About OCSI',
		'capabilities' => 'Capabilities',
		'our-network'  => 'Our Network',
		'our-partners' => 'Our Partners',
		'careers'      => 'Careers',
	);

	echo '<ul class="site-nav__list">';
	foreach ( $items as $slug => $label ) {
		echo '<li><a href="' . esc_url( ocsi_page_url( $slug ) ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}
