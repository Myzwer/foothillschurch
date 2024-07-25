<!-- "Popular Messages" text -->
<div class="col-span-12 text-left mt-10">
    <h3 class="text-2xl md:text-3xl mb-3 font-bold">Popular Messages</h3>
</div>
<?php

// Check rows exists.
if ( have_rows( 'popular_messages', 84 ) ):

	// Loop through rows.
	while ( have_rows( 'popular_messages', 84 ) ) : the_row();
		?>
        <div class="col-span-12 lg:col-span-4">

			<?php
			$featured_posts = get_sub_field( 'message' );
			if ( $featured_posts ): ?>

				<?php foreach ( $featured_posts as $post ):

					// Setup this post for WP functions (variable must be named $post).
					setup_postdata( $post ); ?>

                    <div class="relative">
                        <a href="<?php the_permalink(); ?>">
                            <img class="rounded-xl shadow-xl" src="<?php the_post_thumbnail_url(); ?>"
                                 alt="Sermon Thumbnail">

                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <div class="bg-black/[.5] rounded-full py-5 px-7">
                                    <i class="fa-regular fa-play text-3xl text-white"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="font-bold capitalize text-xl pt-3"><?php the_title(); ?></h3>

                        <p class=" capitalize text-lg">
							<?php
							// DISPLAY SERIES NAME
							$taxonomy = 'series';
							// Get the terms associated with the current post
							$terms = get_the_terms( get_the_ID(), $taxonomy );
							if ( $terms && ! is_wp_error( $terms ) ) {
								// Loop through the terms and display them
								foreach ( $terms as $term ) {
									echo 'Series: <a href="' . get_term_link( $term, $taxonomy ) . '">' . esc_html( $term->name ) . '</a>';
								}
							}
							?>
                        </p>
                        <p class=" capitalize text-sm"><?php the_date(); ?></p>
                    </a>
				<?php endforeach; ?>

				<?php
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>

        </div>
	<?php

		// End loop.
	endwhile;

endif;
?>

<div class="col-span-12 text-center my-5">
    <div class="mt-3">
        <a href="<?php the_field( "archive_link" ); ?>" class="ghost-black mt-3">
            See All Messages
        </a>
    </div>
</div>
