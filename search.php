<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Wp_02
 */

get_header(); ?>

	<section id="primary" class="content-area container">
		<div class="col-md-1 col-sm-1 col-xs-1"></div>
		<main id="main-search-result" class="site-main col-md-10 col-sm-10 col-xs-10" role="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for << %s  >>', 'wp_02' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<p><?php 
					/* Search Count */ 
					$allsearch = new WP_Query("s=$s&showposts=0"); 
					echo $allsearch ->found_posts; echo __(' Items Founds .','wp_02');
					?>
				</p>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			//the_posts_navigation();
			page_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
			<div class="col-md-1 col-sm-1 col-xs-1"></div>
	</section><!-- #primary -->

<?php

get_footer();
