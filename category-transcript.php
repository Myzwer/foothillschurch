<?php
/**
 * Template Name: Archive - Transcript
 */

get_header(); ?>

<div class="bg-salty-gradient">
    <div class="bg-no-repeat bg-scroll bg-cover relative"
         style="background:
                 url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;
                 height: 20vh;">
        <div class="content-middle text-center">
            <h1 class="text-white text-3xl md:text-5xl font-bold uppercase">Transcripts Archive</h1>
        </div>
    </div>
</div>

<div class="bg-white-gradient">
    <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
        <div class="grid grid-cols-12 gap-4 md:gap-4">
            <div class="col-span-12 py-5 prose max-w-none">
				<?php the_field( "header_content" ); ?>
            </div>
        </div>
    </div>
</div>

<div class="bg-blue-gradient">
    <div class="2xl:w-9/12 max-w-screen-2xl mx-auto grid grid-cols-12 pt-5 xl:p-5 gap-4 xl:gap-10">
		<?php
		$args             = array(
			'category_name'  => 'transcript',
			'posts_per_page' => 1,
		);
		$transcript_posts = new WP_Query( $args );

		if ( $transcript_posts->have_posts() ) :
			while ( $transcript_posts->have_posts() ) :
				$transcript_posts->the_post();

				get_template_part( 'components/cards/transcript-card' );
			endwhile;
		endif;
		?>
    </div>
    <div class="col-span-12 p-5 pb-20 pagination text-center">
		<?php
		// Define pagination parameters and display pagination links
		$big = 999999999;
		echo paginate_links( array(
			'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'total'        => $transcript_posts->max_num_pages,
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'format'       => '?paged=%#%',
			'show_all'     => false,
			'type'         => 'list',
			'end_size'     => 2,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Transcripts', 'text-domain' ) ),
			'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Transcripts', 'text-domain' ) ),
			'add_args'     => false,
			'add_fragment' => '',
		) );
		?>
    </div>
	<?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
