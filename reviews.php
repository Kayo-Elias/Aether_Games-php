<?php  
include_once 'db.php'; 
session_start(); // Inicia a sessão

// Verifica se a conexão foi estabelecida
if (!isset($conexao)) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}

// Consulta para pegar as últimas reviews de jogos
$sql = "SELECT id, titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM reviews ORDER BY data DESC";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - Aether Games</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="header-left">
            <div class="logo-container">
                <img src="img/Aether.png" alt="Logo do site" class="logo">
                <h1><a href="index.php">Aether Games</a></h1>
            </div>
        </div>

        <div class="header-center">
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="noticias.php">Notícias</a></li>
                    <li><a href="reviews.php" class="ativo">Reviews</a></li>
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

            <!-- Barra de Pesquisa -->
            <form action="pesquisar.php" method="GET" class="pesquisa-form">
                <input type="text" name="query" placeholder="Pesquisar..." required>
                <button type="submit">🔍</button>
            </form>

            <!-- Botões de Login e Cadastrar-se -->
            <div class="auth-buttons">
                <a href="login.php"><button class="login-button">Login</button></a>
                <a href="cadastro.php"><button class="register-button">Cadastrar-se</button></a>
            </div>
        </div>
    </header>
    <!-- Conteúdo Principal -->
    <main>
        <h1>Últimas Reviews</h1>
        <div class="noticias-lista">
            <?php
            if ($resultado->num_rows > 0):
                while ($review = $resultado->fetch_assoc()): 
            ?>
                <article>
                    <!-- Título e imagem agora são links para a página de review completa -->
                    <a href="noticia_completa.php?id=<?php echo $review['id']; ?>&tipo=reviews" class="noticia-link">
                        <h2><?php echo htmlspecialchars($review['titulo']); ?></h2>
                        <?php if (!empty($review['imagem'])): ?>
                            <img src="<?php echo htmlspecialchars($review['imagem']); ?>" alt="Imagem da review" class="noticia-img">
                        <?php endif; ?>
                    </a>
                    <p><?php echo nl2br(htmlspecialchars(substr($review['conteudo'], 0, 150))); ?>...</p>
                </article>
            <?php
                endwhile;
            else:
            ?>
                <p>Nenhuma review encontrada.</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Aether Games</p>
    </footer>

</body>
</html>
