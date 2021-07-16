<!-- Operação de edição de pedido -->
<?php
include_once("../Config/config.php");

$id = $_POST["id"];
$nome_cliente = $_POST["nome_cliente"];
$metodo_pgto = implode(', ', $_POST['metodo_pgto']);
$produto =  $_POST["produto"];
$valor =  $_POST["valor"];
$valor_recebido =  $_POST["valor_recebido"];
$troco =  $_POST["troco"];
$obs =  $_POST["obs"];

$sql = "UPDATE pedidos_cadastrados SET nome_cliente='$nome_cliente', metodo_pgto='$metodo_pgto', produto='$produto', valor='$valor', valor_recebido='$valor_recebido', troco='$troco', obs='$obs' WHERE id='$id'";
$resultado = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
echo "<script>alert('Dados cadastrados!'); window.location = '../checkout.php';</script>";

}else{
 echo "Deu erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>





