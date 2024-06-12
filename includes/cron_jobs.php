<?php
add_action( 'wp', 'setup_daily_event_draft' );
function setup_daily_event_draft() {
	if ( ! wp_next_scheduled( 'unpublish_past_events_daily' ) ) {
		// Setting the time to 1am. If it's past 1am, run the event tomorrow.
		$timestamp = ( time() < strtotime( 'Today 1:00' ) ) ? strtotime( 'Today 1:00' ) : strtotime( 'Tomorrow 1:00' );
		wp_schedule_event( $timestamp, 'daily', 'unpublish_past_events_daily' );
	}
}

add_action( 'unpublish_past_events_daily', 'unpublish_past_events' );
function unpublish_past_events() {
	// Get yesterday's date
	$yesterday = date( 'Ymd', strtotime( '-1 day' ) );

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

	$past_events = get_posts( $args );

	if ( $past_events ) {
		foreach ( $past_events as $event ) {
			$update_event = array(
				'ID'          => $event->ID,
				'post_status' => 'draft',
			);
			wp_update_post( $update_event );
		}
	}
}