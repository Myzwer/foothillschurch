<?php
/**
 * Gallery Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a header banner and a simple WYSIWYG editor for header content
 * It also generates 5 images and a CTA block. It can't be used any other way. They form a grid.
 *
 * Usage: get_template_part( 'components/blocks/gallery' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class='bg-alternating-gradient'>
    <div class="bg-no-repeat bg-scroll bg-cover relative pb-8"
         style="background: linear-gradient(
                 rgba(245, 235, 232, 0.45),
                 rgba(245, 235, 232, 0.45)
                 ), url('<?php the_field( 'topography', 'option' ) ?>') center center;">

        <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
            <div class="grid grid-cols-12 gap-1">
                <div class="col-span-12 py-5 prose max-w-none">
					<?php the_sub_field( "header_content" ); ?>
                </div>

                <div class="col-span-6 md:col-span-4 md:order-1">
                    <img src="<?php the_sub_field( "picture_1" ); ?>" alt="Picture 1">
                </div>
                <div class="col-span-6 md:col-span-4 md:order-2">
                    <img src="<?php the_sub_field( "picture_2" ); ?>" alt="Picture 2">
                </div>

                <div class="col-span-6 md:col-span-4 md:order-3">
                    <img src="<?php the_sub_field( "picture_3" ); ?>" alt="Picture 3">
                </div>

                <div class="col-span-6 md:col-span-4 md:order-5">
                    <img src="<?php the_sub_field( "picture_4" ); ?>" alt="Picture 4">
                </div>

                <div class="col-span-6 md:col-span-4 md:order-4 bg-blue-gradient relative shadow-xl">
                    <div class="absolute bottom-2 left-2 md:bottom-5 md:left-5">
						<?php if ( have_rows( 'cta_box' ) ): ?>
							<?php while ( have_rows( 'cta_box' ) ): the_row(); ?>
                                <h2 class=" text-xl md:text-3xl font-bold uppercase text-left md:pb-2"><?php the_sub_field( "title" ); ?></h2>
                                <div class="text-left">
                                    <a href="<?php the_sub_field( 'button_link' ); ?>" class="gallery-ghost text-left">
                                        <i class="fa-solid fa-arrow-right"></i> <?php the_sub_field( 'button_text' ); ?>
                                    </a>
                                </div>
							<?php endwhile;
						endif; ?>
                    </div>
                </div>

                <div class="col-span-6 md:col-span-4 md:order-6">
                    <img src="<?php the_sub_field( "picture_5" ); ?>" alt="Picture 5">
                </div>
            </div>
        </div>
    </div>
</div>