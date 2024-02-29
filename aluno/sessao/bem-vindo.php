<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header("Location: index.php");
    exit;
}

// Verifica se o botão de logoff foi pressionado
if (isset($_POST['logout'])) {
    // Limpa todas as variáveis de sessão
    session_unset();
    // Destrói a sessão
    session_destroy();
    // Redireciona para a página de login
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
    <form action="" method="POST">
        <input type="submit" name="logout" value="Logoff">
    </form>
</body>
</html>

