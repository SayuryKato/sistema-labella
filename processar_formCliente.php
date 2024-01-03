<?php
$servername = "xmysql.oticasmundialita.com";
$username = "oticasmundialit1";
$password = "Lindabrao875@678";
$dbname = "oticasmundialita1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
$nome_cliente = $_POST['nome_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$rg_cliente = $_POST['rg_cliente'];
$data_nascimento = $_POST['data_nascimento'];
$cep_usuario = $_POST['cep_usuario'];
$endereco_usuario = $_POST['endereco_usuario'];
$numero_casa = $_POST['numero_casa'];
$bairro = $_POST['bairro'];
$complem_enderec = $_POST['complem_enderec'];
$cidade_usuario = $_POST['cidade_usuario'];
$telefone_usuario = $_POST['telefone_usuario'];
$celular_usuario = $_POST['celular_usuario'];
$email_usuario = $_POST['email_usuario'];

$sql = "INSERT INTO cliente (
    id_cliente, nome_cliente, cpf_cliente, rg_cliente, data_nascimento, cep_usuario, endereco_usuario, 
    numero_casa, bairro, complem_enderec, cidade_usuario, telefone_usuario, celular_usuario, email_usuario
) VALUES (
    NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssssissssss", $nome_cliente, $cpf_cliente, $rg_cliente, $data_nascimento, $cep_usuario, $endereco_usuario, 
    $numero_casa, $bairro, $complem_enderec, $cidade_usuario, $telefone_usuario, $celular_usuario, $email_usuario);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Cadastrado com Sucesso!";
    echo "<a href='cliente.php' style=\"text-decoration: none; padding: 2px; color: #fff; background-color: #df3b82; border: 1px solid #ccc; border-radius: 15px;\">Voltar</a>";
} else {
    echo "Erro na inserção do registro: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
