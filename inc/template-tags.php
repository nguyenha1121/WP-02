<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Wp_02
 */

if ( ! function_exists( 'wp_02_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wp_02_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'M j ' ) ),
		esc_html( get_the_date('M j ') ),
		esc_attr( get_the_modified_date( 'M j ' ) ),
		esc_html( get_the_modified_date('M j ') )
	);

	$posted_on = sprintf(
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'wp_02' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'wp_02_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wp_02_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'wp_02' ) );
		if ( $categories_list && wp_02_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wp_02' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wp_02' ) );
		if ( $tags_list ) {
			printf( '<p class="tags-links">' . esc_html__( '%1$s', 'wp_02' ) . '</p>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp_02' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'wp_02' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wp_02_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wp_02_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wp_02_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wp_02_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wp_02_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in wp_02_categorized_blog.
 */
function wp_02_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'wp_02_categories' );
}
add_action( 'edit_category', 'wp_02_category_transient_flusher' );
add_action( 'save_post',     'wp_02_category_transient_flusher' );




function wp_02_format_post(){
 	if (get_post_format() == 'image') echo 'I Do Observe';
 	elseif (has_post_format('quote')) echo 'I Do Quote';
 	elseif (has_post_format('video')) echo 'I Do Watch';
 	elseif (has_post_format('gallery')) echo 'I Do Photo';
 	elseif (has_post_format('Audio')) echo 'I Do Listen';
 	elseif (has_post_format('link')) echo 'I Do Share';
 	elseif (has_post_format('status')) echo 'I Think';
 	else echo 'I Do Travel';
 	// elseif (has_post_format('gallery')) echo 'Do Photo';

 }


function wp_02_readmore(){
	return '<a class="excerpt-but" href="'.get_permalink(get_the_ID()).'">'.__('Read More','wp_02').'</a>';
}
 add_filter('excerpt_more','wp_02_readmore');

if(!function_exists('wp_02_entry_content')){
	function wp_02_entry_content(){
		the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More ', 'wp_02' ), array( 'div' => array( 'class' => array() ) ) ),
				the_title( '<div class="screen-reader-text">"', '"</div>')
			) );
		//tag link
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wp_02' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'wp_02' ) . '</span>', '#'.$tags_list ); // WPCS: XSS OK.
		}
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp_02' ),
			'after'  => '</div>',
		) );	

	}
}


 /**
Ham them nut read more
**/

