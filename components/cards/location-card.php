<hr>

<div class="mt-5">
    <p class="uppercase text-sm font-bold">Join us at our</p>
    <h2 class="capitalize font-bold text-2xl"><?php the_sub_field("location_title"); ?></h2>
    <p><?php the_sub_field("address"); ?></p>
</div>

<div class="mb-5">
    <a href="<?php the_sub_field("location_page"); ?>">
        <button class="elevated-blue mt-3 mr-3">
            <i class="fa-solid fa-arrow-right"></i> Plan A Visit
        </button>
    </a>
    <a href="<?php the_sub_field("maps_link"); ?>" target="_blank">
        <button class="ghost-paired mt-3">
            Launch Maps
        </button>
    </a>
</div>
