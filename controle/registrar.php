<?php
//Conectar ao banco de dados (substitua as credenciais pelos seus próprios)

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'cadastrocarteira';
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Processar os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome  = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$sexo = $_POST['sexo'];
$cep  = $_POST['cep'];


// Inserir os dados no banco de dados
$sql = "INSERT INTO cadastrar_pessoa (email, senha,nome	,data_nascimento, sexo, cep) VALUES ('$email', '$senha','$nome'	,'$data_nascimento', '$sexo', '$cep' )";
$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
  // Registro bem-sucedido, redirecionar para a página de login
  header('Location: ../index.php');
  exit;
} else {
  // Registro falhou, exibir mensagem de erro
  echo 'Erro ao registrar novo usuário';
}

?>