<?php if (($url == 'contato') && isset($_SESSION['logado'])) : ?>
<!doctype html>
<html lang="PT-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?= SITE_INFO['title_contato'] ?></title>
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
    <path include="<?=INCLUDE_PATH?>"/></path>
    <?php include('pages/templates/menu.php');?>
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
                <div id='contato-form' class="form-content">
                    <form method="POST">
                        <div>
                            <input id="nome_input" class="campoForm" type="text" name="nome" placeholder="Digite seu nome e sobrenome..." required>
                            <label for="nome_input">Nome</label>
                        </div>

                        <div>
                            <input id="email_input" class="campoForm" type="email" name="email" placeholder="Digite seu email para contato..." required>
                            <label for="email_input">Email</label>
                        </div>

                        <div>
                            <input id="tel_input" class="campoForm" type="text" name="telefone" placeholder="Digite sua mensagem..." required>
                            <label for="tel_int">Telefone</label>
                        </div>
                        
                        <textarea class="campoForm" name="mensagem" placeholder="Digite sua mensagem..." style="white-space:pre-wrap;" required></textarea>

                        <button type="submit" name="enviar" style="text-transform: uppercase;"><span>enviar</span></button>
                    </form>
                </div>
            </div>
        </section>
        <script src="<?=INCLUDE_PATH?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?=INCLUDE_PATH?>assets/js/contato.js"></script>
        <script src="<?=INCLUDE_PATH?>assets/js/scripts.js"></script>
    <?php 
    include('pages/templates/rodape.php');
    else:
        include('../config.php');
        header('Location: '.INCLUDE_PATH);
        die();
    endif; ?>