<!-- Consulta de métodos de pedidos cadastrados -->

<?php	
include_once("Config/config.php");
?>

<?php						
    $sql = 'SELECT * FROM pedidos_cadastrados';
    if($res = mysqli_query($conn, $sql)){
        $nomeCliente = array();
        $produto = array();
        $valor = array();
        $metodo_pgto = array();
        $valor_recebido = array();
        $troco = array();

        $i = 0;

        while ($reg = mysqli_fetch_assoc($res)){
            $nomeCliente[$i] = $reg['nome_cliente'];
            $produto[$i] = $reg['produto'];
            $valor[$i] = $reg['valor'];
            $metodo_pgto[$i] = $reg['metodo_pgto'];
            $valor_recebido[$i] = $reg['valor_recebido'];
            $troco[$i] = $reg['troco'];
        }
    } 					
?> 