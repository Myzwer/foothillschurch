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

// Function to generate a button shortcode with specified class name and icon
function generate_button_shortcode( $class_name, $icon_html = '' ) {
	// Return a function that generates the shortcode output
	return function ( $atts, $content = null ) use ( $class_name, $icon_html ) {
		// Get the button text and URL from the shortcode attributes
		$button_text = isset( $atts['text'] ) ? $atts['text'] : null;
		$button_url  = isset( $atts['url'] ) ? $atts['url'] : null;

		// Determine if button details are complete or hidden
		$all_details = ( ! empty( $button_text ) && ! empty( $button_url ) ) ? '' : 'hidden';

		// Set how new tab behavior is handled based on the 'tab' attribute
		if ( isset( $atts['tab'] ) ) {
			$tabOption = strtolower( $atts['tab'] );
			if ( $tabOption === 'y' ) {
				$open_in_tab_modal = " target='_blank'";
			} elseif ( $tabOption === 'cc' ) {
				$open_in_tab_modal = ' data-open-in-church-center-modal="true"';
			} else {
				$open_in_tab_modal = '';
			}
		} else {
			$open_in_tab_modal = '';
		}

		// Return the HTML for the button
		return '<a href="' . esc_url( $button_url ) . '"' . $open_in_tab_modal . '><button class="' . esc_attr( $class_name ) . ' mt-3 ' . esc_attr( $all_details ) . '">' . $icon_html . esc_html( $button_text ) . '</button></a>';
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
	return function ( $atts, $content = null ) use ( $default_url, $icon_class ) {
		// Get the icon size and URL from the shortcode attributes
		$button_size = isset( $atts['size'] ) ? $atts['size'] : 2;
		$button_url  = isset( $atts['url'] ) ? $atts['url'] : $default_url;

		// Return the HTML for the social icon
		return '<a href="' . esc_url( $button_url ) . '"><i class="text-' . esc_html( $button_size ) . 'xl pr-1 ' . esc_attr( $icon_class ) . '"></i></a>';
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
