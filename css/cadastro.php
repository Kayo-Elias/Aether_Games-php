<?php
include 'db.php'; // Inclui a conexão com o banco

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    $sql = "INSERT INTO login_cadastro (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conexao->query($sql)) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar-se</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
