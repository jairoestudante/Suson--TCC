<?php
// inicia a sessão
session_start();

// verifica se o usuário está logado
if (isset($_SESSION["id_pessoa"])) {
    // obtém o ID do usuário da variável de sessão
    $id_pessoa = $_SESSION["id_pessoa"];

    // inclui o arquivo de conexão
    require_once '../modelo/conexao.php';

    // prepara a instrução SQL para selecionar o nome do usuário pelo ID
    $stmt = $conn->prepare("SELECT nome FROM cadastrar_pessoa WHERE id_pessoa = ?");
    $stmt->bind_param("i", $id_pessoa);

    // executa a instrução SQL e obtém o resultado
    $stmt->execute();
    $stmt->bind_result($nome_usuario);
    $stmt->fetch();

    // exibe o nome do usuário no topo da tabela
    echo "<h2>Usuário: $nome_usuario</h2>";

    // fecha a instrução SQL e a conexão com o banco de dados
    
}
?>

