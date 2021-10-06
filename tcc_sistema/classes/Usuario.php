<?php
    /**
     * Classe para métodos do usuário
     */
    class Usuario
    {
        /**
         * Função logout.
         * Verifica se o usuário está logado.
         * - Se estiver, apaga a sessão e redireciona para a home.
         * - Se não estiver, só redireciona para a home.
         * @return void
         */
        public static function logout()
        {
            if(isset($_SESSION['logado'])){
                unset($_SESSION['logado']);
                session_destroy();
                header('Location: '.INCLUDE_PATH);
                die();
            }else{
                header('Location: '.INCLUDE_PATH);
                die();
            }
        }
    }