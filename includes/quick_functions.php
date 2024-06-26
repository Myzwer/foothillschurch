<?php
/**
 * Quick Functions
 *
 * This file contains a quick function to alphabetize page templates in a WordPress theme.
 *
 * Usage: Include this file in functions.php to apply the alphabetization filter to page templates.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

function alphabetize_page_templates( $templates ) {
	asort( $templates );

	return $templates;
}

add_filter( 'theme_page_templates', 'alphabetize_page_templates' );


// Homepage live change
function check_live_status() {
	// Get the current day and time
	$currentDayOfWeek = strtolower( ( new DateTime( 'now', new DateTimeZone( 'America/New_York' ) ) )->format( 'l' ) );
	$currentTime      = ( new DateTime( 'now', new DateTimeZone( 'America/New_York' ) ) )->format( 'H:i' );

	// Flag to check if we're live or not
	$isLive = false;

	// Check if there are 'times_live' ACF repeater rows
	if ( have_rows( 'times_live' ) ):
		// While the repeater has rows
		while ( have_rows( 'times_live' ) ): the_row();

			// Get the start and end times for the day
			$dayOfWeek = get_sub_field( 'day' );
			$startTime = get_sub_field( 'start_time' );
			$endTime   = get_sub_field( 'end_time' );

			// Create DateTime objects from the start and end times
			$dateTimeStart = DateTime::createFromFormat( 'H:i:s', $startTime, new DateTimeZone( 'America/New_York' ) );
			$dateTimeEnd   = DateTime::createFromFormat( 'H:i:s', $endTime, new DateTimeZone( 'America/New_York' ) );

			// Format the time without seconds for comparison
			$startTime = $dateTimeStart->format( 'H:i' );
			$endTime   = $dateTimeEnd->format( 'H:i' );

			// Create a DateTime object from the current time
			$dateTimeCurrent = DateTime::createFromFormat( 'H:i', $currentTime, new DateTimeZone( 'America/New_York' ) );

			// Check if the current day and time fall into one of the intervals
			if ( $dayOfWeek == $currentDayOfWeek && $dateTimeCurrent > $dateTimeStart && $dateTimeCurrent < $dateTimeEnd ) {
				$isLive = true;
				break; // Exit the loop as we already know we're live
			}

		endwhile;
	endif;

	return $isLive;
}