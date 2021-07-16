<?php
session_start();
include_once("Config/config.php");

$id = $_GET ['id'];
$sql = "SELECT * FROM pedidos_cadastrados WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);
$rows_sql = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include "Html/head.html" ?>

<body data-spy="scroll" data-target=".fixed-top">
    
<?php include "Html/menu.html" ?>

    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">   
                        <div class="card">
                            <div class="card-body">                          
                            
                                <h4><span class="turquoise1">Alterar Pedido:</span> </h4>
                                
                                <form method="POST" action="Operacoes/proc_edit_pedido.php">

                                <input type="hidden" name="id" value="<?php echo $rows_sql['id']; ?>">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <label>Nome do Cliente</label>
                                            <input type="text" class="form-control" value="<?php echo $rows_sql['nome_cliente'] ?>" readonly >
                                        </div>
                                        <div class="col-md-6" >
                                            <label>Nome do Cliente</label>
                                            <input require placeholder="Digite o nome" type="text" class="form-control" name="nome_cliente" >
                                        </div>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <label>Produtos</label>
                                            <input type="text" class="form-control"value="<?php echo $rows_sql['produto'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6" >
                                            <label>Alterar produto</label>
                                            <select class="form-control" name="produto" id="produtos" require>                                        
                                                <option>Selecione</option>
                                                <?php include "Consultas/consulta_produtos.php" ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <label>Método de pagamento</label>
                                            <input type="text" class="form-control"value="<?php echo $rows_sql['produto'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6" > 
                                            <label>Alterar método de pagamento</label>
                                            <select class="form-control" multiple name="metodo_pgto[]" required>                                        
                                                <?php include "Consultas/consulta_metodopgto.php" ?>                                   
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <label>Valor total</label>
                                            <input type="text" class="form-control"value="<?php echo $rows_sql['valor'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6" >
                                            <label>Valor total</label>
                                            <input  type="text" class="form-control" id="valor" name="valor" placeholder="Valor total" require> 
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <label>Valor recebido</label>
                                            <input type="text" class="form-control" value="<?php echo $rows_sql['valor_recebido'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6" >
                                            <label>Valor recebido</label>
                                            <input  type="text" class="form-control" id="valor_recebido" name="valor_recebido" placeholder="Valor recebido" require> 
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="troco">Troco</label>
                                            <input  type="number" class="form-control" id="troco" placeholder="Troco" value="<?php echo $rows_sql['valor_recebido'] ?>" readonly> 
                                    </div>
                                        <div class="col-md-2">                                            
                                            <button type="button" onclick="subtrair()" class="btn btn-outline-primary" style="margin-top:30px; ">Calcular troco</button>   
                                        </div>
                                        <div class="col-md-4"> 
                                        <label for="troco">Troco</label>                                           
                                        <input  type="number" class="form-control" id="troco1" name="troco" placeholder="Total do troco" readonly>   
                                        </div>
                                    </div>
                                </div> 


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <label>Observação</label>
                                            <textarea class="form-control" rows="2"  readonly><?php echo $rows_sql['obs'] ?></textarea >
                                        </div>
                                        <div class="col-md-6" >
                                            <label>Observação</label>
                                            <textarea placeholder="Digite observação" class="form-control" name="obs" rows="2" require></textarea>
                                        </div>
                                    </div>
                                </div>

                                    <input class="btn btn-outline-primary" type="submit" value="Salvar">
                                    <br> <br> <br> <br>
                                    

                                </form>

                                <a class="btn-outline-reg back" href="checkout.php">VOLTAR</a>
                            </div>
                        </div>
                    <br> <br> <br> <br>
                        
                </div> <!-- end of row -->

            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


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
        id('troco1').value = total/100;
    }
    </script>

    <!-- FIM - Função que calcula troco --> 


    

</body>
</html>