<?php


//Busqueda por periodo

function calcularTotalOrdinario()
{
    
         mysql_select_db('admin_csc');
            
            $sql = "set lc_time_names = 'es_ES'";
             $retval = mysql_query($sql);
              $query = "select sum(g.monto) as total, date_format(g.fecha, '%b') as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Ordinario' group by mes";
                  $res = mysql_query($query);
                    
                    
                    
                    //calculamos acumulado anual
                 $qy = "select sum(g.monto) as total,  year(g.fecha) as anio from gastos g where year(g.fecha) = year(curdate()) and tipo_gasto = 'Ordinario'";
                    $resp = mysql_query($qy);
		      $row = mysql_fetch_array($resp);
                    
                    $count = 0;
		    $i=0;
		    
		    echo '<div class="container">
			    <div class="row">
			       <div class="col-sm-12">
			         <div class="panel panel-default" >
			           <div class="panel-body">';
		    
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
		echo '<button type="button" class="btn btn-primary">Acumulado:  $' .$row['total']; echo '</button>';
		echo '</div></div></div></div></div>';

	      
}


function calcularTotalOrdinarioMesActual()
{
    
         mysql_select_db('admin_csc');
            
        $sql = "set lc_time_names = 'es_ES'";
          $retval = mysql_query($sql);
            $query = "select sum(g.monto) as total, date_format(g.fecha, '%b') as mes, year(g.fecha) as anio from gastos g  where tipo_gasto = 'Ordinario' and year(g.fecha) = year(curdate()) and month(g.fecha) = month(curdate()) group by month(g.fecha)";
              $res = mysql_query($query);
                    
                    
                    $count = 0;
		    $i=0;
		    
		    echo '<div class="container">
			    <div class="row">
			       <div class="col-sm-12">
			         <div class="panel panel-default" >
			           <div class="panel-body">';
		    
		  echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Total Gastos Ordinarios Mes Actual</h3>';
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
		echo '<button type="button" class="btn btn-primary">Cantidad Registros:  ' .$count; echo '</button>';
		echo '</div></div></div></div></div>';

	      
}


function calcularTotalExtraordinario()
{

        
         mysql_select_db('admin_csc');
            
            $sql = "set lc_time_names = 'es_ES'";
             $retval = mysql_query($sql);
                $query = "select sum(g.monto) as total, date_format(g.fecha, '%b') as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Extraordinario' group by mes";
                  $res = mysql_query($query);
                    
                    //calculamos acumulado anual
                 $qy = "select sum(g.monto) as total,  year(g.fecha) as anio from gastos g where year(g.fecha) = year(curdate()) and tipo_gasto = 'Extraordinario'";
                    $resp = mysql_query($qy);
		      $row = mysql_fetch_array($resp);
                    
                    $count = 0;
		    $i=0;
		    
		    echo '<div class="container">
			    <div class="row">
			       <div class="col-sm-12">
			         <div class="panel panel-default" >
			           <div class="panel-body">';
		    
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
		echo '<button type="button" class="btn btn-primary">Cantidad de Meses:  ' .$count; echo '</button><br><hr>';
		echo '<button type="button" class="btn btn-primary">Acumulado:  $' .$row['total']; echo '</button>';
		echo '</div></div></div></div></div>';
}

function calcularTotalExtraordinarioMesActual()
{
    
         mysql_select_db('admin_csc');
            
         $sql = "set lc_time_names = 'es_ES'";
          $retval = mysql_query($sql);
            $query = "select sum(g.monto) as total, date_format(g.fecha, '%b') as mes, year(g.fecha) as anio from gastos g  where tipo_gasto = 'Extraordinario' and year(g.fecha) = year(curdate()) and month(g.fecha) = month(curdate()) group by month(g.fecha)";
             $res = mysql_query($query);
                  
                    $count = 0;
		    $i=0;
		    
		    echo '<div class="container">
			    <div class="row">
			       <div class="col-sm-12">
			         <div class="panel panel-default" >
			           <div class="panel-body">';
		    
		  echo "<hr>";
		  echo '<div class="alert alert-success" role="alert">';
                  echo '<h3>Total Gastos Extraordinarios Mes Actual</h3>';
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
		echo '</div></div></div></div></div>';

	      
}



function guardarTotalGastosOrdinarios(){

      mysql_select_db('admin_csc'); 
        
        
         $sql = "set lc_time_names = 'es_ES'";
             $retval = mysql_query($sql);
        
            $query = "select sum(g.monto) as total, date_format(g.fecha, '%b') as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Ordinario' group by mes";
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
                         
                         
function guardarTotalGastosOrdinariosMesActual(){

      mysql_select_db('admin_csc'); 
        
         $sql = "set lc_time_names = 'es_ES'";
           $retval = mysql_query($sql);
             $query = "select sum(g.monto) as total, date_format(g.fecha, '%b') as mes, year(g.fecha) as anio from gastos g  where tipo_gasto = 'Ordinario' and year(g.fecha) = year(curdate()) and month(g.fecha) = month(curdate()) group by month(g.fecha)";
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
        
        
         $sql = "set lc_time_names = 'es_ES'";
           $retval = mysql_query($sql);
            $query = "select sum(g.monto) as total, date_format(g.fecha '%b') as mes, year(g.fecha) as anio from gastos g where tipo_gasto = 'Extraordinario' group by mes";
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
                         
function guardarTotalGastosExtraordinariosMesActual(){

      mysql_select_db('admin_csc'); 
        
        
         $sql = "set lc_time_names = 'es_ES'";
          $retval = mysql_query($sql);
            $query = "select sum(g.monto) as total, date_format(g.fecha, '%b') as mes, year(g.fecha) as anio from gastos g  where tipo_gasto = 'Extraordinario' and year(g.fecha) = year(curdate()) and month(g.fecha) = month(curdate()) group by month(g.fecha)";
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
               "mes VARCHAR(6) NOT NULL,".
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