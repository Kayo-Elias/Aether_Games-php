<!DOCTYPE html>

<html lang="pt-BR">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aether Games</title>
        <Link rel="stylesheet" href="css/style.css">
        <style>
          
          .noticia img {
              width: 150px; 
              height: auto; 
              object-fit: cover; 
              margin-right: 10px; 
          }

          .noticia {
              display: flex;
              align-items: center; 
              margin-bottom: 20px; 
          }

          .noticia h3 {
              margin: 0;
              font-size: 18px; 
          }

          .noticia p {
              font-size: 14px; 
              color: #555; 
          }

          .noticia a {
              text-decoration: none;
              color: #007BFF; 
              font-weight: bold;
          }

          .noticia a:hover {
              text-decoration: underline; 
          }
      </style>
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
                    <li><a href="lancamentos.php">Lançamentos</a></li>
                    <li><a href="esports.php">eSports</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                    <form action="pesquisa.php" method="GET" CLASS="pesquisa-form">
                      <input type="text" name="query" placeholder="Pesquisar...">
                      <button type="submit">🔍</button>
                    </form>

                </ul>
             </nav>
         </header>
         
                  <!-- principal -->

                  <main>
    
                    <p>Bem-vindo a nossa página inicial. Aqui você encontrará as notícias e reviews sobre os últimos lançamentos do mundo dos games.</p>

                     <!-- Seção de Últimas Notícias / Destaques -->
                     <section class="destaques">
                    <h2>Últimas Notícias</h2>
            
                  <div class="noticia">
                 <img src="https://compass-ssl.xbox.com/assets/37/27/3727a77d-41ae-4022-b2d7-022b093c0551.jpg?n=Fable_GLP-Page-Hero-1084_1920x1080.jpg" alt="Notícia 1">
                 <h3><a href="noticia1.php">Insider já viu Fable rodando e diz: “DNA de The Witcher”</a></h3>
                 <p>Ao que parece, um vídeo vazado de Fable chegou ao jornalista Jez Corden, que explicou elementos do gameplay que assistiu</p>
                 <a href="noticia1.php">Leia mais</a>
                 </div>

                 </section>

                    <!--seção de redes sociais-->
                    <section class="redes sociais">
                    <h2>Siga-nos nas redes sociais</h2>
                    <a href="https://twitter.com/aethergames" target="_blank">Twitter</a>
                    <a href="https://facebook.com/aethergames" target="_blank">Facebook</a>
                    <a href="https://instagram.com/aethergames" target="_blank">Instagram</a>
                    <a href="https://youtube.com/aethergames" target="_blank">YouTube</a>
                   
                   </section>


                </main>

                 <!-- rodapé -->
                  <footer>
                    <p>&copy; 2024 Aether Games</p>
                  </footer>




</body>
</html>