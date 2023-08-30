<?php
/**
 * Template Name: Events Single
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

    <div class="bg-blue-gradient">
    <div class="xl:w-9/12 max-w-screen-2xl mx-auto grid grid-cols-12 p-5 pt-10 gap-4">
        <div class="col-span-12 lg:col-span-7">
            <img class="rounded-lg shadow-xl" src="<?php the_field('branding'); ?>"
                 alt="<?php the_field('event_name'); ?> Brand">
        </div>

        <div class="col-span-12 lg:col-span-5">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 bg-white rounded-sm shadow-xl p-5">
                    <p><i class="fa-regular fa-calendar-days"></i> Date</p>
                    <h2 class="text-lg font-bold uppercase"><?php the_field('event_date'); ?></h2>
                </div>

                <div class="col-span-12 bg-white rounded-sm shadow-xl p-5">
                    <p><i class="fa-regular fa-clock"></i> Time</p>
                    <h2 class="text-lg font-bold uppercase">
                        <?php echo get_field('event_start_time') . ' - ' . get_field('event_end_time'); ?>
                    </h2>
                </div>


                <div class="col-span-12 bg-white rounded-sm shadow-xl p-5">
                    <p><i class="fa-regular fa-location-dot"></i> Location</p>
                    <h2 class="text-lg font-bold uppercase">
                        <?php
                        // Get the selected value from the ACF field
                        $selected_location = get_field('event_location');

                        // Check the value and see if its maryville or knoxville.
                        if ($selected_location === 'https://goo.gl/maps/ycY5iVnrUR8pcEuY8') {
                            echo 'Maryville Location';
                        } elseif ($selected_location === 'https://goo.gl/maps/s8WFsr8MQDbJJqSE7') {
                            echo 'Knoxville Location';
                        } else {
                            the_field('event_location_name');
                        }
                        ?>
                    </h2>
                    <h2 class="text-md uppercase pb-2">
                        <?php the_field('room_location'); ?>
                    </h2>
                    <a href="
<?php
                    // Get the selected value from the ACF field
                    $selected_location = get_field('event_location');

                    // Check the value and see if its maryville or knoxville.
                    if ($selected_location === 'https://goo.gl/maps/ycY5iVnrUR8pcEuY8') {
                        echo the_field('event_location');;
                    } elseif ($selected_location === 'https://goo.gl/maps/s8WFsr8MQDbJJqSE7') {
                        echo the_field('event_location');;
                    } else {
                        the_field('event_location_link');
                    }
                    ?>
" target="_blank">
                        <i class="fa-regular fa-arrow-up-right-from-square"></i> Directions
                    </a>
                </div>

                <div class="col-span-12 bg-white rounded-sm shadow-xl p-5">
                    <button class="elevated-salty">
                        <i class="fa-solid fa-circle-arrow-right"></i> Register
                    </button>
                </div>

            </div>
        </div>
    </div>

<?php get_footer();
