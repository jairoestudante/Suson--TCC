<?php
// Configurações de conexão com banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'cadastrar_vacinas';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

// Verifica se o formulário de envio foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $data_fabricacao = $_POST['data_fabricacao'];
    $data_validade = $_POST['data_validade'];
    $lote = $_POST['lote'];
    $proxima_vacina = $_POST['proxima_vacina'];

    // Insere os dados na tabela "vacinas"
    $sql = "INSERT INTO vacinas (data_fabricacao, data_validade, lote, proxima_vacina)
            VALUES ('$data_fabricacao', '$data_validade', '$lote', '$proxima_vacina')";

    if ($conn->query($sql) === TRUE) {
        echo "Vacina cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar vacina: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados

?>
