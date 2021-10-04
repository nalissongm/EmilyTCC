<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/login.css">
    <script src="https://kit.fontawesome.com/2639b446b8.js" crossorigin="anonymous"></script>
</head>

<body>

<div id="img"></div>    <div id="corpo-form">
        <h1>Entrar</h1>
<center>
        <?php
            if(isset($_POST['entrar'])){
                $_SESSION['logado'] = true;
                header('Location: '.INCLUDE_PATH);
                die();
            }

        ?>
        <form method="POST">

            <input type="email" name="user" placeholder=" Usuário" name="email">
            <input type="password" name="pass" placeholder="Senha" name="senha">
            <br>
            <input type="submit" value="Entrar" name="entrar">
            <br>
            <p>Ainda não é cadastrado?</p>
            <a href="<?=INCLUDE_PATH?>cadastrar"><strong><br>
                    Cadastre-se</a>
        </form>

</center>
    </div>
</body>

</html>