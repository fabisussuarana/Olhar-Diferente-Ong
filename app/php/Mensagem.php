<?php

    namespace App\PHP;
    
    use App\Core\DBConnection;
    use App\PHP\Cript;

    use PDOException;

    class Mensagem extends DBConnection {
        protected Cript $cript;

        public function __construct() {
            $this->cript = new Cript();
            parent::__construct('mensagem');
        }
        
        private function setMessage(string $message): bool {
            $_SESSION['message'] = $message; 
            return true;
        }

        public function listarMensagens() {
            $mensagens = $this->selectAll();
            return $mensagens;
        }
    }

