<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include "Html/head.html";
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
                        <div class="card">
                            <div class="card-body">
                            <h3><span class="turquoise1">Cadastre um pedido:</span> </h3> 
                            <br>

                            <!-- Formulário de checkout -->

                            <form method="POST" action="Operacoes/proc_cadastro_pedido.php">

                                <div class="form-group">
                                    <label >Nome do Cliente</label>
                                    <input type="text" class="form-control" name="nome_cliente" placeholder="Digite o nome" required>
                                </div>                               


                                <div class="form-group">
                                    <label >Produto</label>                                    
                                    <select class="form-control" name="produto" id="produtos" required>                                        
                                        <option>Selecione</option>
                                        <?php include "Consultas/consulta_produtos.php" ?> 
                                    </select>
                                </div>

                                <div class="form-group"> 
                                    <label for="valor_recebido">Método de pagemento</label>                                    
                                    <select class="form-control" multiple name="metodo_pgto[]" required>                                        
                                        <?php include "Consultas/consulta_metodopgto.php" ?>                                   
                                    </select>
                                </div>
                                    
                                </div>

                                <div class="form-group">                                
                                    <div class="row">
                                        <div class="col-md-3" >
                                            <label for="valor_total" style="margin-left:20px">Valor total</label>
                                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor"  style="margin-left:20px; width:80%" name="valor">                                            
                                        </div>
                                        <div class="col-md-3">
                                            <label for="valor_recebido" >Valor recebido</label>
                                            <input type="text" class="form-control" id="valor_recebido" name="valor_recebido" placeholder="Valor">                                            
                                        </div>
                                        <div class="col-md-3">                                            
                                            <button type="button" onclick="subtrair()" class="btn btn-outline-primary" style="margin-top:30px; margin-right:80px">Calcular troco</button>   
                                        </div>                                    
                                        <div class="col-md-3">
                                            <label for="troco">Troco</label>
                                            <input  type="number" class="form-control" id="troco" name="troco" placeholder="Total do troco" style="width:90%" readonly>   
                                        </div>                                        
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <label style="margin-left:20px">Observação para cozinha</label>
                                    <textarea class="form-control" name="obs" rows="2"  style="width:96%; margin-left:20px"></textarea>
                                </div>

                                

                                <div class="form-group" hidden>
                                    <label >Status</label>
                                    <input type="text" class="form-control" name="status" value="0" readonly>
                                </div>

                                <br> <br> 

                                <div class="col-md-2">
                                    <input class="btn btn-outline-primary " type="submit" value="Cadastrar pedido" >
                                </div>
                                <br> <br>  
                            
                            </form>

                            <!-- FIM - Formulário de checkout -->

                        </div>
                    </div>
                <br>
                                       
                </div> 
            </div> 
        </div> 

        




    <!-- -- Status dos pedidos -- -->

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

                        <!-- Select para exibir pedidos para retirada -->

                        <?php						
                            $sql = 'SELECT * FROM pedidos_cadastrados where status=0';
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
                                        <div class="row">
                                            <div class="col-md-4">  
                                                <h6> Método de Pagamento <p>'.$metodo_pgto[$i].'</h6>
                                            </div>
                                            <div class="col-md-4"> 
                                                <h6> Valor recebido <p>'.$valor_recebido[$i].'</h6>
                                            </div>
                                            <div class="col-md-4"> 
                                                <h6> Troco <p>'.$troco[$i].'</h6>
                                            </div>
                                        </div>
                                    <hr><br>

                                    <h6>Observação para cozinha</h6>
                                        <p>'.$obs[$i].'</p>   
                                    <br><hr>

                                    <div class="col-md-4">  
                                        <h5 class="turquoise1">Pedido em andamento na cozinha.</h5>
                                    </div><br>
                                    
                                        <a class="btn btn-outline-warning" href="alterar_pedido.php?id='. $id[$i] .'">Alterar</a> 
                                         
                                    </div>
                                    </div>
                                    <br><br><br> 
                                    ';
                                }
                            }
                        ?> 

                        <!-- FIM - Select para exibir pedidos para retirada -->


                        <!-- Select para exibir pedidos para retirada -->

                        <?php						
                            $sql = 'SELECT * FROM pedidos_cadastrados where status=1';
                            if($res = mysqli_query($conn, $sql)){
                                $id[$i] = array();
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
                                        <div class="row">
                                            <div class="col-md-4">  
                                                <h6> Método de Pagamento <p>'.$metodo_pgto[$i].'</h6>
                                            </div>
                                            <div class="col-md-4"> 
                                                <h6> Valor recebido <p>'.$valor_recebido[$i].'</h6>
                                            </div>
                                            <div class="col-md-4"> 
                                                <h6> Troco <p>'.$troco[$i].'</h6>
                                            </div>
                                        </div>
                                    <hr><br>

                                    <h6>Observação para cozinha</h6>
                                        <p>'.$obs[$i].'</p>                                      
                                    <br><hr>

                                    <div class="col-md-4">  
                                            <h5 class="turquoise2">Atenção! Pedido pronto para retirada!</h5>
                                    </div><br>
                                    
                                        <a class="btn btn-outline-warning" href="alterar_pedido.php?id='. $id[$i] .'">Alterar</a> 
                                    </div>
                                    </div>
                                    <br><br><br> 
                                    ';
                                }
                            }
                        ?> 
                        <!-- FIM - Select para exibir pedidos para retirada -->

                    </div>

                <br>                          
                        
                </div> 
            </div> 
        </div>

        <!-- -- FIM - Status dos pedidos -- -->

    </header>
  


    <?php include "Html/footer.html" ?> 
    
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Função que mostra dropdown com pesquisa --> 

    <script>
    $(document).ready(function() {
        $('#produtos').select2();
    });
    </script>

     <!-- FIM - Função que mostra dropdown com pesquisa --> 


    <!-- Função que calcula troco --> 
    
    <script>
    function id(valor_campo)
    {
        return document.getElementById(valor_campo);
    }
    function getValor(valor_campo)
    {
        var valor = document.getElementById(valor_campo).value.replace( ',', '.');
        return parseFloat( valor ) * 100;
    }

    function subtrair()
    {
        var total = getValor('valor') - getValor('valor_recebido');
        id('troco').value = total/100;
    }
    </script>

    <!-- FIM - Função que calcula troco --> 




</body>
</html>