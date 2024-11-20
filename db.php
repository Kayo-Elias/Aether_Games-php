<?php
$host = 'kayo';
$dbname = 'aether_games';
$username = 'kayo';    //usuario
$password = 'kayo55811111123';        //senha

try {
    $pdo = new PDO("mysql:host=$host;dbname$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados:" . $e->getMessage());
}
?>