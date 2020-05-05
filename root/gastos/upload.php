<?php include "../../connection/connection.php";
      

	session_start();
	$varsession = $_SESSION['user'];
	
	$id = $_GET['id'];
	
		
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

<html style="height: 100%"><head>
	<meta charset="utf-8">
	<title>Cargar Comprobante</title>
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
<body background="../../img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

  <!-- User Info -->
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	<a href="gastos.php"><button><span class="glyphicon glyphicon-chevron-left"></span> Volver</button></a>
        
      
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%A %d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br>
	<!-- End User Info -->
	
	
<body >
<div class="section"><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    
                    <div class="alert alert-success" role="alert">
                     <h1><strong>Seleccione Comprobante</strong></h1>
                     <h4>Solo se permiten imágenes en formato "jpg", "png", "pdf"</h4>
                     </div>
                                       
<div class="section"><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
<form action="formUpload.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
	  <div class="row">
	    <div class="col-sm-12">
	      <div class="panel panel-default">
		<div class='panel-heading'>
		<strong>Seleccione el Archivo a Subir:</strong>
		<br>
	      <input type="file" name="file" class="btn btn-default"><br>
	      <button type="submit" class="btn btn-warning navbar-btn" name="submit"><span class="glyphicon glyphicon-cloud-upload"></span> Subir</button>
	      
	    </form>
	  
	   </div>
	    
     </div>
   </div>
</div>
</div>
</div>
</div>
</div>





</body>
</html>

