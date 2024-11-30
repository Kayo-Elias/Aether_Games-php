<?php  
include_once 'db.php'; 
session_start();

// Verifica se a conexão foi estabelecida
if (!isset($conexao)) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}

$sql = "SELECT id, titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM noticias ORDER BY data DESC";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias - Aether Games</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="header-left">
            <div class="logo-container">
                <img src="img/Aether.png" alt="Logo do site" class="logo">
                <h1>Aether Games</h1>
            </div>
        </div>

        <div class="header-center">
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="noticias.php" class="ativo">Notícias</a></li>
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
                <a href="login.php">
            <?php endif; ?>
        </div>
        <!-- Barra de Pesquisa -->
        <form action="pesquisa.php" method="GET" class="pesquisa-form">
            <input type="text" name="query" placeholder="Pesquisar...">
            <button type="submit">🔍</button>
        </form>
    </header>

    <!-- Conteúdo Principal -->
    <main>
        <h1>Todas as Notícias</h1>
        <div class="noticias-lista">
            <?php
            if ($resultado->num_rows > 0):
                while ($noticia = $resultado->fetch_assoc()):
            ?>
                <article>
                    <!-- Título e imagem agora são links para a página de notícia completa -->
                    <a href="noticia_completa.php?id=<?php echo $noticia['id']; ?>" class="noticia-link">
                        <h2><?php echo htmlspecialchars($noticia['titulo']); ?></h2>
                        <?php if (!empty($noticia['imagem'])): ?>
                            <img src="<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img">
                        <?php endif; ?>
                    </a>
                    <p><?php echo nl2br(htmlspecialchars(substr($noticia['conteudo'], 0, 150))); ?>...</p>
                </article>
            <?php
                endwhile;
            else:
            ?>
                <p>Nenhuma notícia encontrada.</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Aether Games</p>
    </footer>

</body>
</html>
