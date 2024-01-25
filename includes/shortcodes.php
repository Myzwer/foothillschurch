<?php
/**
 * Shortcodes
 *
 * Defines custom shortcodes for various buttons and social icons.
 *
 * Usage: These shortcodes are linked in the main functions.php file and can be used in the content or widgets.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

//******************** BUTTONS *********************

/*
 * FAB MAIN BUTTON
 * Defaults to "#" if no value is given
 * Usage:  [main_button text="Learn More" url="https://example.com"]
*/

function fab_main_button_shortcode($atts, $content = null)
{
    $button_text = isset($atts['text']) ? $atts['text'] : 'Learn More';
    $button_url = isset($atts['url']) ? $atts['url'] : '#';
    return '<a href="' . esc_url($button_url) . '"><button class="fab-main mt-3">' . esc_html($button_text) . '</button></a>';
}

add_shortcode('main_button', 'fab_main_button_shortcode');

/*
 * BLUE BUTTON
 * Defaults to "#" if no value is given
 * Usage:  [blue_button text="Learn More" url="https://example.com"]
*/

function blue_button_shortcode($atts, $content = null)
{
    $button_text = isset($atts['text']) ? $atts['text'] : 'Learn More';
    $button_url = isset($atts['url']) ? $atts['url'] : '#';
    return '<a href="' . esc_url($button_url) . '"><button class="elevated-blue mt-3"><i class="fa-sharp fa-solid fa-arrow-right"></i> ' . esc_html($button_text) . '</button></a>';
}

add_shortcode('blue_button', 'blue_button_shortcode');

/*
 * GHOST BUTTON
 * Defaults to "#" if no value is given
 * Usage:  [ghost_button text="Learn More" url="https://example.com"]
*/

function custom_button_shortcode($atts, $content = null)
{
    $button_text = isset($atts['text']) ? $atts['text'] : 'Learn More';
    $button_url = isset($atts['url']) ? $atts['url'] : '#';
    return '<a href="' . esc_url($button_url) . '"><button class="ghost mt-3">' . esc_html($button_text) . '</button></a>';
}

add_shortcode('ghost_button', 'custom_button_shortcode');


//******************** SOCIALS *********************
/*
 * FACEBOOK ICON
 * Defaults to the FC Facebook if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [facebook url = "https://example.com" size = "1-10"]
*/
function facebook_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://www.facebook.com/foothillschurchTN';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-brands fa-facebook"></i></a>';
}

add_shortcode('facebook', 'facebook_shortcode');

/*
 * INSTAGRAM ICON
 * Defaults to the FC Instagram if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [instagram url = "https://example.com" size = "1-10"]
*/
function instagram_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://www.instagram.com/foothillschurchtn/';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-brands fa-instagram"></i></a>';
}

add_shortcode('instagram', 'instagram_shortcode');

/*
 * X ICON
 * Defaults to the FC X account if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [x url = "https://example.com" size = "1-10"]
*/
function x_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://twitter.com/foothillschurch';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-brands fa-x-twitter"></i></a>';
}

add_shortcode('x', 'x_shortcode');

/*
 * WEBSITE ICON
 * Defaults to the fc site if no url is given
 * You can feed it any size between 1 and 10. Defaults to 2.
 * Usage:  [website url = "https://example.com" size = "1-10"]
*/
function website_shortcode($atts, $content = null)
{
    $button_size = isset($atts['size']) ? $atts['size'] : 2;
    $button_url = isset($atts['url']) ? $atts['url'] : 'https://foothillschurch.com/';
    return '<a href="' . esc_url($button_url) . '"><i class="text-' . esc_html($button_size) . 'xl pr-1 fa-solid fa-link-simple"></i></a>';
}

add_shortcode('website', 'website_shortcode');

// Allows WP to inject shortcodes via a wysiwyg editor
add_filter('widget_text', 'do_shortcode');
add_filter('the_content', 'do_shortcode');
