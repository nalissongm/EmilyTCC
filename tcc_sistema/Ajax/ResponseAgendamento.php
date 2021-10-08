<?php

    include_once("../config.php");
    if(@!$_SESSION['logado']){
        die('Você não tem acesso a esse arquivo');
    }

class ResponseAgendamento{
    private $data;
    private $hora;
    private $procedimento;
    private $id;
    private $email;
    private $senha;
    private $response;

    public function __construct($posts = array())
    {
        $this->data = $posts['data'];
        $this->hora = $posts['horario'];
        $this->procedimento = $posts['procedimento'];
        $this->id = $posts[md5("id_user")];
        $this->email = $posts['email'];

        if(!$this->tratarDados()){
            return false;
        }else if(!$this->valideUser()){
            $this->response = "usuarioNRegistrado";
            return false;
        }

        $this->response = "sucesso";
    }

    public function getResponse(){
        return $this->response;
    }

    private function tratarDados(){
        $formatData = explode('-',$this->data);
        $formatHora = explode(':',$this->hora);
        $procedimento = ['Cabeleireiro','Maquiagem','Manicure'];
        if(count($formatData) != 3){
            $this->response = "ErroFormatoHora";
            return false;
        }
        if(count($formatHora) != 3){
            $this->hora.= ":00";
        }
        for($i = 0; $i < 3; $i++){
            if($this->procedimento != $procedimento[$i]){
                $this->response = "ErrorProcedimento";
                return false;
            }else{
                return true;
            }
        }

        return true;
    }

    private function valideUser(){
        $conn = MySQL::conectar();
        $stmt = $conn->prepare("SELECT id_usuario, email FROM `tb_usuarios` WHERE id_usuario = ? AND email = ?");
        $stmt->execute(array($this->id,$this->email));
        if($stmt->rowCount())
            return true;
        else
            return false;

        
    }
}