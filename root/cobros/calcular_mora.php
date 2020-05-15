<?php include "../../connection/connection.php"; 
      include "functions.php";
      
      
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

<html style="height: 100%"><head>
	<meta charset="utf-8">
	<title>Calcular Mora</title>
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

	
	<script>

      $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });

  </script>
	
	
</head>
<body background="../../img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%A %d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<hr>

<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title text-center" contenteditable="true">Calcular Mora</h1>
                            </div>
                            <div class="panel-body">
                            <a href="cobros.php"><input type="button" value="Volver a Cobros" class="btn btn-warning"></a>
                            </div>
                        </div>
                        
      <form action="calcular_mora.php" method="post">
      <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>" />
       <div class="row">
 
   <div class="col-sm-6">
  <div class="panel panel-default">
	    <div class="panel-heading"><strong>Datos Deudor</strong></div>
	      <div class="panel-body">
	         
	  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="nombre" value="<?php echo $fila['nombreApellido']; ?>" readonly>
  </div>
  
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input id="text" type="text" class="form-control" name="dpto" value="<?php echo $fila['departamento']; ?>" readonly>
  </div>
  
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input  type="text" class="form-control" name="monto" value="<?php echo $fila['monto']; ?>" readonly>
  </div>
	  	
	</div>
     </div>
   </div>
   
   <div class="col-sm-6">
  <div class="panel panel-default">
	    <div class="panel-heading"><strong>Calcular Mora</strong></div>
	      <div class="panel-body">
	         
	  <button type="submit" class="btn btn-primary navbar-btn" name="A"><span class="glyphicon glyphicon-plus"></span> Calcular</button>
	  <button type="submit" class="btn btn-primary navbar-btn" name="B"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
	
	</div>
     </div>
   </div>
   
   

</div>


<?php


if($conn)
{
	createTable();
	switch (isset($_POST)){
               
               case isset($_POST['A']):
               
		    $nombre = mysql_real_escape_string($_POST["nombre"], $conn);
		    $dpto = mysql_real_escape_string($_POST["dpto"], $conn);
		    $monto = mysql_real_escape_string($_POST["monto"], $conn);
		    
                    calcularMora($nombre,$dpto,$monto);
                    break;


               case isset($_POST['B']):
               
		    $nombre = mysql_real_escape_string($_POST["nombre"], $conn);
		    $dpto = mysql_real_escape_string($_POST["dpto"], $conn);
		    $monto = mysql_real_escape_string($_POST["monto"], $conn);

                    guardarMora($nombre,$dpto,$monto);
                    break;

                                
       }


  }
   
  
   
   else
    {
      echo 'Connection Failure...';   
    }
    
    mysql_close($conn);
    
    ?>

</div>
</form>
                        
</div>
</div>
</div>
</div>


</body>
</html>