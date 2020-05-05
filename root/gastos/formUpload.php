<html><head>
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
	<script src="/admin-consorcio/js/dataTables.select.min.js"></script>
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
<body>

<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	
		
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
	$id = $_GET['id'];
      $sql = "SELECT * FROM gastos WHERE id = '$id'";
    
      mysql_select_db('admin_csc');
      $resultado = mysql_query($sql,$conn);
      $fila = mysql_fetch_assoc($resultado);
     
	
           
	// create_table_avatar();

	
	
$statusMsg = '';

// File upload path
$targetDir = '../../uploads/comprobantes/';
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','pdf');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
           
            
            // Insert image file name into database
           
           $sqlInsert = "UPDATE gastos set comprobante = '$targetFilePath' where id = '$id'";
          
			   mysql_select_db('admin_csc');
			  $insert = mysql_query($sqlInsert);
           
           
            if($insert){
            
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong> Base de Datos Actualizada. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='gastos.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                          
                            
            }else{
		  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong>El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='gastos.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>"; 
                
            } 
        }else{
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/think-img.png" alt="Avatar" class="avatar" ><strong> Ups. Hubo un error subiendo el Archivo.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='gastos.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
        }
    }else{
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/aircraft-crash64-img.png" alt="Avatar" class="avatar" ><strong> Ups, solo archivos con extensión: MP3, OGG, FLAC son soportados.</strong>';
			  echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='gastos.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
    }
}else{
			  echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/refresh-img.png" alt="Avatar" class="avatar" ><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='gastos.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
}


// Display status message
echo $statusMsg;

?>


</div>
</div>
</div>
</div>
</body>
</html>