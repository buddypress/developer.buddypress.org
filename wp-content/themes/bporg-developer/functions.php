<?php

function bporg_developer_enqueue_css() {
	$parent = 'wpdeveloper';
	$child = 'bpdeveloper';

	wp_enqueue_style( $parent, get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( $child, get_stylesheet_directory_uri() . '/style.css', array( $parent ) );
}
add_action( 'wp_enqueue_scripts', 'bporg_developer_enqueue_css' );
