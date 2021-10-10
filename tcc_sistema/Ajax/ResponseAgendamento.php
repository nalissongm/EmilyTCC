<?php
include_once("../config.php");
// Verificando permições
if(@!$_SESSION['logado']){
    die('Você não tem acesso a esse arquivo');
}

class ResponseAgendamento{
/*---------------------------------------------------
 | Informações para realizar agendamento
 |---------------------------------------------------
 */
    private $data;          // Data do agendamento
    private $hora;          // Horário do agendamento
    private $procedimento;  // Procedimento a ser realizado
    private $id;            // ID do usuário
    private $email;         // Email do usuário
/*----------------------------------------------------*/

    /**
     * Resposta da execução.
     * @var [string]
     */
    private $response;
    
    /**
     * Objeto da Classe Agendamento.
     * @var [objeto]
     */
    private static $agendamento;

    /**
     * Método construtor para definir atributos
     * da classe.
     * @param array $posts
     */
    public function __construct($posts = array())
    {
        $this->data = $posts['data'];
        $this->hora = $posts['horario'];
        $this->procedimento = $posts['procedimento'];
        $this->id = $posts[md5("id_user")];
        $this->email = $posts['email'];
    }

    /**
     * Tratando dados e validando
     * 
     *  1. Verifica se formato de data está certo.
     *  2. Verifica se horário contém apenas hora
     *     e minuto. Se sim, acrescenta ':00'.
     *  3. Verifica de o procedimento inserido
     *     condiz com os lista de procedimento.
     *  
     * @return bolean    
     */
    public function tratarDados(){
        $formatData = explode('-',$this->data);
        $formatHora = explode(':',$this->hora);

        $procedimento = ['Cabeleireiro','Maquiagem','Manicure']; // Lista de procedimentos aceitáveis.

        $check = false;  // Usado para checar se procedimento condiz com a lista

        /**
         * Verificando se variável formatData (array com data separada por "-")
         * contém 3 itens.
         * 
         * Depois, checar se o primeiro item é um ano (com 4 caracteres) e os
         * outros dois possuem 2 caracteres.
         */
        if(count($formatData) != 3 && strlen($formatData[0]) != 4 && strlen($formatData[1]) != 2 && strlen($formatData[2]) != 2){
            $this->response = "ErroFormatoData";
            return false;
        }

        /**
         * Verificando se horário contém três itens
         * separado por ":".
         * 
         * Se não conter, adicionar ":00" no final
         * da data.
         */ 
        if(count($formatHora) != 3){
            $this->hora.= ":00";
        }

        /**
         * Loop para conferir se procedimento inserido
         * condiz com lista de procedimentos aceitáveis.
         */
        for($i = 0; $i < 3; $i++){
            if($this->procedimento == $procedimento[$i]){
                $check = true;
                break;
            }
        }

        if($check == false)
            $this->response = "ErroProcedimento";

        
        return $check; // True ou False.
    }

    public function valideUser(){
        $conn = MySQL::conectar();
        $stmt = $conn->prepare("SELECT id_usuario, email FROM `tb_usuarios` WHERE id_usuario = ? AND email = ?");
        $stmt->execute(array($this->id,$this->email));
        if($stmt->rowCount()){
            return true;
        }else{
            $this->response = "usuarioNRegistrado";
            return false;
        }
    }

    public function verificarAgendamento(){
        self::$agendamento = new Agendamento();
        self::$agendamento->setAgendamento($this->data, $this->hora);
        if(self::$agendamento->verificarAgendamento() == true){
            throw new Exception("errorAgendamento");
        }else{
            //$agendamento->realizarAgendamento();
            return;
        }
    }

    public function realizarAgendamento()
    {
        if(self::$agendamento->insertAgendamento($this->procedimento, $this->id)){
            $this->response = "sucesso";
            return;
        }
        else{
            throw new Exception("Erro ao realizar agendamento");
            return false;
        }
    }

    /**
     * Método para retornar respostas da execução.
     * @return $response mensagem do precesso
     */
    public function getResponse(){
        return $this->response;
    }
}