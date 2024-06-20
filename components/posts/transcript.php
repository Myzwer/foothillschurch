<?php

?>


<div class="bg-salty-gradient">
    <div class="bg-no-repeat bg-scroll bg-cover relative"
         style="background:
                 url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;
                 height: 20vh;">
        <div class="content-middle text-center">
            <h1 class="text-white text-3xl md:text-5xl font-bold uppercase">Weekly Transcript</h1>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
        <div class="grid grid-cols-12 gap-4 md:gap-4">
            <div class="col-span-12">
                <div class="mt-5">
                    <div class="prose">
						<?php the_post_thumbnail(); ?>
                    </div>
                    <h1 class="text-5xl uppercase font-bold pt-8"><?php echo get_the_title(); ?></h1>
                    <h3 class="font-bold mt-2 text-xl"><?php the_field( 'sermon_series' ); ?></h3>
                    <h3 class="mb-5 text-xl"><?php echo get_the_date(); ?></h3>
                    <div class="blog-content prose">
						<?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_template_part( './components/posts/pagination' ); ?>
