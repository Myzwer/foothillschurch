<?php
/*
 * REQUIRED ACF FIELDS:
 * small_subtitle (Text field)
 * main_title (text field)
 * primary_cta (group)
 *  - button_text (text field)
 *  - button_link (link field)
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
                <h2 class="text-white text-xl md:text-2xl lb-2 font-bold"><?php the_sub_field("small_subtitle"); ?></h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold"><?php the_sub_field("main_title"); ?></h1>


            <?php if (have_rows('primary_cta')): ?>
                <?php while (have_rows('primary_cta')): the_row(); ?>

                    <?php if (get_sub_field('button_link')): ?>
                        <a href="<?php the_sub_field("button_link"); ?>">
                            <button class="fab-main mt-3">
                                <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field("button_text"); ?>
                            </button>
                        </a>
                    <?php endif; ?>

                <?php endwhile;
            endif; ?>

        </div>
    </div>
</div>
