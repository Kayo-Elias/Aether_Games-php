<?php
include 'config.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Notícias</title>
</head>
<body>
    <h1>Últimas Notícias</h1>
    <?php
    // Busca todas as notícias
    $sql = "SELECT * FROM noticias ORDER BY data DESC";
    $resultado = $conexao->query($sql);

    // Mostra as notícias
    if ($resultado->num_rows > 0) {
        while ($noticia = $resultado->fetch_assoc()) {
            echo "<h2>" . $noticia['titulo'] . "</h2>";
            echo "<p>" . $noticia['conteudo'] . "</p>";
            echo "<small>Publicado em: " . $noticia['data'] . "</small><hr>";
        }
    } else {
        echo "Nenhuma notícia encontrada.";
    }

    $conexao->close();
    ?>
</body>
</html>
