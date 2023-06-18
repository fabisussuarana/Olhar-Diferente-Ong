<?php
    include './vendor/autoload.php';

    use App\PHP\Usuario;

    var_dump($_SESSION);

    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (!is_string($email) && !is_string($senha)) {
            return;
        }

        $usuario = new Usuario();
        $usuario->login($email, $senha);
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <div class="input-box">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email@gmail.com">
        </div>

        <div class="input-box">
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="******">
        </div>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>