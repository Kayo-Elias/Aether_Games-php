<?php
$host = 'kayo';
$dbname = 'aether_games';
$username = 'kayo';    //usuario
$password = 'kayo55811111123';        //senha

try {
    $pdo = new PDO("mysql:host=$host;dbname$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
$host = 'localhost';      
$usuario = 'root';        
$senha = '';              
$banco = 'aether_games'; 

// Criar conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar se houve erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}
?>
