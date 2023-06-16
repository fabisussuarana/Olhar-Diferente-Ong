<?php

    namespace App\PHP;
    
    use App\Core\DBConnection;
    use App\PHP\Cript;

    use PDOException;

    class Usuario extends DBConnection {
        protected Cript $cript;

        public function __construct() {
            $this->cript = new Cript();
            parent::__construct('usuario');
        }
        
        private function setMessage(): bool {
            $_SESSION['message'] = 'Email inválido.'; 
            return true;
        }

        public function login(string $email, string $senha) {
            try {
                $usuario = current($this->selectBy([
                    'email' => $email
                ]));

                if ($usuario) {

                } else {
                    $this->setMessage();
                    return false;
                }
            } catch(PDOException $e) {

            }
        }

        public function cadastrar($nome, $email, $senha) {
            $senha = $this->cript->enc($senha);

            $resultadoCadastro = $this->insert([
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha,
            ]);

            return true;
        } 
    }

