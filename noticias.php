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
<<<<<<< HEAD
                <h1>Aether Games</h1>
=======
                <h1><a href="index.php">Aether Games</a></h1>
>>>>>>> 896216a78744a7297490abc947778a8eb228fe9c
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

<<<<<<< HEAD
=======
     

>>>>>>> 896216a78744a7297490abc947778a8eb228fe9c
        <div class="header-right">
            <!-- Verifica se o usuário está logado -->
            <?php if (isset($_SESSION['nome'])): ?>
                <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p>
                <a href="logout.php">Sair</a>  <!-- Link para sair -->
            <?php else: ?>
                <a href="login.php">
            <?php endif; ?>
<<<<<<< HEAD
        </div>
        <!-- Barra de Pesquisa -->
        <form action="pesquisa.php" method="GET" class="pesquisa-form">
            <input type="text" name="query" placeholder="Pesquisar...">
            <button type="submit">🔍</button>
        </form>
    </header>

=======

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

      

>>>>>>> 896216a78744a7297490abc947778a8eb228fe9c
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

<<<<<<< HEAD
=======
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
>>>>>>> 896216a78744a7297490abc947778a8eb228fe9c
    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Aether Games</p>
    </footer>

</body>
</html>
