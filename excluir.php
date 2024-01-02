<?php 
$servername ="xmysql.oticasmundialita.com";
$username = "oticasmundialit1";
$password = "Lindabrao875@678";
$dbname = "oticasmundialita1";
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
// Verifique se o ID do registro a ser excluído foi passado via POST
if (isset($_POST['id'])) {
    $id_para_excluir = $_POST['id'];
    // Execute a consulta de exclusão
    $sql = "DELETE FROM modelo WHERE id = $id_para_excluir";
    
    if ($conn->query($sql) === TRUE) {
        // header("location:listagem.php");
        header("location:listagem.php?excluido=true");
    } else {
        echo "Erro ao excluir o registro: " . $conn->error;
    }
} else {
    echo "ID do registro a ser excluído não especificado.";
}
$conn->close();
?>