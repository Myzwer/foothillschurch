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

/**
 * Function to generate a shortcode for creating a button with specified class and icon HTML.
 *
 * This function returns another function that acts as a shortcode handler.
 * The returned function handles the button's text, URL, and whether it should open in a new tab.
 *
 * Shortcode attributes:
 * - text: The text to display on the button.
 * - url: The URL where the button should link to.
 * - tab: Controls how the link opens. Valid values are 'y' (opens in a new tab), 'cc' (opens in Church Center modal), or other (opens in same tab).
 *
 * @param string $class_name The class name to apply to the button.
 * @param string $icon_html The HTML for the button's icon. Default is an empty string.
 *
 * @return callable The function that will be used as the shortcode handler. This function returns a string containing the HTML for the generated button.
 */
function generate_button_shortcode( $class_name, $icon_html = '' ) {
	// Return a function that generates the shortcode output
	return function ( $atts ) use ( $class_name, $icon_html ) {
		// Get the button text and URL from the shortcode attributes
		$button_text = isset( $atts['text'] ) ? $atts['text'] : null;
		$button_url  = isset( $atts['url'] ) ? $atts['url'] : null;

		// Determine if button details are complete or hidden
		$all_details = ( ! empty( $button_text ) && ! empty( $button_url ) ) ? '' : 'hidden';

		// Set how new tab behavior is handled based on the 'tab' attribute
		$open_in_tab_modal = '';
		if ( isset( $atts['tab'] ) ) {
			$tabOption = strtolower( $atts['tab'] );
			if ( $tabOption === 'y' ) {
				$open_in_tab_modal = " target='_blank'";
			} elseif ( $tabOption === 'cc' ) {
				$open_in_tab_modal = ' data-open-in-church-center-modal="true"';
			}
		}

		// Return the HTML for the button
		return '<span class = "not-prose"><a href="' . esc_url( $button_url ) . '"' . $open_in_tab_modal . ' class="' . esc_attr( $class_name ) . ' mt-3 ' . esc_attr( $all_details ) . '">' . $icon_html . esc_html( $button_text ) . '</a></span>';
	};
}

// Define shortcodes with appropriate classes and icons
add_shortcode( 'fab_salty', generate_button_shortcode( 'fab-main', '<i class="fa-solid fa-circle-arrow-right"></i> ' ) );
add_shortcode( 'fab_white', generate_button_shortcode( 'fab-main-white', '<i class="fa-solid fa-circle-arrow-right"></i> ' ) );
add_shortcode( 'elevated_blue', generate_button_shortcode( 'elevated-blue', '<i class="fa-sharp fa-solid fa-arrow-right"></i> ' ) );
add_shortcode( 'elevated_white', generate_button_shortcode( 'elevated-white', '<i class="fa-sharp fa-solid fa-arrow-right"></i> ' ) );
add_shortcode( 'ghost_black', generate_button_shortcode( 'ghost-black' ) );
add_shortcode( 'ghost_white', generate_button_shortcode( 'ghost-white' ) );

// Shortcode Usage
// [ghost_black text="BUTTONTEXT" url="BUTTONLINK" tab="Y/N/CC"]

//******************** SOCIALS *********************
// Function to generate a social icon shortcode with specified default URL and icon class
function generate_social_shortcode( $default_url, $icon_class ) {
	// Return a function that generates the shortcode output
	return function ( $atts ) use ( $default_url, $icon_class ) {
		// Get the icon size and URL from the shortcode attributes
		$button_size = isset( $atts['size'] ) ? $atts['size'] : 2;
		$button_url  = isset( $atts['url'] ) ? $atts['url'] : $default_url;

		// Return the HTML for the social icon
		return '<a href="' . esc_url( $button_url ) . '"><i class="text-' . esc_html( $button_size ) . 'xl mr-2 ' . esc_attr( $icon_class ) . '"></i></a>';
	};
}

// Define shortcodes with appropriate default URLs and icon classes
add_shortcode( 'facebook', generate_social_shortcode( 'https://www.facebook.com/foothillschurchTN', 'fa-brands fa-facebook' ) );
add_shortcode( 'instagram', generate_social_shortcode( 'https://www.instagram.com/foothillschurchtn/', 'fa-brands fa-instagram' ) );
add_shortcode( 'x', generate_social_shortcode( 'https://twitter.com/foothillschurch', 'fa-brands fa-x-twitter' ) );
add_shortcode( 'website', generate_social_shortcode( 'https://foothillschurch.com/', 'fa-solid fa-link-simple' ) );


// Allows WP to inject shortcodes via a wysiwyg editor
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_content', 'do_shortcode' );
