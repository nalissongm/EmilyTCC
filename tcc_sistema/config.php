<?php
    /**
     * Iniciando a sessão do site
     */
    session_start();
    
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
            'title'     => 'Nome do site',
            'descricao' => 'Colocar uma descrição aqui!',
            'autor'     => 'Emily',
            'keywords'  => 'palavras,separadas,por,virgula'
        ]);
    

    /*--------------------------------------------------------
     |  Configurações para o funcionamento do site 
     |--------------------------------------------------------
     */
    
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
        $arrDir = explode("/",$_SERVER['PHP_SELF']);
        $arrDir = implode("/", array($arrDir[1],$arrDir[2]));
        return "/".$arrDir."/";
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