<?php
/**
 * Template Name: Template - Form Success
 *
 * This page is used anytime gravity forms has a successful submission so users can know it worked.
 *
 * Usage: Use in WP-Admin, select "Form Success" from page template.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>

    <div class="bg-blue-gradient">
        <div class="bg-no-repeat bg-scroll bg-cover relative"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography-salty.png') center center;">
            <div class="grid grid-cols-12 text-black">
                <div class="col-span-12 md:col-span-6 text-center relative">
                    <div class="content-middle-medium py-20">
                        <div class="prose text-left lg:text-center px-5 lg:mx-auto mb-10">
							<?php the_field( 'content' ); ?>
                        </div>
						<?php
						// Check value exists.
						if ( have_rows( 'call_to_action' ) ) :

							// Loop through rows.
							while ( have_rows( 'call_to_action' ) ) : the_row();
								switch ( get_row_layout() ) {
									case 'file_download_cta':
										?>
                                        <div class="block not-prose">
											<?php
											$args = [
												'button_field' => 'file_for_download',
												'sub_field'    => true,
												'button_class' => 'fab-main mt-3 no-underline',
												'button_icon'  => 'fa-regular fa-arrow-down-to-line'
											];
											get_template_part( 'components/partials/button-template', null, $args );
											?>
                                        </div>
										<?php break;

									case 'primary_cta':
										?>
                                        <div class="block mt-5">
											<?php
											$args = [
												'button_field' => 'button_link',
												'sub_field'    => true,
												'button_class' => 'fab-main mt-3 no-underline',
												'button_icon'  => 'fa-solid fa-circle-arrow-right'
											];
											get_template_part( 'components/partials/button-template', null, $args );
											?>
                                        </div>
										<?php
										break;

									case 'secondary_cta':
										?>
                                        <div class="block mt-5">
											<?php
											$args = [
												'button_field' => 'button_link',
												'sub_field'    => true,
												'button_class' => 'ghost-black',
											];
											get_template_part( 'components/partials/button-template', null, $args );
											?>
                                        </div>
										<?php break;

									default:
										error_log( "Unhandled content block: " . get_row_layout() );
										break;
								}

							endwhile;

						endif;
						?>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-6">
                    <div class="bg-no-repeat bg-scroll bg-cover relative"
                         style="background: url('<?php the_field( 'side_image' ); ?>') center center;
                                 height: 80vh;">
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php get_footer();
