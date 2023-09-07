<?php
/*
 * Button Group Template Partial
 *
 * REQUIRED ACF FIELDS:
 *  - Section Title (text)
 *  - Group (Button)
 *     - Button Text
 *     - Button Link
 */
?>

<!-- Start an outer grid. This can be nested inside of a different grid ,but it'll look jank. -->
<h3 class="text-2xl font-bold mb-5"><?php the_field("section_title"); ?></h3>
<div class="grid grid-cols-12 gap-4 lg:gap-10">
    <div class="col-span-12">
        <?php
        // Get Repeater
        if (have_rows('button')):

            // Loop through the repeater.
            while (have_rows('button')) : the_row();
                $text = get_sub_field('button_text');
                $link = get_sub_field('button_link');
                ?>


                <div class="font-bold text-xl pb-3 md:inline-block mr-3">
                    <?php if ($link != null): ?>
                        <a href="<?php echo $link ?>">
                            <div class="ghost inline-block">
                                <?php echo $text ?>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>


            <?php
            endwhile;

        else :
            // Do nothing.
        endif;
        ?>
    </div>
</div>