<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			// 	 echo do_shortcode('[wpdevart_facebook_comment curent_url="http://developers.facebook.com/docs/plugins/comments/" order_type="social" title_text="Facebook Comment" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#CCCCCC" animation_effect="random" count_of_comments="2" ]'); 
			// endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<div class="col-md-1 col-xs-1 col-sm-1"></div>
	</div><!-- #primary -->

<?php
get_footer();
