<?php
/**
 * Template Name: Front Page
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

    <video class="header-video" src="<?php the_field("video_background"); ?>" autoplay loop playsinline muted></video>

    <div class="viewport-header">
        <div class="head-container">
            <div class="center add-padding">
                <h2 class="text-white text-xl md:text-3xl lb-2 font-bold"><?php the_field("header_subtitle"); ?></h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold"><?php the_field("header_main_title"); ?></h1>

            <?php if (have_rows('primary_cta')): ?>
                <?php while (have_rows('primary_cta')): the_row(); ?>
                    <a href="<?php the_sub_field("button_link"); ?>">
                        <button class="fab-main mt-3">
                            <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field("button_text"); ?>
                        </button>
                    </a>
                <?php endwhile;
            endif; ?>
        </div>
    </div>

    <!-- START Recent Sermon -->
    <div class="bg-white-gradient">
        <div class="lg:max-w-5xl mx-auto grid grid-cols-12 p-5 py-10 gap-4 md:gap-10">
            <!-- Start the actual card -->
            <?php
            // Drop into PHP to call the latest post title and link
            $recent_posts = wp_get_recent_posts(array(
                'post_type' => 'message',
                'numberposts' => 1,
                'post_status' => 'publish',
            ));

            foreach ($recent_posts as $post) : ?>
                <div class="col-span-12 md:col-span-6 text-center relative">
                    <a href="<?php echo get_permalink($post['ID']) ?>">
                        <img class="rounded-xl shadow-xl"
                             src="<?php echo get_the_post_thumbnail_url($post['ID'], 'post-thumbnail'); ?>" alt="">
                    </a>
                </div>

                <div class="col-span-12 md:col-span-6 my-8">
                    <h3 class="text-md uppercase">Latest Message</h3>
                    <h2 class="text-3xl font-bold capitalize"><?php echo get_the_title($post['ID']) ?></h2>
                    <div class="block">
                        <?php
                        function display_taxonomy_terms($post_id, $taxonomy, $label)
                        {
                            // Retrieve the terms associated with the post for the specified taxonomy
                            $terms = get_the_terms($post_id, $taxonomy);

                            if ($terms && !is_wp_error($terms)) {
                                echo '<div class = ""> <h3 class="text-xl capitalize font-bold inline">' . esc_html($label) . '</h3>';
                                // Loop through the terms and display them
                                foreach ($terms as $term) {
                                    echo '<h3 class="text-xl capitalize inline">' . esc_html($term->name) . '</h3></div>';
                                }
                            }
                        }

                        // Get the ID of the most recent message post from the $recent_posts array
                        $latest_message_id = $recent_posts[0]['ID'];

                        // Display Speaker
                        $taxonomy_speaker = 'speaker';
                        $label_speaker = 'Speaker: ';
                        display_taxonomy_terms($latest_message_id, $taxonomy_speaker, $label_speaker);

                        // Display Series
                        $taxonomy_series = 'series';
                        $label_series = 'Series: ';
                        display_taxonomy_terms($latest_message_id, $taxonomy_series, $label_series);
                        ?>
                    </div>

                    <a href="<?php echo get_permalink($post['ID']) ?>">
                        <button class="elevated-blue mt-3 mr-3">
                            <i class="fa-solid fa-arrow-right"></i> Watch Now
                        </button>
                    </a>

                    <a href="<?php the_field('youtube_link', $post['ID'], false, false); ?>" target="_blank">
                        <button class="ghost-paired mt-3">
                            <!-- ACF field, get the post ID of the last post, "false false" strips formatting and provides a raw URL -->
                            View on YouTube
                        </button>
                    </a>
                </div>
            <?php endforeach;
            wp_reset_query(); ?>
            <!-- End Featured Sermon -->
        </div>
    </div>
    <!-- END Recent Sermon -->


    <div class="bg-blue-gradient pb-10">
        <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-6 md:order-2">
                    <img src="<?php the_field("resource_pdf"); ?>" alt="">
                </div>


                <div class="col-span-12 md:col-span-6 md:order-1 relative">
                    <div class="content-middle-medium">
                        <div class="text-left mb-1">
                            <h2 class=" text-xl md:text-3xl lb-2 font-bold capitalize">Get a free resource on us!</h2>
                            <p class="pb-10 md:pb-3">Learn how to manage your money better with this handy PDF based on
                                Dave Ramsay’s Financial Peace University!</p>
                            <?php if (have_posts()) : while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                            else: ?>
                                <p>Sorry, no posts matched your criteria.</p>
                            <?php endif; ?>
                            <p class="opacity-60 text-xs">This site is protected by reCAPTCHA and the Google
                                <a class="underline" href="https://policies.google.com/privacy">Privacy Policy</a> and
                                <a class="underline" href="https://policies.google.com/terms">Terms of Service</a>
                                apply.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-white-gradient">
        <div class="bg-no-repeat bg-scroll bg-cover relative pb-8"
             style="background: linear-gradient(
                     rgba(245, 235, 232, 0.45),
                     rgba(245, 235, 232, 0.45)
                     ), url('<?php the_field('topography', 'option') ?>') center center;">

            <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
                <div class="grid grid-cols-12 gap-1">

                    <div class="col-span-6 md:col-span-4 md:order-1">
                        <img src="<?php the_field("g1"); ?>" alt="">
                    </div>
                    <div class="col-span-6 md:col-span-4 md:order-2">
                        <img src="<?php the_field("g2"); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-3">
                        <img src="<?php the_field("g3"); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-5">
                        <img src="<?php the_field("g4"); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-4 bg-blue-gradient relative shadow-xl">
                        <div class="absolute bottom-2 left-2 md:bottom-5 md:left-5">
                            <h2 class=" text-xl md:text-3xl font-bold uppercase text-left md:pb-2">Events</h2>
                            <button class="gallery-ghost">
                                <i class="fa-solid fa-arrow-right"></i> Join The Fun
                            </button>
                        </div>
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-6">
                        <img src="<?php the_field("g5"); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-darkblue md:p-10">
        <div class=" lg:max-w-5xl lg:mx-auto">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-4 relative p-5">
                    <div class="content-middle-medium">
                        <h1 class="text-white text-3xl md:text-5xl uppercase font-bold">What’s your next step at
                            foothills
                            church?</h1>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-8 pb-10 md:pb-0">
                    <!-- Start Glider -->
                    <div class="glide relative">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <div class="slide-card bg-white p-4 md:p-10 rounded-xl shadow-xl">
                                        <h3 class="text-xl md:text-3xl pb-3 font-bold capitalize">Take your First step
                                            at basecamp</h3>
                                        <p class="pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis
                                            saepe,
                                            tempora. At ipsam, nisi? Aliquam cum doloribus impedit iste laudantium
                                            repudiandae veritatis. Culpa debitis facere libero quam, recusandae sapiente
                                            voluptas.</p>
                                        <button class="ghost">
                                            <i class="fa-solid fa-arrow-right"></i> Start Your Journey
                                        </button>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="slide-card bg-white p-4 md:p-10 rounded-xl shadow-xl">
                                        <h3 class="text-xl md:text-3xl pb-3 font-bold capitalize">Next: Join a Small
                                            Group!</h3>
                                        <p class="pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis
                                            saepe,
                                            tempora. At ipsam, nisi? Aliquam cum doloribus impedit iste laudantium
                                            repudiandae veritatis. Culpa debitis facere libero quam, recusandae sapiente
                                            voluptas.
                                            <button class="ghost">
                                                <i class="fa-solid fa-arrow-right"></i> Start Your Journey
                                            </button>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="slide-card bg-white p-4 md:p-10 rounded-xl shadow-xl">
                                        <h3 class="text-xl md:text-3xl pb-3 font-bold capitalize">Camp II will be next
                                            up after</h3>
                                        <p class="pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis
                                            saepe,
                                            tempora. At ipsam, nisi? Aliquam cum doloribus impedit iste laudantium
                                            repudiandae veritatis. Culpa debitis facere libero quam, recusandae sapiente
                                            voluptas.</p>
                                        <button class="ghost">
                                            <i class="fa-solid fa-arrow-right"></i> Start Your Journey
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Start Arrows -->
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <i class="fa-regular fa-angle-left"></i>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <i class="fa-regular fa-angle-right"></i>
                            </button>
                        </div>
                        <!-- End Arrows -->
                    </div>
                    <!-- End Glider -->
                </div>
            </div>
        </div>
    </div>

    <!-- Start Junk Drawer -->
    <div class="bg-white-gradient md:py-10">
        <div class=" lg:max-w-5xl lg:mx-auto">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-4 p-5">
                    <h4 class="text-2xl pb-2 font-bold capitalize">Our Mission</h4>
                    <hr class="h-1 rounded-xl bg-black">
                    <p class="py-3">Jesus told us what to do, and it has never changed. He told us to "make disciples of
                        Jesus Christ (Matthew 28:19). His mission, or what many refer to as the "great commission," is
                        true for every church, whether they accomplish it or not.</p>
                    <button class="ghost">
                        Continue Reading
                    </button>
                </div>

                <div class="col-span-12 md:col-span-4 p-5">
                    <h4 class="text-2xl pb-2 font-bold capitalize">Our Vision</h4>
                    <hr class="h-1 rounded-xl bg-black">
                    <p class="py-3">Foothills Church exists to develop mature disciples of Christ in relational
                        environments.</p>
                    <button class="ghost">
                        Continue Reading
                    </button>
                </div>

                <div class="col-span-12 md:col-span-4 p-5">
                    <h4 class="text-2xl pb-2 font-bold capitalize">Our Pastor</h4>
                    <hr class="h-1 rounded-xl bg-black">
                    <p class="py-3">Dr. Trenton J. Stewart is the lead pastor of Foothills Church, a multi-site church
                        in the Maryville and Knoxville communities of East Tennessee. Pastor Trent and his wife Micah,
                        planted FC in 2009 with the support of Grace Baptist Church in Knoxville.</p>
                    <button class="ghost">
                        Continue Reading
                    </button>
                </div>

                <div class="col-span-12 md:col-span-4 p-5">
                    <h4 class="text-2xl pb-2 font-bold capitalize">Maryville Location</h4>
                    <hr class="h-1 rounded-xl bg-black">
                    <p class="py-3">Join us this Sunday at our Maryville location for one of our worship experiences at
                        9 AM & 11 AM. We know going to a church or going to a new church can be intimidating, but we
                        promise to do whatever it takes to help you and your family feel like they belong here at
                        FC.</p>
                    <button class="ghost">
                        Plan Your Visit
                    </button>
                </div>

                <div class="col-span-12 md:col-span-4 p-5">
                    <h4 class="text-2xl pb-2 font-bold capitalize">Knoxville Location</h4>
                    <hr class="h-1 rounded-xl bg-black">
                    <p class="py-3">Join us this Sunday at our Knoxville location for our worship experience at 11 AM.
                        We know going to a church or going to a new church can be intimidating, but we promise to do
                        whatever it takes to help you and your family feel like they belong here at FC.</p>
                    <button class="ghost">
                        Plan Your Visit
                    </button>
                </div>

            </div>
        </div>
    </div>


<?php
get_footer();