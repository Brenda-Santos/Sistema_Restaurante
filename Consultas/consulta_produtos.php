<!-- Consulta de métodos de produtos cadastrados -->

<?php	
include_once("Config/config.php");
?>

<!-- -- Consulta de produtos cadastrados -- -->
<?php
    $sql = 'SELECT * FROM produtos_cadastrados';
    if($res = mysqli_query($conn, $sql)){
        $nomeProduto = array();
        $codigo = array();

        $i = 0;
        while ($reg = mysqli_fetch_assoc($res)){
            $nomeProduto[$i] = $reg['nome_produto'];
            $codigo[$i] = $reg['cod'];
            echo'<option>'.$codigo[$i].$nomeProduto[$i].'</option>';
            $i++;
        }
    } 					
?> 