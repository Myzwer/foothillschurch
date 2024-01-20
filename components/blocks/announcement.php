<?php
/**
 * Announcement Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a simple WYSIWYG editor for high profile information.
 * It also adds a saltydog background, overriding the counter used in the rest of the blocks.
 *
 * Usage: get_template_part( 'components/blocks/announcement' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>
<div class="bg-salty-gradient">
    <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
        <div class="grid grid-cols-12 gap-4 md:gap-4">
            <div class="col-span-12 py-5 prose max-w-none announcement-block">
                <?php the_sub_field("content"); ?>
            </div>
        </div>
    </div>
</div>

