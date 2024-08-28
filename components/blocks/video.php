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

<div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
        <div class="col-span-12 py-5 prose max-w-none">
			<?php the_sub_field( "top_info" ); ?>
        </div>
        <div class="col-span-12 py-5">
            <div class="video-container">
				<?php the_sub_field( "video_embed_url" ); ?>
            </div>
        </div>
        <div class="col-span-12 py-5 prose max-w-none">
			<?php the_sub_field( "bottom_info" ); ?>
        </div>
    </div>
</div>
