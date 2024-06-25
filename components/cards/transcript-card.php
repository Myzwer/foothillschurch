<div class="bg-white col-span-12 me:col-span-6 lg:col-span-4 mx-5 mb-8 bg-gray-light shadow-xl rounded-xl relative flex flex-col">
    <img class="rounded-t-lg" src="<?php echo get_the_post_thumbnail_url(); ?>"
         alt="Message Thumbnail">
    <div class="p-5 flex-grow">
        <h2 class="text-xl md:text-2xl font-bold capitalize"><?php the_title(); ?></h2>
        <p class="text-lg"><?php the_date(); ?></p>
        <p class="text-lg"><?php the_field( 'sermon_series' ); ?></p>
    </div>


    <div class="grid grid-cols-12 rounded-b-xl">
        <div class="col-span-6 text-center bg-saltydog rounded-bl-xl">
            <a class="block text-lg uppercase py-3 text-white font-bold"
               href="<?php the_permalink(); ?>">Read Now</a>
        </div>

        <div class="col-span-6 text-center bg-lightblue rounded-br-xl">
            <a class="block text-lg uppercase py-3 text-black font-bold"
               href="#">Watch Now</a>
        </div>
    </div>
</div>

