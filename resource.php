<?php
/**
 * Template Name: Custom - Resource Page
 *
 * This page is only used as the template for the main resources page.
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

    <div class="bg-blue-gradient relative">
        <div class="bg-no-repeat bg-scroll bg-cover relative pb-20"
        >
			<?php
			if ( have_rows( 'link_group' ) ):
				while ( have_rows( 'link_group' ) ) :
					the_row();
					?>
                    <div class="lg:max-w-3xl mx-auto grid grid-cols-12 p-5 ">
                        <div class="col-span-12 text-center">
                            <h3 class="text-2xl uppercase font-bold"><?php the_sub_field( 'section_title' ); ?></h3>
                        </div>

						<?php
						if ( have_rows( 'link' ) ):
							while ( have_rows( 'link' ) ) : the_row(); ?>


								<?php if ( get_sub_field( 'hide_button' ) == 'no' && get_sub_field( 'prioritize' ) == 'no' ) { ?>
                                    <div class="col-span-12">
										<?php
										$args = [
											'button_field'      => 'button_link',
											'sub_field'         => true,
											'button_class'      => 'elevated-white-lt mt-3 relative block w-full button-link',
											'button_icon_field' => 'icon',
											'long_button'       => true
										];
										get_template_part( 'components/partials/button-template', null, $args );
										?>
                                    </div>
								<?php } ?>

								<?php if ( get_sub_field( 'hide_button' ) == 'no' && get_sub_field( 'prioritize' ) == 'yes' ) { ?>
                                    <div class="col-span-12 relative mt-5">
										<?php get_template_part( 'components/partials/image-button' ); ?>
                                    </div>

								<?php } ?>


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

<?php get_footer();