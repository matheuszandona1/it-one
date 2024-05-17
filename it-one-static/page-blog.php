<?php

// Template Name: Blog

get_header();
?>

<main class="page--blog">
    <section class="destaque">
        <div class="destaque_container">
            <h3 class="d-title">Blog</h3>
            <div class="arrows-container">

                <button class="prev">
                    <svg width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.7031 2.34375L5.04688 10L12.7031 17.6562L10.3594 20L0.359375 10L10.3594 0L12.7031 2.34375Z"
                            fill="#111E2A" />
                    </svg>

                </button>
                <button class="next">
                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.14062 0.5L13.1406 10.5L3.14062 20.5L0.796875 18.1562L8.45312 10.5L0.796875 2.84375L3.14062 0.5Z"
                            fill="#111E2A" />
                    </svg>
                </button>
            </div>
            <div class="blog_slick">
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
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>Nenhum post destacado encontrado.</p>';
                }
                ?>
            </div>



    </section>

    <section class="list" style='padding-bottom:80px;'>
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

        <div class="list-container">
            <?php
            // Obtém a primeira categoria com mais posts
            $popular_categories = get_categories(
                array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => 1 // Apenas uma categoria
                )
            );

            // Verifica se há categorias
            if (!empty($popular_categories)) {
                // Obtém o nome da primeira categoria
                $first_category_name = $popular_categories[0]->name;
                ?>
                <h4 class="d-title">
                    <?php echo esc_html($first_category_name); ?>
                </h4>
                <?php
            } else {
                // Se não houver categorias, exiba uma mensagem padrão
                echo '<h4 class="d-title">Sem categorias</h4>';
            }
            ?>

            <?php
            // Verifica se há categorias retornadas
            if (!empty($popular_categories)) {
                // Obtém o ID da primeira categoria
                $first_category_id = $popular_categories[0]->term_id;

                // Nova consulta para obter os posts da primeira categoria
                $category_posts = new WP_Query(
                    array(
                        'cat' => $first_category_id, // ID da categoria
                        'posts_per_page' => 2 // Número de posts a serem exibidos
                    )
                );

                // Verifica se há posts na categoria
                if ($category_posts->have_posts()) {
                    ?>
                    <div class="list-container-grid">
                        <div class="left-column">
                            <?php
                            // Loop sobre os posts da categoria
                            while ($category_posts->have_posts()) {
                                $category_posts->the_post();
                                $reading_time = calculate_reading_time(get_the_ID());

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
                                        <div class="time-reading"><?php echo $reading_time; ?> min de
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
                                <?php
                            }
                            ?>
                        </div>
                        <div class="right-column">
                            <?php
                            // Obtém o thumbnail do post principal
                            $thumbnail_url = get_the_post_thumbnail_url($category_posts->posts[0]->ID, 'large');
                            ?>
                            <div class="blog_card-bigger"
                                style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
                                <div class="category-link">
                                    <a
                                        href="<?php echo esc_url(get_category_link($first_category_id)); ?>"><?php echo esc_html($first_category_name); ?></a>
                                </div>
                                <div class="blog_card-content">
                                    <div class="blog_card--infos">
                                        <div class="date"><?php echo get_the_date('d/m/Y', $category_posts->posts[0]->ID); ?>
                                        </div>
                                        <span>•</span>
                                        <div class="time-reading">
                                            <?php echo calculate_reading_time(get_the_content($category_posts->posts[0]->ID)); ?>
                                            min de
                                            leitura
                                        </div>
                                    </div>
                                    <a href="<?php echo get_permalink($category_posts->posts[0]->ID); ?>"
                                        class="blog_card--title">
                                        <h4><?php echo get_the_title($category_posts->posts[0]->ID); ?></h4>
                                    </a>
                                    <p><?php echo get_the_excerpt($category_posts->posts[0]->ID); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    // Se não houver posts na categoria, exiba uma mensagem padrão
                    echo '<p>Não há posts nesta categoria.</p>';
                }
            } else {
                // Se não houver categorias disponíveis, exiba uma mensagem padrão
                echo '<p>Sem categorias.</p>';
            }
            ?>


            <div class="button--container ib">
                <a href="<?php echo esc_url(get_category_link($first_category_id)); ?>" class="button white"
                    style="background-color:transparent;">
                    <p> Ver mais artigos</p>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                        alt="">
                </a>
            </div>
        </div>
    </section>
    <section class="list blue">
        <div class="list-container ">
            <?php
            // Obtém a segunda categoria com mais posts
            $popular_categories = get_categories(
                array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => 2, // Obtém as duas categorias mais populares
                    'offset' => 1 // Pula a primeira categoria
                )
            );

            // Verifica se há categorias suficientes
            if (count($popular_categories) >= 2) {
                // Obtém o nome da segunda categoria
                $second_category_name = $popular_categories[1]->name;
                ?>
                <h4 class="d-title">
                    <?php echo esc_html($second_category_name); ?>
                </h4>
                <?php
            } else {
                // Se não houver categorias suficientes, exiba uma mensagem padrão
                echo '<h4 class="d-title">Sem categorias suficientes</h4>';
            }
            ?>

            <?php
            // Verifica se há categorias retornadas
            if (!empty($popular_categories)) {
                // Obtém o ID da segunda categoria
                $second_category_id = $popular_categories[1]->term_id;

                // Nova consulta para obter os posts da segunda categoria
                $category_posts_second = new WP_Query(
                    array(
                        'cat' => $second_category_id, // ID da categoria
                        'posts_per_page' => 2 // Número de posts a serem exibidos
                    )
                );

                // Verifica se há posts na segunda categoria
                if ($category_posts_second->have_posts()) {
                    ?>
                    <div class="list-container-grid">
                        <div class="right-column">
                            <?php
                            // Verifica se há posts na segunda categoria
                            if ($category_posts_second->have_posts()) {
                                // Obtém o thumbnail do post principal da segunda categoria
                                $thumbnail_url_second = get_the_post_thumbnail_url($category_posts_second->posts[0]->ID, 'large');
                                ?>
                                <div class="blog_card-bigger"
                                    style="background-image: url('<?php echo esc_url($thumbnail_url_second); ?>');">
                                    <div class="category-link">
                                        <a
                                            href="<?php echo esc_url(get_category_link($second_category_id)); ?>"><?php echo esc_html($popular_categories[1]->name); ?></a>
                                    </div>
                                    <div class="blog_card-content">
                                        <div class="blog_card--infos">
                                            <div class="date">
                                                <?php echo get_the_date('d/m/Y', $category_posts_second->posts[0]->ID); ?>
                                            </div>
                                            <span>•</span>
                                            <div class="time-reading">
                                                <?php echo calculate_reading_time(get_the_content($category_posts_second->posts[0]->ID)); ?>
                                                min
                                                de leitura
                                            </div>
                                        </div>
                                        <a href="<?php echo get_permalink($category_posts_second->posts[0]->ID); ?>"
                                            class="blog_card--title">
                                            <h4><?php echo get_the_title($category_posts_second->posts[0]->ID); ?></h4>
                                        </a>
                                        <p><?php echo get_the_excerpt($category_posts_second->posts[0]->ID); ?></p>
                                    </div>
                                </div>
                                <?php
                            } else {
                                // Se não houver posts na segunda categoria, exiba uma mensagem padrão
                                echo '<p>Não há posts nesta categoria.</p>';
                            }
                            ?>
                        </div>
                        <div class="left-column">
                            <?php
                            // Loop sobre os posts da segunda categoria
                            while ($category_posts_second->have_posts()) {
                                $category_posts_second->the_post();
                                $reading_time = calculate_reading_time(get_the_ID());
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
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            Ler mais
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 0.65625L11.3438 6L6 11.3438L5.0625 10.4062L8.78125 6.65625H0.65625V5.34375H8.78125L5.0625 1.59375L6 0.65625Z"
                                                    fill="#fff" />
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                    <?php
                } else {
                    // Se não houver posts na segunda categoria, exiba uma mensagem padrão
                    echo '<p>Não há posts nesta categoria.</p>';
                }
            } else {
                // Se não houver categorias disponíveis, exiba uma mensagem padrão
                echo '<p>Sem categorias.</p>';
            }
            ?>





            <div class="button--container ib">
                <a href="<?php echo esc_url(get_category_link($second_category_id)); ?>" class="button white"
                    style="background-color:transparent;">
                    <p> Ver mais artigos</p> <img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-blue.svg"
                        alt="">
                </a>
            </div>
        </div>
    </section>
    <section class="list " style="padding:80px 0px;">
        <div class="list-container">
            <?php
            // Obtém a terceira categoria com mais posts
            $popular_categories = get_categories(
                array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => 3, // Obtém as três categorias mais populares
                    'offset' => 2 // Pula as duas primeiras categorias
                )
            );

            // Verifica se há categorias suficientes
            if (count($popular_categories) >= 3) {
                // Obtém o nome da terceira categoria
                $third_category_name = $popular_categories[2]->name;
                ?>
                <h4 class="d-title">
                    <?php echo esc_html($third_category_name); ?>
                </h4>
                <?php
            } else {
                // Se não houver categorias suficientes, exiba uma mensagem padrão
                echo '<h4 class="d-title">Sem categorias suficientes</h4>';
            }
            ?>

            <?php
            // Verifica se há categorias retornadas
            if (!empty($popular_categories)) {
                // Obtém o ID da terceira categoria
                $third_category_id = $popular_categories[2]->term_id;

                // Nova consulta para obter os posts da terceira categoria
                $category_posts_third = new WP_Query(
                    array(
                        'cat' => $third_category_id, // ID da categoria
                        'posts_per_page' => 2 // Número de posts a serem exibidos
                    )
                );

                // Verifica se há posts na terceira categoria
                if ($category_posts_third->have_posts()) {
                    ?>
                    <div class="list-container-grid">
                        <div class="left-column">
                            <?php
                            // Loop sobre os posts da terceira categoria
                            while ($category_posts_third->have_posts()) {
                                $category_posts_third->the_post();
                                $reading_time = calculate_reading_time(get_the_ID());
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
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            Ler mais
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/arrow_forward.svg"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="right-column">
                            <?php
                            // Verifica se há posts na terceira categoria
                            if ($category_posts_third->have_posts()) {
                                // Obtém o thumbnail do post principal da terceira categoria
                                $thumbnail_url_third = get_the_post_thumbnail_url($category_posts_third->posts[0]->ID, 'large');
                                ?>
                                <div class="blog_card-bigger"
                                    style="background-image: url('<?php echo esc_url($thumbnail_url_third); ?>');">
                                    <div class="category-link">
                                        <a
                                            href="<?php echo esc_url(get_category_link($third_category_id)); ?>"><?php echo esc_html($third_category_name); ?></a>
                                    </div>
                                    <div class="blog_card-content">
                                        <div class="blog_card--infos">
                                            <div class="date">
                                                <?php echo get_the_date('d/m/Y', $category_posts_third->posts[0]->ID); ?>
                                            </div>
                                            <span>•</span>
                                            <div class="time-reading">
                                                <?php echo calculate_reading_time(get_the_content($category_posts_third->posts[0]->ID)); ?>
                                                min
                                                de leitura
                                            </div>
                                        </div>
                                        <a href="<?php echo get_permalink($category_posts_third->posts[0]->ID); ?>"
                                            class="blog_card--title">
                                            <h4><?php echo get_the_title($category_posts_third->posts[0]->ID); ?></h4>
                                        </a>
                                        <p><?php echo get_the_excerpt($category_posts_third->posts[0]->ID); ?></p>
                                    </div>
                                </div>
                                <?php
                            } else {
                                // Se não houver posts na terceira categoria, exiba uma mensagem padrão
                                echo '<p>Não há posts nesta categoria.</p>';
                            }
                            ?>
                        </div>

                    </div>
                    <?php
                } else {
                    // Se não houver posts na terceira categoria, exiba uma mensagem padrão
                    echo '<p>Não há posts nesta categoria.</p>';
                }
            } else {
                // Se não houver categorias disponíveis, exiba uma mensagem padrão
                echo '<p>Sem categorias.</p>';
            }
            ?>


        </div>

    </section>

    <section class="news">
        <h3 class="d-title">Outros Posts</h3>
        <div class="blog_container">

            <?php
            // Nova consulta para obter três posts aleatórios
            $random_posts = new WP_Query(
                array(
                    'posts_per_page' => 3, // Número de posts a serem exibidos
                    'orderby' => 'rand' // Ordenar aleatoriamente
                )
            );

            // Verifica se há posts
            if ($random_posts->have_posts()) {
                // Loop sobre os posts
                while ($random_posts->have_posts()) {
                    $random_posts->the_post();
                    $reading_time = calculate_reading_time(get_the_ID());
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
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                Ler mais
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/arrow_forward.svg"
                                    alt="">
                            </a>
                        </div>
                    </div>

                    <?php
                }
                // Restaura os dados do post globais
                wp_reset_postdata();
            } else {
                // Se não houver posts, exibe uma mensagem padrão
                echo '<p>Não há posts disponíveis.</p>';
            }
            ?>


        </div>
        <div class="button--container ib">
            <?php
            $all_posts_page = get_page_by_path('all-posts');
            if ($all_posts_page) {
                $all_posts_url = get_permalink($all_posts_page->ID);
                ?>
                <a href="<?php echo esc_url($all_posts_url); ?>" class="button white" style="background-color:transparent;">
                    <p> Ver mais artigos</p>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/navigate_next.svg"
                        alt="">
                </a>
                <?php
            } else {
                // Se a página "all-posts" não existir, exiba uma mensagem de erro ou fallback
                echo '<p>Página não encontrada</p>';
            }
            ?>
        </div>




    </section>

    <?php get_template_part('template-parts/newsletter'); ?>


</main>
<?php
get_footer();