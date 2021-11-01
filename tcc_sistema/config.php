<?php
    /**
     * Iniciando a sessão do site
     */
    session_start();
    if(isset($_SESSION['logado']))
        $_SESSION['logado'];
    
/*--------------------------------------------------------
|   Configurações - Informações principais
|---------------------------------------------------------
|   Definir nome do site:
|       1.Alterar valor da chave 'title'.
|
|   Definir descrição do site:
|       1.Alterar valor da chave 'descrição'.
|
|   Definir autor do site:
|       1.Alterar valor da chave 'autor'.
|
|   Definir palavras-chaves do site:
|       1.Alterar valor da chave 'keywords'.
|   
|   Definir icone do site:
|       1.Criar ou baixar imagem no formato '.ico' e
|         renomear arquivo para 'icone'.
|       2.Após isso,
|         salve em assets na pasta img.
|
|   Nota: as palavras chaves tem quer ser separadas
|         por vígula.
*/
    define(
        "SITE_INFO", [
            'title_home'                  => 'Salão',
            'title_login'                 => 'Faça Login',
            'title_cadastro'              => 'Cadastre-se',
            'title_agendamento-unhas'     => 'Manicure',
            'title_agendamento-make'      => 'Maquiagem',
            'title_agendamento-cabelo'    => 'Cabeleireiro',
            'title_contato'               => 'Entre em contato',
            'title_tutoriais'             => 'Tutoriais',
            'descricao' => 'Colocar uma descrição aqui!',
            'autor'     => 'Emily',
            'keywords'  => 'palavras,separadas,por,virgula'
        ]);
    
/*--------------------------------------------------------
|  Configurações do Banco de dados 
|--------------------------------------------------------
|   Definir hospedagem:
|      - Esta informação é dada pelo servidor do site.
|      - Caso use um servidor xampp ou lampp, utilize
|        'localhost'.
|      1.Altere o valor da chave 'host'.
|
|   Definir nome do banco de dados:
|      - Usar nome definido no MySQL.
|      1.Altere o valor da chave 'dbname'.
|
|   Definir username:
|      - Esta informação também é dada pelo servidor.
|      - Caso utilize um servidor local, colocar 'root'.
|      1.Altere o valor da chave 'user'.
|
|   Definir senha:
|      - Esta informação também é dada pelo servidor.
|      - Caso utilize um servidor local, deixar ''.
|      1.Altere o valor da chave 'pass'.
|
|  Nota: Arquivo 'error_log' é criado automáticamente
|        para indicar erros com base no horário e o
|        tipo do error.
*/
    define(
        "DB",[
            'host'   => 'localhost',
            'dbname' => 'db_sissalao',
            'user'   => 'root',
            'pass'   => ''
        ]);

/*--------------------------------------------------------
|  Configurações para desparo de e-mail. 
|--------------------------------------------------------
|  Cofigurações do smtp:
|   SMTP['host'] [hospedagem do disparo de email]
|   SMTP['username'] [e-mail do destinatário]
|   SMTP['senha'] [senha do e-mail]
|   SMTP['secure'] [segurança - (tls OR ssl)]
|   SMTP['port'] [porta do envio]
|   SMTP['charset'] [formato de codificação]
|
|  Configurações do remetente:
|   REMETENTE[email] [email do remetente]
|   REMETENTE[nome] [nome do remetente]
*/
    define(
        "SMTP", [
            'host'     => 'smtp.gmail.com',   // Utilizando o gmail: smtp.gmail.com.
            'username' => '',  // Seu email do gmail (caso use gmail)
            'pass'     => '',  // Sua senha do gmail (caso use gmail)
            'secure'   => 'tls',   // Padrões: ssl, tls.
            'port'     => '587',   // Utilizada pelo Gmail: SSL -> 465, TLS -> 587.
            'charset'  => 'UTF-8'  // Padrão: UTF-8. 
        ]
    );

    define(
        "REMETENTE", [
            'email' => '',  // Email que receberá as mensagens
            'nome'  => ''   // Nome de quem receberá
        ]
    );


/*--------------------------------------------------------
|  Configurações para o funcionamento do site 
|--------------------------------------------------------
*/
    $autoload = function($class){
        if($class == 'Email'){
			require_once('classes/PHPMailer/PHPMailerAutoload.php');
		}
        include('classes/'.$class.'.php');
    };
    spl_autoload_register($autoload);
    
    /**
     * @var status_dev
     * const status_dev recebe 1 ou 0.
     * -------------------------------------------------
     * Modo de desenvolvimento: inteiro 0. 
     * - Alterar valor de const status_dev para 0 quando 
     *   estiver desenvolvendo.
     * 
     * Modo de produção: inteiro 1.
     * - Alterar valor de const status_dev para 1 apenas
     *   quando for colocar o site no ar.
     */
    const status_dev = 0;

    /**
     * Definindo url principal para o modo de desenvolvimento.
     * @return string
     */
    function nameDir(){
        $dr = explode("/",$_SERVER["DOCUMENT_ROOT"]);;
        $arrDir = array_values(array_filter(explode("\\",__FILE__)));
        $urlROOT = "";
        for($i = count($dr); $i < count($arrDir) - 1 ; $i++){
            $urlROOT.= "/".$arrDir[$i];
        }
        return $urlROOT."/";
    }
    
    /**
     * Url principal a partir de const status_dev.
     * @var string dir_root
     * 
     * - Se 0, @return http://servidor/nomedeprojeto/pastadoindex
     * - Se 1, @return http://dominiodosite/
     */
    $dir_root = (status_dev == 0) ?     
                "http://".$_SERVER["HTTP_HOST"].nameDir() :
                $_SERVER['HTTP_X_FORWARDED_PROTO']."://".$_SERVER["HTTP_HOST"]."/";
    
    
    /**
     * Atribui a constante INCLUDE_PATH o endereço principal
     * do site.
     * ------------------------------------------------------
     * - Usar quando for inserir em imagens ou links.
     */
    define("INCLUDE_PATH", $dir_root);

    
    