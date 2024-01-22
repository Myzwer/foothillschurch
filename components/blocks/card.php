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
            while (have_rows('card')) :
                the_row(); ?>
                <div class="bg-white col-span-12 md:col-span-4 mx-5 mb-8 bg-gray-light shadow-xl rounded-xl relative flex flex-col">
                    <?php if (get_sub_field('card_image')): ?>
                        <img class="rounded-t-lg" src="<?php the_sub_field('card_image'); ?>" alt="Image Cards">
                    <?php endif; ?>
                    <div class="p-5 flex-grow prose">
                        <?php the_sub_field('card_content'); ?>
                    </div>


                    <?php
                    // Retrieve values from ACF fields for primary and secondary call-to-action (CTA)
                    $primary_cta = get_sub_field('primary_cta');
                    $secondary_cta = get_sub_field('secondary_cta');

                    // Determine the CSS classes for the primary CTA based on the existence of 'button_link' in the secondary CTA
                    $primary_classes = $secondary_cta['button_link'] ? 'col-span-6 rounded-bl-xl' : 'col-span-12 rounded-b-xl';
                    ?>
                    <div class="grid grid-cols-12 rounded-b-xl">

                        <?php
                        // If button link exists, show this class. If it doesn't, hide it.
                        if ($primary_cta['button_link']): ?>
                            <div class="<?php echo $primary_classes ?> text-center bg-saltydog">
                                <a
                                        class="block text-lg uppercase py-3 text-white font-bold"
                                        target="_blank"
                                        href="<?php echo $primary_cta['button_link']; ?>"
                                >
                                    <?php echo $primary_cta['button_text']; ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php
                        // If button link exists, show this class. If it doesn't, hide it.
                        if ($secondary_cta['button_link']): ?>
                            <div class="col-span-6 text-center bg-lightblue rounded-br-xl">
                                <a
                                        class="block text-lg uppercase py-3 text-black font-bold"
                                        target="_blank"
                                        href="<?php echo $secondary_cta['button_link']; ?>"
                                >
                                    <?php echo $secondary_cta['button_text']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile;
        endif; ?>
    </div>
</div>
