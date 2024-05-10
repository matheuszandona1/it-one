<?php

// Template Name: Contato

get_header();
?>

<main class="page-contato">
    <div class="bg-contato">
        <div class="form">
            <div class="form_container">
                <h1 class="d-title">
                    Pronto para impulsionar seu negócio com tecnologia?
                </h1>
                <h3 class="d-title smaller">
                    Vamos conversar!
                </h3>
                <p class="d-text">
                    Preencha os dados do formulário abaixo para entendermos melhor a sua demanda.
                </p>
                <form>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nome">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Sobrenome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="EMAIL CORPORATIVO">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="TELEFONE COM DDD">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="SITE DA EMPRESA">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col">
                            <select id="inputEstado" class="form-control">
                                <option selected>Estado</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="inputCidade" class="form-control">
                                <option selected>Cidade</option>
                            </select>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col">
                            <select id="tema" class="form-control">
                                <option selected>Qual tema deseja tratar?</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="MENSAGEM"
                                rows="6"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="button ">
                        <p>enviar</p>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-blue.svg"
                            alt="">
                    </button>

                </form>
            </div>
            <div class="form_client">
                <h2 class="d-title">Já é cliente <br>IT-ONE?</h2>
                <p class="d-text">Precisa de suporte técnico?</p>
                <div class="button--container ib">
                    <a href="#" class="button biz-blue">
                        <p>abra um chamado</p> <img
                            src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                            alt="">
                    </a>
                </div>
            </div>
        </div>

        <div class="presencial">
            <div class="presencial_container">

                <h3 class="d-title">Gosta do presencial?</h3>
                <p class="d-text">Confira onde ficam nossos escritórios:</p>

                <div class="presencial_content">
                    <div class="matriz card">
                        <h4 class="d-title">Matriz</h4>
                        <p class="d-text cidade">Belo Horizonte / MG</p>
                        <p class="d-text rua">Rua Alberto Cintra 161 - 6o andar, União.</p>
                    </div>
                    <div class=" presencial_demais">
                        <h4 class="d-title">Outras unidades:</h4>
                        <div class="d-flex">

                            <div class="card">
                                <p class="d-text cidade">São Paulo / SP</p>
                                <p class="d-text rua">Av. Paulista, 453, 13o andar, Conj 132 - Bela Vista.</p>
                            </div>
                            <div class="card">
                                <p class="d-text cidade">Brasília / DF</p>
                                <p class="d-text rua">ST SRTVS BLOCO, sn, Quadra 701 - Bloco K SALA 405, 
                                    Edifício Embassy Tower, Asa Sul.</p>
                            </div>
                            <div class="card">
                                <p class="d-text cidade">Domingo Martins / ES</p>
                                <p class="d-text rua">R. João Batista Wernersbach - 90, sala 104, Centro.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    <section class="behind">
        <div class="behind_container">
            <div class="left-column">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/behind-left-ctt.webp"
                    alt="">
            </div>
            <div class="right-column">
                <h3 class="d-title">
                    Quer entrar para o time IT-ONE?
                </h3>
                <p class="d-text">
                    Impulsione sua trajetória profissional na área de tecnologia. 
                    <br><br>
                    Veja os diferenciais da IT-ONE e entenda por que vale a pena trabalhar com a gente. 
                </p>
                <div class="button--container ib">
                    <a href="#" class="button biz-blue">
                        <p>QUERO SABER MAIS</p> <img
                            src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next.svg"
                            alt="">
                    </a>
                </div>
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