<?php
/**
 * Template Name: Events Main
 *
 * The Frontpage of the Bootcamp II Theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>


    <div class="bg-white pb-5">
        <div class="md:w-9/12 mx-auto grid grid-cols-12 p-5">

            <?php
            // WP_Query arguments
            $args = array(
                'post_type' => array('event'),
                'post_status' => array('publish'),
                'nopaging' => false,
                'order' => 'DESC',
                'orderby' => 'date',
                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
            );

            // The Query
            $events = new WP_Query($args);

            // The Loop
            if ($events->have_posts()) {
                while ($events->have_posts()) {
                    $events->the_post();
                    get_template_part('components/cards/event-card');
                } ?>


                <!-- Start Pagination-->
                <div class="col-span-12 p-5 mb-8 pagination text-center">
                    <?php
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'total' => $events->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'format' => '?paged=%#%',
                        'show_all' => false,
                        'type' => 'list',
                        'end_size' => 2,
                        'mid_size' => 1,
                        'prev_next' => true,
                        'prev_text' => sprintf('<i></i> %1$s', __('Newer Videos', 'text-domain')),
                        'next_text' => sprintf('%1$s <i></i>', __('Older Videos', 'text-domain')),
                        'add_args' => false,
                        'add_fragment' => '',
                    ));
                    ?>
                </div>

                <?php
            } else { ?>
                <h3 class="text-center font-bold">There are no upcoming events.</h3>
                <?php
            }
            // Restore original Post Data
            wp_reset_postdata();
            ?>
            <!-- End Pagination -->
        </div>
    </div>


<?php get_footer();