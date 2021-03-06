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

?>

<html><head>
	<meta charset="utf-8">
	<title>Habitantes - Nuevo Registro</title>
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

<!-- User and system info -->
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
<!-- end user and system info -->
	<hr>
	
<!-- main body -->
<div class="container"><br>
<div class="row">
<div class="col-sm-10">

<div class="panel panel-info" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> Habitantes - Nuevo Registro</h2>
  </div>
    <div class="panel-body">
    
    
     <form action="formNuevoRegistro.php" method="post">
         
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido" required>
  </div>
  
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select class="browser-default custom-select" name="sexo">
  <option value="" disabled selected>Sexo</option>
  <option value="Femenino">Femenino</option>
  <option value="Masculino">Masculino</option>
  </select>
</div>

<div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
  <select class="browser-default custom-select" name="situacion">
  <option value="" disabled selected>Situación</option>
  <option value="Propietario">Propietario</option>
  <option value="Inquilino">Inquilino</option>
  </select>
</div>
  
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    <input id="text" type="text" class="form-control" name="uni_func" placeholder="Unidad Funcional" required>
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input id="text" type="text" class="form-control" name="dpto" placeholder="Departamento" required>
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input  type="email" class="form-control" name="email" placeholder="E-Mail" required>
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    <input  type="text" class="form-control" name="telefono" placeholder="1144444444" required>
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
    <input  type="text" class="form-control" name="movil" placeholder="1544444444" required>
  </div>
  <br>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-12" align="left">
   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Agregar</button>
   <a href="habitantes.php"><input type="button" value="Volver" class="btn btn-primary"></a>
   <a href="../main.php"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
  </div>
  </div>
</form> 

    
    </div>
    <br>
    
    
    
    
    

</div>
</div>
</div>
</div>


</body>
</html>