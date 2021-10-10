<?php
    class Agendamento
    {
        private $conn;
        private $data;
        private $hora;
        private $id_user;
        public function __construct()
        {
            $this->conn = MySQL::conectar();
        }

        public function verificarAgendamento() :?bool
        {
            try{
                $stmt = $this->conn->prepare("SELECT data_agendamento, horario_agendamento FROM `tb_agendamentos` WHERE data_agendamento = ? AND horario_agendamento = ?");
                $stmt->execute(array($this->data, $this->hora));
                $result = ($stmt->rowCount() > 0) ? true : false;

                return $result;
            }
            catch(Exception $e){
                $messager = date("d-m-Y H:i:s")." => ".$e->getMessage().".\n\n";
                error_log($messager,3,"error_log");
                return false;
            }
        }

        public function insertAgendamento($procedimento, $id)
        {
            $stmt = $this->conn->prepare("INSERT INTO `tb_agendamentos` VALUES (null,?,?,?,?)");
            try{
                $stmt->execute(array($this->data, $this->hora,$procedimento,$id));
                return true;
            }
            catch(Exception $e){
                $messager = date("d-m-Y H:i:s")." => ".$e->getMessage().".\n\n";
                error_log($messager,3,"error_log");
                return false;
            }
        }

        public function setAgendamento(?string $data,?string $hora){
            $this->data = $data;
            $this->hora = $hora;
        }
        //$this->id_user = $id_user;
    }
    