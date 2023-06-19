<?php

    use App\PHP\Mensagem;

    include './vendor/autoload.php';

    if (!isset($_SESSION['token']) && $_SESSION['token'] == null) {
        header('Location: ' . URL . '/login.php');
        exit;
    }

    $mensagem = new Mensagem();
    $mensagens = $mensagem->listarMensagens();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/emails.css">
    <title>Visualizar Emails</title>
</head>
<body>
    <div class="container">
        <h3>Mensagens</h3>

        <div class="mensagem">
            <ul>
                <?php foreach ($mensagens as $mensagem): ?>
                    <li>
                        <!-- <a href="<?= URL ?>/detalhar-mensagem.php?id=< ?= $mensagem['id_mensagem'] ?>"> -->
                            <h3><?= $mensagem['nome'] ?> - <span><?= $mensagem['email'] ?></span></h3>
                            <p><?= $mensagem['conteudo'] ?></p>
                        <!-- </a> -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>