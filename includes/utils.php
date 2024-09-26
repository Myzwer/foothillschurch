<?php
/**
 * Utils
 *
 * This file contains 2 functions:
 * The first alphabetizes my templates for content editors on the backend
 * The second controls when the frontpage shows we are live.
 *
 * Usage: Include this file in functions.php to apply the alphabetization filter to page templates.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

// Enable dynamic title tag support
add_theme_support( 'title-tag' );


function alphabetize_page_templates( $templates ) {
	asort( $templates );

	return $templates;
}

add_filter( 'theme_page_templates', 'alphabetize_page_templates' );


/**
 * Check live status based on configured live times. (Used on the frontpage)
 *
 * This function checks if the current day and time falls within any configured
 * live broadcasting intervals stored in the 'times_live' Advanced Custom Fields
 * repeater field. Times are evaluated based on the America/New_York timezone.
 *
 * @return bool Returns true if the current time is within any live interval,
 * otherwise returns false.
 *
 * @throws Exception If there is an error in date/time parsing or comparison.
 */
function check_live_status() {
	// Initialize DateTimeZone object once
	$timezone = new DateTimeZone( 'America/New_York' );

	try {
		// Get the current day and time
		$now              = new DateTime( 'now', $timezone );
		$currentDayOfWeek = strtolower( $now->format( 'l' ) );
		$currentTime      = $now->format( 'H:i' );

		// Flag to check if we're live or not
		$isLive = false;

		// Check if there are 'times_live' ACF repeater rows
		if ( have_rows( 'times_live' ) ) :
			// While the repeater has rows
			while ( have_rows( 'times_live' ) ) : the_row();

				// Get the start and end times for the day
				$dayOfWeek = get_sub_field( 'day' );
				$startTime = get_sub_field( 'start_time' );
				$endTime   = get_sub_field( 'end_time' );

				// Create DateTime objects from the start and end times
				$dateTimeStart = DateTime::createFromFormat( 'H:i:s', $startTime, $timezone );
				$dateTimeEnd   = DateTime::createFromFormat( 'H:i:s', $endTime, $timezone );

				// Format the time without seconds for comparison
				$startTime = $dateTimeStart->format( 'H:i' );
				$endTime   = $dateTimeEnd->format( 'H:i' );

				// Check if the current day and time fall into one of the intervals
				if ( $dayOfWeek == $currentDayOfWeek && $currentTime >= $startTime && $currentTime < $endTime ) {
					$isLive = true;
					break; // Exit the loop as we already know we're live
				}

			endwhile;
		endif;

		return $isLive;

	} catch ( Exception $e ) {
		// Handle any exceptions thrown during date/time parsing or comparison
		throw new Exception( 'Error occurred while checking live status: ' . $e->getMessage() );
	}
}

/**
 * Displays terms associated with a post for a specified taxonomy.
 *
 * This function retrieves and displays the terms linked to a given post ID
 * within a specified taxonomy. It outputs the terms within a wrapper
 * HTML tag, preceded by a label. The terms are displayed as a comma-separated
 * list, with options for additional formatting such as inline display
 * and new lines.
 *
 * @param int $post_id The ID of the post from which to retrieve terms.
 * @param string $taxonomy The taxonomy to retrieve terms for (e.g., 'category', 'post_tag').
 * @param string $label The label to display before the terms.
 * @param string $wrapper_tag The HTML tag to wrap the output (default is 'p').
 * @param string $class Optional. A class attribute to apply to the wrapper tag (default is '').
 * @param bool $inline Optional. Whether to display the terms inline (default is false).
 * @param bool $new_line Optional. Whether to insert a line break after the terms (default is false).
 *
 * @return void
 */
if ( ! function_exists( 'bootcamp_display_message_terms' ) ) {
	function bootcamp_display_message_terms( $post_id, $taxonomy, $label, $wrapper_tag = 'p', $class = '', $inline = false, $new_line = false ): void {
		// Retrieve the terms associated with the post for the specified taxonomy
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms && ! is_wp_error( $terms ) ) {
			// Start the wrapper tag
			echo '<' . esc_attr( $wrapper_tag ) . ' class="' . esc_attr( $class ) . '">';

			// Display the label
			echo '<span class="font-bold">' . esc_html( $label ) . '</span>';

			// Create an array to hold term names
			$term_names = [];

			// Loop through the terms and add them to the array
			foreach ( $terms as $term ) {
				$term_names[] = esc_html( $term->name );
			}

			// Display the terms separated by a comma and a space
			echo implode( ', ', $term_names );

			// Optionally break into a new line
			if ( $new_line ) {
				echo '<br>';
			}

			// Close the wrapper tag
			echo '</' . esc_attr( $wrapper_tag ) . '>';
		}
	}
}


