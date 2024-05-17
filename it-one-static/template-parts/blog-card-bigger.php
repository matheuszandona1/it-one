<div class="blog_card-bigger" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
    <div class="category-link">
        <?php
        $categories = get_the_category(); // Pega todas as categorias do post
        if (!empty($categories)) {
            echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
        }
        ?>

    </div>

    <div class="blog_card-content">
        <div class="blog_card--infos">
            <div class="date"><?php the_time('d/m/Y'); ?></div>
            <span>•</span>
            <div class="time-reading"><?php echo $reading_time; ?> min de leitura</div>
        </div>
        <a href="<?php the_permalink(); ?>" class="blog_card--title">
            <h4><?php the_title(); ?></h4>
        </a>
        <p><?php the_excerpt(); ?></p>
    </div>
</div>