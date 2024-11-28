<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Notícia</title>
</head>
<body>
    <h1>Adicionar Notícia</h1>
    <form action="salvar_noticia.php" method="POST">
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="conteudo">Conteúdo:</label><br>
        <textarea name="conteudo" id="conteudo" rows="5" required></textarea><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
