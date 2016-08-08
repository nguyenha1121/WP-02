<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wp_02
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-'.get_post_format()); ?>>
	<header class="entry-header">
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
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			wp_02_entry_content();
		?>
	</div><!-- .entry-content -->
<?php //wp_02_pagination(); ?>
</article><!-- #post-## -->
