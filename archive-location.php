<?php
/**
 * Template Name: Post Type - Location (Main)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

<div class="bg-white-gradient">
    <div class="grid grid-cols-12">
        <div class="col-span-12 md:col-span-6 lg:col-span-4 pt-10 px-5 md:px-10">

            <div class="grid grid-cols-12">
                <div class="col-span-12 pb-5">
                    <h3 class="uppercase font-bold"><?php the_field( "tagline" ); ?></h3>
                </div>


				<?php

				$location_type = get_field( 'location_type' );
				// Get the current page number for pagination
				$paged = absint( $wp_query->get( 'paged', 1 ) );

				// Define query arguments for retrieving custom post type 'location'
				$args = array(
					'post_type'      => 'location', // Changed to 'location'
					'posts_per_page' => 10, // Display 10 locations per page
					'paged'          => $paged, // Set the current page for pagination
					'tax_query'      => array(
						array(
							'taxonomy' => 'location_type',
							'field'    => 'slug',
							'terms'    => $location_type,
						)
					)
				);

				// Create a new WP_Query object with the defined arguments
				$loop = new WP_Query( $args );

				// Loop through the retrieved locations
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="col-span-12 pt-5">
						<?php get_template_part( 'components/cards/location-card' ); ?>
                    </div>
				<?php
				endwhile;
				wp_reset_postdata();
				?>


            </div>
        </div>

        <div class="col-span-12 md:col-span-6 lg:col-span-8 relative overflow-hidden">
			<?php
			$maps = get_field( 'maps_shortcode' );
			echo do_shortcode( $maps );
			?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

