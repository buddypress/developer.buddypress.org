<?php

require __DIR__ . '/inc/template-tags.php';

function bbporg_developer_enqueue_css() {
	$parent = 'wpdeveloper';
	$child = 'bbpdeveloper';

	wp_enqueue_style( $parent, get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'bb-base', 'https://bbpress.org/wp-content/themes/bb-base/style.css', array( $parent ) );
	wp_enqueue_style( 'bb-root', 'https://bbpress.org/wp-content/themes/bb-base/style-bbpress.css', array( $parent ) );
	wp_enqueue_style( 'bb-child', 'https://bbpress.org/wp-content/themes/bbpress-org/style.css', array( $parent ) );

	#wp_enqueue_style( $child, get_stylesheet_directory_uri() . '/style.css', array( $parent ) );
}
add_action( 'wp_enqueue_scripts', 'bbporg_developer_enqueue_css' );
