<?php


        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=ActividadesQrsALL.xls');
?>

<table border="1">
    <tr style="background-color:red;">
        <th>Nº</th>
        <th>Tipo</th>
        <th>Caso</th>
        <th>Tipo Emisor</th>
        <th>Personal UptVirtual (Destinatario)</th>
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
         require_once "../../controladores/ActividadQrsControlador.php";
                                $casos=new ActividadQrsControlador();
                                $datos=$casos->listar_ActividadQrsAll_controlador();
                                $count=1;
                                $nuevoestado="Activo";
        foreach($datos as $row) {
            ?>
                <tr>
                    <td><?php echo $count++?></td> 
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                    <td><?php echo $row['TIPnombre']; ?></td>
                </tr>   

            <?php
        }

    ?>
</table>