<?php namespace DevHub;
/**
 * The Template for displaying all single posts.
 *
 * @package wporg-developer
 */

get_header(); ?>

	<div id="content-area" class="has-sidebar">

		<?php breadcrumb_trail(); ?>

		<main id="main" <?php post_class( 'site-main' ); ?> role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'handbook'); ?>

			<?php wporg_developer_post_nav_via_menu( 'Theme Table of Contents' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>