<?php
    if(!isset($index)){
        include('../config.php');
        header('Location: '.INCLUDE_PATH.'login');
        die();
    }
?>
<?php
    $_SESSION['emailval'] = '';
    if(isset($_POST['entrar'])){
        $email = $_POST['email'];
        try{
            $login = new ValidarUser;
            $login->setEmail($_POST['email']);
            $login->setSenha(md5($_POST['senha']));
            $login->validar();
        }
        catch(Exception $e)
        {
            $errorLogin = $e->getMessage();
        }
        if($errorLogin === "LoginError: senha inválida.")
            $_SESSION['emailval'] = $email;
    }

?>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />

    <title><?= SITE_INFO['title_login'] ?></title>
    <meta name="description" content="<?= SITE_INFO['descricao'] ?>">
    <meta name="keywords" content="<?= SITE_INFO['keywords'] ?>">
    <meta name="author" content="<?= SITE_INFO['autor'] ?>">

    <link rel="icon" href="<?= INCLUDE_PATH ?>assets/img/icone.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/login.css">
    <script src="https://kit.fontawesome.com/2639b446b8.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>

<body>
<div id="img" class="container" style="background-image: url(<?=INCLUDE_PATH?>assets/img/foto3.jpg)">
    <div id="corpo-form">
        <center>
            <form method="POST">
                    <h1>Entrar</h1>
                    <?php if(isset($errorLogin) && $errorLogin == "LoginError: email inválido."):?>
                        <div class="box-error errorE">
                            <div class="content-icon">
                                <i class='fas fa-exclamation-triangle'></i>
                            </div>
                            <div class="content-text">
                                <p class="errorMessage">O e-mail que você inseriu não pertence a uma conta.</p>
                            </div>
                        </div>
                    <?php elseif(isset($errorLogin) && $errorLogin == "LoginError: senha inválida."):?>
                        <div class="box-error errorS">
                            <div class="content-icon">
                                <i class='fas fa-exclamation-triangle'></i>
                            </div>
                            <div class="content-text">
                                <p class="errorMessage">Senha está incorreta. Verifique sua senha e tente novamente.</p>
                            </div>
                        </div>
                    <?php endif?>
                    
                    <input id="inputemail" type="email" placeholder=" Usuário" name="email" value="<?=$_SESSION['emailval'] ?>" required>
                    <div class="inppass">
                        <input id="inputpass" type="password" placeholder="Senha" name="senha" required>
                        <i id="eye-pass" class="fas fa-eye-slash" ></i>
                    </div>
                    <br>
                    <input type="submit" value="Entrar" name="entrar">
                    <br>
                    <p>Ainda não é cadastrado?</p>
                    <a href="<?=INCLUDE_PATH?>cadastrar"><strong><br>
                    Cadastre-se</a>
                </form>
            </center>
        </div>
    <script src="<?=INCLUDE_PATH?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=INCLUDE_PATH?>assets/js/scripts.js"></script>
</body>
</div>
</html>