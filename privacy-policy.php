<?php
/**
 * Template Name: Custom - Privacy Policy
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'components/headers/simple-header' ); ?>

    <div class="m-4 md:m-10 lg:max-w-6xl lg:mx-auto privacy-policy">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 p-5 prose">
				<?php
				$bannerImage = get_field( 'banner_image' );
				if ( ! empty( $bannerImage ) ): ?>
                    <img class="rounded-xl shadow-xl" src="<?php echo esc_url( $bannerImage['url'] ); ?>"
                         alt="<?php echo esc_attr( $bannerImage['alt'] ); ?>">
				<?php endif; ?>
            </div>

            <div class="col-span-12 p-5 prose">
				<?php the_content(); ?>
            </div>
        </div>
    </div>

<?php get_footer();
