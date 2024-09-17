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
							// get start and end time, unless value isn't provided, in which case display TBD.
							echo get_field( 'event_start_time' ) ?: "TBD"; ?>
                            - <?php echo get_field( 'event_end_time' ) ?: "TBD";
							?>

                        </h2>
                    </div>
                    <!-- end time section -->

                    <!-- start location section -->

					<?php
					// Initialize the variables to prevent undefined variable warnings
					$location_name = '';
					$gmap_link     = '';
					$amap_link     = '';
					$room_location = '';

					// Get the location source field value (either 'onsite' or 'offsite')
					$location_source = get_field( 'location_source' );

					if ( $location_source == 'onsite' ) {
						// If 'onsite' is selected, get the selected post object (Location CPT)
						$predefined_location = get_field( 'predefined_location' );

						if ( $predefined_location ) {
							// Get the location name from the 'Locations' CPT (e.g., post title)
							$location_name = get_the_title( $predefined_location->ID ) . " Location";
							// Get the map link from the predefined location post
							$gmap_link = get_field( 'gmap_link', $predefined_location->ID );
							$amap_link = get_field( 'amap_link', $predefined_location->ID );

							// Only get the room information if we are on site
							$room_location = get_field( 'room_location' );

						}
					} elseif ( $location_source == 'offsite' ) {
						// If 'offsite' is selected, use the custom location name and URL entered by the editor
						$location_name = get_field( 'location_name' ); // Custom location name entered by editor
						$gmap_link     = get_field( 'gmap_link' );
						$amap_link     = get_field( 'amap_link' );
					}
					?>

                    <div class="col-span-12 bg-white rounded-md shadow-xl p-5">
                        <p><i class="fa-regular fa-location-dot"></i> Location</p>
                        <h2 class="text-lg font-bold uppercase">
							<?php echo $location_name; ?>
                        </h2>
                        <h2 class="text-md uppercase pb-2">
							<?php echo $room_location; ?>
                        </h2>
                        <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        <a id="map-link"
                           href="<?php echo $gmap_link; ?>"
                           target="_blank"
                           data-gmap-link="<?php echo $gmap_link; ?>"
                           data-amap-link="<?php echo $amap_link; ?>">
                            Directions
                        </a>
                    </div>

                    <!-- end location section -->

                    <!-- start register section -->

                    <div class="col-span-12 bg-white rounded-md shadow-xl p-5">
						<?php
						$registration_link   = get_field( 'registration_link' );
						$registration_status = get_field( 'registration_status' );
						$closed_copy         = get_field( 'closed_copy' );

						if ( $registration_link ) :
							if ( $registration_status === 'Open' ) :
								?>
                                <a href="<?php echo esc_url( $registration_link ); ?>" class="elevated-salty">
                                    <i class="fa-solid fa-circle-arrow-right"></i> Register
                                </a>
							<?php
                            elseif ( $registration_status === 'Closed' ) :
								?>
                                <div class="elevated-salty inline-block cursor-not-allowed opacity-30">
                                    <i class="fa-solid fa-circle-arrow-right"></i> Register
                                </div>
                                <h2 class="text-md uppercase font-bold py-2"><?php echo esc_html( $closed_copy ); ?></h2>
							<?php
							endif;
						else :
							?>
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
if ( have_rows( 'additional_fields' ) ) :

	echo "<div class='alt-bg-wrap'>"; // Wrap the entire section

	// Loop through rows.
	while ( have_rows( 'additional_fields' ) ) : the_row();


		echo "<div class='bg-alternating-gradient'>";

		switch ( get_row_layout() ) {
			case 'text_block':
				get_template_part( 'components/blocks/text' );
				break;

			case 'image_banner_text':
				get_template_part( 'components/blocks/image-text' );
				break;

			case 'blog_block':
				get_template_part( 'components/blocks/blog' );
				break;

			case 'bio_block':
				get_template_part( 'components/blocks/bio' );
				break;

			case 'process_block':
				get_template_part( 'components/blocks/process' );
				break;

			case 'information_section_block':
				get_template_part( 'components/blocks/information-section' );
				break;

			case 'short_faq_block':
				get_template_part( 'components/blocks/faq-short' );
				break;

			case 'long_faq_block':
				get_template_part( 'components/blocks/faq-long' );
				break;

			case 'image_card_block':
				get_template_part( 'components/blocks/card' );
				break;

			case 'gallery_block':
				get_template_part( 'components/blocks/gallery' );
				break;

			case 'announcement_block':
				get_template_part( 'components/blocks/announcement' );
				break;

			case 'app_block':
				get_template_part( 'components/blocks/app-promo' );
				break;

			case 'mockup_promo':
				get_template_part( 'components/blocks/mockup' );
				break;

			case 'video_embed':
				get_template_part( 'components/blocks/video' );
				break;

			default:
				error_log( "Unhandled content block: " . get_row_layout() );
				break;
		}

		echo "</div>";

		// End loop.
	endwhile;

	echo "</div>";

endif;
?>
<?php get_footer();
