<?php
    if(!isset($index)){
        include('../config.php');
        header('Location: '.INCLUDE_PATH.'login');
        die();
    }
?>
<?php
    if(isset($_POST['entrar'])){
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
    }
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/login.css">
    <script src="https://kit.fontawesome.com/2639b446b8.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>

<body>
<div id="img" class="container" style="background-image: url(<?=INCLUDE_PATH?>assets/img/foto3.jpg)">
    <div id="corpo-form">
        <center>
            <h1>Entrar</h1>
                <form method="POST">
                    
                    <input type="email" placeholder=" Usuário" name="email" required>
                    <input type="password" placeholder="Senha" name="senha" required>
                    <br>
                    <input type="submit" value="Entrar" name="entrar">
                    <br>
                    <p>Ainda não é cadastrado?</p>
                    <a href="<?=INCLUDE_PATH?>cadastrar"><strong><br>
                    Cadastre-se</a>
                <?php if(isset($errorLogin) && $errorLogin == "LoginError: email inválido."):?>
                    <p class="errorMessage">O e-mail que você inseriu não pertence a uma conta. Por favor, verifique o seu e-mail e tente novamente.</p>
                <?php elseif(isset($errorLogin) && $errorLogin == "LoginError: senha inválida."):?>
                    <p class="errorMessage">Senha está incorreta.<br> Verifique sua senha e tente novamente.</p>
                <?php endif?>
                </form>
        </center>
    </div>
    </body>
</div>
</html>