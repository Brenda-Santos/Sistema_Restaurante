<!-- Operação de cadastro de pedido -->
<?php
session_start();
include_once("../Config/config.php");

$nome_cliente = $_POST["nome_cliente"];
//$metodo_pgto = $_POST["metodo_pgto"];
$produto = $_POST["produto"];
$valor = $_POST["valor"];
$valor_recebido = $_POST["valor_recebido"];
$troco = $_POST["troco"];
$obs = $_POST["obs"];
$status = $_POST["status"];
$metodo_pgto = implode(', ', $_POST['metodo_pgto']);

mysqli_select_db($conn,'$dbname');

$sql = "INSERT INTO pedidos_cadastrados (nome_cliente, metodo_pgto, produto, valor, valor_recebido, troco, obs, status) VALUES ('$nome_cliente', '$metodo_pgto','$produto','$valor','$valor_recebido','$troco','$obs','$status')";

if (mysqli_query($conn, $sql)) {
echo "<script>alert('Dados cadastrados!'); window.location = '../checkout.php';</script>";

}else{
 echo "Deu erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>




