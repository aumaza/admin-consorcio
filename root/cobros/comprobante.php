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
	
      $id = $_GET['id'];
      $sql = "SELECT * FROM cobros WHERE id = '$id'";
      mysql_select_db('admin_csc');
      $resultado = mysql_query($sql,$conn);
      $fila = mysql_fetch_assoc($resultado);

?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Comprobante de Pago</title>
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

	
	  
    <style>
.avatar {
  vertical-align: middle;
  horizontal-align: right;
  width: 60px;
  height: 60px;
  border-radius: 60%;
}
</style>
	
</head>
<body >

<div class="container">
<div class="row"><br>

<form action="genComprobante.php" method="post">

  <div class="col-sm-4">
    <div class="panel panel-primary">
      <div class="panel-body">
      <?php setlocale(LC_ALL,"es_ES"); ?>
	<span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<br><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%A %d de %B del %Y"); ?> </div>
    </div>
  </div>
  
  <div class="col-sm-8">
    <div class="panel panel-primary">
      <div class="panel-body">
      <h1 class="panel-title text-left" contenteditable="true"><img src="../../img/img-favicon32x32.png" alt="Avatar" class="avatar" >Consorcio: Azara</h1>
      </div>
    </div>
  </div>
  
  <div class="col-sm-12">
    <div class="panel panel-primary">
      <div class="panel-body">
	<h5><u>Nombre y Apellido:</u> <?php echo $fila['nombreApellido'] ?></h5>
	<h5><u>Departamento:</u> <?php echo $fila['departamento'] ?></h5>
	<h5><u>Situación:</u> <?php echo $fila['estado'] ?></h5>
	<h5><u>Fecha de Pago:</u> <?php echo $fila['fecha'] ?></h5>
      </div>
    </div>
  </div>
  
  <div class="col-sm-10">
    <div class="panel panel-primary">
      <div class="panel-body" align="center">Concepto</div>
    </div>
  </div>
      
  <div class="col-sm-2">
    <div class="panel panel-primary">
      <div class="panel-body" align="center">Monto</div>
    </div>
  </div>
  
  <div class="col-sm-10">
    <div class="panel panel-primary">
      <div class="panel-body" align="center">Expensas</div>
    </div>
  </div>
  
   <div class="col-sm-2">
    <div class="panel panel-primary">
      <div class="panel-body" align="right">$ <?php echo $fila['monto'] ?></div>
    </div>
  </div>
  
  <div class="col-sm-10">
    <div class="panel panel-primary">
      <div class="panel-body" align="left">Total Abonado</div>
    </div>
  </div>
  
    
  <div class="col-sm-2">
    <div class="panel panel-primary">
      <div class="panel-body" align="right">$ <?php echo $fila['monto'] ?></div>
    </div>
  </div>
  
  <input type="submit" value="Generar Comprobante">
  <a href="cobros.php"><input value="Volver a Cobros"></a>
  
 </form> 
</div>
</div>




</body>
</html>