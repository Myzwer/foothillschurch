<hr>

<div class="mt-5">
    <p class="uppercase text-sm font-bold">Join us at our</p>
    <h2 class="capitalize font-bold text-2xl"><?php the_title(); ?> Location</h3></h2>
    <p><?php the_field( "address" ); ?></p>
</div>

<div class="mb-5 mt-3">
    <a href="<?php the_permalink(); ?>" class="elevated-blue mr-3">
        <i class="fa-solid fa-arrow-right"></i> Plan A Visit
    </a>
    <a id="map-link"
       href="<?php the_field( 'gmap_link' ); ?>"
       target="_blank"
       class="ghost-paired mt-3"
       data-gmap-link="<?php the_field( 'gmap_link' ); ?>"
       data-amap-link="<?php the_field( 'amap_link' ); ?>">
        Launch Maps
    </a>
</div>
