<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
	<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	<title>Registros de Dependentes</title>

</head>
<header>
        
        <?php $title = "Registros de Dependentes ";
         include 'cabecalho.php';
         ?>
    </header>
	<body class="cadastrar">
		
	<form action="../controle/registros_dependentes.php" method="POST">
	
  	
	<?php
		// inicia a sessão
		session_start();

		// verifica se o usuário está logado
		if (isset($_SESSION["id_pessoa"])) {
			// obtém o ID do usuário da variável de sessão
			$id_pessoa = $_SESSION["id_pessoa"];

			// inclui o arquivo de conexão
			require_once '../modelo/conexao.php';

			// prepara a instrução SQL para selecionar os dados das vacinas do usuário logado
			$stmt = $conn->prepare("SELECT cp.id_pessoa, cp.nome AS 
				nome_pessoa,dp.parentesco, dp.nome_dependente, cv.nome_vacina, vp.proxima_vacina FROM 
				cadastrar_pessoa cp JOIN vacina_pessoa vp ON 
				cp.id_pessoa = vp.id_pessoa JOIN cadastrar_vacinas cv 
				ON vp.id_vacina = cv.id_vacina LEFT JOIN dependentes dp 
				ON vp.id_dependente = dp.id_dependente WHERE cp.id_pessoa =  ?");
			$stmt->bind_param("i", $id_pessoa);

			// executa a instrução SQL e obtém o resultado
			$stmt->execute();
			$result = $stmt->get_result();

			// exibe os dados das vacinas do usuário logado
			echo "<table>";
		echo "<tr><th>Usuário</th><th>Nome do dependente</th><th>Parentesco</th></tr>";
			while ($row = $result->fetch_assoc()) {
                if (!empty($row["nome_dependente"])) {
				echo "<tr><td>" . $row["nome_pessoa"] . "</td><td>" . $row["nome_dependente"] . "</td><td>" . $row["parentesco"] . "</td></tr>";
                }
            }
		echo "</table>";

			// fecha a instrução SQL e a conexão com o banco de dados
		
		}

		
		?>
		<br><br>
		
 	<div>
		<h3>Registrar um dependente</h3>
		
        <label for="nome_dependente">Nome:</label>
			<input type="text" name="nome_dependente" required><br>

			<label for="data_nascimento">Data Nascimento:</label>
			<input type="date" name="data_nascimento" required><br>

			<label for="parentesco">Selecione sua relação:</label>
			<select name="parentesco" id="parentesco">
				<option value="filho(a)">Filho(a)</option>
				<option value="pai">Pai</option>
				<option value="mae">Mãe</option>
				<option value="avo">Avó</option>
				<option value="avo">Avô</option>
				<option value="outro">Outro</option>
			</select>

			<input type="submit" value="Cadastrar Novo">

	</div>	 
</form>


		
	</body>

<?php require_once("rodape.php")?>
</html>


