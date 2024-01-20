<?php
/**
 * Card Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a header banner and a simple WYSIWYG editor for header content.
 * It also generates a repeater for cards. They can have an image, or be shipped without. Must have 2 CTA's.
 *
 * Usage: get_template_part( 'components/blocks/card' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
        <div class="col-span-12 pt-10 text-center mx-auto">
            <img class="rounded-xl shadow-xl" src="<?php the_sub_field("header_image"); ?>">
        </div>

        <div class="col-span-12 py-5 prose max-w-none">
            <?php the_sub_field("header_content"); ?>
        </div>


        <?php
        if (have_rows('card')):
            while (have_rows('card')) : the_row(); ?>
                <div class="bg-white col-span-12 md:col-span-4 mx-5 mb-8 bg-gray-light shadow-xl rounded-xl relative flex flex-col">
                    <?php if (get_sub_field('card_image')): ?>
                        <img class="rounded-t-lg" src="<?php the_sub_field('card_image'); ?>" alt="Image Cards">
                    <?php endif; ?>
                    <div class="p-5 flex-grow prose">
                        <?php the_sub_field('card_content'); ?>
                    </div>


                    <?php
                    $primary_cta = get_sub_field('primary_cta');
                    $second_cta = get_sub_field('secondary_cta');
                    $rounded_status = 'rounded-bl-xl'; // if there's only one CTA, the rounding needs switched to be full

                    if ($second_cta['button_link'] & $second_cta['button_link']) {
                        $primary_status = 'col-span-6';
                        $secondary_status = 'col-span-6';
                    } else if ($primary_cta['button_link']) {
                        $primary_status = 'col-span-12';
                        $secondary_status = 'hidden';
                        $rounded_status = 'rounded-b-xl';
                    } else {
                        $primary_status = 'hidden';
                        $secondary_status = 'hidden';
                    } ?>
                    <div class="grid grid-cols-12 rounded-b-xl">
                        <div class="<?php echo $primary_status . ' ' . $rounded_status; ?> text-center bg-saltydog">
                            <?php if (have_rows('primary_cta')): ?>
                                <?php while (have_rows('primary_cta')): the_row(); ?>
                                    <a class="block text-lg uppercase py-3 text-white font-bold" target="_blank"
                                       href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <div class="<?php echo $secondary_status; ?> text-center bg-lightblue rounded-br-xl">
                            <?php if (have_rows('secondary_cta')): ?>
                                <?php while (have_rows('secondary_cta')): the_row(); ?>
                                    <a class="block text-lg uppercase py-3 text-black font-bold" target="_blank"
                                       href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php endwhile;
        endif; ?>
    </div>
</div>
