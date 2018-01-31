<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "SELECT * FROM clientesfacebook WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $name = $row["id"];
                $address = $row["cliente"];
                $salary = $row["diadasemana"];
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Algo deu errado!";
        }
    }
     
    mysqli_stmt_close($stmt);
} else{
    header("location: error.php");
    exit();
}
?>

<?php
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $diadasemana = $_POST['diadasemana'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $endereco = $_POST['endereco'];
    $contrato = $_POST['contrato'];
    $responsavel = $_POST['responsavel'];
    //UPDATE `clientesfacebook` SET `cliente`='MUDEI' WHERE id=108
    $query= "UPDATE clientesfacebook SET cliente='$cliente', diadasemana='$diadasemana', telefone='$telefone',data='$data',valor='$valor',link='$endereco',contrato='$contrato',responsavel='$responsavel' WHERE id=$id";
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
    <title>Atualizar Cliente</title>
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
                        <h2>Atualizar Cliente</h2>
                    </div>
                    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group ">
                            <label>ID</label>
                            <p class="form-control-static"><?php echo $row["id"]; ?></p>
                           <input type="text" name="id" class="form-control" value="<?php echo $row["id"]; ?>" style="display:none;">
                        </div>
                       <div class="form-group ">
                            <label>Cliente</label>
                            <input type="text" name="cliente" class="form-control" value="<?php echo $row["cliente"]; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Dia Da Semana</label>
                              <input type="text" name="diadasemana" class="form-control" value="<?php echo $row["diadasemana"]; ?>">
                          
                        </div>

                         <div class="form-group ">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control" value="<?php echo $row["telefone"]; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Data</label>
                            <input type="text" name="data" class="form-control" value="<?php echo $row["data"]; ?>">
                           
                        </div>
                         <div class="form-group ">
                            <label>Valor</label>
                            <input type="text" name="valor" class="form-control" value="<?php echo $row["valor"]; ?>">
                           
                        </div>
                         <div class="form-group ">
                            <label>Link</label>
                            <input type="text" name="endereco" class="form-control" value="<?php echo $row["link"]; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Contrato</label>
                            <input type="text" name="contrato" class="form-control" value="<?php echo $row["contrato"]; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Responsável</label>
                            <input type="text" name="responsavel" class="form-control" value="<?php echo $row["responsavel"]; ?>">
                           
                        </div>
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
