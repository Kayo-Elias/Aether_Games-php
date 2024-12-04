<?php
<<<<<<< HEAD
// Conexão com o banco de dados
include 'db.php';

// Pega o ID da notícia e o tipo (se é de eSports ou Review)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

// Define a tabela a ser consultada com base no tipo
if ($tipo === 'esports') {
    $tabela = 'esports';
} elseif ($tipo === 'reviews') {
    $tabela = 'reviews';
} else {
    $tabela = 'noticias';
}

// Consulta para buscar a notícia completa
$sql = "SELECT titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM $tabela WHERE id = $id";
$resultado = $conexao->query($sql);
=======
include_once 'db.php';
session_start(); // Inicia a sessão

// Verifica se a conexão foi estabelecida
if (!isset($conexao)) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}


if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    
    if ($tipo == 'reviews') {
    
        $sql = "SELECT id, titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM reviews WHERE id = ? LIMIT 1";
    } elseif ($tipo == 'esports') {
        
        $sql = "SELECT id, titulo, conteudo, imagem, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM esports WHERE id = ? LIMIT 1";
    } else {
        echo "<p>Tipo de notícia inválido.</p>";
        exit;
    }

    // Prepara a consulta
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $id); 
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica se a notícia foi encontrada
    if ($resultado->num_rows > 0) {
        $noticia = $resultado->fetch_assoc();
    } else {
        echo "<p>Notícia não encontrada.</p>";
        exit;
    }
} else {
    echo "<p>ID ou tipo de notícia inválido.</p>";
    exit;
}
>>>>>>> 896216a78744a7297490abc947778a8eb228fe9c
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

<<<<<<< HEAD
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
=======
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

    <!-- Conteúdo Principal -->
    <main>
        <h1><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
        <?php if (!empty($noticia['imagem'])): ?>
            <img src="<?php echo htmlspecialchars($noticia['imagem']); ?>" alt="Imagem da notícia" class="noticia-img">
        <?php endif; ?>
        <p><strong>Publicado em:</strong> <?php echo $noticia['data']; ?></p>
        <div class="noticia-conteudo">
            <?php echo nl2br(htmlspecialchars($noticia['conteudo'])); ?>
        </div>
    </main>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Aether Games</p>
    </footer>
>>>>>>> 896216a78744a7297490abc947778a8eb228fe9c

</body>
</html>
