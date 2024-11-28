<?php
include 'config.php'; 


$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];

// prepara o comando para salvar no banco
$sql = "INSERT INTO noticias (titulo, conteudo, data) VALUES ('$titulo', '$conteudo', NOW())";

// executa o comando
if ($conexao->query($sql) === TRUE) {
    echo "Notícia adicionada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}

// fechar conexão
$conexao->close();
?>
