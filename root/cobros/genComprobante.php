<?php include "../../connection/connection.php";
      require '../../vendor/autoload.php';
      
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
  
  //require_once dirname(__FILE__).'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    include 'comprobante.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->writeHTML($content);
    $html2pdf->output('comprobante.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
  
  
/*
use Spipu\Html2Pdf\Html2Pdf;


//carga el buffer
ob_start();
require_once "comprobante.php";
$html = ob_get_clean();

//se genera el pdf
$html2pdf = new Html2Pdf();
$html2pdf->writeHTML("hola");
$html2pdf->output('comprobante.pdf');*/

?>