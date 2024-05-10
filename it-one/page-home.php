<?php

// Template Name: Home

get_header();
?>

<main class="page--home">
    <?php get_template_part('template-parts/home/hero'); ?>
    <?php get_template_part('template-parts/home/refs'); ?>

    <div class="divider">
        <span class="first"></span>
        <span class="second"></span>
        <span class="third"></span>
    </div>

    <?php get_template_part('template-parts/home/solutions'); ?>
    <?php get_template_part('template-parts/home/way'); ?>


    <?php get_template_part('template-parts/home/story'); ?>
    <?php get_template_part('template-parts/home/behind'); ?>
    <?php get_template_part('template-parts/home/news'); ?>
    <?php get_template_part('template-parts/home/cta'); ?>



</main>