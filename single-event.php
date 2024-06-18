<?php
/**
 * Template Name: Post Type - Events (Single)
 *
 * The Frontpage of the Bootcamp II Theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <!-- start outer color -->
    <div class="bg-blue-gradient">
        <!-- start grid -->
        <div class="xl:w-9/12 max-w-screen-2xl mx-auto grid grid-cols-12 p-5 pt-10 gap-4">
            <!-- start branding section -->
            <div class="col-span-12 lg:col-span-7">
                <img class="rounded-lg shadow-xl" src="<?php the_field( 'branding' ); ?>"
                     alt="<?php the_field( 'event_name' ); ?> Brand">
            </div>
            <!-- end branding section -->

            <!-- start event information outer -->
            <div class="col-span-12 lg:col-span-5">
                <div class="grid grid-cols-12 gap-4">

                    <!-- start date section -->
                    <div class="col-span-12 bg-white rounded-md shadow-xl p-5">
                        <p><i class="fa-regular fa-calendar-days"></i> Date</p>
                        <h2 class="text-lg font-bold uppercase"><?php the_field( 'event_date' ); ?></h2>
                    </div>
                    <!-- end date section -->

                    <!-- start time section -->
                    <div class="col-span-12 bg-white rounded-md shadow-xl p-5">
                        <p><i class="fa-regular fa-clock"></i> Time</p>
                        <h2 class="text-lg font-bold uppercase">
							<?php
							// These two if statements check to see if the ACF field is empty, and either returns its value
							// Or it returns "TBD"

							// Get the selected value from the ACF field
							$start_time = get_field( 'event_start_time' );

							// Check the value returned from ACF
							if ( $start_time != null ) {
								the_field( 'event_start_time' );
							} else {
								echo "TBD";
							}
							?>
                            -
							<?php
							// These two if statements check to see if the ACF field is empty, and either returns its value
							// Or it returns "TBD"

							// Get the selected value from the ACF field
							$end_time = get_field( 'event_end_time' );

							// Check the value returned from ACF
							if ( $end_time != null ) {
								the_field( 'event_end_time' );
							} else {
								echo "TBD";
							}
							?>
                        </h2>
                    </div>
                    <!-- end time section -->

                    <!-- start location section -->
                    <div class="col-span-12 bg-white rounded-md shadow-xl p-5">
                        <p><i class="fa-regular fa-location-dot"></i> Location</p>
                        <h2 class="text-lg font-bold uppercase">
							<?php
							// Get the selected value from the ACF field
							$selected_location = get_field( 'event_location' );

							// Check the value returned from ACF
							if ( $selected_location === 'https://goo.gl/maps/ycY5iVnrUR8pcEuY8' ) {
								echo 'Maryville Location';
							} elseif ( $selected_location === 'https://goo.gl/maps/s8WFsr8MQDbJJqSE7' ) {
								echo 'Knoxville Location';
							} else {
								the_field( 'event_location_name' );
							}
							?>
                        </h2>
                        <h2 class="text-md uppercase pb-2">
							<?php
							the_field( 'room_location' );
							?>
                        </h2>
                        <div class="inline-block ghost">
                            <a href="<?php
							// Check the value returned from ACF for the link
							if ( $selected_location === 'https://goo.gl/maps/ycY5iVnrUR8pcEuY8' || $selected_location === 'https://goo.gl/maps/s8WFsr8MQDbJJqSE7' ) {
								the_field( 'event_location' );
							} else {
								the_field( 'event_location_link' );
							}
							?>" target="_blank">
                                <i class="fa-regular fa-arrow-up-right-from-square"></i> Directions
                            </a>
                        </div>
                    </div>
                    <!-- end location section -->

                    <!-- start register section -->

                    <div class="col-span-12 bg-white rounded-md shadow-xl p-5">
						<?php
						if ( get_field( 'registration_link' ) ) :
							?>
                            <a href="<?php the_field( 'registration_link' ) ?>">
                                <button class="elevated-salty">
                                    <i class="fa-solid fa-circle-arrow-right"></i> Register
                                </button>
                            </a>
						<?php else : ?>
                            <h2 class="text-md uppercase font-bold pb-2">There is no registration for this event.</h2>
						<?php endif; ?>
                    </div>
                    <!-- end register section -->

                </div>
            </div>
            <!-- end event information outer -->

            <!-- start main details / paragraph -->
            <div class="col-span-12 pb-10">
                <div class="prose">
                    <h2 class="font-bold capitalize text-3xl py-5">
						<?php the_field( 'section_title' ); ?>
                    </h2>
					<?php the_field( 'main_details' ); ?>
                </div>
            </div>
            <!-- end main details / paragraph -->

        </div>
        <!-- end grid -->
    </div>
    <!-- end outer color -->


<?php
// Check value exists.
if ( have_rows( 'build_page' ) ) :

	// used for alternating colors
	$counter = 0;

	// Loop through rows.
	while ( have_rows( 'build_page' ) ) : the_row();

		if ( 0 === $counter % 2 ) {
			$class = 'white';
		} else {
			$class = 'blue-gradient';
		}

		echo "<div class='bg-$class'>";
		echo "<div class='xl:w-9/12 max-w-screen-2xl mx-auto grid grid-cols-12 p-5 py-10 gap-4'>";
		switch ( get_row_layout() ) {
			case 'generic_block':
				echo "<div class='col-span-12'>";
				get_template_part( 'components/layouts/wysiwyg' );
				echo "</div>";
				break;

			case 'faq':
				echo "<div class='col-span-12'>";
				get_template_part( 'components/layouts/faq' );
				echo "</div>";
				break;

			case 'video':
				echo "<div class='col-span-12'>";
				get_template_part( 'components/layouts/video' );
				echo "</div>";
				break;

			case 'button_group':
				echo "<div class='col-span-12'>";
				get_template_part( 'components/layouts/button-group' );
				echo "</div>";
				break;


			// FIXME: Only for building/debugging, shouldn't be left in for production
			default:
				echo "Unhandled content block: " . get_row_layout();
				break;
		}
		echo "</div>";
		echo "</div>";
		$counter ++;

		// End loop.
	endwhile;
endif;
?>
<?php get_footer();
