<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

//*****************************************************
//*********************** ACF *************************
//*****************************************************

// Add the options page to admin
// https://www.advancedcustomfields.com/resources/options-page/

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

//*****************************************************
//***************** CSS / JS Load-in ******************
//*****************************************************

// https://www.wpbeginner.com/wp-tutorials/how-to-properly-add-javascripts-and-styles-in-wordpress/


// Javascript Load In
// Jquery is being loaded into this file via webpack
function scripts_loadin()
{
    wp_enqueue_script('frontend', get_template_directory_uri() . '/assets/public/js/frontend.js');
}

add_action('wp_enqueue_scripts', 'scripts_loadin');


// Styles Load In
function load_styles()
{
    wp_enqueue_style('frontend', get_template_directory_uri() . '/assets/public/css/frontend.css');
}

add_action('wp_enqueue_scripts', 'load_styles');


//*****************************************************
//******************* M E N U S ***********************
//*****************************************************

// Adds the navwalker for the main Menu.
require_once("nav_walker.php");

/*
 * Registers the new menus
 * https://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
 *
*/

//*********** Main Navbar ***********
function main_navigation()
{
    register_nav_menu('main-navigation', ('Main Navigation'));
}

add_action('init', 'main_navigation');


//*********** Header Top Bar ***********
function top_bar()
{
    register_nav_menu('top-bar', ('Top Bar'));
}

add_action('init', 'top_bar');

//*********** Footer ***********
function register_col_1()
{
    register_nav_menu('footer-column-1', ('Footer Column 1'));
}

add_action('init', 'register_col_1');



//*****************************************************
//***************** W P P O S T S *********************
//*****************************************************

// Limits how long the excerpt can be.
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


// Pagination
function wpbeginner_numeric_posts_nav()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
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
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link());

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
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link());

    echo '</ul></div>' . "\n";

}
// End Pagination code