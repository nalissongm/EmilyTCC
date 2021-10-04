<?php include_once("../base/menu.php"); ?>

<head>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="/css/tutorial.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital@0;1&family=Domine&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0" nonce="Z0hFzyBU"></script>
    <script src="https://kit.fontawesome.com/8a3908ea58.js" crossorigin="anonymous"></script>

<body>

    <div class="container">
    <h1 id="titulo" style="font-family: 'Domine', serif;">--------------- Tutoriais -------------- </h1>
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

    <center>
        <div class="comentarios">
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="1000" data-numposts="5"></div>
        </div>
    </center>

</body>

