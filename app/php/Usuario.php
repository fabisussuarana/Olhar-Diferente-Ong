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
        
        private function setMessage(string $message): bool {
            $_SESSION['message'] = $message; 
            return true;
        }

        public function login(string $email, string $senha) {
            try {
                $usuario = current($this->selectBy([
                    'email' => $email
                ]));

                if ($usuario) {
                    $senhaDec = $this->cript->dec($usuario['senha']);

                    if ($senhaDec === $senha) {
                        $_SESSION['token'] = $this->cript->enc(json_encode([
                            'id' => $usuario['id_usuario'],
                            'nome' => $usuario['nome'],
                        ]));

                        header('Location: ' . URL . '/visualizar-email.php');
                        exit;
                    } else {
                        $this->setMessage('Senha inválida.');
                        return false;
                    }
                } else {
                    $this->setMessage('Email inválido.');
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

