<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Suson </title>
    <link rel="stylesheet" href="../style/reset.css">

    <style>
        body {
            background-color:rgb(26, 165, 119);
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: auto;
            margin-top: 12vw;
            max-width: 400px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        
        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
            width: 100%;

            
        }
        
        button[type="submit"]:hover {
            background-color: #3e8e41;

        }
        
        .error {
            color: #f00;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .atualizarcadastro input{
            background-color: #4CAF69;  
            color: white;        
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 49%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
            padding: 10px 20px;          
        }
        .atualizarcadastro .botao-amarelo {
        background-color: yellow;
        color: black;
        }

        .atualizarcadastro .botao-vermelho {
        background-color: rgb(255, 99, 71);
        color: white;
        }

    </style>
</head>
<body>
    <header>
    <h3 style="text-align: center; display: flex; justify-content: center; align-items: center; flex-direction: column;">Suson - Carteira de Vacinas</h3>

    <h3 style="text-align: center; display: flex; justify-content: center; align-items: center; flex-direction: column;">Login</h3>
    </header>

    <form method="POST" action="./controle/validar_login.php">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <button type="submit">Entrar</button>
        
        
        <div class="atualizarcadastro">
            <a href="./page/cadastro.php"><input type="submit" value="Criar Conta" class="botao-amarelo"></a>
            <input type="submit" value="Esqueci senha" class="botao-vermelho">
        </div>

    </form>
    
    <footer>
        <?php require_once("rodape.php"); ?>
    </footer>
</body>
</html>
