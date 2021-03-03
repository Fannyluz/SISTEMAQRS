<?php
error_reporting(E_ALL ^ E_NOTICE);
//require_once '../dao/adminDAO.php';
require_once "../config/adminDAO.php";
$impr = new adminDAO();
$datos = $impr->allBitacora();
?>

<?php 
	if(count($datos)>0){ 
	for($x=0; $x<count($datos); $x++){	 
?>
	<tr>
		<td><?php  $x; $l = $x+1; echo $l; ?></xtd>
		
		<td><?php echo $datos[$x]['CASnombre']; ?></td>
		<td><?php echo $datos[$x]['CASdescripcion']; ?></td>
		<td><?php echo fechaNormal($datos[$x]['CASfecha']); ?></td>
		<td><?php echo $datos[$x]['CASestado']; ?></td>
	</tr>

<?php
	}
	}else{
?>
	<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr>
<?php
	}
			
?>