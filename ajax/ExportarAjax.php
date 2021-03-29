<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportarExcelActividadAll"]) || isset($_POST["exportExcelPendientesAll"]) || isset($_POST["exportarExcelAtendidasAll"]) || isset($_POST["exportarExcelActividadesPendientes"]) || isset($_POST["exportarExcelActividadesAtendidas"]) || isset($_POST["exportarExcelActividades"]))
{
    require_once "../controladores/ActividadQrsControlador.php";
  $ins_excel = new ActividadQrsControlador();
    // Actividades Pendientes
        if(isset($_POST['exportarExcelActividadAll'])){
         echo $ins_excel->generarexcelActividadQRSALL_Controlador();
            }
        if(isset($_POST['exportarExcelActividades'])){
            echo $ins_excel->generarexcelActividades_Controlador();
            }

            if(isset($_POST['exportExcelPendientesAll'])){
            echo $ins_excel->generarexcelActividadPendientesQRSALL_Controlador();
            }

            if(isset($_POST['exportarExcelAtendidasAll'])){
            echo $ins_excel->generarexcelActividadAtendidasQRSALL_Controlador();
            }
            if(isset($_POST['exportarExcelActividadesPendientes'])){
            echo $ins_excel->generarexcelActividadPendientesQRS_Controlador();
            }

            if(isset($_POST['exportarExcelActividadesAtendidas'])){
            echo $ins_excel->generarexcelActividadAtendidasQRS_Controlador();
            }
            



  
}else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
?>
