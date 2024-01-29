<?php
/**
 * Template Name: Custom - Contact
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>
    <!-- Simple Header-->
<?php get_template_part('components/headers/simple-header'); ?>
    <!-- End Header -->

    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
            <div class="col-span-12 text-left mt-10 prose">
                <img class="rounded-xl shadow-xl" src="<?php the_field('banner_image'); ?>" alt="Contact Image Banner">
            </div>

            <div class="col-span-12 text-left my-10 prose">
                <?php the_field('contact_content'); ?>
            </div>
        </div>
    </div>


    <div class="bg-blue-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">

            <?php
            if (have_rows('detail_section')):
                while (have_rows('detail_section')) : the_row();
                    ?>
                    <div class="col-span-12 md:col-span-4 text-left mt-10">
                        <h3 class="text-2xl md:text-3xl mb-3 font-bold text-center"><?php the_sub_field('title'); ?></h3>
                        <div class="prose">
                            <?php the_sub_field('content'); ?>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            ?>

        </div>
    </div>


<?php get_footer();