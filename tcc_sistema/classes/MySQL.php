<?php
    date_default_timezone_set('America/Sao_Paulo');

    /**
     * Classe estática para criar conexão no banco de dados. 
     * 
     * Caso ocorra erro, pega o horário atual, pega a mensagem
     * de erro e registra no arquivo 'error_log'.
     * Caso não ocorra nenhum erro, retorna objeto PDO.
     * 
     * Nota: O único objetivo dessa classe é se conectar ao
     * banco de dados.
     * @return object $pdo
     */
    class MySQL
    {
        private static $pdo;
        public static function conectar(){
            if(self::$pdo == null){
                try{
                    self::$pdo = new PDO('mysql:host='.DB['host'].';dbname='.DB['dbname'],DB['user'],DB['pass'],
                                 array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
                    if(status_dev == 0){
                        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    }
                }
                catch(Exception $e){
                    $messager = date("d-m-Y H:i:s")." => ".$e->getMessage().".\n\n";
                    error_log($messager,3,"error_log");
                }
            }
            return self::$pdo;
        }
    }
    