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
 * @return int The new length of the excerpt.
 */
function tn_custom_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);

/*
* Enable support for Post Thumbnails on posts and pages.
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support('post-thumbnails');

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
 * @global WP_Query $wp_query The main query object, used to determine the number of pages and the current page.
 *
 * @return void
 */
function custom_pagination()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

	$paged = absint( $wp_query->get( 'paged',  1 ) );
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination"><ul>' . "\n";

    /** Previous Post Link */
	$prev_posts_link = get_previous_posts_link();
	if ($prev_posts_link)
		printf('<li>%s</li>' . "\n", $prev_posts_link);

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
	$next_posts_link = get_next_posts_link();
    if ($next_posts_link)
        printf('<li>%s</li>' . "\n", $next_posts_link);

    echo '</ul></div>' . "\n";

}

// End Pagination code