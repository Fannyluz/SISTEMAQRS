<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "rootfanny", "sistemaqrs");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM oevactpactividadqrs";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Address</th>  
                         <th>City</th>  
       <th>Postal Code</th>
       <th>Country</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["ACTcodigoUPT"].'</td>  
                         <td>'.$row["ACTnombres"].'</td>  
                         <td>'.$row["ACTapellidos"].'</td>  
       <td>'.$row["ACTDescripcion"].'</td>  
       <td>'.$row["ACTcelular"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
