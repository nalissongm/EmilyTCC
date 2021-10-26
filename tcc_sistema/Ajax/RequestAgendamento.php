<?php
// Verificando se existe requisições POST's.
if(isset($_POST)){
    $data = array();    // Retorno do request.

    /**
     * @var bool $auth verifica se existe autenticação para consulta.
     * @retun bool
     */
    $auth = (isset($_POST[md5("id_user")]) && isset($_POST[md5("auth")]) && isset($_POST['email'])) ?
            true : false;

    if($auth){
        # Usuário possui autenticação.
        include_once('ResponseAgendamento.php');
        try{
            $request = new ResponseAgendamento($_POST); // Intanciando e registrando posts.

            if(!$request->tratarDados())                // Verificando se dados estão corretos.
            {
                # Dados incorretos.
                $data[$request->getResponse()] = true;
                die(json_encode($data));
            }

            if(!$request->valideUser())                 // Verificando se POST com id e email são válidos.
            {
                # Email e ID não são válidos.
                $data[$request->getResponse()] = true;
                die(json_encode($data));
            }

            try{
                $request->verificarAgendamento();       // Verificando se já existe agendamento.
                $request->realizarAgendamento();        // Se não existe, realizando agendamento.
                $data[$request->getResponse()] = [  // Se agendado, retorne resposta.
                        "data" => date('d/m/Y', strtotime($_POST['data'])),
                        "hora" => $_POST['horario']
                ];
                die(json_encode($data));
            }
            catch(Exception $e){
                # Erros:

                # Agendamento já existe.
                if($e->getMessage() == "errorAgendamento")
                {
                    $data[$e->getMessage()] = [
                        "data" => date('d/m/Y', strtotime($_POST['data'])),
                        "hora" => $_POST['horario']
                    ];
                }
                
                # Houve algum erro ao tentar realizar agendamento.
                if($e->getMessage() == "ErrorIndefinido"){
                    $data[$e->getMessage()] = true;
                }
                die(json_encode($data));
            }
            
        }
        catch(Exception $e)
        {
            # Erro na execução do código.
            $data['erroExec']= true;
        }
    }else{
        # Usuário não autenticado.
        $data['notAuth'] = true;
        die(json_encode($data));
    }
}