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
                                        <a class="elevated-white-lt mt-3 relative block w-full button-link"
                                           href="<?php the_sub_field( 'button_link' ); ?>">
                                            <div class="absolute left-5">
												<?php the_sub_field( 'icon' ); ?>
                                            </div>
                                            <div class="text-center">
												<?php the_sub_field( 'button_text' ); ?>
                                            </div>
                                        </a>
                                    </div>
								<?php } ?>

								<?php if ( get_sub_field( 'hide_button' ) == 'no' && get_sub_field( 'prioritize' ) == 'yes' ) { ?>
                                    <div class="col-span-12 relative mt-5">
                                        <a class="lt-image block w-full button-link"
                                           href="<?php the_sub_field( 'button_link' ); ?>">
											<?php
											$linkImage = get_sub_field( 'link_image' );
											if ( ! empty( $linkImage ) ): ?>
                                                <img class="lt-image-top"
                                                     src="<?php echo esc_url( $linkImage['url'] ); ?>"
                                                     alt="<?php echo esc_attr( $linkImage['alt'] ); ?>">
											<?php endif; ?>
                                            <h3 class="capitalize font-bold text-xl text-black py-3 text-center">
												<?php the_sub_field( 'button_text' ); ?>
                                            </h3>
                                        </a>
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