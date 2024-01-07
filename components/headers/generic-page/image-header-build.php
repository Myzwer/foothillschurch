<?php
/*
 * UPDATE THISSSSSSSSS
 *
 * REQUIRED ACF FIELDS:
 * small_subtitle (Text field)
 * main_title (text field)
 * primary_cta (group)
 *  - button_text (text field)
 *  - button_link (link field)
 *
 * */
?>

<div class="grid grid-cols-12">
    <div class="col-span-12 md:col-span-6">

        <div class="bg-blue-gradient">
            <div class="bg-no-repeat bg-scroll bg-cover relative generic-image-content-header"
                 style="background:
                         url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;">
                <div class="content-middle text-center">
                    <div class="center add-padding">
                        <h2 class="text-saltydog text-xl lg:text-2xl lb-2 font-bold"><?php the_sub_field("small_subtitle"); ?></h2>
                    </div>
                    <h1 class="text-saltydog text-3xl lg:text-5xl uppercase font-bold"><?php the_sub_field("main_title"); ?></h1>


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
    </div>

    <div class="col-span-12 md:col-span-6">
        <div class="bg-no-repeat bg-scroll bg-cover relative generic-image-content-header"
             style="background: linear-gradient(
                     rgba(0, 0, 0, 0.45),
                     rgba(0, 0, 0, 0.45)
                     ), url('<?php the_sub_field("side_photo"); ?>') center center; background-repeat: no-repeat; background-size: cover;">

        </div>
    </div>

</div>

