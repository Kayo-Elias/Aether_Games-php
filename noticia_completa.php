<?php
// Conexão com o banco de dados
include 'db.php';
session_start();

// Captura o ID da notícia
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para buscar a notícia completa
$sql = "SELECT titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM noticias WHERE id = $id";
$resultado = $conexao->query($sql);

// Verifica se a notícia foi encontrada
$noticia = $resultado->num_rows > 0 ? $resultado->fetch_assoc() : null;

// Consulta para buscar os comentários da notícia
$sql_comentarios = "SELECT usuario, comentario, DATE_FORMAT(data, '%d/%m/%Y %H:%i') AS data FROM comentarios WHERE id_noticia = $id ORDER BY data DESC";
$resultado_comentarios = $conexao->query($sql_comentarios);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars(substr($noticia['conteudo'] ?? 'Notícia completa da Aether Games.', 0, 150)); ?>">
    <title><?php echo htmlspecialchars($noticia['titulo'] ?? 'Notícia Não Encontrada'); ?> - Aether Games</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="logo-container">
        <img src="img/Aether.png" alt="Logo do site" class="logo">
        <h1><a href="index.php">Aether Games</a></h1>
       
        <div class="header-center">
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="noticias.php">Notícias</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                    <li><a href="esports.php">eSports</a></li>
                </ul>
            </nav>
        </div>
    <div class="user-options">
        <?php if (isset($_SESSION['nome'])): ?>
            <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p>
            <a href="logout.php">Sair</a>
        <?php else: ?>
            <a href="login.php"></a>
        <?php endif; ?>
    </div>
</header>

<main>
    <?php if ($noticia): ?>
        <article>
            <h1><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
            <?php if (!empty($noticia['imagem'])): ?>
                <img src="<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img">
            <?php endif; ?>
            <p><?php echo nl2br(htmlspecialchars($noticia['conteudo'])); ?></p>
            <small>Publicado em: <?php echo $noticia['data']; ?></small>
        </article>
        
        <section class="comentarios">
            <h2>Comentários</h2>
            <?php if ($resultado_comentarios->num_rows > 0): ?>
                <?php while ($comentario = $resultado_comentarios->fetch_assoc()): ?>
                    <div class="comentario">
                        <p><strong><?php echo htmlspecialchars($comentario['usuario']); ?>:</strong> <?php echo htmlspecialchars($comentario['comentario']); ?></p>
                        <small><?php echo $comentario['data']; ?></small>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Sem comentários ainda. Seja o primeiro a comentar!</p>
            <?php endif; ?>

            <form action="comentarios.php" method="POST">
                <input type="hidden" name="id_noticia" value="<?php echo $id; ?>">
                <label for="usuario">Seu Nome:</label>
                <input type="text" id="usuario" name="usuario" required>
                <label for="comentario">Comentário:</label>
                <textarea id="comentario" name="comentario" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </section>
    <?php else: ?>
        <p>Notícia não encontrada.</p>
    <?php endif; ?>
</main>

<footer>
    <p>&copy; 2024 Aether Games</p>
</footer>
</body>
</html>
