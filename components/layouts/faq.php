<?php
/*
 * FAQ Template Partial
 *
 * REQUIRED ACF FIELDS:
 *  - faq (repeater)
 *     - Question (text)
 *     - Answer (textarea)
 *     - Button Text (text)
 *     - Button Link (link)
 */
?>

<!-- Start an outer grid. This can be nested inside of a different grid ,but it'll look jank. -->
<div class="grid grid-cols-12 gap-4 lg:gap-10">
    <?php
    // Get Repeater
    if (have_rows('faq')):

        // Loop through the repeater.
        while (have_rows('faq')) : the_row();
            $question = get_sub_field('question');
            $answer = get_sub_field('answer');
            $button_text = get_sub_field('button_text');
            $button_Link = get_sub_field('button_link');
            ?>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <div class="font-bold uppercase text-xl pb-3">
                    <?php echo $question ?>
                </div>
                <div class="border-l-4 pl-3">
                    <p class="pb-4">
                        <?php echo $answer ?>
                    </p>

                    <?php if ($button_Link != null): ?>
                        <a href="<?php echo $button_Link ?>">
                            <div class="ghost inline-block">
                                <?php echo $button_text ?>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        <?php
        endwhile;

    else :
        // Do nothing.
    endif;
    ?>
</div>


