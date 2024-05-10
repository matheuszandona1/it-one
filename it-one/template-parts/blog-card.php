<div class="blog_card">
    <a href="<?php the_permalink(); ?>" class="blog_card--thumb">
        <?php
        $reading_time = calculate_reading_time(get_the_ID());

        if (has_post_thumbnail()) {
            the_post_thumbnail('thumbnail');
        } else {
            echo '<img src="' . get_stylesheet_directory_uri() . '/dev/dist/res/img/assets/blog-img.webp" alt="">';
        }
        ?>
    </a>
    <div class="blog_card--infos">
        <div class="date"><?php echo get_the_date('d/m/Y'); ?></div>
        <span>•</span>
        <div class="time-reading"><?php echo $reading_time; ?> min de leitura</div>
    </div>
    <a href="<?php the_permalink(); ?>" class="blog_card--title">
        <h4><?php the_title(); ?></h4>
    </a>
    <div class="button--container">
        <a href="<?php the_permalink(); ?>" class="read-more">
            Ler mais
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/arrow_forward.svg" alt="">
        </a>
    </div>
</div>