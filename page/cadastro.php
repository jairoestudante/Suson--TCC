<?php include_once("log.php")?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    
    <script src="script.js"></script>

    
    <title>Cadastro</title>

</head>
<header>
                
                <?php $title = "Cadastrar Usuário";
                include 'cabecalho.php';
                ?>
            </header>
        <body >
            
            
                
                    

            <form action="../controle/registrar.php" method="POST">
                <table>
                    
                    <br><label for="email">E-mail:</label>
                    <input type="email" name="email" required>
                    
                    <br><label for="senha">Senha:</label>
                    <input type="password" name="senha" required>
                    
                    <br><label for="nome">Nome:</label>
                    <input type="nome" name="nome" required>
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                    <option value="">Selecione</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                        </select>

                    
                    <label for="data_nascimento">Data de nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" required>
                    
                    <br><label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" required>
                    
                   
                           
                    
                    
                   
                    </table>


                    <input type="submit" id="myBtn" value="Registrar">

                    
                    
                    
                
            </form>

                <footer><?php require_once("rodape.php");
        ?></footer>
            
            

        </body>

</html>