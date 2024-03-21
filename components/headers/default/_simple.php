<?php
/*
 * REQUIRED ACF FIELDS:
 * simple_title (text field)
 *
 * */
?>

<div class="bg-salty-gradient">
    <div class="bg-no-repeat bg-scroll bg-cover relative"
         style="background:
                 url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;
                 height: 20vh;">
        <div class="content-middle text-center">
            <div class="center add-padding">
                <h2 class="text-white text-xl md:text-2xl lb-2 font-bold"><?php the_sub_field( "small_subtitle" ); ?></h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold"><?php the_sub_field( "main_title" ); ?></h1>
        </div>
    </div>
</div>
