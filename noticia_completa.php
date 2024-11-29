<?php
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM noticias WHERE id = $id";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícia Completa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <h1><a href="index.php">Aether Games</a></h1>
    </header>

    <main>
        <?php if ($resultado->num_rows > 0): ?>
            <?php $noticia = $resultado->fetch_assoc(); ?>
            <article class="noticia-completa">
                <h1><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
                <?php if (!empty($noticia['imagem'])): ?>
                    <img src="<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img">
                <?php endif; ?>
                <p><?php echo nl2br(htmlspecialchars($noticia['conteudo'])); ?></p>
                <small>Publicado em: <?php echo $noticia['data']; ?></small>
            </article>
        <?php else: ?>
            <p>Notícia não encontrada.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Aether Games</p>
    </footer>

</body>
</html>
