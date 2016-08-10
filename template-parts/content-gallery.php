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
			echo '<div id="owl-demo" class="owl-carousel owl-theme">';
			foreach ($ids as $id) {
				$link   = wp_get_attachment_url( $id );
				echo'<div class="item"><img src="'.esc_url($link).'"></div>';
			}
			echo '</div>';
		?>
	</header><!-- .entry-header -->

 
<!--   <div class="item"><img src="assets/fullimage1.jpg" alt="The Last of us"></div>
  <div class="item"><img src="assets/fullimage2.jpg" alt="GTA V"></div>
  <div class="item"><img src="assets/fullimage3.jpg" alt="Mirror Edge"></div> -->
 

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
