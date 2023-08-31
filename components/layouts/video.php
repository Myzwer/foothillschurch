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
    <div class="col-span-12">
        <?php the_sub_field("video_url"); ?>
    </div>
</div>
