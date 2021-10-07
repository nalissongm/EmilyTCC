<?php
    $remetenteEmail = "seuemail@gmail.com";
    $assuntoEmail = "Assunto automático que aparecerá no email do usuário quando clicar no link";
    $corpoEmail = "Mensagem automática que aparecerá no email do usuário quando clicar no link";

    $ass_encode = urldecode($assuntoEmail);
    $body_encode = urldecode($corpoEmail);
    $linkE = "mailto:".$remetenteEmail."?Subject=".$assuntoEmail."&Body=".$corpoEmail;
?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=INCLUDE_PATH?>" tabindex="-1" aria-disabled="true" style="margin-left: 500px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?=INCLUDE_PATH?>agendamento">Agendamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=INCLUDE_PATH?>tutoriais">Tutoriais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=INCLUDE_PATH?>loja" tabindex="-1" aria-disabled="true">Loja</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?=$linkE?>" target="_blank">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=INCLUDE_PATH?>?logout=true" tabindex="" aria-disabled="true">Sair</a>
                    </li>

                </ul>


                <img src="" alt="">
                <!-- 
                <form class="d-flex">
                    <input class="form" type="search" placeholder="O que você procura?" aria-label="Search">
                    <button class="button" type="submit">OK</button>
                </form> -->
            </div><!-- fechando navbarCollapse -->
        </div><!-- fechando container-fluid -->
    </nav><!-- fechando nav -->
</header>