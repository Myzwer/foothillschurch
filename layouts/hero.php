<?php

$heading = get_sub_field('heading');
$subheading = get_sub_field('subheading');
$image = get_sub_field('image');
$cta = get_sub_field('cta');

?>
<style>
  .hero {
    overflow: hidden;
    position: relative;
  }

  .hero-image {
    position: absolute;
    z-index: 0;
  }

  .hero-content {
    padding: 40px 20px;
    z-index: 1;
    position: relative;
  }

  .hero-content h1 {
    color: white;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .hero-content h2 {
    color: antiquewhite;
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .hero-content .button {
    background: white;
    padding: 10px 15px;
    color: black;
    border-radius: 5px;
  }
</style>
<div class="hero">
  <img class="hero-image" src="<?= $image['url'] ?>" />
  <div class="hero-content">
    <h1><?= $heading ?></h1>
    <? if ($subheading) : ?> <h2><?= $subheading ?></h2> <? endif; ?>
    <a class="button" href="<?= $cta['button_link'] ?>"><?= $cta['button_text'] ?></a>
  </div>
</div>