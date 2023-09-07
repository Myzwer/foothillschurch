<?php
/*
 * Video Template Partial
 *
 * NOTE: This will take up the full width of its container, so its parent must be set appropriately for size.
 *
 * REQUIRED ACF FIELDS:
 *  - Video (text)
 */
?>

<div class='mx-auto grid grid-cols-12'>
    <div class="col-span-12 lg:col-span-8 xl:col-span-6">
        <h3 class="text-2xl font-bold mb-5"><?php the_sub_field("high_title"); ?></h3>
        <div class="video-container">
            <?php the_sub_field("video_url"); ?>
        </div>
        <h3 class="text-xl font-bold mt-5"><?php the_sub_field("low_title"); ?></h3>
    </div>
</div>
