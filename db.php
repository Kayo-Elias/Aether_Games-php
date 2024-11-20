<?php
$host = 'localhost';
$dbname = 'aether_games';
$username = 'root';    //usuario
$password = '';        //senha

try {
    $pdo = new PDO("mysql:host=$host;dbname$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados:" . $e->getMessage());
}
?>