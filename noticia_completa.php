<?php  
include_once 'db.php'; 
session_start();

// Verifica se o ID da notícia foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta a notícia completa com base no ID
    $sql = "SELECT * FROM noticias WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    
    // Verifica se a notícia foi encontrada
    if ($resultado->num_rows > 0) {
        $noticia = $resultado->fetch_assoc();
    } else {
        echo "Notícia não encontrada.";
        exit;
    }
} else {
    echo "ID da notícia não fornecido.";
    exit;
}

// Consulta para buscar os comentários da notícia
$sql_comentarios = "SELECT usuario, comentario, DATE_FORMAT(data, '%d/%m/%Y %H:%i') AS data FROM comentarios WHERE id_noticia = $id ORDER BY data DESC";
$resultado_comentarios = $conexao->query($sql_comentarios);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($noticia['titulo']); ?> - Aether Games</title>
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
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="noticias.php" class="ativo">Notícias</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="esports.php">eSports</a></li>
            </ul>
        </nav>

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
        <article>
            <h1><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
            <?php if (!empty($noticia['imagem'])): ?>
                <img src="<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img">
            <?php endif; ?>
            <p><strong>Publicado em:</strong> <?php echo htmlspecialchars($noticia['data']); ?></p>
            <div class="conteudo-completo">
                <p><?php echo nl2br(htmlspecialchars($noticia['conteudo'])); ?></p>
            </div>
        </article>
        
    </main>

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
    <!-- Rodapé -->
    <footer>
        <div class="redes-sociais-container">
            <h2>Siga-nos:</h2>
            <a href="https://x.com/aethergames_?t=OkI8IvGnlaga-8LS0QC99Q&s=09" target="_blank">
                <img src="https://www.freepnglogos.com/uploads/twitter-x-logo-png/twitter-x-logo-png-9.png" alt="Twitter" class="rede-social-icon">
            </a>
            <a href="https://facebook.com/aethergames" target="_blank">
                <img src="https://th.bing.com/th/id/R.2bad70f2d08429a28dfbebd4c237924b?rik=vgEdhJ%2f%2biiEnQQ&riu=http%3a%2f%2fpngimg.com%2fuploads%2ffacebook_logos%2ffacebook_logos_PNG19748.png&ehk=0ZiZ04ZZ6mSJ5oyPxBh1gy4FSYhegWTWyDpCiI73sbw%3d&risl=&pid=ImgRaw&r=0" alt="Facebook" class="rede-social-icon">
            </a>
            <a href="https://www.instagram.com/aethergames1?igsh=dGRhN3k4NWltNzV5" target="_blank">
                <img src="https://th.bing.com/th/id/R.735dda68880a385ce8cc5be4f3c5fcd6?rik=qSxRw2lCZYy9Mw&riu=http%3a%2f%2fpngimg.com%2fuploads%2finstagram%2finstagram_PNG11.png&ehk=QVCbfkCKi8pJLF08bRkS%2fLeMqLTnJQf402WRaIdN6jE%3d&risl=&pid=ImgRaw&r=0" alt="Instagram" class="rede-social-icon">
            </a>
            <a href="https://www.youtube.com/channel/UCZD3jFO-zq_RkJHTnBVOSIg" target="_blank">
                <img src="https://logodownload.org/wp-content/uploads/2014/10/youtube-logo-5-2.png" alt="YouTube" class="rede-social-icon">
            </a>
        </div>
        <p>&copy; 2024 Aether Games</p>
    </footer>


</body>
</html>
