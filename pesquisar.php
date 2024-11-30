<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "aether_games"; 


$conexao = new mysqli($servername, $username, $password, $dbname);


if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Verificar se o termo foi enviado pelo formulário
if (isset($_GET['termo'])) {
    $termo = $_GET['termo'];

    // Inserir o termo de pesquisa na tabela "pesquisas"
    $stmt = $conexao->prepare("INSERT INTO pesquisas (termo) VALUES (?)");
    $stmt->bind_param("s", $termo); // "s" significa que o parâmetro é uma string
    $stmt->execute();

    // Buscar resultados com base no termo
    $sql = "SELECT * FROM pesquisas WHERE termo LIKE ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $param);
    $param = "%$termo%"; // Com o "%" estamos fazendo a busca parcial
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Exibir os resultados
    echo "<h2>Resultados da Pesquisa para: '$termo'</h2>";
    while ($linha = $resultado->fetch_assoc()) {
        echo "<p>ID: " . $linha['id'] . " - Termo: " . $linha['termo'] . " - Data: " . $linha['data_pesquisa'] . "</p>";
    }

    // Fechar a conexão
    $stmt->close();
}
$conexao->close();
?>
