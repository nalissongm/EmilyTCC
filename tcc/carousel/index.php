<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Serviços</title>

    <script src="https://kit.fontawesome.com/2639b446b8.js" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">

</head>

<body>

    <?php include_once("../base/menu.php"); ?>

    <body style="background-color: rgb(255, 243, 202) ;">

        <h6 id="titulo" style="font-family: 'Domine', serif;">Qual procedimento deseja realizar hoje?</h6>

        <!--    Parte das opcoes de serviços -->

        <div class="container marketing">

            <!-- CABELOO -->

            <div class="row">
                <div class="col-lg-4">
                    <img src="img/cabelo.png" alt="">
                    <br>
                    <title>Placeholder</title><br>
                    <h2 style="font-family: 'Arvo', serif;">Cabelo</h2>
                    <p>Vamos hidratar, pintar ou então fazer um penteado?</p>
                    <p><a class="btn btn-secondary" href="cabelo.php"> Prosseguir &raquo;</a></p>
                </div>

                <!-- UNHAS -->

                <div class="col-lg-4">
                    <img src="img/unha.png" alt="">
                    <br><br>
                    <h2 style="font-family: 'Arvo', serif;">Unhas</h2>
                    <p>Já não está na hora de corar as cutículas e pintar suas unhas?
                    </p>
                    <p><a class="btn btn-secondary" href="unhas.php">Prosseguir &raquo;</a></p>
                </div>

                <!-- MAQUIAGEM -->

                <div class="col-lg-4">
                    <img src="img/make.png" alt="">
                    <br><br>
                    <h2 style="font-family: 'Arvo', serif;">Maquiagem</h2>
                    <p>E uma maquiagem para se sentir mais bonita, topa?</p>
                    <p><a class="btn btn-secondary" href="make.php">Prosseguir &raquo;</a></p>
                </div>
            </div>
        </div>
    <?php include_once("../base/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    </body>

</html>