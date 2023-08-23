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

//*****************************************************
//**************** CUSTOM TAXONOMIES ******************
//*****************************************************

/**
 * Register a custom post type called "Event".
 *
 * @see get_post_type_labels() for label keys.
 */
function event_init()
{
    $labels = array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
        'menu_name' => __('Events'),
        'name_admin_bar' => __('Event'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Event'),
        'new_item' => __('New Event'),
        'edit_item' => __('Edit Event'),
        'view_item' => __('View Event'),
        'all_items' => __('All Events'),
        'search_items' => __('Search Events'),
        'parent_item_colon' => __('Parent Events:'),
        'not_found' => __('No Events found.'),
        'not_found_in_trash' => __('No Events found in Trash.'),
        'archives' => __('Event archives'),
        'insert_into_item' => __('Insert into Event'),
        'uploaded_to_this_item' => __('Uploaded to this Event'),
        'filter_items_list' => __('Filter Event list'),
        'items_list_navigation' => __('Event list navigation'),
        'items_list' => __('Event list'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Event'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon' => 'dashicons-calendar',
        'taxonomies' => array('event_name', 'event_location', 'event_type')
    );

    register_post_type('Event', $args);


}

// This is the taxonomy for the Sermon Videos / Other Video Categories.
register_taxonomy('event_name', 'event',
    array(
        'labels' => array(
            'name' => __('Event Name'),
            'singular_name' => __('Event Name'),
            'add_new_item' => __('Add New Event Name'),
            'edit_item' => __('Edit Event Name'),
            'new_item_name' => __('New Event Name'),
            'view' => __('View Event Names'),
            'view_item' => __('View Event Names'),
            'search_items' => __('Search Event Names'),
            'not_found' => __('No Event Names found'),
            'not_found_in_trash' => __('No Event Names found in Trash'),
            'parent_item' => __('Parent Event Names'),
        ),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'event_names')
    )
);

// This is the taxonomy for the Sermon Videos / Other Video Categories.
register_taxonomy('event_location', 'event',
    array(
        'labels' => array(
            'name' => __('Event Location'),
            'singular_name' => __('Event Location'),
            'add_new_item' => __('Add New Event Location'),
            'edit_item' => __('Edit Event Location'),
            'new_item_name' => __('New Event Location'),
            'view' => __('View Event Locations'),
            'view_item' => __('View Event Locations'),
            'search_items' => __('Search Event Locations'),
            'not_found' => __('No Event Locations found'),
            'not_found_in_trash' => __('No Event Locations found in Trash'),
            'parent_item' => __('Parent Event Locations'),
        ),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'event_locations')
    )
);

// This is the taxonomy for the Sermon Videos / Other Video Categories.
register_taxonomy('event_type', 'event',
    array(
        'labels' => array(
            'name' => __('Event Types'),
            'singular_name' => __('Event Type'),
            'add_new_item' => __('Add New Event Type'),
            'edit_item' => __('Edit Event Type'),
            'new_item_name' => __('New Event Type'),
            'view' => __('View Event Types'),
            'view_item' => __('View Event Types'),
            'search_items' => __('Search Event Types'),
            'not_found' => __('No Event Types found'),
            'not_found_in_trash' => __('No Event Types found in Trash'),
            'parent_item' => __('Parent Event Types'),
        ),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'event_types')
    )
);

add_action('init', 'event_init');

