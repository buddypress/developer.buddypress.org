<?php

require __DIR__ . '/inc/template-tags.php';

function bporg_developer_enqueue_css() {
	$parent = 'wpdeveloper';
	$child = 'bpdeveloper';

	wp_enqueue_style( $parent, get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'bp-legacy-css', 'https://buddypress.org/wp-content/plugins/buddypress/bp-templates/bp-legacy/css/buddypress.min.css', array( $parent ) );
	wp_enqueue_style( 'bb-base', 'https://buddypress.org/wp-content/themes/bb-base/style.css', array( $parent ) );
	wp_enqueue_style( 'bb-root', 'https://buddypress.org/wp-content/themes/bb-base/style-buddypress.css', array( $parent ) );
	wp_enqueue_style( 'bb-child', 'https://buddypress.org/wp-content/themes/buddypress-org/style.css', array( $parent ) );

	#wp_enqueue_style( $child, get_stylesheet_directory_uri() . '/style.css', array( $parent ) );
}
add_action( 'wp_enqueue_scripts', 'bporg_developer_enqueue_css' );
