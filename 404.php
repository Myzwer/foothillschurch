<?php
/**
 * Template Name: Custom - 404 Error
 *
 * This page displays anytime a user gets a 404 error.
 *
 * Usage: WP will use this automatically if a user gets a 404. Can be edited from the ACF "Options" tab
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>

    <div class="bg-blue-gradient relative full-background-lg">
        <div class="bg-no-repeat bg-scroll bg-cover  full-background-lg relative"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography-salty.png') center center; ">

            <div class="text-center content-middle-medium mx-auto py-20 relative">
				<?php
				$image = get_field( 'tomb', 'options' );
				if ( ! empty( $image ) ): ?>
                    <img class="block mx-auto w-1/2 md:w-fit pt-5" src="<?php echo esc_url( $image['url'] ); ?>"
                         alt="<?php echo esc_attr( $image['alt'] ); ?>">
				<?php endif; ?>
                <h1 class="uppercase text-3xl md:text-6xl font-bold"><?php the_field( 'title', 'options' ); ?></h1>
                <h3 class="uppercase text-2xl font-bold pt-3"><?php the_field( 'subtitle', 'options' ); ?></h3>
                <p class="text-xl font-bold pt-5"><?php the_field( 'explanation', 'options' ); ?></p>
                <div class="mt-5">
					<?php
					$args = [
						'button_field' => 'button_link',
						'options'      => true,
						'button_class' => 'fab-main',
						'button_icon'  => 'fa-solid fa-circle-arrow-right'
					];
					get_template_part( 'components/partials/button-template', null, $args );
					?>
                </div>
            </div>

        </div>
    </div>

<?php get_footer();
