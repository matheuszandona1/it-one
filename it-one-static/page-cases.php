<?php

// Template Name: Cases

get_header();
?>


<main class="page--cases">

    <section class="cases">
        <div class="cases_container">
            <h1 class="d-title">Cases de sucesso</h1>
            <?php
            // Recupera os últimos 5 posts do tipo 'cases'
            $args = array(
                'post_type' => 'cases',
                'posts_per_page' => 5,
                'order' => 'ASC',
                'orderby' => 'date',
            );

            $cases_posts = get_posts($args);

            if ($cases_posts):
                ?>
                <div class="cases_content">
                    <?php
                    foreach ($cases_posts as $post):
                        setup_postdata($post);

                        // Recupera as categorias do caso
                        $categories = get_the_terms($post->ID, 'categoria_do_case');

                        // Verifica se existem categorias associadas
                        if ($categories && !is_wp_error($categories)):
                            ?>
                            <div class="cases_card">
                                <div class="cases_card--holder">
                                    <div class="cases_card--img">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="cases_card--content">
                                        <h3 class="cases_card-title"><?php the_title(); ?></h3>
                                        <p class="cases_card-desc"><?php the_field('introducao'); ?></p>

                                        <div class="bottom-info">
                                            <a href="<?php the_permalink(); ?>" class="read-more">
                                                Leia o case produzido pela IDC
                                                <svg width="14" height="21" viewBox="0 0 14 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.14062 0.5L13.1406 10.5L3.14062 20.5L0.796875 18.1562L8.45312 10.5L0.796875 2.84375L3.14062 0.5Z"
                                                        fill="#2C6CED" />
                                                </svg>
                                            </a>
                                            <div class="year">
                                                <span class="year-info"><?php echo get_the_date('Y'); ?></span>
                                                <svg width="38" height="24" viewBox="0 0 38 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M37.9598 15.4724V12.9121H26.8906V23.9769H37.9598V21.4166H29.4356V19.7208H37.9598V17.1605H29.4356V15.4801H37.9598V15.4724Z"
                                                        fill="white" />
                                                    <path d="M3.37796 11.0539H0.851562V0H3.37796V11.0539Z" fill="white" />
                                                    <path d="M5.24609 0L16.302 0V2.56032H12.0372V11.0555H9.50752V2.56032H5.24609V0Z"
                                                        fill="white" />
                                                    <path
                                                        d="M16.8339 12.9121L22.5268 20.3709V12.9121H25.0564V23.956H22.1996L16.545 16.7792V23.956H14V12.9121H16.8339Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.1637 15.2046C12.1637 13.8028 9.89015 12.8408 6.50761 12.8408C3.12507 12.8408 0.851562 13.8028 0.851562 15.2046V21.6363C0.851562 23.0381 3.12507 24.0001 6.50761 24.0001C9.89015 24.0001 12.1637 23.0381 12.1637 21.6363V15.2046ZM9.60398 20.7558C9.60721 20.7498 9.61018 20.744 9.6129 20.7382V16.1579C9.61018 16.1521 9.60721 16.1463 9.60398 16.1403C9.44119 15.8397 8.62628 15.2715 6.56307 15.2715C4.45896 15.2715 3.65313 15.8992 3.51323 16.1946V20.747C3.51462 20.7499 3.51607 20.7528 3.51759 20.7558C3.66922 21.0511 4.4798 21.6246 6.56307 21.6246C8.62628 21.6246 9.44119 21.0564 9.60398 20.7558Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="cases_card-category">
                                    <?php
                                    foreach ($categories as $category):
                                        ?>
                                        <li><?php echo esc_html($category->name); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php
            else:
                echo 'Nenhum case encontrado.';
            endif;
            ?>



        </div>
    </section>

    <section class="newsletter">
        <div class="newsletter_container">
            <h3 class="d-title">Pronto para transformar seu negócio com tecnologia avançada e parcerias estratégicas?
            </h3>
            <h4 class="d-sub-title">
                Na IT-ONE, combinamos expertise, inovação e soluções personalizadas para impulsionar a eficiência,
                segurança e inovação em sua empresa.
            </h4>
            <p class="d-text">
                Descubra hoje como podemos ajudar a transformar os desafios do seu negócio em histórias de
                sucesso. Converse com nossos especialistas e dê o próximo passo:
            </p>
            <div class="button--container ib">
                <a href="/fale-conosco" class="button biz-blue">
                    <p>FALE COM UM ESPECIALISTA IT-ONE</p> <img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                        alt="">
                </a>
            </div>

        </div>
    </section>
</main>

<?php
get_footer();