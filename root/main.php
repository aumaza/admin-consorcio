<?php  include "../functions/functions.php";
       include "../connection/connection.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
?>

<html style="height: 100%" lang="es"><head>
	<meta charset="utf-8">
	<title>Admin-Consorcio - Panel Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/img-favicon32x32.png" />
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/admin-consorcio/skeleton/css/jquery.dataTables.min.css" >

	<script src="/admin-consorcio/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/admin-consorcio/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/boreal/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/boreal/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/boreal/skeleton/js/dataTables.select.min.js"></script>
	<script src="/boreal/skeleton/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
	
	<!-- Data Table Script -->
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
  <!-- END Data Table Script -->
	
</head>
<body  background="../img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">
<br>
<!--User and System Information -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
	<a href="../logout.php"><button><span class="glyphicon glyphicon-log-out"></span> Salir</button></a>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%A %d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div><hr>
<!-- end user and system information -->


<div class="container">

<div class="row">
<div class="col-sm-12"><br>

<!-- Dashboard buttons -->
<div class="panel panel-primary">
  <div class="panel-body">

   <div class="btn-group btn-group-justified">
    <a href="gastos/gastos.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/view-financial-payment-mode.png"  class="img-reponsive img-rounded"> Cargar Gastos</a>
    <a href="cobros/cobros.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/view-loan.png"  class="img-reponsive img-rounded"> Cargar Cobros</a>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/view-expenses-categories.png"  class="img-reponsive img-rounded"> Total Gastos</a>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/view-financial-transfer.png"  class="img-reponsive img-rounded"> Saldo de Caja</a>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/view-time-schedule.png"  class="img-reponsive img-rounded"> Cobros Futuros</a>
    <a href="habitantes/habitantes.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Población</a>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Usuarios</a>
    
  
  </div>
  </div>
  </div><hr>
<!-- end dashboard buttons -->

</div>



</div>

</div>


</body>
</html>