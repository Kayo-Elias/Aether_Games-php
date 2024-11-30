<?php
// Conexão com o banco de dados
include 'db.php';

// Pega o ID da notícia e o tipo (se é de eSports ou não)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

// Define a tabela a ser consultada com base no tipo
if ($tipo === 'esports') {
    $tabela = 'esports';
} else {
    $tabela = 'noticias';
}

// Consulta para buscar a notícia completa
$sql = "SELECT titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM $tabela WHERE id = $id";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícia Completa - Aether Games</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
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

    <div class="header-right">
        <!-- Verifica se o usuário está logado -->
        <?php if (isset($_SESSION['nome'])): ?>
            <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p>
            <a href="logout.php">Sair</a>  <!-- Link para sair -->
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
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
