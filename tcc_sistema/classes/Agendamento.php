<?php
    class Agendamento
    {   
        private $conn;  // Objeto para conectar-se ao Banco de Dados.

        private $data;  // Data do agendamento definida no método setAgendamento.
        private $hora;  // Horário do agendamento definido no método setAgendamento.

        /**
         * Inicia conexão ao Banco de dados.
         * @var object $conn recebe objeto de conexão.
         */
        public function __construct()
        {
            $this->conn = MySQL::conectar();
        }

        /**
         * Consulta o banco de dados e verifica se existe
         * um agendamento na data e hora definida.
         * --------------------------------------------
         * Utiliza @var $data e @var $hora.
         * @return boolean|null
         */
        public function verificarAgendamento() :?bool
        {
            try{
                $stmt = $this->conn->prepare(
                    "SELECT data_agendamento, horario_agendamento
                     FROM `tb_agendamentos`
                     WHERE data_agendamento = ? AND horario_agendamento = ?");

                $stmt->execute(array($this->data, $this->hora));
                $result = ($stmt->rowCount() > 0)   // Verificando se existe agendamento.
                          ? true : false;           // Se sim, @var $result = true. Se não, @var $result = false.

                return $result;                     // Retornando resultado. [bool]
            }
            catch(Exception $e){
                // Caso aconteca algum erro na execução da consulta,
                // um arquivo 'error_log' é criado na pasta Ajax com
                // data, hora e o erro.
                $messager = date("d-m-Y H:i:s")." => ".$e->getMessage().".\n\n";
                error_log($messager,3,"error_log");

                return false;
            }
        }

        /**
         * Inserindo os dados do agendamento no banco de dados.
         * ---------------------------------------------------
         * Utiliza @var $data e @var $hora definidas em setAgendamento.
         *  - Se dados inseridos com sucesso, retorna true.
         *  - Caso ocorra erro, retorna false.
         * @param [string] $procedimento
         * @param [int] $id
         * @return bool
         */
        public function insertAgendamento($procedimento, $id) :?bool
        {
            $stmt = $this->conn->prepare("INSERT INTO `tb_agendamentos` VALUES (null,?,?,?,?)");
            try{
                $stmt->execute(array($this->data, $this->hora,$procedimento,$id));
                return true;
            }
            catch(Exception $e){
                // Caso aconteca algum erro na execução da inserção no banco,
                // um arquivo 'error_log' é criado na pasta Ajax com
                // data, hora e o erro.
                $messager = date("d-m-Y H:i:s")." => ".$e->getMessage().".\n\n";
                error_log($messager,3,"error_log");

                return false;
            }
        }

        /**
         * Definindo data e hora do agendamento.
         * -----------------------------------------
         * Recebe os parâmetros e define nas variáveis
         * privadas $data e $hora.
         * @param string|null $data
         * @param string|null $hora
         * @return void
         */
        public function setAgendamento(?string $data,?string $hora){
            $this->data = $data;
            $this->hora = $hora;
        }

    }
    