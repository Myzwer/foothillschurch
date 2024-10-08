<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * Because of the way this template was built, this page will rarely ever be seen.
 * Frontpage will be what users see first, not this.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <div class="bg-blue-gradient relative full-background-lg">
        <div class="bg-no-repeat bg-scroll bg-cover full-background-lg relative"
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
<?php
get_footer();

