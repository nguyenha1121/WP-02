<?php
/*
 Template Name: Archive
 */
 ?>
 <?php get_header(); ?>


		
	<div id="primary" class="content-area container">
	
		<div class="row">
			<div class="col-md-1 col-xs-1 col-sm-1"></div>
			<main id="main-archives" class="site-main col-md-10 col-sm-10 col-xs-10" role="main">
			<?php
				echo '<h2 class="title-about">'. get_the_title().'</h2>'; ?>
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<p class="ssss"><?php echo the_content(); ?></p>
			 <?php endwhile; endif; ?>	
			 <hr>
			 <div class="content-archive">
			 	<div class="row">
			 		<div class="col-md-3">
			 			<h2><?php echo __('Authors','wp_02'); ?></h2>
			 			<ul>
						<?php 
							wp_list_authors( array(
							    'show_fullname' => 1,
							    'optioncount'   => 1,
							    'orderby'       => 'post_count',
							    'order'         => 'DESC',
							    'number'        => 3
							) );
						    ?>
						    </ul>
			 			<h2><?php echo __('Categories','wp_02'); ?></h2>
			 			<ul>
			 				<?php wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) ); ?>
			 			</ul>
			 		</div>
			 		<div class="col-md-3"></div>
			 		<div class="col-md-6">
			 			<?php the_widget( 'WP_Widget_Recent_Posts',array('title'=>'Latest Post') );?>
			 			<h2><?php echo __('Posts by Month','wp_02'); ?></h2>
			 			<?php wp_02_monthly(); ?>
			 		</div>
			 	</div>
			 </div>		
			</main><!-- #main -->
			<div class="col-md-1 col-xs-1 col-sm-1"></div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();