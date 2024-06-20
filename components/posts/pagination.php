<?php
/*
  * Set up the pagination for all the posts, can be linked from anywhere
  * Note it will only work within WP default posts, not custom posts types.
  *
  *
*/
?>

<div class="next-prev grid grid-cols-12 bg-blue-gradient">
    <div class="col-span-12 text-center mx-auto my-5">
        <h3 class="text-2xl md:text-3xl font-bold">Read More</h3>
    </div>

    <div class="col-span-12 md:col-span-6 md:col-start-4 text-center my-5">
        <div class="next-prev grid grid-cols-12">
            <div class="col-span-12 md:col-span-4 mb-10">
				<?php $next = get_permalink( get_adjacent_post( false, '', false ) );
				if ( $next != get_permalink() ) { ?>
                    <a href="<?php echo $next; ?>"
                       class="fab-main">
                        Next Post
                    </a>
				<?php } ?>
            </div>

            <div class="col-span-12 md:col-span-4 mb-10">
                <a href="/posts"
                   class="fab-main">
                    All Posts
                </a>
            </div>


            <div class="col-span-12 md:col-span-4 mb-10">
				<?php $prev = get_permalink( get_adjacent_post( false, '', true ) );
				if ( $prev != get_permalink() ) { ?>
                    <a href="<?php echo $prev; ?>"
                       class="fab-main">
                        Previous Post
                    </a>
				<?php } ?>
            </div>
        </div>

    </div>
</div>
