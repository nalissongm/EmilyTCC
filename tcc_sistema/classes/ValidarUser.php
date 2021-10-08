<?php
    /**
     * Verifica login
     *
     * @return true se dados estiverem corretos.
     * @return Exception com o erro de e-mail ou senha inválida.
     */
    class ValidarUser{
    
        private $email;
        private $senha;

        /**
         * Função que valida o login.
         */
        public function validar()
        {
            $conn = MySQL::conectar();
            $stmt = $conn->prepare("SELECT * FROM `tb_usuarios` WHERE email = ?");
            $stmt->execute(array($this->email));
            
            if($stmt->rowCount()){
                // Array informações da usuário.
                $data = $stmt->fetch();
                if($data['senha'] === $this->senha){
                    /**
                     * Login efetuado com sucesso!
                     * - Criar sessões com a informação 
                     *   utilizada na aplicação.
                     */
                    $_SESSION['logado'] = true;
                    $_SESSION['auth'] = uniqid();
                    $_SESSION['id_usuario'] = $data['id_usuario'];
                    $_SESSION['email'] = $this->email;
                    //$_SESSION['cpf'] = $data['cpf'];
                    //$_SESSION['telefone'] = $data['telefone'];
                    //$_SESSION['senha'] = $data['senha'];
                    unset($_POST);
                    header('Location: '.INCLUDE_PATH);
                    die();
                }
                unset($_POST);
                throw new Exception("LoginError: senha inválida.");
            }else{
                throw new Exception("LoginError: email inválido.");
            }
        }

        /**
         * Define o email.
         *
         * @param [String] $email
         * @return void
         */
        public function setEmail($email)
        {
           $this->email = $email;
        }

        /**
         * Define a senha.
         *
         * @param [String] $senha
         * @return void
         */
        public function setSenha($senha)
        {
           $this->senha = $senha;
        }
    }