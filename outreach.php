<?php
/**
 * Template Name: Template - Outreach Pages
 *
 * This page is used as the template for the outreach pages, both local and global.
 *
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>

<?php
// Check value exists.
if ( have_rows( 'header_select' ) ) :

	// Loop through rows.
	while ( have_rows( 'header_select' ) ) : the_row();

		switch ( get_row_layout() ) {
			case 'simple_header':
				get_template_part( 'components/headers/default/_simple' );
				break;

			case 'button_header':
				get_template_part( 'components/headers/default/_button' );
				break;

			case 'image_header':
				get_template_part( 'components/headers/default/_image' );
				break;


			default:
				error_log( "Unhandled content block: " . get_row_layout() );
				break;
		}

	endwhile;
endif;
?>

    <div class="bg-white-gradient relative">
        <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
            <div class="grid grid-cols-12 gap-4 md:gap-4">
                <div class="col-span-12 py-5 prose max-w-none">
					<?php the_field( 'intro_text_section' ); ?>
                </div>
            </div>
        </div>


        <!-- Start repeater bank -->
        <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5 ">
            <div class="grid grid-cols-12 gap-4 md:gap-4">

				<?php
				// TOP level repeater (big blocks)
				if ( have_rows( 'outreach_category' ) ):
					while ( have_rows( 'outreach_category' ) ) : the_row();

						$count      = 1; // we know it's at least 1 since we're in the loop already
						$categories = get_field( 'outreach_category' );
						if ( is_array( $categories ) ) {
							$count = count( $categories );
						}
						$mobile = $count > 1 ? "md:col-span-6" : '';
						?>

                        <div class="col-span-12 <?php echo $mobile ?> py-5 max-w-none">
                            <div class="outreach pb-10">
                                <div class="bg-saltydog py-5 text-center text-white text-2xl">
                                    <h3 class="uppercase font-bold"><?php the_sub_field( 'category_title' ); ?></h3>
                                </div>

								<?php if ( have_rows( 'outreach_partner' ) ): ?>
									<?php while ( have_rows( 'outreach_partner' ) ): the_row(); ?>
                                        <details class="outreach-tab">
                                            <summary class="tab-title">
												<?php the_sub_field( 'partner_title' ); ?>
                                            </summary>
                                            <div class="prose max-w-none tab-details">
												<?php the_sub_field( 'partner_details' ); ?>
                                            </div>
                                        </details>
									<?php endwhile; ?>
								<?php endif; ?>

                            </div>
                        </div>


					<?php
					endwhile;
				endif;
				?>
            </div>
        </div>
    </div>

    <!-- End Repeater Bank -->
<?php get_footer();

