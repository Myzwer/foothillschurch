<?php
/**
 * Template Name: Series Single
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <div class="bg-salty-gradient">
        <div class="bg-no-repeat bg-scroll bg-cover relative"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;
                     height: 20vh;">
            <div class="content-middle text-center">

                <?php
                // Get the current taxonomy term
                $term = get_queried_object();

                // Check if a term was found
                if ($term) {
                    // Display the taxonomy term name
                    echo '<h1 class="text-white text-3xl md:text-5xl font-bold uppercase">' . "Series: " . esc_html($term->name) . '</h1>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
            <!-- "Recent Message" text -->

            <?php
            // Get the current taxonomy term
            $term = get_queried_object();

            // WP_Query arguments
            $args = array(
                'post_type' => 'message',
                'post_status' => 'publish',
                'nopaging' => false,
                'order' => 'DESC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'series',
                        'field' => 'id', // You can use 'slug' or 'term_id' based on your needs
                        'terms' => $term->term_id, // Use the term ID of the current term
                    ),
                ),
            );

            // The Query
            $recents = new WP_Query($args);

            // The Loop
            if ($recents->have_posts()) {
                while ($recents->have_posts()) {
                    $recents->the_post();

                    ?>

                    <div class="col-span-6 lg:col-span-3 shadow-lg rounded-lg bg-blue-gradient height-lock-message">
                        <a href="<?php the_permalink(); ?>">
                            <div class="grid grid-cols-12">
                                <div class="col-span-12">
                                    <img class="rounded-t-xl" src="<?php the_post_thumbnail_url() ?>"
                                         alt="Sermon Thumbnail">
                                </div>
                                <div class="col-span-12 p-3">
                                    <h3 class="text-md font-bold"><?php echo get_the_title(); ?></h3>
                                    <p class="text-sm"><?php echo get_the_date(); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                
                <?php
            } else {
                echo 'there are no posts.'; // no posts found
            }
            // Restore original Post Data
            wp_reset_postdata();
            ?>

            <div class="col-span-12 text-center my-5">
                <a href="<?php the_field('messages_main', 'options'); ?>">
                    <button class="ghost mt-3">
                        See All Messages
                    </button>
                </a>
            </div>
        </div>
    </div>


<?php get_footer();
