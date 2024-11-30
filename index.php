<?php  
include_once 'db.php'; 
session_start(); // Inicia a sessão

// Verifica se a conexão foi estabelecida
if (!isset($conexao)) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aether Games</title>
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
                    <li><a href="noticias.php">Notícias</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                    <li><a href="esports.php">eSports</a></li>
                </ul>
            </nav>
        </div>

        <!-- Barra de Pesquisa -->
        <form action="pesquisa.php" method="GET" class="pesquisa-form">
            <input type="text" name="query" placeholder="Pesquisar...">
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
        <h1>Últimas Notícias</h1>
        <a href="noticias.php">Ver todas as notícias</a>

        <div class="noticias-container">
        <?php
        $sql = "SELECT id, titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM noticias ORDER BY data DESC LIMIT 3";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0):
            while ($noticia = $resultado->fetch_assoc()):
        ?>
            <article>
                <h2><?php echo htmlspecialchars($noticia['titulo']); ?></h2>
                <?php if (!empty($noticia['imagem'])): ?>
                    <img src="<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img">
                <?php endif; ?>
                <p><?php echo nl2br(htmlspecialchars(substr($noticia['conteudo'], 0, 150))); ?>...</p>
                <a href="noticia_completa.php?id=<?php echo $noticia['id']; ?>" class="ver-mais">Leia mais</a>
            </article>
        <?php
            endwhile;
        else:
            echo "<p>Nenhuma notícia encontrada.</p>";
        endif;
        ?>
        </div>
    </main>

    <!-- Rodapé -->
    <footer>
        <div class="redes-sociais-container">
            <h2>Siga-nos nas redes sociais</h2>
            <a href="#" class="rede-social-link">
                <img src="img/facebook.png" alt="Facebook" class="rede-social-icon">
            </a>
            <a href="#" class="rede-social-link">
                <img src="img/twitter.png" alt="Twitter" class="rede-social-icon">
            </a>
            <a href="#" class="rede-social-link">
                <img src="img/instagram.png" alt="Instagram" class="rede-social-icon">
            </a>
        </div>
        <p>&copy; 2024 Aether Games. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
