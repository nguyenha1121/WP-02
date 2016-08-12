<?php
/*
 Template Name: About
 */
 ?>
 <?php get_header(); ?>


		
	<div id="primary" class="content-area container">
	
		<div class="row">
			<div class="col-md-1 col-xs-1 col-sm-1"></div>
			<main id="main-about" class="site-main col-md-10 col-sm-10 col-xs-10" role="main">
			<?php
				echo '<h2 class="title-about">'. get_the_title().'</h2>'; ?>
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<p class="ssss"><?php echo the_content(); ?></p>
			 <?php endwhile; endif; ?>			
			</main><!-- #main -->
			<div class="col-md-1 col-xs-1 col-sm-1"></div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();