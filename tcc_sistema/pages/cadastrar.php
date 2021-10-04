<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Cadastrar</title>
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/login.css">
</head>

<body>

    <div id="img"></div>
    <div id="corpo-form">
        <Center>
            <h1 style="margin-top: 15%;">Cadastrar</h1>
            <form method="POST">

                <input type="text" name="nome" placeholder="Nome Completo" autocomplete="none" maxlength="50">
                <input type="text" name="cpf" placeholder="CPF" autocomplete="none" maxlength="11">
                <input type="email" name="emal" placeholder="E-mail" autocomplete="none" maxlength="100">
                <input type="text" name="fone" name="telefone" placeholder="Telefone" autocomplete="none" maxlength="11">
                <input type="password" name="senha" placeholder="Senha" maxlength="32">
                <input type="password" name="confsenha" placeholder="Confirme a senha" maxlength="32">

                <br>
                <input type="submit" value="Cadastrar">

            </form>
        </Center>
    </div>




</body>

</html>