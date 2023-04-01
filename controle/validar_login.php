<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
   
</head>

<?php
// inclui o arquivo de conexão
require_once '../modelo/conexao.php';

// define a mensagem de erro inicialmente como vazia
$error = "";

// verifica se o formulário foi enviado
$login_sucesso = false;
$numero_tentativas = 0;

while (!$login_sucesso && $numero_tentativas < 3) {
    // obtém os valores do formulário e realiza a validação
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $senha = trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
    
    // realiza a verificação do login
    if (!empty($email) && !empty($senha)) {
        // prepara a instrução SQL para selecionar o usuário pelo email e senha
        $stmt = $conn->prepare("SELECT id_pessoa, email, senha FROM cadastrar_pessoa WHERE email = ? AND senha = ?");
        $stmt->bind_param("ss", $email, $senha);

        // executa a instrução SQL e obtém o resultado
        $stmt->execute();
        $stmt->store_result();

        // verifica se o usuário foi encontrado
        if ($stmt->num_rows == 1) {
            // inicia a sessão e armazena o ID do usuário na variável de sessão
            session_start();
            $stmt->bind_result($id_pessoa, $email, $senha);
            $stmt->fetch();
            $_SESSION["id_pessoa"] = $id_pessoa;

            // define o login como bem sucedido e interrompe o loop
            $login_sucesso = true;
        } else {
            // exibe uma mensagem de erro
            $error = "Email ou senha incorretos, verifique os dados digitados.";
        }

        // fecha a instrução SQL e a conexão com o banco de dados
        $stmt->close();
        $conn->close();
    } else {
        // exibe uma mensagem de erro caso algum campo esteja vazio
        $error = "Por favor, preencha todos os campos.";
    }
    
    $numero_tentativas++;
}

// verifica se o login foi bem sucedido ou se excedeu o número máximo de tentativas
if ($login_sucesso && $numero_tentativas<=3) {
    // redireciona para a página de saudação ou redirecionamento
    header("Location: ../page/inicio.php");
    exit();
} else if  ("$numero_tentativas>3") {
    // exibe uma mensagem de erro
    $error = "Número máximo de tentativas excedido.";
}

// inclui a página de login.php, passando a mensagem de erro como parâmetro
include("../page/login.php");

?>
