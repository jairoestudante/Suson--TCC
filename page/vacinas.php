
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
		<script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
		<script >
			date = new Date().toLocaleDateString();	document.write(date);
		</script>

                




	<title>Registros de Vacinas</title>
	
	<style>
		input[type="text"], input[type="date"] {
			margin: 15px 10px;
			padding: 15px;
			
		}
		form{
			background-color: transparent;
			width: 40%;
			border: 1px solid black;
			margin-top: 20px;
			padding: 5px;
			margin: 7px;
			text-align: center;
			border: 1px solid #CCC;
			border-radius: 1em;
			align-items: center;
			width: 50%;
			margin: 30px;
			/* Para ver as bordas do formulário */
			padding: 30px;
			border: 1px solid #CCC123;
			border-radius: 1em;
			font-size: 26px;

		}
		
		
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
			width: 50%;
			

			
			}
		th {
			background-color: #cca4;
			border: 1px, solid, black;
		}
	</style>
</head>
<header>
<button class="sair" onclick="goBack()">Voltar</button>
        
        <?php $title = "Registros de Vacinas ";
         include 'cabecalho.php';
         ?>
    </header>
	<body class="">
		
	<form class="lista-produtos" action="../controle/registrosdevacinas.php" method="POST" >
	
  	
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
			$stmt = $conn->prepare("SELECT cadastrar_pessoa.nome, vacina_pessoa.proxima_vacina, cadastrar_vacinas.nome_vacina, dependentes.nome_dependente, dependentes.parentesco\n"
								. "FROM vacina_pessoa \n"
                           . "JOIN cadastrar_pessoa \n"
                           . "ON cadastrar_pessoa.id_pessoa = vacina_pessoa.id_pessoa \n"
                           . "LEFT JOIN dependentes \n"
                           . "ON vacina_pessoa.id_dependente = dependentes.id_dependente\n"
                           . "JOIN cadastrar_vacinas \n"
                           . "ON vacina_pessoa.id_vacina = cadastrar_vacinas.id_vacina \n"
                           . "WHERE cadastrar_pessoa.id_pessoa = ?");
			$stmt->bind_param("i", $id_pessoa);

			// executa a instrução SQL e obtém o resultado
			$stmt->execute();
			$result = $stmt->get_result();

			// exibe os dados das vacinas do usuário logado
			echo "<table>";
			echo "<tr><th>Usuário</th><th>Próxima Vacina</th><th>Nome Vacina </th><th>Nome de vacinante</th><th>Parentesco</th></tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				// verifica se o nome do dependente está vazio
				if (empty($row["nome_dependente"])) {
					echo "<td>" . $row["nome"] . "</td>"; // exibe o nome do usuário
				} else {
					echo "<td>" . $row["nome_dependente"] . "</td>"; // exibe o nome do dependente
				}
				// verifica se o campo próxima vacina está vazio
				if (empty($row["proxima_vacina"])) {
					echo "<td>Não informado</td>";
				} else {
					echo "<td>" . $row["proxima_vacina"] . "</td>";
				}
				echo "<td>" . $row["nome_vacina"] . "</td>";
				if (empty($row["nome_dependente"])) {
					echo "<td>" . $row["nome"] . "</td>"; // exibe o nome do usuário
				} else {
					echo "<td>" . $row["nome_dependente"] . "</td>"; } // exibe o nome do dependente (se vazio, será repetido o nome do titular) 
				if (empty($row["parentesco"])){
					echo "<td>" . "" . "</td>";
				}else{
				echo "<td>" . $row["parentesco"] . "</td>";
				echo "</tr>";
				}
			}
			echo "</table>";


			// fecha a instrução SQL e a conexão com o banco de dados
			$stmt->close();
			$conn->close();
		}

		
		?>
		<br><br>
		
 	<div class=newvacina>
		<h3>Registrar uma nova vacina</h3>
		<label for="nome_vacina">Nome da vacina:</label>
		<select id="nome_vacina" name="nome_vacina" oninput="filtrarVacinas()>
      		<option value="">Selecione uma opção</option>
			<option value="vacina1">Hepatite A</option>
			<option value="vacina2">Hepatite B</option>
			<option value="vacina3">Triplice Viral (Vacina contra o sarampo, caxumba e rubéola) </option>
			<option value="vacina4">Varicela (Vacina contra a catapora)</option>
			<option value="vacina5">Poliomielite (Vacina contra a paralisia infantil)</option>
			<option value="vacina6">Febre amarela</option>
			<option value="vacina7"> HPV (Vacina contra o papilomavírus humano)</option>
			<option value="vacina8">Pneumocócica  (Vacina contra a pneumonia)</option>
			<option value="vacina9">DT - (Vacina contra o tétano e a difteria)</option>
			<option value="vacina10"> Meningocócica(Vacina contra a meningite)</option>
			<option value="vacina11">Pneumocócica 23 Valente</option>
			<option value="vacina12">Gripe (influenza)cócica C</option>
			<option value="vacina13">dTPa (Tríplice bacteriana acelular do tipo adulto)</option>
			<option value="vacina14">Pfizer-BioNTech COVID-19 Vaccine</option>
			<option value="vacina15">Moderna COVID-19 Vaccine</option>
			<option value="vacina16">Johnson & Johnson's Janssen COVID-19 Vaccine</option>
			<option value="vacina17">Oxford-AstraZeneca COVID-19 Vaccine</option>
			<option value="vacina18">Sinovac COVID-19 Vaccine</option>
			<option value="vacina19">Sinopharm COVID-19 Vaccine</option>
			<option value="vacina20">Sputnik V COVID-19 Vaccine</option>
			<option value="outra">Outra</option>
		</select>
		<br>
		<div id="outra_vacina" style="display: none;">
			<label for="nova_vacina">Nova vacina:</label>
			<input type="text" id="nova_vacina" name="nova_vacina">
		</div>
		<br>
		<label for="local">UBS:</label>
		<input type="text" id="local" name="local"><br>
		<label for="data_validade">Data de vacinação:</label>
		<input type="date" id="data_validade" name="data_validade">
		<label for="proxima_vacina">Proxima dose</label>
		<input type="date" id="proxima_vacina" name="proxima_vacina"><br><br>
		<input type="submit" value="Enviar">
	</div>	 
</form>

<script>
  // Mostra ou esconde o campo de texto para a nova vacina dependendo da opção selecionada
  document.getElementById("nome_vacina").addEventListener("change", function() {
    if (this.value == "outra") {
      document.getElementById("outra_vacina").style.display = "block";
    } else {
      document.getElementById("outra_vacina").style.display = "none";
    }
  });
</script>
		
	</body>

<?php require_once("rodape.php")?>
</html>


