<!-- Operação de atualição para dar baixa em pedido -->

<?php
include_once("../Config/config.php");

$id = $_GET["id"];

$sql = "UPDATE pedidos_cadastrados SET status='1' WHERE id='$id'";
$resultado = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)){
	echo "<script>alert('Dados atualizados!'); window.location = '../cozinha.php';</script>";
}else{
 echo "Deu erro: <br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>


