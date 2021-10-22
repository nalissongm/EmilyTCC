<?php
    /**
     * Verifica login
     *
     * @return true se dados estiverem corretos.
     * @return Exception com o erro de e-mail ou senha inválida.
     */
    class RegistrarUser{
    
        private $nome;
        private $cpf;
        private $telefone;
        private $email;
        private $senha;

        public function registrar()
        {
            if($this->validar()){
                $insert = array($this->nome,$this->email,$this->senha,$this->cpf,$this->telefone);
                $conn = MySQL::conectar();
                $stmt = $conn->prepare("INSERT INTO `tb_usuarios` VALUES (null,?,?,?,?,?)");
                try{
                    $stmt->execute($insert);
                    unset($_POST);
                    
                }catch(Exception $e){
                    return false;
                }
            }
            unset($_POST);
            return;
        }

        /**
         * Função que valida o login.
         */
        public function validar()
        {
            $conn = MySQL::conectar();
            $stmt = $conn->prepare("SELECT * FROM `tb_usuarios` WHERE email = ?");
            $stmt->execute(array($this->email));
            
            if($stmt->rowCount()){
                // Já existe um email cadastrado.
                throw new Exception("CadastroError: email já existe.");
                return false;
            }else{
                return true;
            }
        }

        public function limparstrings($string){
            return preg_replace("/[^0-9]/", "", $string);
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

        /**
         * Define o nome.
         *
         * @param [String] $nome
         * @return void
         */
        public function setNome($nome)
        {
           $this->nome = $nome;
        }

        /**
         * Define a telefone.
         *
         * @param [String] $telefone
         * @return void
         */
        public function setTelefone($telefone)
        {
            $this->telefone = "+55".$this->limparstrings($telefone);
        }

        /**
         * Define o cpf.
         *
         * @param [String] $cpf
         * @return void
         */
        public function setCpf($cpf)
        {
           $this->cpf = $cpf;
        }
        
    }