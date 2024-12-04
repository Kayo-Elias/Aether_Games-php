<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_noticia = intval($_POST['id_noticia']);
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $comentario = mysqli_real_escape_string($conexao, $_POST['comentario']);

    $sql = "INSERT INTO comentarios (id_noticia, usuario, comentario, data) VALUES ($id_noticia, '$usuario', '$comentario', NOW())";
    if ($conexao->query($sql)) {
        echo "<script>alert('Comentário adicionado com sucesso!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Erro ao adicionar comentário.'); window.history.back();</script>";
    }
}
?>
