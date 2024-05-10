<?php
get_header(); // Inclui o cabeçalho do site
?>

<main id="main" class="page-category" role="main">


    <h1 class="d-title ">
        <?php single_cat_title(); ?>
    </h1>

    <?php if (have_posts()): ?>
        <div class="category-container">


            <?php
            // Inicia o loop padrão do WordPress
            while (have_posts()):
                the_post();
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
            <?php endwhile; ?>
        </div>
        <?php
        // Adiciona links de navegação para páginas de categoria mais antigas/novas, se houver mais posts
        the_posts_pagination(
            array(
                'prev_text' => __('Anterior', 'textdomain'),
                'next_text' => __('Próximo', 'textdomain'),
            )
        );
        ?>
    <?php else: ?>
        <p><?php _e('Desculpe, nenhum post encontrado.', 'textdomain'); ?></p>
    <?php endif; ?>
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
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="button white"
                style="background-color:transparent;">
                <p>Ver todos os artigos</p>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/navigate_next.svg"
                    alt="">
            </a>
        </div>



    </section>
    <section class="newsletter">
        <div class="newsletter_container">
            <h3 class="d-title">Assine a newsletter da IT-ONE</h3>
            <p class="d-text">
                Seja o primeiro a receber insights exclusivos e dicas valiosas diretamente em seu e-mail.
            </p>
            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <input type="hidden" name="action" value="submit_email_form">
                <input class="email" type="email" name="user_email" placeholder="Seu e-mail" required>
                <button type="submit"><img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-blue.svg"
                        alt=""> </button>
            </form>

        </div>
    </section>
    <div class="divider last">
        <span class="first"></span>
        <span class="second"></span>
        <span class="third"></span>
        <span class="fourth"></span>
    </div>

</main>
< <?php
get_footer(); // Inclui o rodapé do site
?>