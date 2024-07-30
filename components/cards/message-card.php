<div class="bg-white col-span-12 lg:col-span-6 mx-5 mb-8 bg-gray-light shadow-xl rounded-xl relative flex flex-col">
    <img class="rounded-t-lg" src="<?php echo get_the_post_thumbnail_url(); ?>"
         alt="Message Thumbnail">
    <div class="p-5 flex-grow">
        <h2 class="text-xl md:text-2xl font-bold capitalize"><?php the_title(); ?></h2>
        <p class="capitalize text-lg">
			<?php
			// DISPLAY SERIES NAME
			$taxonomy = 'series';
			// Get the terms associated with the current post
			$terms = get_the_terms( get_the_ID(), $taxonomy );
			if ( $terms && ! is_wp_error( $terms ) ) {
				// Create an array to hold term names
				$term_names = [];
				// Loop through the terms and add them to the array
				foreach ( $terms as $term ) {
					$term_names[] = esc_html( $term->name );
				}
				// Display the terms separated by a comma and a space
				echo implode( ', ', $term_names );
			}
			?>
        </p>

        <p class="capitalize text-lg">
			<?php
			// DISPLAY SPEAKERS NAME
			$taxonomy = 'speaker';
			// Get the terms associated with the current post
			$terms = get_the_terms( get_the_ID(), $taxonomy );
			if ( $terms && ! is_wp_error( $terms ) ) {
				// Create an array to hold term names
				$term_names = [];
				// Loop through the terms and add them to the array
				foreach ( $terms as $term ) {
					$term_names[] = esc_html( $term->name );
				}
				// Display the terms separated by a comma and a space
				echo implode( ', ', $term_names );
			}
			?>
        </p>

        <p class="text-lg"><?php the_date(); ?></p>
    </div>


    <div class="grid grid-cols-12 rounded-b-xl">
        <div class="col-span-6 text-center bg-saltydog rounded-bl-xl">
            <a class="block text-lg uppercase py-3 text-white font-bold"
               href="<?php the_permalink(); ?>">Watch Now</a>
        </div>

        <div class="col-span-6 text-center bg-lightblue rounded-br-xl">
            <a class="block text-lg uppercase py-3 text-black font-bold"
               href="<?php the_field( 'youtube_link', false, false ); ?>" target="_blank">YouTube</a>
        </div>
    </div>
</div>




