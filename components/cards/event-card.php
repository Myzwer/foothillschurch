<div class="bg-white col-span-12 md:col-span-6 mx-5 mb-8 bg-gray-light shadow-xl rounded-xl">
    <img class="rounded-t-lg" src="<?php the_field('branding', get_the_ID()); ?>"
         alt="Event Brand">
    <div class="p-5">
        <h2 class="text-xl md:text-2xl font-bold capitalize"><?php the_field('event_name', get_the_ID()); ?></h2>
        <h3 class="text-lg"><?php the_field('event_date', get_the_ID()); ?></h3>
        <h3 class="text-lg pb-3"><?php the_field('event_start_time', get_the_ID()); ?></h3>
        <p class="pb-3">
            <!-- Display the "details" section, but limit the text length-->
            <?php $trim_length = 140;  //desired length of text to display
            $custom_field = 'main_details';
            $value = get_post_meta($post->ID, $custom_field, true);
            if ($value) {
                if (strlen($value) > $trim_length)
                    $value = rtrim(substr($value, 0, $trim_length)) . '...';
                echo $value;
            } ?>
        </p>
    </div>

    <div class="grid grid-cols-12 rounded-b-xl">
        <div class="col-span-6 text-center bg-saltydog rounded-bl-xl">
            <a class="block text-lg uppercase py-3 text-white font-bold" target="_blank"
               href="<?php the_field('registration_link', get_the_ID()); ?>">Register</a>
        </div>

        <div class="col-span-6 text-center bg-lightblue rounded-br-xl">
            <a class="block text-lg uppercase py-3 text-black font-bold"
               href="<?php the_permalink(); ?>">Learn More</a>
        </div>
    </div>
</div>

