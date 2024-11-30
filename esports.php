<?php
include 'db.php';

// Pegando as notícias de eSports
$sql = "SELECT id, titulo, resumo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM noticias WHERE categoria = 'eSports' ORDER BY data DESC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aether Games - eSports</title>
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
    <h2>Notícias de eSports</h2>

    <div class="noticias-container">
        <?php while ($noticia = $resultado->fetch_assoc()): ?>
            <div class="noticia-item">
                <h2><a href="noticia_completa.php?id=<?php echo $noticia['id']; ?>"><?php echo htmlspecialchars($noticia['titulo']); ?></a></h2>
                <?php if (!empty($noticia['imagem'])): ?>
                    <img src="<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img">
                <?php endif; ?>
                <p><?php echo nl2br(htmlspecialchars($noticia['resumo'])); ?></p>
                <small>Publicado em: <?php echo $noticia['data']; ?></small>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<footer>
    <!-- Redes sociais -->
    <div class="redes-sociais-container">
        <h2>Siga-nos:</h2>
        <a href="https://twitter.com/aethergames_" target="_blank">
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
