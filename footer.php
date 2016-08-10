<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp_02
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		 <div class="container">
		 	<div class="row"><div class="col-md-2 col-sm-2 col-xs-2"></div> 		
		 		<div class="col-md-8 col-sm-8 col-xs-8 main-footer">
		 			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		 			<?php  
		 				wp_02_menus(); 
		 				wp_02_copyright();
		 			?>

			 		<div class="nav-link">
			 			<p><?php my_social_media_icons (); ?></p>
			 		</div>
		 		</div>
		 		<div class="col-md-2 col-sm-2 col-xs-2"></div> 	</div>
	 		
	 	</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
