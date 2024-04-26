<?php

// Template Name: Solutions Page Template

get_header();
?>

<main class="solutions_default">

    <section class="solutions_intro">
        <div class="solutions_intro_container">
            <?php

            $titulo = get_field("titulo_introducao");
            $subtitulo = get_field("subtitulo_introducao");
            $descricaoLeft = get_field("texto_introducao_coluna_esquerda");
            $descricaoRight = get_field("texto_introducao_coluna_direita");
            $textoBotao = get_field("texto_botao_coluna_direita");
            $urlBotao = get_field("link_botao_direita")

                ?>
            <div class="content-left">
                <h1 class="d-title"><?php echo $titulo ?></h1>
                <h3 class="d-subtitle"><?php echo $subtitulo ?></h3>
                <p class="d-text"><?php echo $descricaoLeft ?></p>
            </div>
            <div class="content-right">
                <p class="d-text"><?php echo $descricaoRight ?></p>
                <div class="button--container ib">
                    <a href="<?php echo $urlBotao ?>" class="button biz-blue">
                        <p><?php echo $textoBotao ?></p> <img
                            src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                            alt="">
                    </a>
                </div>
            </div>

        </div>
    </section>
    <div class="divider">
        <span class="first"></span>
        <span class="second"></span>
        <span class="third"></span>
        <span class="fourth"></span>
    </div>

    <section class="solutions_benefits">

        <?php if (have_rows('looping_cards')): ?>
            <div class="solutions_benefits_container">
                <?php while (have_rows('looping_cards')):
                    the_row(); ?>
                    <div class="solutions_card">
                        <h2 class="d-title"><?php $tituloFeature = get_sub_field("titulo_feature");
                        echo $tituloFeature ?></h2>
                        <p class="d-text"><?php $descricaoFeature = get_sub_field("descricao_feature");
                        echo $descricaoFeature ?></p>

                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="button--container ib">

            <?php
            $textoBotaoCards = get_field("texto_botao");
            $urlBotaoCards = get_field("link_botao")

                ?>
            <a href="<?php echo $urlBotaoCards ?>" class="button biz-blue">
                <p><?php echo $textoBotaoCards ?></p> <img
                    src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg" alt="">
            </a>
        </div>
    </section>

    <section class="solutions_slider">
        <div class="solutions_slider_container">
            <h3 class="d-title"><?php $tituloBenefits = get_field("titulo_beneficios");
            echo $tituloBenefits ?></h3>
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

            <div class="solutions_slick">
                <?php if (have_rows('solutions_slider')): ?>
                    <?php while (have_rows('solutions_slider')):
                        the_row();
                        $titulo_card = get_sub_field('titulo_card');
                        $descricao_card = get_sub_field('descricao_card');
                        ?>
                        <div class="solutions_card">
                            <h2 class="d-title"><?php echo esc_html($titulo_card); ?></h2>
                            <p class="d-text"><?php echo esc_html($descricao_card); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <section class="solutions_dif">
        <div class="solutions_dif_container">
            <h2 class="d-title">Diferenciais IT-ONE</h2>

            <div class="solutions_dif_card" id="dif-card">
                <?php if (have_rows('cards_diferenciais')): ?>
                    <?php while (have_rows('cards_diferenciais')):
                        the_row();
                        $tituloCard = get_sub_field('titulo_card');
                        $descCard = get_sub_field('descricao_card');
                        ?>
                        <div class="solutions_card">
                            <h3 class="d-title"><?php echo esc_html($tituloCard); ?></h3>
                            <p class="d-text"><?php echo esc_html($descCard); ?></p>
                        </div>
                    <?php endwhile; ?>


                </div>
            <?php endif; ?>

        </div>
        </div>
    </section>

</main>