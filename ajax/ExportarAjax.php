<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportExcelPendientesAll"]) || isset($_POST["exportPendientesAll"]))
{
        require_once "../controladores/ActividadQrsControlador.php";
        $Exportar = new ActividadQrsControlador();
  
    // Actividades Pendientes
        if(isset($_POST['exportExcelPendientesAll'])){
            echo $Exportar->generarexcelActividadPendientesQRSALL_Controlador();
            }

            if(isset($_POST['exportPendientesAll'])){
            echo $Exportar->generarwordActividadPendientesQRSALL_Controlador();
            }
            

            
  
}else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
?>
