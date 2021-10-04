<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/2639b446b8.js" crossorigin="anonymous"></script>
</head>

<body>

<div id="img"></div>    <div id="corpo-form">
        <h1>Entrar</h1>
<center>
        <form method="POST" action="autenticador.php">

            <input type="email" name="user" placeholder=" Usuário" name="email">
            <input type="password" name="pass" placeholder="Senha" name="senha">
            <br>
            <input type="submit" value="Entrar">
            <br>
            <p>Ainda não é cadastrado?</p>
            <a href="cadastrar.php"><strong><br>
                    Cadastre-se</a>
        </form>

</center>
    </div>
</body>

</html>