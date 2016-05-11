<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package wporg-developer
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function wporg_developer_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'wporg_developer_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wporg_developer_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'wporg_developer_body_classes' );

/**
 * Filters document title to add context based on what is being viewed.
 *
 * @param array $parts The document title parts.
 * @return array The document title parts.
 */
function wporg_developer_document_title( $parts ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $parts;
	}

	$title = $parts['title'];
	$sep = '|';

	$post_type = get_query_var( 'post_type' );

	// Omit 'Home' from the home page.
	if ( 'Home' === $title ) {
		$title = '';
	}
	// Add post type to title if it's a parsed item.
	elseif ( is_singular() && \DevHub\is_parsed_post_type( $post_type ) ) {
		if ( $post_type_object = get_post_type_object( $post_type ) ) {
			$title .= " $sep " . get_post_type_object( $post_type )->labels->singular_name;
		}
	}
	// Add handbook name to title if relevent
	elseif ( is_singular() && false !== strpos( $post_type, 'handbook' ) ) {
		if ( $post_type_object = get_post_type_object( $post_type ) ) {
			$handbook_label = " $sep " . get_post_type_object( $post_type )->labels->name;
			$handbook_name  = " $sep " . \WPorg_Handbook::get_name( $post_type ) . " Handbook";

			// Replace title with handbook name if this is landing page for the handbook
			if ( $title == $handbook_label ) {
				$title = $handbook_name;
			// Otherwise, append the handbook name
			} else {
				$title .= $handbook_name;
			}
		}
	}

	// Add a page number if necessary:
	if ( isset( $parts['page'] ) && $parts['page'] >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'wporg' ), $parts['page'] );
	}

	$parts['title'] = $title;
	return $parts;
}
add_filter( 'document_title_parts', 'wporg_developer_document_title' );

/**
 * Prefixes excerpts for archive view with content type label.
 *
 * @param  string $excerpt The excerpt.
 * @return string
 */
function wporg_filter_archive_excerpt( $excerpt ) {
	if ( ! is_single() ) {
		$excerpt = '<b>' . get_post_type_object( get_post_type( get_the_ID() ) )->labels->singular_name . ': </b>' . $excerpt;
	}

	return $excerpt;
}
add_filter( 'get_the_excerpt', 'wporg_filter_archive_excerpt' );

/**
 * Appends parentheses to titles in archive view for functions and methods.
 *
 * @param  string      $title The title.
 * @param  int|WP_Post $post  Optional. The post ID or post object.
 * @return string
 */
function wporg_filter_archive_title( $title, $post = null ) {
	if ( ! is_admin() && $post && ( ! is_single() || doing_filter( 'single_post_title' ) ) && in_array( get_post_type( $post ), array( 'wp-parser-function', 'wp-parser-method' ) ) ) {
		$title .= '()';
	}

	return $title;
}
add_filter( 'the_title',         'wporg_filter_archive_title', 10, 2 );
add_filter( 'single_post_title', 'wporg_filter_archive_title', 10, 2 );
