<?php 
include 'db.php'; // serve pra incluir o banco de dados

$query = "SELECT * FROM noticias ORBER BY  data DESC LIMIT 5";
$stmt = $pdo->prepare($query);
$stmt->execute();
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>

<html lang="pt-BR">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aether Games</title>
        <Link rel="stylesheet" href="css/style.css">
</head>
<body>
    

            <!-- cabeçalho -->
         <header>
            <div class="logo-container">
                
            <img src="img/Aether.png" alt="Logo do site" class="logo">
             <h1>Aether Games</h1>
            </div>
             <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="noticias.php">Noticias</a></li>
                    <form action="pesquisa.php" method="GET" CLASS="pesquisa-form">
                      <input type="text" name="query" placeholder="Pesquisar...">
                      <button type="submit">🔍</button>
                    </form>
                </ul>
             </nav>
         </header>
         
                  <!-- principal -->

                  <main>
                    <h2>Últimas notícias</h2>
                    <p>Bem-vindo a nossa página inicial. Aqui você encontrará as notícias sobre os últimos lancaçamento do mundo dos games.</p>

                </main>

                 <!-- rodapé -->
                  <footer>
                    <p>&copy; 2024 Aether Games</p>
                  </footer>




</body>
</html>