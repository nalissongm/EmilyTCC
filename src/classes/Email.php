<?php
	
	class Email{
		/**
		 * Credenciais ao acesso SMTP
		 */
		const HOST = SMTP['host'];
		const USERNAME = SMTP['username'];
		const PASS = SMTP['pass'];
		const SECURE = SMTP['secure'];
		const PORT = SMTP['port'];
		const CHARSET = SMTP['charset'];
		
		/**
		 * Dados remetente
		 */
		const FROM_EMAIL = REMETENTE['email'];
		const FROM_NAME = REMETENTE['nome'];
		
		private $mailer;
		
		/**
		 * [__construct config PHPMailer]
		 * @param [string] $host     [endereço do servidor de email]
		 * @param [string] $username [email remetente]
		 * @param [string] $senha    [senha do email remetente]
		 * @param [string] $name     [nome do remetente]
		 */
		public function __construct(){
			$this->mailer = new PHPMailer;
		    //Server settings
		    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     		 //Enable verbose debug output
		    $this->mailer->isSMTP();                                             //Send using SMTP
		    $this->mailer->Host       = self::HOST;                     			     //Set the SMTP server to send through
		    $this->mailer->SMTPAuth   = true;                                    //Enable SMTP authentication
		    $this->mailer->Username   = self::USERNAME;                    		     //SMTP username
		    $this->mailer->Password   = self::PASS;                                  //SMTP password
		   	$this->mailer->SMTPSecure = self::SECURE;                			 //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $this->mailer->Port       = self::PORT;                              //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $this->mailer->setFrom(self::USERNAME,self::FROM_NAME);
		    //$mail->addAddress('ellen@example.com');                     	 	 //Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         			 //Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    			 //Optional name

		    //Content
		    $this->mailer->isHTML(true);                                  		  //Set email format to HTML
		    $this->mailer->CharSet = self::CHARSET;

		}

		/**
		 * Set email e nome do destinatário
		 * @var string | array
		 * @param   $[email] [<email do destinatário>]
		 * @param   $[nome] [<nome do destinatário>]
		 */
		public function addAdress(?string $email = null,?string $nome = null)
		{
			if($email != null && $nome == null)
				$this->mailer->addAddress($email);     //Add a recipient
			else if($email != null && $nome != null)
				$this->mailer->addAddress($email,$nome);
			else
				$this->mailer->addAddress(self::FROM_EMAIL,self::FROM_NAME);
		}

		/**
		 * [formatarEmail Formatação do email para envio]
		 * @param  [array] $info [conteúdo do site]
		 * @var $info['assunto'] ['campo assundo do email']
		 * @var $info['corpo'] ['conteúdo do email']
		 * @var strip_tags($info['$info['corpo']']) ['conteúdo do email sem tags html']
		 */
		public function formatarEmail($info){
			$this->mailer->Subject = $info['assunto'];
			$this->mailer->Body = $info['corpo'];
			$this->mailer->AltBody = strip_tags($info['corpo']);
		}

		/**
		 * [enviarEmail envia a mensagem e verifica erro]
		 * @return [true] [enviado com sucesso]
		 * @return [false] [falha ao enviar]
		 */
		public function enviarEmail(){
			if($this->mailer->send()){
				return true;
			}else{
				return false;
			}
			
		}
	}
?>