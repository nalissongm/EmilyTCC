<?php
    if(isset($_POST['cadastrar'])){
        if(md5($_POST['senha']) === md5($_POST['confsenha'])){
            try{
                $cadastrar = new RegistrarUser;
                $cadastrar->setNome($_POST['nome']);
                $cadastrar->setCpf($_POST['cpf']);
                $cadastrar->setEmail($_POST['email']);
                $cadastrar->setTelefone($_POST['telefone']);
                $cadastrar->setSenha(md5($_POST['senha']));
                $cadastrar->registrar();

            }
            catch(Exception $e){
                $modalError = $e->getMessage();
            }
        }
    }
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Cadastrar</title>
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/login.css">
</head>

<body>

    <div id="img" style="background-image: url(<?=INCLUDE_PATH?>assets/img/foto3.jpg)"></div>
    <div id="corpo-form">
        <Center>
        <?php if(@$modalError == "CadastroError: email já existe."): ?>
            <div class="msgError">
                <p>Já existe uma conta com esse e-mail. Insira um <br>e-mail diferente ou faça login!</p>
            </div>
        <?php endif ?>
            <h1>Cadastrar</h1>
            <form method="POST">

                <input name="nome" class="nome" type="text" placeholder="Nome Completo" autocomplete="none" maxlength="50" required>
                <input name="cpf" class="cpf" type="text" placeholder="CPF" autocomplete="none" maxlength="14" required>
                <input name="email" class="email" type="email" placeholder="E-mail" autocomplete="none" maxlength="100" required>
                <input name="telefone" class="telefone" type="text" placeholder="Telefone" autocomplete="none" maxlength="14" required>
                <input name="senha" class="senha" type="password" placeholder="Senha" maxlength="32" required>
                <input name="confsenha" class="confsenha" type="password" placeholder="Confirme a senha" maxlength="32" required>
                <div class="modal"></div>
                <br>
                <input type="submit" value="Cadastrar" name="cadastrar">
            </form>
        </Center>
    </div>
    <script src="<?=INCLUDE_PATH?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=INCLUDE_PATH?>assets/js/jquery.mask.js"></script>
    <script src="<?=INCLUDE_PATH?>assets/js/cadastro-scripts.js"></script>
</body>
</html>