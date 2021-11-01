<?php if(isset($_SESSION['logado']) && $index == true): ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title><?= SITE_INFO['title_tutoriais'] ?></title>
<meta name="description" content="<?= SITE_INFO['descricao'] ?>">
<meta name="keywords" content="<?= SITE_INFO['keywords'] ?>">
<meta name="author" content="<?= SITE_INFO['autor'] ?>">

<link rel="icon" href="<?= INCLUDE_PATH ?>assets/img/icone.ico" type="image/x-icon" />
    

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<div id="fb-root"></div>

<link href="https://fonts.googleapis.com/css2?family=Arvo:ital@0;1&family=Domine&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/8a3908ea58.js" crossorigin="anonymous"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0" nonce="Z0hFzyBU"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/tutorial.css">
<link href="<?=INCLUDE_PATH?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= INCLUDE_PATH ?>assets/css/carousel.css" rel="stylesheet">
<link rel="stylesheet" href="<?= INCLUDE_PATH ?>assets/css/style.css">
<link rel="stylesheet" href="<?= INCLUDE_PATH ?>assets/css/estilo2.css">
<body>
<?php include_once("pages/templates/menu.php")?>
<?php include_once('pages/templates/carousel.php')?>
<div id="topo" style="margin-top: 20px;">
    <span style="font-family: 'Domine', serif;">Tutoriais</span>
</div>
<div class="container">
    <div class="owl-carousel">
        <div class="item-video" data-merge="2">
            <a class="owl-video" href="https://www.youtube.com/watch?v=vHm9_MN8jRA"></a>
        </div>

        <div class="item-video" data-merge="2">
            <a class="owl-video" href="https://www.youtube.com/watch?v=vHm9_MN8jRA"></a>
        </div>

        <div class="item-video" data-merge="2">
            <a class="owl-video" href="https://www.youtube.com/watch?v=vHm9_MN8jRA"></a>
        </div>

        <div class="item-video" data-merge="2">
            <a class="owl-video" href="https://www.youtube.com/watch?v=vHm9_MN8jRA"></a>
        </div>

        <div class="item-video" data-merge="2">
            <a class="owl-video" href="https://www.youtube.com/watch?v=vHm9_MN8jRA"></a>
        </div>
    </div>
</div>

<!-- ---- javascript ---- -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script type="text/javascript">
    $(".owl-carousel").owlCarousel({
        merge: true,
        loop: true,
        margin: 10,
        video: true,
        lazyLoad: true,
        center: true,
    });
</script>

<center style="margin: 0px auto 100px auto;max-width: 1140px;">
    <div class="comentarios">
        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="1000" data-numposts="5"></div>
    </div>
</center>
<?=include('pages/templates/rodape.php');?>
<?php else:
        include_once("../config.php");
        header('Location: '.INCLUDE_PATH);
        die();
    endif;
?>