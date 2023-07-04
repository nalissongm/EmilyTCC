<?php
/**
 * Posts:   'nome'  => $_POST['nome']
 *          'email' => $_POST['email']
 *          'telefone' => $_POST['telefone']
 *          'mensagem' => $_POST['mensagem']
 */
include('../config.php');

$data = array();
$assunto = "Nova mensagem de contato!";
$corpo = file_get_contents('../pages/templates/templateEmail.html');
foreach($_POST as $key => $value){
    $corpo = str_replace('{{'.$key.'}}', $value, $corpo);
}
$info = ['assunto' => $assunto, 'corpo' => $corpo];
$mail = new Email();
$mail->addAdress();
$mail->formatarEmail($info);
if($mail->enviarEmail(true)){
    $data['sucesso'] = true;
}else{
    $data['erro'] = true;
}

die(json_encode($data));