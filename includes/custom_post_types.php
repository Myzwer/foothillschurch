<?php
/**
 * Custom Post Types
 *
 * Defines custom post types and taxonomies for the site.
 * - Events
 * - Messages
 * - Transcripts
 *
 * Usage: These custom post types are linked in functions.php and used in WP_Admin.
 * Their specifics are controlled via ACF.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

//**************** Events ******************
/**
 * Register a custom post type called "Event".
 *
 * @see get_post_type_labels() for label keys.
 */
function event_init() {
	$labels = array(
		'name'                  => __( 'Events' ),
		'singular_name'         => __( 'Event' ),
		'menu_name'             => __( 'Events' ),
		'name_admin_bar'        => __( 'Event' ),
		'add_new'               => __( 'Add New' ),
		'add_new_item'          => __( 'Add New Event' ),
		'new_item'              => __( 'New Event' ),
		'edit_item'             => __( 'Edit Event' ),
		'view_item'             => __( 'View Event' ),
		'all_items'             => __( 'All Events' ),
		'search_items'          => __( 'Search Events' ),
		'parent_item_colon'     => __( 'Parent Events:' ),
		'not_found'             => __( 'No Events found.' ),
		'not_found_in_trash'    => __( 'No Events found in Trash.' ),
		'archives'              => __( 'Event archives' ),
		'insert_into_item'      => __( 'Insert into Event' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Event' ),
		'filter_items_list'     => __( 'Filter Event list' ),
		'items_list_navigation' => __( 'Event list navigation' ),
		'items_list'            => __( 'Event list' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields' ),
		'menu_icon'          => 'dashicons-calendar',
		'taxonomies'         => array( 'event_name', 'event_location', 'event_type' )
	);

	register_post_type( 'event', $args );


}

// This is the taxonomy for the Sermon Videos / Other Video Categories.
register_taxonomy( 'event_name', 'event',
	array(
		'labels'       => array(
			'name'               => __( 'Event Name' ),
			'singular_name'      => __( 'Event Name' ),
			'add_new_item'       => __( 'Add New Event Name' ),
			'edit_item'          => __( 'Edit Event Name' ),
			'new_item_name'      => __( 'New Event Name' ),
			'view'               => __( 'View Event Names' ),
			'view_item'          => __( 'View Event Names' ),
			'search_items'       => __( 'Search Event Names' ),
			'not_found'          => __( 'No Event Names found' ),
			'not_found_in_trash' => __( 'No Event Names found in Trash' ),
			'parent_item'        => __( 'Parent Event Names' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'event_names' )
	)
);

// This is the taxonomy for the Sermon Videos / Other Video Categories.
register_taxonomy( 'event_location', 'event',
	array(
		'labels'       => array(
			'name'               => __( 'Event Location' ),
			'singular_name'      => __( 'Event Location' ),
			'add_new_item'       => __( 'Add New Event Location' ),
			'edit_item'          => __( 'Edit Event Location' ),
			'new_item_name'      => __( 'New Event Location' ),
			'view'               => __( 'View Event Locations' ),
			'view_item'          => __( 'View Event Locations' ),
			'search_items'       => __( 'Search Event Locations' ),
			'not_found'          => __( 'No Event Locations found' ),
			'not_found_in_trash' => __( 'No Event Locations found in Trash' ),
			'parent_item'        => __( 'Parent Event Locations' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'event_locations' )
	)
);

// This is the taxonomy for the Sermon Videos / Other Video Categories.
register_taxonomy( 'event_type', 'event',
	array(
		'labels'       => array(
			'name'               => __( 'Event Types' ),
			'singular_name'      => __( 'Event Type' ),
			'add_new_item'       => __( 'Add New Event Type' ),
			'edit_item'          => __( 'Edit Event Type' ),
			'new_item_name'      => __( 'New Event Type' ),
			'view'               => __( 'View Event Types' ),
			'view_item'          => __( 'View Event Types' ),
			'search_items'       => __( 'Search Event Types' ),
			'not_found'          => __( 'No Event Types found' ),
			'not_found_in_trash' => __( 'No Event Types found in Trash' ),
			'parent_item'        => __( 'Parent Event Types' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'event_types' )
	)
);

add_action( 'init', 'event_init' );

//**************** Messages ******************
/**
 * Register a custom post type called "Message".
 *
 * @see get_post_type_labels() for label keys.
 */
function custom_message_post_type() {
	$labels = array(
		'name'                  => __( 'Messages' ),
		'singular_name'         => __( 'Message' ),
		'menu_name'             => __( 'Messages' ),
		'add_new'               => __( 'Add New Message' ),
		'add_new_item'          => __( 'Add New Message' ),
		'new_item'              => __( 'New Message' ),
		'edit_item'             => __( 'Edit Message' ),
		'view_item'             => __( 'View Message' ),
		'all_items'             => __( 'All Messages' ),
		'search_items'          => __( 'Search Messages' ),
		'not_found'             => __( 'No Messages found.' ),
		'not_found_in_trash'    => __( 'No Messages found in Trash.' ),
		'archives'              => __( 'Message archives' ),
		'insert_into_item'      => __( 'Insert into Message' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Message' ),
		'filter_items_list'     => __( 'Filter Message list' ),
		'items_list_navigation' => __( 'Message list navigation' ),
		'items_list'            => __( 'Message list' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'message' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20, // Example value, adjust as needed
		'supports'           => array( 'title', 'author', 'thumbnail', 'custom-fields' ),
		'menu_icon'          => 'dashicons-microphone',
		'taxonomies'         => array( 'series', 'speaker', 'topic' )
	);

	register_post_type( 'message', $args );
}

// This is the taxonomy for the sermon series
register_taxonomy( 'series', 'message',
	array(
		'labels'       => array(
			'name'               => __( 'Series Name' ),
			'singular_name'      => __( 'Series Name' ),
			'add_new_item'       => __( 'Add New Series' ),
			'edit_item'          => __( 'Edit Series' ),
			'new_item_name'      => __( 'New Series' ),
			'view'               => __( 'View Series' ),
			'view_item'          => __( 'View Series' ),
			'search_items'       => __( 'Search Series' ),
			'not_found'          => __( 'No Series found' ),
			'not_found_in_trash' => __( 'No Series found in Trash' ),
			'parent_item'        => __( 'Parent Series' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'series' )
	)
);

// This is the taxonomy for the speaker
register_taxonomy( 'speaker', 'message',
	array(
		'labels'       => array(
			'name'               => __( 'Speaker Name' ),
			'singular_name'      => __( 'Speaker Name' ),
			'add_new_item'       => __( 'Add New Speaker' ),
			'edit_item'          => __( 'Edit Speaker' ),
			'new_item_name'      => __( 'New Speaker' ),
			'view'               => __( 'View Speakers' ),
			'view_item'          => __( 'View Speaker' ),
			'search_items'       => __( 'Search Speakers' ),
			'not_found'          => __( 'No Speakers found' ),
			'not_found_in_trash' => __( 'No Speakers found in Trash' ),
			'parent_item'        => __( 'Parent Speaker' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'speakers' )
	)
);

// This is the taxonomy for the categories
register_taxonomy( 'topic', 'message',
	array(
		'labels'       => array(
			'name'               => __( 'Topic' ),
			'singular_name'      => __( 'Topic' ),
			'add_new_item'       => __( 'Add New Topic' ),
			'edit_item'          => __( 'Edit Topic' ),
			'new_item_name'      => __( 'New Topic' ),
			'view'               => __( 'View Topics' ),
			'view_item'          => __( 'View Topic' ),
			'search_items'       => __( 'Search Topics' ),
			'not_found'          => __( 'No Topics found' ),
			'not_found_in_trash' => __( 'No Topics found in Trash' ),
			'parent_item'        => __( 'Parent Topic' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'topics' )
	)
);

add_action( 'init', 'custom_message_post_type', 0 );


//**************** Transcripts ******************
/**
 * Register a custom post type called "Transcript".
 *
 * @see get_post_type_labels() for label keys.
 */
function custom_transcript_post_type() {
	$labels = array(
		'name'                  => __( 'Transcripts' ),
		'singular_name'         => __( 'Transcript' ),
		'menu_name'             => __( 'Transcripts' ),
		'add_new'               => __( 'Add New Transcript' ),
		'add_new_item'          => __( 'Add New Transcript' ),
		'new_item'              => __( 'New Transcript' ),
		'edit_item'             => __( 'Edit Transcript' ),
		'view_item'             => __( 'View Transcript' ),
		'all_items'             => __( 'All Transcripts' ),
		'search_items'          => __( 'Search Transcripts' ),
		'not_found'             => __( 'No Transcripts found.' ),
		'not_found_in_trash'    => __( 'No Transcripts found in Trash.' ),
		'archives'              => __( 'Transcript archives' ),
		'insert_into_item'      => __( 'Insert into Transcript' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Transcript' ),
		'filter_items_list'     => __( 'Filter Transcript list' ),
		'items_list_navigation' => __( 'Transcript list navigation' ),
		'items_list'            => __( 'Transcript list' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'transcript' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'author', 'thumbnail', 'custom-fields', 'editor' ),
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-archive',
		'taxonomies'         => array( 'series', 'speaker', 'topic' )
	);

	register_post_type( 'transcript', $args );
}

// This is the taxonomy for the series
register_taxonomy( 'series', 'transcript',
	array(
		'labels'       => array(
			'name'               => __( 'Series Name' ),
			'singular_name'      => __( 'Series Name' ),
			'add_new_item'       => __( 'Add New Series' ),
			'edit_item'          => __( 'Edit Series' ),
			'new_item_name'      => __( 'New Series' ),
			'view'               => __( 'View Series' ),
			'view_item'          => __( 'View Series' ),
			'search_items'       => __( 'Search Series' ),
			'not_found'          => __( 'No Series found' ),
			'not_found_in_trash' => __( 'No Series found in Trash' ),
			'parent_item'        => __( 'Parent Series' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'series' ),
		'show_in_rest' => true,
	)
);

// This is the taxonomy for the speaker
register_taxonomy( 'speaker', 'transcript',
	array(
		'labels'       => array(
			'name'               => __( 'Speaker Name' ),
			'singular_name'      => __( 'Speaker Name' ),
			'add_new_item'       => __( 'Add New Speaker' ),
			'edit_item'          => __( 'Edit Speaker' ),
			'new_item_name'      => __( 'New Speaker' ),
			'view'               => __( 'View Speakers' ),
			'view_item'          => __( 'View Speaker' ),
			'search_items'       => __( 'Search Speakers' ),
			'not_found'          => __( 'No Speakers found' ),
			'not_found_in_trash' => __( 'No Speakers found in Trash' ),
			'parent_item'        => __( 'Parent Speaker' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'speakers' ),
		'show_in_rest' => true,
	)
);

// This is the taxonomy for the categories
register_taxonomy( 'topic', 'transcript',
	array(
		'labels'       => array(
			'name'               => __( 'Topic' ),
			'singular_name'      => __( 'Topic' ),
			'add_new_item'       => __( 'Add New Topic' ),
			'edit_item'          => __( 'Edit Topic' ),
			'new_item_name'      => __( 'New Topic' ),
			'view'               => __( 'View Topics' ),
			'view_item'          => __( 'View Topic' ),
			'search_items'       => __( 'Search Topics' ),
			'not_found'          => __( 'No Topics found' ),
			'not_found_in_trash' => __( 'No Topics found in Trash' ),
			'parent_item'        => __( 'Parent Topic' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'topics' ),
		'show_in_rest' => true,
	)
);

add_action( 'init', 'custom_transcript_post_type' );


//**************** Locations ******************
function create_location_cpt() {

	$labels = array(
		'name'                  => __( 'Locations' ),
		'singular_name'         => __( 'Location' ),
		'menu_name'             => __( 'Locations' ),
		'name_admin_bar'        => __( 'Location' ),
		'add_new'               => __( 'Add New' ),
		'add_new_item'          => __( 'Add New Location' ),
		'new_item'              => __( 'New Location' ),
		'edit_item'             => __( 'Edit Location' ),
		'view_item'             => __( 'View Location' ),
		'all_items'             => __( 'All Locations' ),
		'search_items'          => __( 'Search Locations' ),
		'parent_item_colon'     => __( 'Parent Locations:' ),
		'not_found'             => __( 'No Locations found.' ),
		'not_found_in_trash'    => __( 'No Locations found in Trash.' ),
		'archives'              => __( 'Location archives' ),
		'insert_into_item'      => __( 'Insert into Location' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Location' ),
		'filter_items_list'     => __( 'Filter Location list' ),
		'items_list_navigation' => __( 'Location list navigation' ),
		'items_list'            => __( 'Location list' ),
	);
	$args   = array(
		'label'               => __( 'Location', 'textdomain' ),
		'description'         => __( 'Custom post type for church locations (campuses)', 'textdomain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-location-alt', // Can be changed later if needed
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite'             => array( 'slug' => 'locations' ), // Custom slug for URLs
	);
	register_post_type( 'location', $args );

}

add_action( 'init', 'create_location_cpt', 0 );


// Register Custom Taxonomy: Location Type
function create_location_type_taxonomy() {

	$labels = array(
		'name'              => _x( 'Location Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Location Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Location Types', 'textdomain' ),
		'all_items'         => __( 'All Location Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Location Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Location Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Location Type', 'textdomain' ),
		'update_item'       => __( 'Update Location Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Location Type', 'textdomain' ),
		'new_item_name'     => __( 'New Location Type Name', 'textdomain' ),
		'menu_name'         => __( 'Location Types', 'textdomain' ),
		'view_item'         => __( 'View Location Type', 'textdomain' ),
		'not_found'         => __( 'No Location Types found', 'textdomain' ),
		'back_to_items'     => __( 'Back to Location Types', 'textdomain' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,  // Acts like categories (can have parent-child structure)
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'rewrite'           => array( 'slug' => 'location-type' ),
		'show_in_rest'      => true,  // Enable for Gutenberg and REST API
	);

	register_taxonomy( 'location_type', array( 'location' ), $args );
}

add_action( 'init', 'create_location_type_taxonomy' );


flush_rewrite_rules( false );
