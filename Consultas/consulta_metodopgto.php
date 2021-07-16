<!-- Consulta de métodos de pagamentos cadastrados -->

<?php	
include_once("Config/config.php");
?>

<?php						
    $sql = 'SELECT * FROM metodo_pgto';
    if($res = mysqli_query($conn, $sql)){
        $nomeMetodo = array();
        $i = 0;
        while ($reg = mysqli_fetch_assoc($res)){
            $nomeMetodo[$i] = $reg['nome_metodo'];
            echo'<option>'.$nomeMetodo[$i].'</option>';
            $i++;
        }
    } 					
?>      