<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include "Html/head.html" ;
include_once("Config/config.php");?> 

<body data-spy="scroll" data-target=".fixed-top">
    
<?php include "Html/menu.html" ?>

    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12"> 
                        
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <?php						
                        $sql = 'SELECT * FROM pedidos_cadastrados where status=0 ' ;
                        if($res = mysqli_query($conn, $sql)){
                            $id = array();
                            $nomeCliente = array();
                            $produto = array();
                            $valor = array();
                            $metodo_pgto = array();
                            $valor_recebido = array();
                            $troco = array();
                            $obs = array();

                            $i = 0;

                            while ($reg = mysqli_fetch_assoc($res)){
                                $id[$i] = $reg['id'];
                                $nomeCliente[$i] = $reg['nome_cliente'];
                                $produto[$i] = $reg['produto'];
                                $valor[$i] = $reg['valor'];
                                $metodo_pgto[$i] = $reg['metodo_pgto'];
                                $valor_recebido[$i] = $reg['valor_recebido'];
                                $troco[$i] = $reg['troco'];
                                $obs[$i] = $reg['obs'];

                                echo'<div class="card">
                                <div class="card-body">   
                                <h4><span class="turquoise1">Status do pedido: #'.$id[$i].'</span> </h4> 
                                    <div class="row"> 
                                        <div class="col-md-4">                        
                                            <h6> Nome do cliente <p>'.$nomeCliente[$i].'</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6> Produto <p>'.$produto[$i].'</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6> Valor <p>'.$valor[$i].'</h6>
                                        </div>
                                    </div>                                  
                                    
                                <hr>                                
                                    <h6>Observação para cozinha</h6>
                                    <p>'.$obs[$i].'</p>                               
                                <hr>

                                <a class="btn btn-outline-danger" href="Operacoes/proc_baixa_pedido.php?id='. $reg['id'] .'">Dar baixa</a> 

                                 
                                </div>
                                </div>
                                <br><br><br> 
                                ';
                            }
                        }
                                ?>               
                        
                </div>
            </div> 
        </div> 
    </header>


    <?php include "Html/footer.html" ?>    
    
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->

</body>
</html>