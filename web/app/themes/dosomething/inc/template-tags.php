<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dosomething
 */

if ( ! function_exists( 'dosomething_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dosomething_posted_on($show_author = true, $show_categories = true) {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'dosomething' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'dosomething' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	if($show_author) {
		echo '<span class="byline"> ' . $byline . '</span>';
	}

	// Hide category and tag text for pages.
	if ( $show_categories && 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'dosomething' ) );
		if ( $categories_list && dosomething_categorized_blog() ) {
			printf( ' <span class="cat-links">' . esc_html__( 'in %1$s', 'dosomething' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link( esc_html__( 'Edit', 'dosomething' ), '<span class="edit-link"> - ', '</span>' );

}
endif;

if ( ! function_exists( 'dosomething_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dosomething_entry_footer() {
	// ...
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function dosomething_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'dosomething_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'dosomething_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so dosomething_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so dosomething_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in dosomething_categorized_blog.
 */
function dosomething_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'dosomething_categories' );
}
add_action( 'edit_category', 'dosomething_category_transient_flusher' );
add_action( 'save_post',     'dosomething_category_transient_flusher' );


/**
 * Get the URL of the post's featured image.
 *
 * @param int $post_id
 * @param string $size
 * @return
 */
function dosomething_featured_image_url($post_id = null, $size = 'post-large') {
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), $size );
	return $thumb['0'];
}