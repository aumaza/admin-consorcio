<?php




function calcularMora($nombre,$dpto,$monto){
    
         mysql_select_db('admin_csc');
            
              
		    $calculo = $monto * 0.03;
		    $resultado = $monto + $calculo;
                    
		    
		  echo '<div class="container">
			  <div class="row">
			     <div class="col-sm-12">
			       <div class="panel panel-default" >
			         <div class="panel-body">';
		 
		 echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Cálculo de Mora de: ' .$nombre. '</h3>';
                  echo '<h5><strong>Porcentaje de Interés:</strong> 3% </h5>';
                  
                  echo "</div><hr>";
		    
            echo "<table class='display compact' id='myTable'>";
              echo "<thead>

                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Departamento</th>
                    <th class='text-nowrap text-center'>Monto Adeudado</th>
                    <th class='text-nowrap text-center'>Interés en $</th>
                    <th class='text-nowrap text-center'>Monto a pagar</th>
                    <th>&nbsp;</th>
                    </thead>";




			 // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$nombre."</td>";
			 echo "<td align=center>".$dpto."</td>";
			 echo "<td align=center>".$monto."</td>";
			 echo "<td align=center>".$calculo."</td>";
			 echo "<td align=center>".$resultado."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 echo "</tr>";
			
		
		echo "</table>";
		echo "<br><br><hr>";
		
		echo '</div></div></div></div></div>';

	      
}

                         
function guardarMora($nombre,$dpto,$monto){

      mysql_select_db('admin_csc');
      
		    $date = strftime("%Y-%m-%d");
		    
		   
		    $calculo = $monto * 0.03;
		    $calc = number_format((float)$calculo, 2, '.', '');
		    $resultado = $monto + $calc;
		    $res = number_format((float)$resultado, 2, '.', '');
		    
		    
	      
		    $save = "INSERT INTO mora (nombreApellido,departamento,monto,interes,total,fecha)".
			    "VALUES".
			    "('$nombre','$dpto','$monto','$calc','$res','$date')";
		    
		    $result = mysql_query($save);
		    
		    
        
                     if($result){
                          
                          echo '<div class="alert alert-success" role="alert">';
                          echo "Registro Guardado Exitosamente!!";
                          echo "</div><hr>";
                       
                       }else{
                       
                            echo '<div class="alert alert-danger" role="alert">';
                            echo "Error al guardar Registro!!";
                            echo "</div><hr>";
                             }
                             

 }



function createTable(){

      
    $sql = "CREATE TABLE mora(".
               "id INT AUTO_INCREMENT,".
               "nombreApellido VARCHAR(50) NOT NULL,".
               "departamento VARCHAR(2) NOT NULL,".
               "monto FLOAT(8,2) NOT NULL,".
               "interes FLOAT(8,2) NOT NULL,".
               "total FLOAT(8,2) NOT NULL,".
               "fecha date,".
               "PRIMARY KEY (id)); ";

  mysql_select_db('admin_csc');
  $retval = mysql_query($sql);
  
  if(!$retval)
  {
    mysql_error();
    echo "<br>";  
  }
  
  else
   {  
    echo 'Table create Succesfully';
    echo "<br>";
   }

   //mysql_close($conn);

}


?>