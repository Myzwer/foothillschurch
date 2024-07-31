<?php
/**
 * WP Posts
 *
 * This file contains functions related to WordPress posts, including excerpt length,
 * post thumbnails support, and pagination.
 *
 * Usage: These functions are included in functions.php to enhance the post-related features
 * of the WordPress theme.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */


/**
 * Changes the length of the excerpt.
 *
 * @param int $length The original length of the excerpt.
 *
 * @return int The new length of the excerpt.
 */
function tn_custom_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

/*
* Enable support for Post Thumbnails on posts and pages.
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support( 'post-thumbnails' );

/**
 * Displays the pagination navigation for the posts list.
 *
 * This function creates a numeric pagination, which includes links to previous and next pages,
 * links to the first and last pages, and links to 2 pages before and after the current page.
 * It provides ellipses for gaps in the page sequence.
 *
 * Note: Pagination will not be displayed if there's only one page.
 * Also, it's intended to work on archive-like pages. For single posts/pages, it does nothing.
 *
 * @return void
 * @global WP_Query $wp_query The main query object, used to determine the number of pages and the current page.
 *
 */
function custom_pagination(): void {

	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = absint( $wp_query->get( 'paged' ) ) ? absint( $wp_query->get( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	echo '<div class="pagination"><ul>' . "\n";

	/** Link to first page */
	if ( $paged > 1 ) {
		echo '<li><a href="' . esc_url( get_pagenum_link( 1 ) ) . '"><<</a></li>' . "\n";
	} else {
		echo '<li class="disabled"><<</li>' . "\n";
	}

	/** Previous Post Link */
	if ( get_previous_posts_link() ) {
		echo '<li>' . get_previous_posts_link( '<' ) . '</li>' . "\n";
	} else {
		echo '<li class="disabled"><</li>' . "\n";
	}

	/** Current page out of total pages */
	echo '<li class="current-page">' . $paged . ' of ' . $max . '</li>' . "\n";

	/** Next Post Link */
	if ( get_next_posts_link() ) {
		echo '<li>' . get_next_posts_link( '>' ) . '</li>' . "\n";
	} else {
		echo '<li class="disabled">></li>' . "\n";
	}

	/** Link to last page */
	if ( $paged < $max ) {
		echo '<li><a href="' . esc_url( get_pagenum_link( $max ) ) . '">>></a></li>' . "\n";
	} else {
		echo '<li class="disabled">>></li>' . "\n";
	}

	echo '</ul></div>' . "\n";
}


// End Pagination code