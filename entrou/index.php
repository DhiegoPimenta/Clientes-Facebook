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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clientes Facebook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="jquery.dataTables.min.js"></script>
    <style type="text/css">
        .wrapper {
    width: 650px;
    margin: 50px auto;
}
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script>


$(document).ready(function(){
    $('#myTable').dataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ por página",
            "zeroRecords": "Não encontramos nada",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "Sem registros",
            "search": "Buscar",
            "paginate":{
               "sNext": "Próximo",
               "sPrevious": "Anterior",
               "sFirst": "Primeiro",
               "sLast": "Último",
               "sInfoFiltered": "filtrado _MAX_ resultados"
            }
        }
    });
});
</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sair</a></li></ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $userRow['userEmail']; ?>&nbsp;</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Clientes Facebook</h2>
                        <a href="create.php" class="btn btn-success pull-right">Novo Cliente</a>
                    </div>
                    <?php
                    // Incluindo Arquivo
                    require_once 'config.php';
                    
                    // Adicionando a Query
                    $sql = "SELECT `id`, `cliente` FROM `clientesfacebook`";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped' id='myTable'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th style='width: 10%;'>#</th>";
                                        echo "<th>Cliente</th>";
                                        echo "<th style='width: 60px;'>Ação</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['cliente'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='Detalhes' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Atualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Deletar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                        
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Não foram encontrados registros.</em></p>";
                        }
                    } else{
                        echo "ERRO: Não foi possível executar $sql. " . mysqli_error($link);
                    }
 
                    // Fechando Conexão
                    mysqli_close($link);
                    ?>

                </div>
            </div>        
        </div>
    </div>


<?php ob_end_flush(); ?>


