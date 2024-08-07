<?php
/**
 * Template Name: Template - Location (Single)
 *
 * NOTE: You MUST name location_title the same as your taxonomy term for the location or filtering won't work.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */


get_header(); ?>

    <!-- Start Header -->
    <video class="header-video"
           src="<?php the_field( "background_video" ); ?>" autoplay loop
           playsinline muted></video>

    <div class="viewport-header">
        <div class="head-container">
            <div class="center add-padding">

				<?php
				// Get the header_style radio button's value
				$header_choice = get_field( 'header_style' );

				/*
				 * Depending on what the value is, run different HTML.
				 * NOTE both use "location_title," its just sized differently between the two.
				 * Using this method its impossible for both conditions to render, regardless whether content editors
				 * have values in both logo and text.
				 * */
				if ( $header_choice == "logo" ): ?>
                    <img class="w-3/4 md:w-1/2 mx-auto" src="<?php the_field( 'brand' ); ?>" alt="Branding">
                    <h1 class="text-white text-3xl  uppercase font-bold">
						<?php the_field( "location_title" ); ?>
                    </h1>
				<?php endif; ?>

				<?php if ( $header_choice == "text" ): ?>
                    <div class="center add-padding">
                        <h2 class="text-white text-xl md:text-3xl lb-2 font-bold"><?php the_field( "top_line" ); ?></h2>
                        <h1 class="text-white text-5xl  uppercase font-bold">
							<?php the_field( "location_title" ); ?>
                        </h1>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
    <!-- End  Header -->


    <!-- Start Announcement Banner -->
<?php
// Check if there exist row(s) in the 'announcement_banner' field
if ( have_rows( 'announcement_banner' ) ):
	// If row(s) exist, loop through each row
	while ( have_rows( 'announcement_banner' ) ):
		// Set the current row for the loop
		the_row();

		// Check if the sub field 'announcement_content' in the current row has content
		// If it does not have content (empty), skip this iteration of the loop
		if ( ! get_sub_field( 'announcement_content' ) ) {
			// Skip this iteration of the loop
			continue;
		}
		?>
        <div class="bg-salty-gradient">
            <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
                <div class="grid grid-cols-12 gap-4 md:gap-4">
                    <div class="col-span-12 py-5 prose max-w-none announcement-block">
						<?php the_sub_field( 'announcement_content' ); ?>
                    </div>
                </div>
            </div>
        </div>
	<?php

	endwhile;
endif;
?>

    <!-- Location Information. This is the contact info, location pastor, and schedule. -->
    <div class="bg-white-gradient pb-10">
		<?php get_template_part( 'components/layouts/location-info' ); ?>
    </div>


    <!--
	* FLEX CONTENT
	* Load the rest of the content in via flex content so its more customizable.
	-->
<?php
// Check value exists.
if ( have_rows( 'other_sections' ) ) :


	// Loop through rows.
	while ( have_rows( 'other_sections' ) ) : the_row();


		switch ( get_row_layout() ) {
			case 'text_block':
				get_template_part( 'components/blocks/text' );
				break;

			case 'image_banner_text':
				get_template_part( 'components/blocks/image-text' );
				break;

			case 'information_section_block':
				get_template_part( 'components/blocks/information-section' );
				break;

			case 'event_type_block':
				get_template_part( 'components/blocks/event-type' );
				break;

			case 'short_faq_block':
				get_template_part( 'components/blocks/faq-short' );
				break;

			case 'instagram_block':
				get_template_part( 'components/blocks/instagram' );
				break;

			default:
				error_log( "Unhandled content block: " . get_row_layout() );
				break;
		}


		// End loop.
	endwhile;
endif;
?>


<?php get_footer();
