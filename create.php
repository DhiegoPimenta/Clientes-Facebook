<?php
    ob_start();
    session_start();
    require_once 'dbconnect.php';
    
    // if session is not set this will redirect to login page
    if( !isset($_SESSION['user']) ) {
        header("Location: index.php");
        exit;
    }
    // select loggedin users detail
    $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysql_fetch_array($res);
?>

<?php
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cliente = $_POST['cliente'];
    $diadasemana = $_POST['diadasemana'];
    $telefone = $_POST['telefone'];

    $query="INSERT INTO clientesfacebook(cliente, diadasemana, telefone) VALUES ('$cliente','$diadasemana','telefone')";
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
                            <label>Dia Da Semana</label>
                            <textarea name="diadasemana" class="form-control"></textarea>
                           
                        </div>
                        <div class="form-group ">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control">
                          
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


