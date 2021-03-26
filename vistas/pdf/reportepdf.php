<?php
require_once("../../dompdf/dompdf_config.inc.php");

$mysqli = new mysqli('localhost','root','','sistemaqrs');

$dompdf = new Dompdf();

$codigoHTML='
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin titulo<title>
</head>
<body>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA</strong></CENTER></td>
</tr>
<tr bgcolor="red">
<td><strong>Codigo</strong></td>
<td><strong>Codigo</strong></td>
<td><strong>Codigo</strong></td>
<td><strong>Codigo</strong></td>
<td><strong>Codigo</strong></td>
<td><strong>Codigo</strong></td>
</tr>';


$consulta="SELECT * FROM oevactpactividadqrs";
$resultado = $mysqli->query($consulta);
      while($row = $resultado->fetch_assoc($consulta)){
          $codigoHTML.='
          <tr>
            <td>'.$res['ACTcodigoUPT'].'</td>
            <td>'.$res['ACTnombres'].'</td>
            <td>'.$res['ACTapellidos'].'</td>
            <td>'.$res['ACTDescripcion'].'</td>
            <td>'.$res['ACTcelular'].'</td>   
            <td>'.$res['ACTcorreoelectronico'].'</td>
            <td>'.$res['ACTfecha'].'</td>
            <td>'.$res['ACTestado'].'</td>
            </tr>';
      }

$codigoHTML.='
</table>
</body>
</html>
';

$codigoHTML=utf8_encode($codigoHTML);
$dompdf->set_paper('A4', 'landscape');
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla.pdf");
?>
