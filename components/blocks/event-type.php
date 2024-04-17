<?php
/**
 * Event Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * This template has a simplified WYSIWYG editor for any header content
 * Additionally, it accepts an event type from the content editor, and the code + WP does the heavy lifting.
 * It will always pull in the 3 upcoming events in the type chosen, or say there aren't any.
 *
 * Usage: get_template_part( 'components/blocks/event-type' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<?php
$type     = get_sub_field( "event_type" );
$location = get_sub_field( "event_location" );

$tax_query = array( 'relation' => 'AND' );

if ( ! empty( $type ) ) {
	$tax_query[] = array(
		'taxonomy' => 'event_type',
		'field'    => 'slug',
		'terms'    => $type
	);
}

if ( ! empty( $location ) ) {
	$tax_query[] = array(
		'taxonomy' => 'event_location',
		'field'    => 'slug',
		'terms'    => $location
	);
}

// WP_Query arguments
$args = array(
	'post_type'      => array( 'event' ),
	'post_status'    => array( 'publish' ),
	'nopaging'       => false,
	'order'          => 'DESC',
	'orderby'        => 'date',
	'posts_per_page' => 3,
	'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
	'tax_query'      => $tax_query,
);

$events = new WP_Query( $args );

// Rest of your code

if ( $events->have_posts() ) : ?>
    <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
        <div class="grid grid-cols-12 gap-4 md:gap-4">
            <div class="col-span-12 py-5 prose max-w-none">
				<?php the_sub_field( "header_content" ); ?>
            </div>

			<?php
			// The Loop
			if ( $events->have_posts() ) {
				while ( $events->have_posts() ) {
					$events->the_post();
					$size_select = array(
						'column_span_class' => 'lg:col-span-4'
					);
					get_template_part( 'components/cards/event-card', null, $size_select );
				}
			}
			// Restore original Post Data
			wp_reset_postdata();
			?>
        </div>
    </div>
<?php endif; ?>