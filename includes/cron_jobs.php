<?php
/**
 * Hook into the 'wp' action and schedule our event.
 */
add_action( 'wp', 'setup_daily_event_draft' );

/**
 * Schedule the 'unpublish_past_events_daily' event if it isn't already scheduled.
 * This function will run whenever WordPress loads (on every page load).
 */
function setup_daily_event_draft() {
	if ( ! wp_next_scheduled( 'unpublish_past_events_daily' ) ) {
		// Setting the time to 1am. If it's past 1am, run the event tomorrow.
		$timestamp = ( time() < strtotime( 'Today 1:00' ) ) ? strtotime( 'Today 1:00' ) : strtotime( 'Tomorrow 1:00' );
		wp_schedule_event( $timestamp, 'daily', 'unpublish_past_events_daily' );
	}
}

/**
 * Hook into our custom action and execute the unpublish_past_events function.
 */
add_action( 'unpublish_past_events_daily', 'unpublish_past_events' );

/**
 * Unpublish past events that have a 'removal_date' less than or equal to yesterday's date.
 * This function will be triggered by our 'unpublish_past_events_daily' event.
 */
function unpublish_past_events() {
	// Get yesterday's date
	$yesterday = date( 'Ymd', strtotime( '-1 day' ) );

	// Set up query arguments to select all 'event' posts that were supposed to be removed as of yesterday
	$args = array(
		'post_type'      => 'event',
		'posts_per_page' => - 1,
		'meta_query'     => array(
			array(
				'key'     => 'removal_date',
				'value'   => $yesterday,
				'compare' => '<=',
				'type'    => 'DATE'
			)
		),
		'post_status'    => 'publish'
	);

	// Query for relevant events
	$past_events = get_posts( $args );

	if ( $past_events ) {
		// Loop through each event and update the post status to 'draft'
		foreach ( $past_events as $event ) {
			$update_event = array(
				'ID'          => $event->ID,
				'post_status' => 'draft',
			);
			wp_update_post( $update_event );
		}
	}
}