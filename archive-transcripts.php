<?php
/**
 * Template Name: Post Type - Transcripts (Archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>


    <!-- Simple Header-->
<?php get_template_part( 'components/headers/simple-header' ); ?>
    <!-- End Header -->

    <!-- Start Body Section -->
    <div class="bg-blue-gradient">
    <div class="2xl:w-9/12 max-w-screen-2xl mx-auto grid grid-cols-12 pt-5 xl:p-5 gap-4 xl:gap-10">
        <div class="col-span-12 xl:col-span-4 mx-5">
            <div class="bg-white p-5 rounded-xl shadow-xl">
                <h3 class="capitalize font-bold text-3xl pb-3">Filter Transcripts</h3>
				<?php
				// Filter Everything plugin shortcode
				// Configured in WP Admin - Location as well. Use plugin settings to adjust.
				echo do_shortcode( '[fe_widget]' );
				?>
            </div>
        </div>


        <div class="col-span-12 xl:col-span-8">
            <div id="primary" class="grid grid-cols-12 gap-4 md:gap-4">
				<?php
				// Get the current page number for pagination
				$paged = absint( $wp_query->get( 'paged', 1 ) );

				// Define query arguments for retrieving custom post type 'message'
				$args = array(
					'post_type'      => 'transcript',
					'posts_per_page' => 10, // Display 10 messages per page
					'paged'          => $paged // Set the current page for pagination
				);

				// Create a new WP_Query object with the defined arguments
				$loop = new WP_Query( $args );

				// Loop through the retrieved messages
				while ( $loop->have_posts() ) : $loop->the_post();
					// Include template partial to display the message card
					get_template_part( 'components/cards/transcript-card' );
				endwhile;
				?>

                <div class="col-span-12 p-5 mb-8 text-center">
					<?php
					// Get the current page and total number of pages
					$paged       = max( 1, get_query_var( 'paged' ) );
					$total_pages = $loop->max_num_pages;
					$rounded     = '';

					if ( $paged == 1 ) {
						$rounded = 'pag-mid-left';
					} elseif ( $paged == $total_pages ) {
						$rounded = 'pag-mid-right';
					}

					echo '<div class="pagination">';

					// Display link to the first page if not on the first page
					if ( $paged > 1 ) {
						echo '<a href="' . esc_url( get_pagenum_link( 1 ) ) . '" class = "pag-left"><i class="fa-solid fa-angles-left"></i></a>';
					}

					// Display link to the previous page if not on the first page
					if ( $paged > 1 ) {
						echo '<a href="' . esc_url( get_pagenum_link( $paged - 1 ) ) . '"><i class="fa-solid fa-angle-left"></i></a>';
					}

					// Display the current page number and total number of pages
					echo '<span class="' . $rounded . '">' . sprintf( __( '%1$s of %2$s', 'text-domain' ), $paged, $total_pages ) . '</span>';

					// Display link to the next page if not on the last page
					if ( $paged < $total_pages ) {
						echo '<a href="' . esc_url( get_pagenum_link( $paged + 1 ) ) . '"><i class="fa-solid fa-angle-right"></i></a>';
					}

					// Display link to the last page if not on the last page
					if ( $paged < $total_pages ) {
						echo '<a href="' . esc_url( get_pagenum_link( $total_pages ) ) . '" class = "pag-right"><i class="fa-solid fa-angles-right"></i></a>';
					}

					echo '</div>';
					?>

                </div>
				<?php wp_reset_postdata(); // Reset post data after the loop ?>
            </div>
        </div>

    </div>




<?php get_footer();
