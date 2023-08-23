<div class="col-span-12 md:col-span-6 lg:col-span-4 mx-5 mb-8 bg-gray-light shadow-lg rounded-lg">
    <img class="rounded-t-lg" src="<?php the_field('branding', get_the_ID()); ?>"
         alt="Sermon Thumbnail">
    <div class="p-5">
        <h3 class="text-xl md:text-2xl font-bold"><?php the_field('event_name', get_the_ID()); ?></h3>
        <h3 class="text-xl md:text-2xl font-bold"><?php the_field('event_date', get_the_ID()); ?></h3>
    </div>
</div>
