<?php


//Busqueda por periodo

function calcularTotalOrdinario()
{
    
         mysql_select_db('admin_csc');
            
              $query = "select sum(g.monto) as total, month(g.fecha) as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Ordinario' group by mes";
                  $res = mysql_query($query);
                    //$fila = mysql_fetch_array($res);
                    
                    $count = 0;
		    $i=0;
		    
		  echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Total Gastos Ordinarios</h3>';
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
			 //echo "<td align=center>".$fila['id']."</td>";
			 //echo "<td align=center>".$fila['tipo_gasto']."</td>";
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
		echo '<button type="button" class="btn btn-primary">Cantidad de Meses:  ' .$count; echo '</button>';

	      
}


function calcularTotalExtraordinario()
{

        
         mysql_select_db('admin_csc');
            
              $query = "select sum(g.monto) as total, month(g.fecha) as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Extraordinario' group by mes";
                  $res = mysql_query($query);
                    //$fila = mysql_fetch_array($res);
                    
                    $count = 0;
		    $i=0;
		    
		  echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Total Gastos Extraordinarios</h3>';
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
			 //echo "<td align=center>".$fila['id']."</td>";
			 //echo "<td align=center>".$fila['tipo_gasto']."</td>";
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
		echo '<button type="button" class="btn btn-primary">Cantidad de Meses:  ' .$count; echo '</button>';
}



function guardarTotalGastosOrdinarios(){

      mysql_select_db('admin_csc'); 
        
            $query = "select sum(g.monto) as total, month(g.fecha) as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Ordinario' group by mes";
                  $res = mysql_query($query);
                
            while($fila = mysql_fetch_array($res)){
	      
	      $save = "INSERT INTO total_gastos (tipo_gasto,total,mes,anio)".
                   "VALUES".
                   "('Ordinario','$fila[total]','$fila[mes]','$fila[anio]')";
		    
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


function guardarTotalGastosExtraordinarios(){

      mysql_select_db('admin_csc'); 
        
            $query = "select sum(g.monto) as total, month(g.fecha) as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Extraordinario' group by mes";
                  $res = mysql_query($query);
                

            while( $fila = mysql_fetch_array($res)){       
                   
		    $save = "INSERT INTO total_gastos (tipo_gasto,total,mes,anio)".
                   "VALUES".
                   "('Extraordinario','$fila[total]','$fila[mes]','$fila[anio]')";
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

      
    $sql = "CREATE TABLE total_gastos(".
               "id INT AUTO_INCREMENT,".
               "tipo_gasto VARCHAR(14) NOT NULL,".
               "total FLOAT(10,2) NOT NULL,".
               "mes VARCHAR(2) NOT NULL,".
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