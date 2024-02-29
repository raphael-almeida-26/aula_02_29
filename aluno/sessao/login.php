<?php
session_start();

// Verifica se os dados do formulário foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o usuário e senha foram fornecidos
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Verifica as credenciais (um exemplo simples com credenciais fixas)
        $usuario = 'usuario';
        $senha = 'senha';

        if ($_POST['username'] === $usuario && $_POST['password'] === $senha) {
            // Credenciais válidas, armazena o nome de usuário na sessão
            $_SESSION['username'] = $_POST['username'];
            // Redireciona para a página de boas-vindas
            header("Location: bem-vindo.php");
            exit;
        } else {
            // Credenciais inválidas, exibe mensagem de erro
            $erro = "Usuário ou senha incorretos.";
        }
    } else {
        // Se os campos estiverem vazios, exibe mensagem de erro
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    // Se houver um erro, exibe a mensagem de erro
    if (isset($erro)) {
        echo "<p>$erro</p>";
    }
    ?>
    <form action="login.php" method="POST">
        <label for="username">Usuário:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
