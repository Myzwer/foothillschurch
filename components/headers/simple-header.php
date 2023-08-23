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
            <h1 class="text-white text-3xl md:text-5xl font-bold uppercase"><?php
                the_field('simple_title');
                ?></h1>
        </div>
    </div>
</div>
