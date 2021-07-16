<!-- Operação de atualição para finalizar pedido -->
<?php
include_once("../Config/config.php");

$id = $_GET["id"];

$sql = "UPDATE pedidos_cadastrados SET status='2' WHERE id='$id'";
$resultado = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)){
	echo "<script>alert('Dados atualizados!'); window.location = '../retirada.php';</script>";
}else{
 echo "Deu erro: <br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>


