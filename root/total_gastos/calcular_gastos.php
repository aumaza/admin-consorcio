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

?>

<html style="height: 100%"><head>
	<meta charset="utf-8">
	<title>Calcular Total Gastos</title>
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
<body >

<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title text-center" contenteditable="true">Calcular Total Gastos</h1>
                            </div>
                            <div class="panel-body">
                            <a href="total_gastos.php"><input type="button" value="Volver a Total Gastos" class="btn btn-warning"></a>
                            </div>
                        </div>
                        
      <form action="calcular_gastos.php" method="post">
       <div class="row">
 
   <div class="col-sm-6">
  <div class="panel panel-default">
	    <div class="panel-heading"><strong>Calcular Total Gastos Ordinarios</strong></div>
	      <div class="panel-body">
	         
	  <button type="submit" class="btn btn-primary navbar-btn" name="A"><span class="glyphicon glyphicon-plus"></span> Calcular</button>
	  <button type="submit" class="btn btn-success navbar-btn" name="B"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
	
	</div>
     </div>
   </div>
   
   <div class="col-sm-6">
  <div class="panel panel-default">
	    <div class="panel-heading"><strong>Calcular Total Gastos Extraordinarios</strong></div>
	      <div class="panel-body">
	         
	  <button type="submit" class="btn btn-primary navbar-btn" name="C"><span class="glyphicon glyphicon-plus"></span> Calcular</button>
	  <button type="submit" class="btn btn-success navbar-btn" name="D"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
	
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

                    calcularTotalOrdinario();
                    break;


               case isset($_POST['B']):

                    guardarTotalGastosOrdinarios();
                    break;

                case isset($_POST['C']):

                    calcularTotalExtraordinario();
                    break;

                case isset($_POST['D']):

                    guardarTotalGastosExtraordinarios();
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