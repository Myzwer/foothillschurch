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

    <!-- Simple Header-->
<?php get_template_part('components/headers/simple-header'); ?>
    <!-- End Header -->


    <div class="m-4 md:m-10 lg:max-w-6xl lg:mx-auto privacy-policy">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 p-5 prose">
                <img class="rounded-xl shadow-xl" src="<?php the_field('banner_image'); ?>"
                     alt="Privacy Policy Banner Image">
            </div>

            <div class="col-span-12 p-5 prose">
                <?php if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile;
                else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php get_footer();
