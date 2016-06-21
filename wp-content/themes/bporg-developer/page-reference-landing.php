<?php
/**
 * The template for displaying the Code Reference landing page.
 *
 * Template Name: Reference
 *
 * @package wporg-developer
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<div id="content-area">
			<?php breadcrumb_trail(); ?>
		</div>

		<main id="main" class="site-main" role="main">
			<div class="reference-landing">
				<div class="search-guide section clear">
					<h4 class="ref-intro"><?php _e( 'Want to know what&#39;s going on inside bbPress? Search the Code Reference for more information about bbPress&#39; functions, classes, methods, and hooks.', 'wporg' ); ?></h4>
					<h3 class="search-intro"><?php _e( 'Try it out:', 'wporg' ); ?></h3>
					<?php get_search_form(); ?>
				</div><!-- /search-guide -->

				<div class="topic-guide section">
					<h4><?php _e( 'Or browse through topics:', 'wporg' ); ?></h4>
					<ul class="unordered-list horizontal-list no-bullets">
						<li><a href="<?php echo get_post_type_archive_link( 'wp-parser-function' ) ?>"><?php _e( 'Functions', 'wporg' ); ?></a></li>
						<li><a href="<?php echo get_post_type_archive_link( 'wp-parser-hook' ) ?>"><?php _e( 'Hooks', 'wporg' ); ?></a></li>
						<li><a href="<?php echo get_post_type_archive_link( 'wp-parser-class' ) ?>"><?php _e( 'Classes', 'wporg' ); ?></a></li>
						<li><a href="<?php echo get_post_type_archive_link( 'wp-parser-method' ) ?>"><?php _e( 'Methods', 'wporg' ); ?></a></li>
					</ul>
				</div><!-- /topic-guide -->

				<div class="new-in-guide section two-columns clear">
					<div class="widget box gray">
						<h3 class="widget-title"><?php $version = bbPressDevHub\get_current_version_term(); printf( __( 'New &amp; Updated in bbPress %s:', 'wporg' ), substr( $version->name, 0, -2 ) ); ?></h3>
						<div class="widget-content">
							<ul class="unordered-list no-bullets">
								<?php

								$list = new WP_Query( array(
									'posts_per_page' => 13,
									'post_type'      => bbPressDevHub\get_parsed_post_types(),
									'orderby'        => 'title',
									'order'          => 'ASC',
									'tax_query'      => array( array(
										'taxonomy' => 'wp-parser-since',
										'field'    => 'ids',
										'terms'    => $version->term_id,
									) ),
								) );

								while ( $list->have_posts() ) : $list->the_post();

									echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';

								endwhile;
								?>
								<li class="view-all-new-in"><a href="<?php echo esc_attr( get_term_link( $version, 'wp-parser-since' ) ); ?>"><?php _e( 'View all&hellip;', 'wporg' ); ?></a></li>
							</ul>
						</div>
					</div>
					<div class="widget box gray">
						<h3 class="widget-title"><?php _e( 'API', 'wporg' ); ?></h3>
						<div class="widget-content">
							<ul class="unordered-list no-bullets">
							</ul>
						</div>
					</div>
				</div><!-- /new-in-guide -->

			</div><!-- /reference-landing -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
