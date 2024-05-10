<?php


// Template Name: All Posts




get_header();
?>

<main class="page-archive">
    <div class="search">
        <h1 class="d-title">Artigos</h1>
        <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
            <input class="email" type="text" value="<?php echo get_search_query(); ?>" name="search" id="search"
                placeholder="O que você procura?">
            <button type="submit"><img
                    src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/search.svg" alt="">
            </button>
        </form>

    </div>

    <section class="destaque">
        <div class="destaque_container">
            <div class="all_slick">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3, // Ou outro número específico de posts que você deseja exibir
                    'meta_query' => array(
                        array(
                            'key' => 'featured_post',
                            'value' => 'yes',
                            'compare' => '='
                        )
                    )
                );
                $featured_posts = new WP_Query($args);

                if ($featured_posts->have_posts()) {
                    while ($featured_posts->have_posts()) {
                        $featured_posts->the_post();
                        $reading_time = calculate_reading_time(get_the_ID());
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        ?>
                        <div class="blog_card">
                            <a href="<?php the_permalink(); ?>" class="blog_card--thumb">
                                <?php
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
                                <a href="<?php the_permalink(); ?>" class="read-more"> Ler mais <img
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/arrow_forward.svg"
                                        alt=""></a>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>Nenhum post destacado encontrado.</p>';
                }
                ?>
            </div>



    </section>

    <div class="list_cats">
        <h3 class="d-title">Navegue pelas categorias</h3>
        <div class="list_cats--items">
            <?php
            // Obtém as quatro categorias mais populares
            $popular_categories = get_categories(
                array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => 4 // Quantidade de categorias que deseja recuperar
                )
            );

            // Loop sobre as categorias
            foreach ($popular_categories as $category) {
                ?>
                <div class="category-link">
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>

    </div>

    <!-- get_template_part( 'template-parts/blog-card');
get_template_part( 'template-parts/blog-card-bigger'); -->



    <div class="looping-global">
        <div class="list-container">
            <?php
            // Determinando a página atual.
            $paged = max(1, get_query_var('paged'));

            // Definindo os argumentos da consulta.
            $args = array(
                'posts_per_page' => 10,
                'paged' => $paged,
                'ignore_sticky_posts' => 1
            );

            // Executando a consulta.
            $wp_query = new WP_Query($args);

            // Contador de posts exibidos.
            $post_count = 0;
            $total_posts = $wp_query->found_posts;
            $posts_displayed = min($total_posts, ($paged - 1) * 10);

            if ($wp_query->have_posts()) {
                ?>
                <div class="list-container-grid">
                    <div class="left-column">
                        <?php
                        // Mostrando os primeiros dois posts.
                        while ($wp_query->have_posts() && $post_count < 2) {
                            $wp_query->the_post();
                            $post_count++;
                            $posts_displayed++;
                            include ('template-parts/blog-card.php'); // Substitua pelo caminho do seu arquivo de código de exibição de post
                        }
                        ?>
                    </div>
                    <div class="right-column">
                        <?php
                        // Mostrando o terceiro post como destaque, se disponível.
                        if ($wp_query->have_posts() && $post_count == 2) {
                            $wp_query->the_post();
                            $post_count++;
                            $posts_displayed++;
                            include ('template-parts/blog-card-bigger.php'); // Substitua pelo caminho do seu arquivo de código de exibição de post em destaque
                        }
                        ?>
                    </div>
                </div>

                <?php
                if ($wp_query->have_posts() && $post_count >= 3) {
                    echo '<div class="blog_container">';
                    // Continuando com os posts 4, 5, e 6.
                    while ($wp_query->have_posts() && $post_count < 6) {
                        $wp_query->the_post();
                        $post_count++;
                        $posts_displayed++;
                        include ('template-parts/blog-card.php');
                    }
                    echo '</div>';
                }

                if ($wp_query->have_posts() && $post_count == 6) {
                    echo '<div class="blog_container wider">';
                    // Post 7 como destaque.
                    $wp_query->the_post();
                    $post_count++;
                    $posts_displayed++;
                    include ('template-parts/blog-card-bigger.php');
                    echo '</div>';
                }

                if ($wp_query->have_posts() && $post_count >= 7) {
                    echo '<div class="blog_container">';
                    // Posts 8, 9 e 10.
                    while ($wp_query->have_posts() && $post_count < 10) {
                        $wp_query->the_post();
                        $post_count++;
                        $posts_displayed++;
                        include ('template-parts/blog-card.php');
                    }
                    echo '</div>';
                }
                ?>
                <div class="pagination">
                    <?php if ($paged > 1): ?>
                        <a href="<?php echo get_previous_posts_page_link(); ?>" class="btn">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_before.svg"
                                alt="">
                            página anterior</a>
                    <?php endif; ?>
                    <?php if ($posts_displayed < $total_posts && $paged < $wp_query->max_num_pages): ?>
                        <a href="<?php echo get_next_posts_page_link(); ?>" class="btn">próxima página <img
                                src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-dark.svg"
                                alt="">
                        </a>
                    <?php endif; ?>
                </div>



                <?php
            } else {
                echo '<p>Não há posts disponíveis.</p>';
            }

            // Restaurando os dados originais da consulta.
            wp_reset_postdata();
            ?>
        </div>
    </div>

    <?php get_template_part('template-parts/newsletter'); ?>

    <div class="divider last">
        <span class="first"></span>
        <span class="second"></span>
        <span class="third"></span>
        <span class="fourth"></span>
    </div>






</main>

<?php
get_footer();
