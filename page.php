<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wp_02
 */

get_header(); ?>


		
	<div id="primary" class="content-area container">
	<div class="col-md-1 col-xs-1 col-sm-1"></div>
		<main id="main" class="site-main col-md-10 col-sm-10 col-xs-10" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<div class="col-md-1 col-xs-1 col-sm-1"></div>
	</div><!-- #primary -->

<?php
get_footer();
