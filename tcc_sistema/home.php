<!-----------------------------------------------
    |  Realizar ajustes e apagar este
    |  comentário
    |  
    |  Configuração do site:
    |  - SITE_INFO['title'] (constante): nome que 
    |    aparecerá na aba do site.
    |  - SITE_INFO['descricao'] (constante): breve 
    |    descrição simples para SEO.
    |  - SITE_INFO['keywords'] (constante): palavras 
    |    separadas por virgula que facilitam na busca.
    |  - SITE_INFO['autor'] (constante): nome do 
    |    desenvolvedor ou proprietário no site.
    |
    |  Icone do site:
    |  1. Baixe ou crie o ícone no formato ".ico".
    |  2. Altere o nome para "icone.ico" e salve em
    |     "assets" na pasta "img".
    |
    |  Nota: Todos os ajustes necessários deve ser 
    |  feitos no arquivo "config.php".

    if(file_exists('pages/'.$url.'.php')):
            include('pages/'.$url.'.php');
        else:
            include('pages/main.php');
        endif;

        if(isset($_SESSION['login']))
            include("pages/templates/cabecalho.php");
    ------------------------------------------------->
<!doctype html>
<html lang="PT-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?= SITE_INFO['title_home'] ?></title>
    <meta name="description" content="<?= SITE_INFO['descricao'] ?>">
    <meta name="keywords" content="<?= SITE_INFO['keywords'] ?>">
    <meta name="author" content="<?= SITE_INFO['autor'] ?>">

    <link rel="icon" href="<?= INCLUDE_PATH ?>assets/img/icone.ico" type="image/x-icon" />

    <!-------------------- links css - Bootstrap -------------------->
    <link href="<?= INCLUDE_PATH ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"-->

    <link href="<?= INCLUDE_PATH ?>assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>assets/css/estilo2.css">
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>assets/css/style.css">

    <!-------------------- Fontawesome - js -------------------->
    <script src="https://kit.fontawesome.com/8a3908ea58.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php if (($url == 'contato') && isset($_SESSION['logado'])) : ?>
        <section class="contato">
            <div class="box-contato">
                <div class="infor-content">
                    <div class="text-contact">
                        <h1>Entre em contato</h1>
                        <p>Preencha o formulário e nossa equipe entrará em contato com você.</p>
                    </div><!-- text-contact -->
                    <div class="infos">
                        <i class="fas fa-envelope-open-text"></i><span>contato@meusite.com</span><br><!-- info-email -->
                        <i class="fas fa-phone-alt"></i><span>+55 (14) 99123-4567</span><br><!-- info-tel -->
                        <i class="fas fa-map-marker-alt"></i><span>Jaú - São Paulo</span><br><!-- info-map -->
                    </div><!-- infos -->
                    <div class="social-icons">
                        <i onclick="sociallinkContact('face')" class="fab fa-facebook-f"></i>
                        <i onclick="sociallinkContact('insta')" class="fab fa-instagram"></i>
                        <i onclick="sociallinkContact('twtt')" class="fab fa-twitter"></i>
                    </div><!-- social-icons -->
                </div>
                <div class="form-content">
                    <form method="POST">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" placeholder="Digite seu nome e sobrenome..." required>

                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Digite seu email para contato..." required>

                        <label for="telefone">Telefone</label>
                        <input type="text" name="mensagem" placeholder="Digite sua mensagem..." required>
                        
                        <textarea name="mensagem" placeholder="Digite sua mensagem..." required></textarea>

                        <button name="enviar" style="text-transform: uppercase;">enviar</button>
                    </form>
                </div>
            </div>
        </section>
        <script>
            function sociallinkContact(link){
                switch (link) {
                    case 'face':
                        window.location.href = "http://www.facebook.com.br/";
                        break;
                    case 'insta':
                        window.location.href = "http://www.instagram.com.br/";
                        break;
                    case 'twtt':
                        window.location.href = "http://www.twitter.com.br/";
                        break;
                }
            }
        </script>
    <?php endif ?>
    <?php
    if (isset($_SESSION['logado'])) {
        include('pages/templates/menu.php');
    }
    ?>
    <?php include('pages/templates/carousel.php')?>
    <?php
    /*------------------------------------------
    | Verificar login
    |-------------------------------------------
    |
    | Se não existir a $_SESSION['logado'], 
    | usuário não está logado. 
    |
    | Então, mostre isso:
    |
    */
    if (!isset($_SESSION['logado'])):
    ?>
        <div id="topo">
            <span style="font-family: 'Domine', serif;">Sobre Nós</span>
        </div>
        <article>
            <div id="coluna1">
                <p> Criado em 2016 na cidade de Jaú, interior de São Paulo, o
                    salão de beleza Natural Beauty é especializado nas áreas de cabeleireiro,
                    manicure, pedicure e maquiagem. Sempre com
                    <br> o objetivo de entregar o melhor para seus clientes,
                    prezamos pelo conforto e profissionalismo em cada procedimento executado.
                    Todos os materiais utilizados são esterelizados,
                    <br> a fim de dar uma maior segurança à nossos clientes
                    durante essa época de pandemia.
                </p>
                <br>
                <div id="img2">
                    <img src="<?= INCLUDE_PATH ?>assets/img/foto1.jpg" alt="salão">
                </div><!-- img2 -->
            </div><!-- coluna1 -->
            <div id="coluna2">
                <div id="img1">
                    <img src="<?= INCLUDE_PATH ?>assets/img/foto2.jpg" alt="salão">
                </div><!-- img1 -->
                <br> <br>
                <p>Alem de apresentar todo o tipo de recurso desejado, o salão também oferece uma plataforma
                    digital, a qual oferece amplas possibilidades de interação: o agendamento é feito diretamente no site,
                    tutoriais sempre são publicados para ajudar quem gostaria de aprender algo novo, e os produtos são vendidos
                    diariamente, tedo como local de retirada, o próprio salão. Se interessou por nossos serviços?
                </p>
            </div><!-- coluna2 -->
            <div class="clear-float"></div>
        </article>
        <div id="botao">
            <a href="<?= INCLUDE_PATH ?>login"> <input type="submit" value="Venha Conhecer!"></a>
        </div><!-- botao -->
        <div></div>
        <div id="topo2">
            <span></span>
        </div><!-- topo2 -->
    <?php
    /*------------------------------------------
    | $_SESSION['logado'] == true
    |-------------------------------------------
    |
    | Usuário existe e está logado, pois não 
    | passou no 'if'. 
    |
    | Logo, esconda o código acime e mostre
    | o de baixo:
    |
    */
    else :
        if ($url == 'agendamento') {
            echo "<tag tag='$url' ></tag>";
        }

    ?>
        <h6 id="titulo" style="font-family: 'Domine', serif;">Qual procedimento deseja realizar hoje?</h6>

        <!--    Parte das opcoes de serviços -->

        <div class="container marketing">

            <!-- CABELOO -->

            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= INCLUDE_PATH ?>assets/img/cabelo.png" alt="">
                    <br>
                    <title>Placeholder</title><br>
                    <h2 style="font-family: 'Arvo', serif;">Cabelo</h2>
                    <p>Vamos hidratar, pintar ou então fazer um penteado?</p>
                    <p><a class="btn btn-secondary" href="<?= INCLUDE_PATH ?>agendamento-cabelo"> Prosseguir &raquo;</a></p>
                </div><!-- fechando col-lg-4 -->

                <!-- UNHAS -->

                <div class="col-lg-4">
                    <img src="<?= INCLUDE_PATH ?>assets/img/unha.png" alt="">
                    <br><br>
                    <h2 style="font-family: 'Arvo', serif;">Unhas</h2>
                    <p>Já não está na hora de corar as cutículas e pintar suas unhas?</p>
                    <p><a class="btn btn-secondary" href="<?= INCLUDE_PATH ?>agendamento-unhas">Prosseguir &raquo;</a></p>
                </div><!-- fechando col-lg-4 -->

                <!-- MAQUIAGEM -->

                <div class="col-lg-4">
                    <img src="<?= INCLUDE_PATH ?>assets/img/make.png" alt="">
                    <br><br>
                    <h2 style="font-family: 'Arvo', serif;">Maquiagem</h2>
                    <p>E uma maquiagem para se sentir mais bonita, topa?</p>
                    <p><a class="btn btn-secondary" href="<?= INCLUDE_PATH ?>agendamento-make">Prosseguir &raquo;</a></p>
                </div><!-- fechando col-lg-4 -->
            </div><!-- fechando row -->
        </div><!-- fechando container marketing -->
    <?php endif ?>