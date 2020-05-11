<?php


//Busqueda por periodo

function calcularTotalCobros()
{
    
         mysql_select_db('admin_csc');
            
            //calcula acumulado por cada mes
             $sql = "set lc_time_names = 'es_ES'";
             $retval = mysql_query($sql);
             $query = "select sum(c.monto) as total, date_format(c.fecha, '%b') as mes, year(c.fecha) as anio from cobros c where year(c.fecha) = year(curdate()) group by month(c.fecha);";
               $res = mysql_query($query);
                 
                 //calculamos acumulado anual
                 $qy = "select sum(c.monto) as total,  year(c.fecha) as anio from cobros c where year(c.fecha) = year(curdate())";
                    $resp = mysql_query($qy);
		      $row = mysql_fetch_array($resp);
		      
		
                    $count = 0;
		    $i=0;
		    
		  echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Total Cobros por Meses</h3>';
                  echo "</div><hr>";
		    
            echo "<table class='display compact' id='myTable'>";
              echo "<thead>

                    <th class='text-nowrap text-center'>Monto Total</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysql_fetch_array($res)){

			 // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['total']."</td>";
			 echo "<td align=center>".$fila['mes']."</td>";
			 echo "<td align=center>".$fila['anio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;

		}
		
		
		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Meses:  ' .$count; echo '</button><br><hr>';
		echo '<button type="button" class="btn btn-primary">Acumulado Anual:  $' .$row['total']; echo '</button>';

	      
}


function calcularTotalCobrosMesActual()
{
    
         mysql_select_db('admin_csc');
         
         $sql = "set lc_time_names = 'es_ES'";
             $retval = mysql_query($sql);   
		$query = "select sum(c.monto) as total, date_format(c.fecha, '%b') as mes, year(c.fecha) as anio from cobros c where year(c.fecha) = year(curdate()) and month(c.fecha) = month(curdate()) group by month(c.fecha)";
		    $res = mysql_query($query);
                    
                    
                    $count = 0;
		    $i=0;
		    
		  echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Total Cobros Mes Actual</h3>';
                  echo "</div><hr>";
		    
            echo "<table class='display compact' id='myTable'>";
              echo "<thead>

                    <th class='text-nowrap text-center'>Monto Total</th>
                    <th class='text-nowrap text-center'>Mes</th>
                    <th class='text-nowrap text-center'>Año</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysql_fetch_array($res)){

			 // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['total']."</td>";
			 echo "<td align=center>".$fila['mes']."</td>";
			 echo "<td align=center>".$fila['anio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;

		}


		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad Registros:  ' .$count; echo '</button>';

	      
}


                         
                         
function guardarTotalCobrosMesActual(){

      mysql_select_db('admin_csc'); 
        
            $sql = "set lc_time_names = 'es_ES'";
             $retval = mysql_query($sql);   
		$query = "select sum(c.monto) as total, date_format(c.fecha, '%b') as mes, year(c.fecha) as anio from cobros c where year(c.fecha) = year(curdate()) and month(c.fecha) = month(curdate()) group by month(c.fecha)";
            
                  $res = mysql_query($query);
                
            while($fila = mysql_fetch_array($res)){
	      
	      $save = "INSERT INTO total_cobros (total,mes,anio)".
                   "VALUES".
                   "('$fila[total]','$fila[mes]','$fila[anio]')";
		    
		    $result = mysql_query($save);
		    
		    }
        
                     if($result){
                          
                          echo '<div class="alert alert-success" role="alert">';
                          echo "Registro Guardado Exitosamente!!";
                          echo "</div><hr>";
                       
                       }else{
                       
                            echo '<div class="alert alert-success" role="alert">';
                            echo "Error al guardar Registro!!";
                            echo "</div><hr>";
                             }
                             

                         }



function createTable(){

      
    $sql = "CREATE TABLE total_cobros(".
               "id INT AUTO_INCREMENT,".
               "total FLOAT(10,2) NOT NULL,".
               "mes VARCHAR(5) NOT NULL,".
               "anio VARCHAR(4) NOT NULL,".
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