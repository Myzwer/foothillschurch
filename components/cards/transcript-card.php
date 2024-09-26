<div class="bg-white col-span-12 lg:col-span-6 mx-5 mb-8 bg-gray-light shadow-xl rounded-xl relative flex flex-col">
	<?php
	$title        = get_the_title();
	$thumbnailUrl = get_the_post_thumbnail_url();
	?>
    <img class="rounded-t-lg" src="<?php echo esc_url( $thumbnailUrl ); ?>"
         alt="<?php echo esc_attr( $title . ' Thumbnail' ); ?>">
    <div class="p-5 flex-grow">
        <h2 class="text-xl md:text-2xl font-bold capitalize"><?php echo esc_html( $title ); ?></h2>
        <p class="text-lg"><?php the_date(); ?></p>
        <p class="text-lg"><?php the_field( 'sermon_series' ); ?></p>
    </div>


    <div class="grid grid-cols-12 rounded-b-xl">
        <div class="col-span-12 text-center bg-saltydog rounded-b-xl">
            <a class="block text-lg uppercase py-3 text-white font-bold"
               href="<?php the_permalink(); ?>">Read Now</a>
        </div>
    </div>
</div>

