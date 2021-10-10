<?php
// Verificando se existe requisições POST's.
if(isset($_POST)){
    /**
     * @var data resultado em json do agendendamento.
     */
    $data = array();
    /**
     * @var auth verifica se existe autenticação para consulta.
     * @retun bool
     */
    $auth = (isset($_POST[md5("id_user")]) && isset($_POST[md5("auth")]) && isset($_POST['email'])) ?
            true : false;

    /**
     * Usuário autenticado.
     */
    if($auth){
        // $_POST -> data do agendamento (Y-m-d)
        // $_POST -> horario do agendamento (H:i:s)
        // $_POST -> procedimento ('Cabeleireiro','Maquiagem','Manicure')
        // $_POST -> id do usuário (int)
        include_once('ResponseAgendamento.php');
        /**
         * Executando os requests
         */
        try{
            $request = new ResponseAgendamento($_POST); // Intanciando e registrando posts

            /**
             * Verificando e tratando os dados
             * 
             * Retorna true OU false. Se true, procede a
             * consulta. Caso contrário, retorna erro.
             */
            if(!$request->tratarDados()){
                $data[$request->getResponse()] = true;
                die(json_encode($data));
            }

            /**
             * Verifica se o email e id batem com o banco de
             * dados.
             */
            if(!$request->valideUser()){
                $data[$request->getResponse()] = true;
                die(json_encode($data));
            }

            try{
                /*
                 * Verificando se existe agendamento.
                 * 
                 * Se existir, mata o restante do código e
                 * retorna um Exception.
                 * 
                 * Caso contrário, procede a execução do código.
                 */
                $request->verificarAgendamento();
                
                /*
                 * Realizando agendamento.
                 * 
                 * Se falhar, mata o restante do código e
                 * retorna um Exception.
                 * 
                 * Caso contrario, retorna sucesso.
                 */
                $request->realizarAgendamento();
                $data[$request->getResponse()] = true;
                die(json_encode($data));
            }
            catch(Exception $e){
                // Erro do método verificar agendamento.
                if($e->getMessage() == "errorAgendamento"){
                    $data[$e->getMessage()] = [
                        "data" => date('d/m/Y', strtotime($_POST['data'])),
                        "hora" => $_POST['horario']
                    ];
                }
                
                die(json_encode($data));
            }
            
        }
        /**
         * Caso ocorra algum erro na execução do código.
         */
        catch(Exception $e)
        {
            $data['erroExec']= true;
        }
    }else{
        $data['notAuth'] = true;
        die(json_encode($data));
    }
}

// 2. Authetication
// 3. ResponseAgendamento