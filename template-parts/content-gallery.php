<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wp_02
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-contentsssssss e-'.get_post_format()); ?>>
	<header class="entry-header">
		<?php 
			$gallery = get_post_gallery($post,false);
			$ids = explode( ",", $gallery['ids'] );
				if (isset($gallery)&&!empty($ids)){
					echo '<div class = "father">';
					echo '<div class="carousel">';
					foreach ($ids as $id) {
						$link   = wp_get_attachment_url( $id );
						echo'<a class="carousel-item"><img src="'.esc_url($link).'"></a>';
					}
					echo '</div>';
					echo '</div>';
				
			}
		?>


		    
	<!-- 	    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2"></a>
		    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3"></a>
		    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4"></a>
		    <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5"></a> -->
		  

	</header><!-- .entry-header -->

	<div <?php post_class('entry-content post-'.get_post_format()); ?>>
		<div class="entry-meta">
			<?php wp_02_posted_on(); ?>
			<div class="post-format">
				<?php wp_02_format_post(); ?>
			</div>
		</div><!-- .entry-meta -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
		<?php
			wp_02_entry_content();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
