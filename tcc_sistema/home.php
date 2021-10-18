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
    
    <title><?=SITE_INFO['title']?></title>
    <meta name="description" content="<?=SITE_INFO['descricao']?>">
    <meta name="keywords" content="<?=SITE_INFO['keywords']?>">
    <meta name="author" content="<?=SITE_INFO['autor']?>">

    <link rel="icon" href="<?=INCLUDE_PATH?>assets/img/icone.ico" type="image/x-icon" />

    <!-------------------- links css - Bootstrap -------------------->
    <link href="<?=INCLUDE_PATH?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"-->
  
    <link href="<?=INCLUDE_PATH?>assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/estilo2.css">
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/style.css">

    <!-------------------- Fontawesome - js -------------------->
    <script src="https://kit.fontawesome.com/8a3908ea58.js" crossorigin="anonymous"></script>
</head>
<body>
<main>
<?php
    if(isset($_SESSION['logado'])){
        include('pages/templates/menu.php');
    }
?>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div><!-- fechamento carousel-indicators -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg>

                <div class="container">
                    <div class="carousel-caption text-start">
                        <img src="<?=INCLUDE_PATH?>assets/img/banner1.jpeg" alt="">
                    </div>
                </div>
            </div><!-- carousel-item -->
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg>

                <div class="container">
                    <div class="carousel-caption text-start">
                        <img src="<?=INCLUDE_PATH?>assets/img/banner2.jpeg" alt="">
                    </div>
                </div>
            </div><!-- carousel-item -->

            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg>

                <div class="container">
                    <div class="carousel-caption text-start">
                        <img src="<?=INCLUDE_PATH?>assets/img/banner3.jpeg" alt="">
                    </div>
                </div>
            </div><!-- carousel-item -->
        </div><!-- carousel-inner -->
    </div><!-- myCarousel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Voltar</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
    </button>
</main>

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
    if(!isset($_SESSION['logado'])):
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
            <img src="<?=INCLUDE_PATH?>assets/img/foto1.jpg" alt="salão">
        </div><!-- img2 -->
    </div><!-- coluna1 -->
    <div id="coluna2">
        <div id="img1">
            <img src="<?=INCLUDE_PATH?>assets/img/foto2.jpg" alt="salão">
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
        <a href="<?=INCLUDE_PATH?>login"> <input type="submit" value="Venha Conhecer!"></a> 
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
    else:
        if($url == 'agendamento'){
            echo "<tag tag='$url' ></tag>";
        }
        
?>  
    <h6 id="titulo" style="font-family: 'Domine', serif;">Qual procedimento deseja realizar hoje?</h6>

    <!--    Parte das opcoes de serviços -->

    <div class="container marketing">

    <!-- CABELOO -->

        <div class="row">
            <div class="col-lg-4">
                <img src="<?=INCLUDE_PATH?>assets/img/cabelo.png" alt="">
                <br>
                <title>Placeholder</title><br>
                <h2 style="font-family: 'Arvo', serif;">Cabelo</h2>
                <p>Vamos hidratar, pintar ou então fazer um penteado?</p>
                <p><a class="btn btn-secondary" href="<?=INCLUDE_PATH?>agendamento-cabelo"> Prosseguir &raquo;</a></p>
            </div><!-- fechando col-lg-4 -->

    <!-- UNHAS -->

            <div class="col-lg-4">
                <img src="<?=INCLUDE_PATH?>assets/img/unha.png" alt="">
                <br><br>
                <h2 style="font-family: 'Arvo', serif;">Unhas</h2>
                <p>Já não está na hora de corar as cutículas e pintar suas unhas?</p>
                <p><a class="btn btn-secondary" href="<?=INCLUDE_PATH?>agendamento-unhas">Prosseguir &raquo;</a></p>
            </div><!-- fechando col-lg-4 -->

                <!-- MAQUIAGEM -->

            <div class="col-lg-4">
                <img src="<?=INCLUDE_PATH?>assets/img/make.png" alt="">
                <br><br>
                <h2 style="font-family: 'Arvo', serif;">Maquiagem</h2>
                <p>E uma maquiagem para se sentir mais bonita, topa?</p>
                <p><a class="btn btn-secondary" href="<?=INCLUDE_PATH?>agendamento-make">Prosseguir &raquo;</a></p>
            </div><!-- fechando col-lg-4 -->
        </div><!-- fechando row -->
    </div><!-- fechando container marketing -->
<?php endif ?>