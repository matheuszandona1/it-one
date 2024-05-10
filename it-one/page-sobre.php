<?php

// Template Name: Sobre

get_header();
?>


<main class="page--sobre">
    <section class="hero">
        <div class="hero_container">
            <div class="column-right">
                <h1 class="hero_title">A IT-ONE</h1>
                <div class="hero_img mobile-only">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/img-capao-sobre.webp"
                        alt="">
                </div>
                <p class="d-text">
                    Fundada em 2002 na cidade de Belo Horizonte, a IT-ONE é uma empresa líder no mercado de soluções
                    inovadoras e de alto valor agregado em Infraestrutura de Tecnologia da Informação. 
                </p>
                <p class="d-text">
                    Nossa expertise vai além do conhecimento técnico: ela se traduz em soluções personalizadas e
                    eficazes para cada cliente, respeitando a singularidade de cada desafio.
                </p>
            </div>
            <div class="hero_img desktop-only">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/img-capao-sobre.webp"
                    alt="">
            </div>
        </div>
    </section>

    <section class="resultados">
        <div class="resultados_container">
            <div class="column-left">
                <p class="d-text">
                    Com uma equipe de mais de 150 colaboradores dedicados, atuamos em todo o território nacional e nos
                    destacamos pela nossa vasta experiência em projetos de TI, bem como pelo nosso time de profissionais
                    certificados. 
                    <br><br>
                    Construímos uma sólida trajetória atendendo a empresas de variados portes, do mercado público e
                    privado.
                </p>
            </div>
            <div class="column-right">
                <p class="d-text">
                    Por isso é tão importante unir as pessoas certas, a inteligência coletiva e o conhecimento profundo
                    em tecnologia para solucionar cada novo desafio. 
                </p>
                <div class="button--container ib">
                    <a href="#" class="button tech-blue">
                        <p>fale com a gente</p> <img
                            src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-dark.svg"
                            alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="divider last">
            <span class="first"></span>
            <span class="second"></span>
            <span class="third"></span>
            <span class="fourth" style="background-color:var(--tech-blue);"></span>
        </div>
    </section>
    <section class="video">
        <div class="video_container">
            <div class="column-left">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/video.webp" alt="">
            </div>
            <div class="column-right">
                <h3 class="d-title">
                    Entendemos que o sucesso não se resume apenas à tecnologia, mas à <b>integração da TI em todas as
                        camadas do seu negócio.</b>
                </h3>
                <p class="d-text">
                    Mais do que uma integradora de soluções de TI; somos parceiros comprometidos com o seu protagonismo
                    no mercado.
                    <br><br>
                    Quando pensamos na solução ideal para os seus desafios de negócio, combinamos inteligentemente as
                    peças, aproximamos parceiros estratégicos e agregamos valor para construir a solução completa,
                    alinhada aos seus desafios, objetivos e orçamento. 
                    <br><br>

                    No entanto, sabemos que na jornada pelo sucesso empresarial cada passo é único, assim como cada
                    cliente é singular. 
                    <br><br>

                    Por isso, na nossa abordagem, nos dedicamos a conhecer profundamente o seu negócio para solucionar,
                    garantir segurança e para fazer a diferença no que é crucial para o seu negócio.
                </p>
            </div>

        </div>
    </section>
    <section class="numbers">
        <div class="numbers_container">
            <h4 class="d-title">Nossos números</h4>
            <div class="numbers_content">
                <div class="numbers_card">
                    <p class="numbers_card--info">+100k</p>
                    <p class="numbers_card--section">objetos gerenciados</p>
                </div>
                <div class="numbers_card d-flex">
                    <p class="numbers_card--info">+40PB</p>
                    <p class="numbers_card--section">armazenamento gerenciado</p>
                </div>
                <div class="numbers_card">
                    <p class="numbers_card--info">+4500</p>
                    <p class="numbers_card--section">VMs gerenciados</p>
                </div>
                <div class="numbers_card">
                    <p class="numbers_card--info">+200k</p>
                    <p class="numbers_card--section">instâncias de banco de dados</p>
                </div>
                <div class="numbers_card d-flex">
                    <p class="numbers_card--info">+1000</p>
                    <p class="numbers_card--section">dispositivos de rede gerenciados</p>
                </div>
                <div class="numbers_card">
                    <p class="numbers_card--info">+1500</p>
                    <p class="numbers_card--section"> sistemas operacionais gerenciados</p>
                </div>
            </div>
        </div>
    </section>
    <section class="atuacao">
        <div class="atuacao_container">
            <div class="mapa">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/mapa.svg" alt="">
            </div>
            <div class="content">
                <h3 class="d-title">Atuação nacional com
                    presença em:
                </h3>
                <ul class="atuacao_list">
                    <li>Minas gerais</li>
                    <li>São Paulo</li>
                    <li>Rio de Janeiro</li>
                    <li>Brasília</li>
                    <li>Goiás</li>
                    <li>Espírito Santo</li>
                    <li>Santa Catarina</li>
                    <li>Paraná</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="solutions_slider">
        <div class="solutions_slider_container">
            <h3 class="d-title">Nossos valores</h3>
            <div class="arrows-container">

                <button class="prev">
                    <svg width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.7031 2.34375L5.04688 10L12.7031 17.6562L10.3594 20L0.359375 10L10.3594 0L12.7031 2.34375Z"
                            fill="#fff" />
                    </svg>

                </button>
                <button class="next">
                    <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.14062 0.5L13.1406 10.5L3.14062 20.5L0.796875 18.1562L8.45312 10.5L0.796875 2.84375L3.14062 0.5Z"
                            fill="#fff" />
                    </svg>
                </button>
            </div>

            <div class="valores_slick">
                <?php if (have_rows('solutions_slider')): ?>
                    <?php while (have_rows('solutions_slider')):
                        the_row();
                        $imagem_card = get_sub_field('imagem_card');
                        $titulo_card = get_sub_field('titulo_card');
                        $descricao_card = get_sub_field('descricao_card');
                        ?>
                        <div class="solutions_card">
                            <img src="<?php echo esc_url($imagem_card['url']); ?>"
                                alt="<?php echo esc_attr($imagem_card['alt']); ?>" />
                            <h2 class="d-title"><?php echo esc_html($titulo_card); ?></h2>
                            <p class="d-text"><?php echo esc_html($descricao_card); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="button--container " style="max-width:373px; margin: 0 auto; margin-top: 40px;">
                <a href="#" class="button biz-blue">
                    <p>TRABALHE COM A GENTE</p> <img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                        alt="">
                </a>
            </div>
    </section>
    <section class="prioridades">
        <h3 class="d-title text-center">Nossas prioridades</h3>
        <div class="prioridades_container">
            <div class="card-number">
                <span class="number">1</span>
                <span class="arrow"><img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                        alt=""></span>
            </div>
            <div class="card-text">
                <p class="d-text">Liberar as equipes internas dos nossos clientes para pensar a estratégia de negócio,
                    e, consequentemente, buscar competitividade sem que o capital humano da empresa perca tempo com
                    funções operacionais.</p>
            </div>
            <div class="card-number">
                <span class="number">2</span>
                <span class="arrow"><img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                        alt=""></span>
            </div>
            <div class="card-text">
                <p class="d-text">Manter a eficiência, qualidade e agilidade na gestão de TI, com grande foco em KPIs
                    (indicadores de desempenho). Isso possibilita soluções mais eficientes, adequadas e ágeis para a
                    empresa, garantindo uma eficiência maior do setor.</p>
            </div>
            <div class="card-blank"></div>

            <div class="card-number">
                <span class="number">3</span>
                <span class="arrow"><img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-dark.svg"
                        alt=""></span>
            </div>
            <div class="card-text">
                <p class="d-text">Garantir a segurança das informações, adotando boas políticas de segurança em seus
                    processos empresariais, com ferramentas e processos de alta complexidade, que terão melhores
                    resultados se implementados por equipes especialistas e com experiência de mercado.</p>
            </div>
            <div class="card-number">
                <span class="number">4</span>
                <span class="arrow"><img
                        src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                        alt=""></span>
            </div>
            <div class="card-text">
                <p class="d-text">Reduzir custos do cliente com a TI, trazendo maior previsibilidade da gestão de
                    recursos financeiros. Somado a isso, diminuir também os custos e o tempo gastos com recrutamento e
                    seleção de mão de obra qualificada.</p>
            </div>
        </div>
        <div class="button--container " style="max-width:373px; margin: 0 auto; margin-top: 40px;">
            <a href="#" class="button biz-blue">
                <p>FALE COM UM ESPECIALISTA</p> <img
                    src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg" alt="">
            </a>
        </div>
    </section>
    <section class="way desktop-only">
        <div class="way_container">
            <div class="way_top">

                <h3 class="way_title d-title">Nossos diferenciais</h3>

            </div>
            <div class="way_content blue">
                <div class="way_card">

                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/equipe-way-w.svg"
                            alt="">
                        <h4 class="d-title">Foco em SLA</h4>

                    </div>
                    <p class="way_card-text">Gestão dos serviços por meio de contratos de SLA, definindo os objetivos e
                        responsabilidades de ambas as partes, trazendo maior clareza e qualidade na entrega.</p>
                </div>
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/agil-way-w.svg"
                            alt="">
                        <h4 class="d-title"> Melhoria contínua</h4>

                    </div>
                    <p class="way_card-text">
                        Fornecer um método de implementação de um programa de melhoria contínua, para que processos e
                        serviços possam ser definidos, implementados e melhorados continuamente.

                    </p>
                </div>
                <div class="button--container ib">
                    <a href="#" class="button tech-blue">
                        <p>conte com a it-one</p> <img
                            src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-dark.svg"
                            alt="">
                    </a>
                </div>
            </div>
            <div class="way_content light">
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/custom-way.svg"
                            alt="">
                        <h4 class="d-title">Agilidade nos processos</h4>

                    </div>
                    <p class="way_card-text">Conseguimos agregar diferentes tecnologias que viabilizam e proporcionam
                        maior agilidade para os clientes.</p>
                </div>
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/provedor-way.svg"
                            alt="">
                        <h4 class="d-title">
                            Equipe altamente qualificada
                        </h4>

                    </div>
                    <p class="way_card-text">
                        Equipe certificada e capacitada em diversas tecnologias, possibilitando operacionalizar
                        ambientes de níveis médios a complexos.
                    </p>
                </div>
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/provedor-way.svg"
                            alt="">
                        <h4 class="d-title">
                            Integração de soluções
                        </h4>

                    </div>
                    <p class="way_card-text">
                        Integração de diferentes tecnologias, com foco no desenho, arquitetura, fornecimento,
                        implementação e migração de soluções.
                    </p>
                </div>


            </div>
        </div>
    </section>
    <section class=" pilares mobile-only">
        <h3 class="way_title d-title">Nossos diferenciais</h3>
        <div class="pilares_content">

            <div class="pilares_container">
                <div class="way_card">

                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/equipe-way.svg"
                            alt="">
                        <h4 class="d-title">Foco em SLA</h4>

                    </div>
                    <p class="way_card-text">Gestão dos serviços por meio de contratos de SLA, definindo os objetivos e
                        responsabilidades de ambas as partes, trazendo maior clareza e qualidade na entrega.</p>
                </div>
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/agil-way.svg"
                            alt="">
                        <h4 class="d-title"> Melhoria contínua</h4>

                    </div>
                    <p class="way_card-text">
                        Fornecer um método de implementação de um programa de melhoria contínua, para que processos e
                        serviços possam ser definidos, implementados e melhorados continuamente.

                    </p>
                </div>
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/custom-way.svg"
                            alt="">
                        <h4 class="d-title">Agilidade nos processos</h4>

                    </div>
                    <p class="way_card-text">Conseguimos agregar diferentes tecnologias que viabilizam e proporcionam
                        maior agilidade para os clientes.</p>
                </div>
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/provedor-way.svg"
                            alt="">
                        <h4 class="d-title">
                            Equipe altamente qualificada
                        </h4>

                    </div>
                    <p class="way_card-text">
                        Equipe certificada e capacitada em diversas tecnologias, possibilitando operacionalizar
                        ambientes de níveis médios a complexos.
                    </p>
                </div>
                <div class="way_card">
                    <div class="way_card-top">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/provedor-way.svg"
                            alt="">
                        <h4 class="d-title">
                            Integração de soluções
                        </h4>

                    </div>
                    <p class="way_card-text">
                        Integração de diferentes tecnologias, com foco no desenho, arquitetura, fornecimento,
                        implementação e migração de soluções.
                    </p>
                </div>
            </div>
        </div>
        <div class="button--container " style="padding: 0 32px;">
            <a href="#" class="button biz-blue">
                <p> como começar</p> <img
                    src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg" alt="">
            </a>
        </div>
    </section>


    <section class="story">
        <div class="story_container">

            <h2 class="d-title">Nossa presença</h2>

            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="img-background">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/ache.svg"
                                alt="" class="img-logo">
                        </div>


                    </div>
                    <div class="swiper-slide">
                        <div class="img-background">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/unimed.svg"
                                alt="" class="img-logo">
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="img-background">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/sotreq.svg"
                                alt="" class="img-logo">
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <!--     <div class="swiper-scrollbar"></div> -->
            </div>
        </div>
    </section>

</main>