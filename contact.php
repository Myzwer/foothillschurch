<?php
/**
 * Template Name: Custom - Contact
 *
 * This page is used as the default contact page for the site.
 *
 * Usage: Use in WP-Admin, select "Custom - Contact" from page template.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>
    <!-- Simple Header-->
<?php get_template_part( 'components/headers/simple-header' ); ?>
    <!-- End Header -->

    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
            <div class="col-span-12 text-left mt-10 prose">
				<?php
				// Banner Image
				$banner = get_field( 'banner_image' );
				if ( ! empty( $banner ) ): ?>
                    <img class="rounded-xl shadow-xl" src="<?php echo esc_url( $banner['url'] ); ?>"
                         alt="<?php echo esc_attr( $banner['alt'] ); ?>">
				<?php endif; ?>
            </div>

            <div class="col-span-12 text-left my-10 prose">
				<?php the_field( 'contact_content' ); ?>
            </div>
        </div>
    </div>

<?php if ( have_rows( 'detail_section' ) ): ?>
    <div class="bg-blue-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
			<?php while ( have_rows( 'detail_section' ) ) : the_row(); ?>
                <div class="col-span-12 md:col-span-4 text-left mt-10">
                    <h3 class="text-2xl md:text-3xl mb-3 font-bold text-left"><?php the_sub_field( 'title' ); ?></h3>
                    <div class="prose">
						<?php the_sub_field( 'content' ); ?>
                    </div>
                </div>
			<?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>


<?php get_footer();