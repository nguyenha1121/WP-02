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
	<header class="entry-header-video">
		<?php 
			$links = get_post_meta($post->ID,'_link',true);
			echo $links;
		?>
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
