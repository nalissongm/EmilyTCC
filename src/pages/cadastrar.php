<?php
    if(!isset($index)){
        include('../config.php');
        header('Location: '.INCLUDE_PATH.'cadastrar');
        die();
    }
?>
<?php
    $_SESSION['cadUser'] = [
        0 => '',
        1 => '',
        2 => '',
        3 => ''
    ];
    $cadStatus = false;
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        if(md5($_POST['senha']) === md5($_POST['confsenha'])){
            try{
                $cadastrar = new RegistrarUser;
                $cadastrar->setNome($_POST['nome']);
                $cadastrar->setCpf($_POST['cpf']);
                $cadastrar->setEmail($_POST['email']);
                $cadastrar->setTelefone($_POST['telefone']);
                $cadastrar->setSenha(md5($_POST['senha']));
                $cadastrar->registrar();
                $cadStatus = true;

            }
            catch(Exception $e){
                $modalError = $e->getMessage();
            }
            /*if($modalError === "CadastroError: email já existe."){
                $_SESSION['cadUser'] = [
                    0 => $nome,
                    1 => $cpf,
                    2 => $email,
                    3 => $telefone
                ];
            }*/
            
        }
    }
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title><?= SITE_INFO['title_cadastro'] ?></title>
    <meta name="description" content="<?= SITE_INFO['descricao'] ?>">
    <meta name="keywords" content="<?= SITE_INFO['keywords'] ?>">
    <meta name="author" content="<?= SITE_INFO['autor'] ?>">

    <link rel="icon" href="<?= INCLUDE_PATH ?>assets/img/icone.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/cadastro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script src="https://kit.fontawesome.com/2639b446b8.js" crossorigin="anonymous"></script>
</head>

<body>

<?php if($cadStatus == true):?>
    <base attr="<?=INCLUDE_PATH?>" ></base>
    <div class="sucessCad">
        <div class="content-sucess">
            <div class="div-icon">
                <i id="closeBoxS" class="far fa-times-circle"></i>
                <i class="fas fa-check"></i>
            </div>
            <div id='scdm' class="div-main">
                <h2>Cadastro efetuado com sucesso!</h2>
                <p>Faça login e agende agora mesmo.</p> 
                <span>Fazer login</span>
            </div>
        </div>
    </div>
<?php endif?>
<div id="img" class="container" style="background-image: url(<?=INCLUDE_PATH?>assets/img/foto3.jpg)">
    <div id="corpo-form">
        <Center>
            <form method="POST">
                <h1>Cadastrar</h1>
                <?php if(@$modalError == "CadastroError: email já existe."): ?>
                    <div class="box-error errorE">
                        <div class="content-icon">
                            <i class='fas fa-exclamation-triangle'></i>
                        </div>
                        <div class="content-text">
                            <p class="errorMessage">Já existe uma conta com esse e-mail.</p>
                        </div>
                    </div>
                <?php endif ?>
                <input name="nome" class="nome" type="text" placeholder="Nome Completo" autocomplete="none" maxlength="50" value="<?=$_SESSION['cadUser'][0]?>" required>
                <div class="inpNome modErrorV">
                    
                </div>
                <input name="cpf" class="cpf" type="text" placeholder="CPF" autocomplete="none" maxlength="14" value="<?=$_SESSION['cadUser'][1]?>" required>
                <div class="inpCpf modErrorV"></div>
                <input name="email" class="email" type="email" placeholder="E-mail" autocomplete="none" maxlength="100" value="<?=$_SESSION['cadUser'][2]?>" required>
                <div class="inpEmail modErrorV"></div>
                <input name="telefone" class="telefone" type="text" placeholder="Telefone" autocomplete="none" maxlength="14" value="<?=$_SESSION['cadUser'][3]?>" required>
                <div class="inpTel modErrorV"></div>
                <input name="senha" class="senha" type="password" placeholder="Senha" maxlength="32" required>
                <div class="inpSenha modErrorV"></div>
                <input name="confsenha" class="confsenha" type="password" placeholder="Confirme a senha" maxlength="32" required>
                <div class="confS modErrorV"></div>
                <input type="submit" value="Cadastrar" name="cadastrar">
            </form>
        </Center>
    </div>
</div>
    <script src="<?=INCLUDE_PATH?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=INCLUDE_PATH?>assets/js/jquery.mask.js"></script>
    <script src="<?=INCLUDE_PATH?>assets/js/cadastro-scripts.js"></script>
    
</body>
</html>