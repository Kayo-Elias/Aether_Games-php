<<<<<<< Updated upstream
<?php

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
=======
>>>>>>> Stashed changes
