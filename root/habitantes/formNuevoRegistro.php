<?php include "../../connection/connection.php";

session_start();
	$varsession = $_SESSION['user'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}

if($conn){

$sql = "CREATE TABLE habitantes(".
               "id INT AUTO_INCREMENT,".
               "nombreApellido VARCHAR(30) NOT NULL,".
               "sexo VARCHAR(9) NOT NULL,".
               "situacion VARCHAR(11) NOT NULL,".
               "uni_func VARCHAR(10) NOT NULL,".
               "departamento VARCHAR(2) NOT NULL,".
               "email VARCHAR(20) NOT NULL,".
               "telefono VARCHAR(11) NOT NULL,".
               "movil VARCHAR(11) NOT NULL,".
               "avatar VARCHAR(50) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysql_select_db('admin_csc');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		mysql_error(); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
		$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
		$sexo = mysql_real_escape_string($_POST["sexo"], $conn);
		$situacion = mysql_real_escape_string($_POST["situacion"], $conn);
		$uni_func = mysql_real_escape_string($_POST["uni_func"], $conn);
		$depto = mysql_real_escape_string($_POST["dpto"], $conn);
		$email = mysql_real_escape_string($_POST["email"], $conn);
		$telefono = mysql_real_escape_string($_POST["telefono"], $conn);    
		$movil = mysql_real_escape_string($_POST["movil"], $conn);
	
$sqlInsert = "INSERT INTO habitantes ".
"(nombreApellido,sexo,situacion,uni_func,departamento,email,telefono,movil)".
"VALUES ".
"('$nombre','$sexo','$situacion','$uni_func','$depto','$email','$telefono','$movil')";


$q = mysql_query($sqlInsert,$conn);
}

else{
 echo '<div class="alert alert-danger" role="alert">';
  echo 'Could not Connect to Database: ' . mysql_error();
  echo "</div>";
}

?>

<html><head>
	<meta charset="utf-8">
	<title>Habitante Guardado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../img/img-favicon32x32.png" />
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/jquery.dataTables.min.css" >

	<script src="/admin-consorcio/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/admin-consorcio/skeleton/js/bootstrap.min.js"></script>
	
	
	<script src="/admin-consorcio/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/admin-consorcio/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/admin-consorcio/skeleton/js/dataTables.select.min.js"></script>
	<script src="/admin-consorcio/skeleton/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
	
	
</head>
<body background="../../img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container">
      <div class="row">
      <div class="col-md-12 text-center">
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%A %d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br>

<div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Habitantes</h1>
                            </div>
                            <div class="panel-body">
                                <p><strong>Nuevo Registro</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php



if(!$q)
{
 
  echo '<div class="alert alert-danger" role="alert">';
  echo 'Could not enter data: ' . mysql_error();
  echo "</div>";
 
}

else
{
   
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Guardado Exitosamente!!";
    echo "</div>";
    echo "<br><br><br><br>";
    echo '<hr> <a href="habitantes.php"><input type="button" value="Volver a Habitantes" class="btn btn-primary"></a>';
}



	//cerramos la conexion
	
	mysql_close($conn);

    
?>



</body>
</html>

