<?php


//Busqueda por periodo

function calcularSaldoCaja()
{
    
         mysql_select_db('admin_csc');
            
            $sql = "set lc_time_names = 'es_ES'";
             $retval = mysql_query($sql);
              $query = "select totalCobros - totalGastos as cajaFinal from (select (select sum(monto) from cobros where estado = 'Pago' and month(fecha) = month(curdate()) and year(fecha) = year(curdate())) as totalCobros, (select sum(monto) from gastos where month(fecha) = month(curdate()) and year(fecha) = year(curdate())) as totalGastos) as caja";
                  $res = mysql_query($query);
                               
                    $count = 0;
		    $i=0;
		    $date = strftime("%Y-%m-%d");
		    
		    echo '<div class="container">
			    <div class="row">
			       <div class="col-sm-12">
			         <div class="panel panel-default" >
			           <div class="panel-body">';
		    
		  echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Total Saldo de Caja mes Actual</h3>';
                  echo "</div><hr>";
		    
            echo "<table class='display compact' id='myTable'>";
              echo "<thead>

                    <th class='text-nowrap text-center'>Monto</th>
                    <th class='text-nowrap text-center'>Fecha</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysql_fetch_array($res)){

			 // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cajaFinal']."</td>";
			 echo "<td align=center>".$date."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;

		}


		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Meses:  ' .$count; echo '</button><br><hr>';
		//echo '<button type="button" class="btn btn-primary">Acumulado:  $' .$row['total']; echo '</button>';
		echo '</div></div></div></div></div>';
	      
}


                         
function guardarSaldoCaja(){

      mysql_select_db('admin_csc'); 
        
        
         $sql = "set lc_time_names = 'es_ES'";
          $retval = mysql_query($sql);
            $query = "select totalCobros - totalGastos as cajaFinal from (select (select sum(monto) from cobros where month(fecha) = month(curdate()) and year(fecha) = year(curdate())) as totalCobros, (select sum(monto) from gastos where month(fecha) = month(curdate()) and year(fecha) = year(curdate())) as totalGastos) as caja";
               $res = mysql_query($query);
               
               $date = strftime("%Y-%m-%d");
                

            while( $fila = mysql_fetch_array($res)){       
                   
		    $save = "INSERT INTO saldo_caja (total,fecha)".
                   "VALUES".
                   "('$fila[cajaFinal]','$date')";
		    $result = mysql_query($save);
		    
		    }
        
                     if($result)
                      {
                          echo '<div class="alert alert-success" role="alert">';
                          echo "Registro Guardado Exitosamente!!";
                          echo "</div><hr>";
                       }
            
                          else 
                            {
                                echo '<div class="alert alert-success" role="alert">';
                                echo "Error al guardar Registro!!";
                                echo "</div><hr>";
                             }
                             

                         }



function createTable(){

      
    $sql = "CREATE TABLE saldo_caja(".
               "id INT AUTO_INCREMENT,".
               "total FLOAT(10,2) NOT NULL,".
               "fecha date NOT NULL,".
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