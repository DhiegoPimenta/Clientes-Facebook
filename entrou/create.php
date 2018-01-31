<?php
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cliente = $_POST['cliente'];
    $diadasemana = $_POST['diadasemana'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $endereco = $_POST['endereco'];
    $contrato = $_POST['contrato'];
    $responsavel = $_POST['responsavel'];


    $query="INSERT INTO clientesfacebook(cliente,diadasemana,telefone,data,valor,link,contrato,responsavel) VALUES ('$cliente','$diadasemana','$telefone','$data','$valor','$endereco','$contrato','$responsavel')";
    if(mysqli_query($link,$query)){
            header("location: index.php");
            exit();
    }
    else{
        header("location: error.php");
        exit();
    }
    mysqli_close($link);
   }
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Adicionar Cliente</h2>
                    </div>
                    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group ">
                            <label>Cliente</label>
                            <input type="text" name="cliente" class="form-control">
                           
                        </div>
                          <div class="form-group ">
                            <label>Dia da Semana</label>
                            <input type="text" name="diadasemana" class="form-control">
                          
                        </div>
                        <div class="form-group ">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Ex.: (00) 00000-0000">
                          
                        </div>
                        <div class="form-group ">
                            <label>Data</label>
                            <input type="text" name="data" class="form-control" placeholder="Ex.: dd/mm/aaaa" >
                          
                        </div>
                        <div class="form-group ">
                            <label>Valor</label>
                            <input type="text" name="valor" class="form-control" placeholder="Ex.: R$ 00,00">
                          
                        </div>
                     <div class="form-group ">
                            <label>Link</label>
                            <input type="text" name="endereco" class="form-control">
                          
                        </div>
                        <div class="form-group ">
                            <label>Contrato</label>
                            <input type="text" name="contrato" class="form-control">
                          
                        </div>
                        <div class="form-group ">
                            <label>Responsável</label>
                            <input type="text" name="responsavel" class="form-control">
                          
                        </div>
                
                        <input type="submit" class="btn btn-primary" value="Adicionar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


