<?php
// 1. Get posters
if(isset($_POST)){
    $data = array();
    $auth = (isset($_POST[md5("id_user")]) && isset($_POST[md5("auth")]) && isset($_POST['email'])) ?
            true : false;
    if($auth){
        // Autenticado
        // $_POST -> data do agendamento (Y-m-d)
        // $_POST -> horario do agendamento (H:i:s)
        // $_POST -> procedimento ('Cabeleireiro','Maquiagem','Manicure')
        // $_POST -> id do usuário (int)
        include_once('ResponseAgendamento.php');
        try{
            $request = new ResponseAgendamento($_POST);
            $data[$request->getResponse()] = true;
        }
        catch(Exception $e)
        {
            $data['Algo tá errado']= true;
        }
    }else{
        $data['notAuth'] = true;
    }

    die(json_encode($data));

}
else{
    die(false);
}

// 2. Authetication
// 3. ResponseAgendamento