<?php

get_header();
?>

<main id="primary" class="page-post">

    <section class="post">
        <h1 class="post_title">
            <?php the_title(); ?>
        </h1>
        <h3 class="post_excerpt">
            <?php the_excerpt(); ?>
        </h3>
        <div class="blog_card--infos">
            <?php
            $reading_time = calculate_reading_time(get_the_ID());
            ?>
            <div class="date"><?php echo get_the_date('d/m/Y'); ?></div>
            <span>•</span>
            <?php
            $author_id = get_post_field('post_author', get_the_ID());
            if (!empty($author_id)) {
                echo '<p>' . get_the_author_meta('display_name', $author_id) . '</p>';
            } else {
                echo '<p>Autor não encontrado.</p>';
            }
            ?>

            <span>•</span>

            <?php
            // Recupera as categorias associadas à postagem personalizada 'cases'
            $categories = get_the_terms(get_the_ID(), 'categoria_do_case');

            // Verifica se há categorias associadas
            if (!empty($categories)) {
                // Pega a primeira categoria
                $first_category = reset($categories);

                // Exibe o nome e o link da categoria
                echo '<p> <a href="' . esc_url(get_term_link($first_category)) . '">' . esc_html($first_category->name) . '</a></p>';
            }
            ?>



            <span>•</span>

            <div class="time-reading"><?php echo $reading_time; ?> min de leitura</div>
        </div>

        <div class="post-thumbnail">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large'); ?>
            <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/default-thumbnail.jpg'; ?>" alt="Imagem Padrão">
            <?php endif; ?>
        </div>
        <div class="post-grid">
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <div class="post-sidebar">
                <div class="post-relacionado-div">
                    <h3 class="d-title">Posts relacionados</h3>
                    <?php
                    // Obtém as categorias do post atual
                    $categories = get_the_terms(get_the_ID(), 'categoria_do_case');
                    if (!empty($categories)) {
                        // Pega o ID da primeira categoria
                        $category_id = $categories[0]->term_id;

                        // Consulta para obter posts relacionados pelo mesmo termo da taxonomia 'categoria_do_case'
                        $related_posts = new WP_Query(
                            array(
                                'post_type' => 'cases', // Tipo de postagem personalizado
                                'posts_per_page' => 2, // Quantidade de posts relacionados a exibir
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'categoria_do_case', // Taxonomia associada ao seu tipo de postagem personalizado
                                        'field' => 'id',
                                        'terms' => $category_id, // ID da categoria atual
                                    ),
                                ),
                                'post__not_in' => array(get_the_ID()), // Excluir o post atual da consulta
                            )
                        );

                        // Verifica se há posts relacionados
                        if ($related_posts->have_posts()) {
                            while ($related_posts->have_posts()) {
                                $related_posts->the_post();
                                ?>
                                <div class="post-relacionado">
                                    <div class="blog_card">
                                        <div class="blog_card--infos">
                                            <div class="date"><?php echo get_the_date('d/m/Y'); ?></div>
                                            <span>•</span>
                                            <div class="time-reading"><?php echo calculate_reading_time(get_the_ID()); ?> min de
                                                leitura</div>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="blog_card--title">
                                            <h4><?php the_title(); ?></h4>
                                        </a>
                                        <div class="button--container">
                                            <a href="<?php the_permalink(); ?>" class="read-more">
                                                Ler mais
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/arrow_forward.svg"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            // Restaura os dados do post globais
                            wp_reset_postdata();
                        }
                    }
                    ?>
                </div>

                <?php get_template_part('template-parts/newsletter'); ?>
            </div>
        </div>

    </section>



    <div class="divider last">
        <span class="first"></span>
        <span class="second"></span>
        <span class="third"></span>
        <span class="fourth"></span>
    </div>
</main>

<?php
get_footer();
