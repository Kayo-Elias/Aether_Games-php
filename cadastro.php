<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar-se</title>
    <style>
        * {
           margin:0;
           padding: 0;
           box-sizing: border-box;
        }
        body {
           font-family: Arial, sans-serif;
           background: linear-gradient(135deg, #5b9bd5, #2d89ef);
           color :#333;
           display: flex;
           justify-content: center;
        }
        .container {
          background: white;
          padding: 30px 40px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
          width: 100%;
          max-width: 400px;
        }
         h1 {
          text-align: center;
          margin-bottom: 20px;
          color: #5b9bd5;
         }
        label {
             font-size: 14px;
             font-weight: bold;
             display: block;
             margin-bottom: 8px
        }
        input  {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5b9bd5;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
 




        </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="login.html" class="link">Já possui uma conta? Faça login</a>
    </div>
</body>
</html>