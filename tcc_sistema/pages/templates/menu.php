<?php
    if(!isset($index)){
        include('../../config.php');
        header('Location: '.INCLUDE_PATH);
        die();
    }
?>
<?php
    $remetenteEmail = "seuemail@gmail.com";
    $assuntoEmail = "Assunto automático que aparecerá no email do usuário quando clicar no link";
    $corpoEmail = "Mensagem automática que aparecerá no email do usuário quando clicar no link";

    $ass_encode = urldecode($assuntoEmail);
    $body_encode = urldecode($corpoEmail);
    $linkE = "mailto:".$remetenteEmail."?Subject=".$assuntoEmail."&Body=".$corpoEmail;
?>
<header>
    <nav  class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div id="navbar-desktop" class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=INCLUDE_PATH?>" tabindex="-1" aria-disabled="true">Home</a>
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
                        <!--
                            Envia direto para o email com assunto e mensagem determinada:
                            <a class="nav-link" aria-current="page" href="<?=$linkE?>" target="_blank">Contato</a>
                        ---------------------------------
                            Abre o box de contato:
                        -->
                        <a class="nav-link" aria-current="page" href="<?=INCLUDE_PATH?>contato">Contato</a>
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
            <div id="navbar-mobile">
                <div class="bttn-nav">
                    <span></span>
                </div>
                <div class="box-navbar">
                    <ul class="nav-drop">
                        <li >
                            <a  link="<?=INCLUDE_PATH?>" tabindex="-1" aria-disabled="true">Home</a>
                        </li>
                        <li >
                            <a  aria-current="page" link="<?=INCLUDE_PATH?>agendamento">Agendamento</a>
                        </li>
                        <li >
                            <a  link="<?=INCLUDE_PATH?>tutoriais">Tutoriais</a>
                        </li>
                        <li >
                            <a  link="<?=INCLUDE_PATH?>loja" tabindex="-1" aria-disabled="true">Loja</a>
                        </li>

                        <li >
                            <!--
                            Envia direto para o email com assunto e mensagem determinada:
                            <a class="nav-link" aria-current="page" link="<?=$linkE?>" target="_blank">Contato</a>
                            ---------------------------------
                                Abre o box de contato:
                            -->
                            <a aria-current="page" link="<?=INCLUDE_PATH?>contato">Contato</a>
                        </li>
                        <li >
                            <a href="<?=INCLUDE_PATH?>?logout=true" tabindex="" aria-disabled="true">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav><!-- fechando nav -->
</header>