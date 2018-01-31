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
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
               // $name = $row["id"];
               // $address = $row["cliente"];
              //  $salary = $row["diadasemana"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1><?php echo $row["cliente"]; ?></h1>
                    </div>
                    <div class="form-group">
                        <label>ID</label>
                        <p class="form-control-static"><?php echo $row["id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Cliente</label>
                        <p class="form-control-static"><?php echo $row["cliente"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Dia Da Semana</label>
                        <p class="form-control-static"><?php echo $row["diadasemana"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <p class="form-control-static"><?php echo $row["telefone"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <p class="form-control-static"><?php echo $row["data"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Valor</label>
                        <p class="form-control-static"><?php echo $row["valor"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>link</label>
                        <p class="form-control-static"><?php echo $row["link"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Contrato</label>
                        <p class="form-control-static"><?php echo $row["contrato"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Responsável</label>
                        <p class="form-control-static"><?php echo $row["responsavel"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>