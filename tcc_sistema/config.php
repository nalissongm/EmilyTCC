<?php
    session_start();
    
    define(
        "SITE_INFO", [
            'title'     => 'Nome do site',
            'descricao' => 'Colocar uma descrição aqui',
            'autor'     => 'Emily',
            'keywords'  => 'palavras,separadas,por,virgula'
        ]);

    const status_dev = 1;
    function nameDir(){
        $arrDir = explode("/",$_SERVER['PHP_SELF']);
        $arrDir = implode("/", array($arrDir[1],$arrDir[2]));
        return "/".$arrDir."/";
    }
    
    $dir_root = (status_dev == 0) ?     
                "http://".$_SERVER["HTTP_HOST"].nameDir() :
                $_SERVER['HTTP_X_FORWARDED_PROTO']."://".$_SERVER["HTTP_HOST"]."/";

    define("INCLUDE_PATH", $dir_root);