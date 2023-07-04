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
    private $data;          // Data do agendamento.
    private $hora;          // Horário do agendamento.
    private $procedimento;  // Procedimento a ser realizado.
    private $id;            // ID do usuário.
    private $email;         // Email do usuário.
/*----------------------------------------------------*/

    private $response;           // Retorno para o RequestAgendamento.
    
    private static $agendamento; // Objeto da Classe Agendamento.

    /**
     * Definindo data, hora, procedimento, id do usuário
     * e email do usuário.
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
     * Verificando se dados estão corretos.
     * @return boolean|null
     */
    public function tratarDados() :?bool
    { 
        // Separando data por hífen: $formatData = [0 => "XXXX", 1 => "XX", 2 => "XX"]
        $formatData = explode('-',$this->data);
        // Separando hora por dois-pontos(:): $formatHora = [0 => "XX", 1 => "XX", 2 => "XX"]
        $formatHora = explode(':',$this->hora);
        // Lista de procedimentos aceitáveis.
        $procedimento = ['Cabeleireiro','Maquiagem','Manicure'];

        if(count($formatData) != 3 && strlen($formatData[0]) != 4 && strlen($formatData[1]) != 2 && strlen($formatData[2]) != 2){
            # Data não contém 3 ítens ou não está no formato Y-m-d.
            $this->response = "ErroFormatoData";
            return false;
        }

        if(count($formatHora) == 2 && strlen($formatHora[0]) == 2 && strlen($formatData[1]) == 2){
            # Horário não contém segundos.

            $this->hora.= ":00";    // Inserindo segundos.
        }
        else if(count($formatHora) < 2){
            # Horário não está no formato correto.
            $this->response = "ErroFormatoHora";
            return false;
        }
        else if(count($formatHora) == 3 && strlen($formatHora[0]) == 2 && strlen($formatData[1]) == 2 && strlen($formatData[2]) == 2){
            # Horário está no formato correto.
        }else{
            # Horário não está no formato correto.
            $this->response = "ErroFormatoHora";
            return false;
        }

        // Verificando procedimentos.
        for($i = 0; $i < 3; $i++){
            if($this->procedimento == $procedimento[$i]){
                # Procedimento está correto.
                return true;
            }else if($i == 2){
                # Procedimento inserido não é válido.
                $this->response = "ErroProcedimento";
                return false;
            }
        }
    }

    /**
     * Verifica se ID e Email do POST é válido.
     * @return boolean|null
     */
    public function valideUser() :?bool
    {
        $conn = MySQL::conectar();
        $stmt = $conn->prepare(
            "SELECT id_usuario, email
             FROM `tb_usuarios`
             WHERE id_usuario = ? AND email = ?");
        $stmt->execute(array($this->id,$this->email));

        if($stmt->rowCount()){
            # Email e id são válidos.
            return true;
        }else{
            # Email e id não são válidos.
            $this->response = "usuarioNRegistrado";
            return false;
        }
    }

    /**
     * Verifica se já existe um agendamento.
     * @return void
     */    
    public function verificarAgendamento()
    {
        // Instanciando classe Agendamento.
        self::$agendamento = new Agendamento();
        // Definindo agendamento.
        self::$agendamento->setAgendamento(
            $this->data,
            $this->hora
        );
        
        if(self::$agendamento->verificarAgendamento() == true)      // Executando método para verificar agendamento
        {
            # Existe agendamento na data e hora definida.
            # Erro: "errorAgendamento".
            throw new Exception("errorAgendamento");
        }
        else
        {
            # Não existe agendamento na data e hora definida.
            # Retornar e continuar o código.
            return;
        }
    }

    /**
     * Método para realizar o agendamento.
     *
     * Como data e hora já foram definidas, agora
     * defini o precedimento e o id do usuário no
     * método insertAgendamento.
     *   - Se conseguir inserir dados do agendamento
     *     no banco de dados, gera resposta de
     *     sucesso.
     *   - Caso contrário, gera erro ao ralizar
     *     agendamento e retorna false.
     * @return void
     */
    public function realizarAgendamento()
    {
        if(
        self::$agendamento->insertAgendamento(      // Inserindo dados do agendamento no BD.
            $this->procedimento,
            $this->id))
        {
            // Agendamento efetuado com sucesso!
            $this->response = "sucesso";
            return;
        }
        else
        {
            // Ocorreu algum erro. Verificar log na pasta Ajax.
            throw new Exception("ErrorIndefinido");
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