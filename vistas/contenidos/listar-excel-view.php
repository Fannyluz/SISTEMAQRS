 <div>
        <h1>REPORTE DE EXCEL CON PHP Y MYSQL</h1>
         <div>
          <a href=" <?php echo SERVERURL?>excel/" style="background-color:#10226a;color:white;">Generar Excel</a>
        </div>
      </div> 

<table>
                        
    <tr>

                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                </tr>

                           
                            
  <?php 
               require_once "./controladores/ActividadQrsControlador.php";
                                $casos=new ActividadQrsControlador();
                                $datos=$casos->listar_ActividadQrsAll_controlador();
                                $count=1;
                                $nuevoestado="Activo";
while($row=mysql_fetch_array($datos)){  

?>

                                <tr>
                                <td><?php echo $row['ACTcodigoUPT'] ?></td> 
                                <td><?php echo $row['ACTnombres']?> <?php echo $row['ACTapellidos']?></td>
                                <td><?php echo $row['ACTDescripcion']?></td> 
                                <td><?php echo $row['ACTcelular']?></td>
                                <td><?php echo $row['ACTcorreoelectronico']?></td> 
                                <td><?php echo $row['ACTfecha']?></td>

                            </tr>

<?php

                                    }
                                    ?>

                                
                               
                       
                        </table>