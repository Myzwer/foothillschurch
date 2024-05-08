<?php
/**
 * Template Name: Template - Resource Bank
 *
 * This page is used anytime you need to gather resources together on a single page.
 *
 * Usage: Use when you need an accordion to show / hide resources.
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

    <!-- Start Paragraph Header -->
    <div class="bg-blue-gradient">
        <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5 ">
            <div class="grid grid-cols-12 gap-4 md:gap-4">
                <div class="col-span-12 py-5 text-center mx-auto">
                    <img class="rounded-xl shadow-xl" src="<?php the_field( 'image_banner' ); ?>">
                </div>
                <div class="col-span-12 py-5 prose max-w-none">
					<?php the_field( 'details' ); ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Start giant ass repeater bank -->
    <div class="bg-white-gradient">
        <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5 ">
            <div class="grid grid-cols-12 gap-4 md:gap-4">
                <div class="col-span-12 py-5 max-w-none">

					<?php
					// TOP level repeater (big blocks)
					if ( have_rows( 'resource_block' ) ):
						while ( have_rows( 'resource_block' ) ) : the_row();
							?>


                            <div class="resource pb-10">
                                <div class="bg-saltydog py-5 text-center text-white text-2xl">
                                    <h3><?php the_sub_field( 'resource_block_title' ); ?></h3>
                                </div>

								<?php
								// Start the group / topic header
								if ( have_rows( 'resource_group' ) ):
									while ( have_rows( 'resource_group' ) ) : the_row();
										?>

                                        <ul class="resource-tab">
                                            <li class="tab-title"><i class="fa fa-chevron-right" aria-hidden="true"></i>
												<?php the_sub_field( 'group_title' ); ?>
                                            </li>


                                            <li class="tab-content">
												<?php
												// The individual links inside the accordion.
												if ( have_rows( 'resource_item' ) ):
													while ( have_rows( 'resource_item' ) ) : the_row();

														// Either display the words users provide or "View on Amazon" if its left blank.
														$link_text = ( get_sub_field( 'link_text' ) != null ) ? get_sub_field( 'link_text' ) : "View on Amazon";

														?>
                                                        <div class="py-4">
                                                            <p class="font-bold capitalize text-lg"><?php the_sub_field( 'resource_title' ); ?></p>
                                                            <a class="underline"
                                                               href="<?php the_sub_field( 'link_url' ); ?>"
                                                               target="_blank">
																<?php echo $link_text; ?>
                                                            </a>
                                                            <i class="fa-sharp fa-regular fa-arrow-up-right-from-square"></i>
                                                        </div>
													<?php
													endwhile;
												endif;
												?>
                                            </li>


                                        </ul>
									<?php
									endwhile;
								endif;
								?>

                            </div>
						<?php
						endwhile;
					endif;
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Repeater Bank -->


<?php get_footer();
