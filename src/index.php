<?php
    /**
     * Inclusão do arquivo de configurações
     */
    include_once("config.php");
    $index = true;

    /**
     * #### Pegando o valor na url.
     * @var string $url verifica se existe algum valor
     * após o endereço da raiz.
     * @return true 
     * OR
     * @return false
     *  - Se true, armazenar em $url em minúculo.
     *  - Se false, @var string $url recebe 'home'.
     * 
     * Exemplo:
     * http://seusite.com/enderecoqualquer - @var string $url = enderecoqualquer
     */
    $url = (isset($_GET['url'])) ? explode('/',$_GET['url'])[0] : 'home';
    $url = strtolower($url);
    
    /**
     * Verificando se existe um arquivo com nome
     * da @var url com final '.php' no diretório
     * raiz e no diretório 'pages/'. 
     */
    if(file_exists($url.'.php') || file_exists('pages/'.$url.'.php') ||
      ($url === 'agendamento' && isset($_SESSION['logado']))){
        /*-----------------------------------------------
        |   Inserindo a Home do site
        |------------------------------------------------
        */
        if($url == 'home' || $url === 'agendamento'){
            //if($url === 'agendamento' && !isset($_SESSION['logado']))

            /**
             * Verificando se existe uma url para logout.
             */
            if(isset($_GET['logout'])){
                /**
                 * Classe Usuário e função para logout.
                 */
                Usuario::logout();
            }
            
            // Incluindo a home e rodapé
            include('home.php');
            include('pages/templates/rodape.php');
        }
        /**
         * Inserindo arquivo com base na @var $url.
         * 
         * Exemplo:
         * http://site.com/login - incluir 'pages/login.php'
         */
        else{
            include('pages/'.$url.'.php');
        }
    }else{
        /**
         * Configurar uma página para quando o
         * usuário tentar acessar uma página que não existe.
         * 
         * Essa página pode ser uma tela 404 (buscar referências)
         * ou pode redirecionar para a home.
         *  
         * Código para redirecionar o usuário para home:
         *      header('Location: '.INCLUDE_PATH);
         *      die();
         *
         * Código para a página '404 Error':
         *      include('pages/nomedoarquivo.php');
         */
        echo "Página não encontrada";
    }