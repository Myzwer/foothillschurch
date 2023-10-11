<?php
/*
 * Image + Info Block - 2 Column Style
 *
 * REQUIRED ACF FIELDS:
 *  - info_image (image)
 *  - info_title (text)
 *  - Section Content (Repeater)
 *    - all_block_content
 */
?>

<div class="xl:w-8/12 max-w-screen-2xl mx-auto pt-5 xl:p-5">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
        <div class="col-span-12 py-5">
            <img class="rounded-xl shadow-xl" src="<?php the_field("info_image"); ?>">
        </div>


        <div class="col-span-12">
            <h2 class="text-2xl pb-10 font-bold capitalize text-center">
                <?php the_field("info_title"); ?>
            </h2>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4 md:gap-10">
        <?php
        // Check rows exists.
        if (have_rows('section_content')):
            while (have_rows('section_content')) : the_row();
                ?>
                <div class="col-span-12 md:col-span-6">
                    <div class="pb-2">
                        <hr class="h-1 rounded-xl bg-black">
                    </div>
                    <div class="prose">
                        <?php the_sub_field("all_block_content"); ?>
                    </div>
                </div>
            <?php
            endwhile;
        endif; ?>
    </div>
</div>
