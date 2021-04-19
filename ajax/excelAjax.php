<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportarExcelActividadesPendientes"]) || isset($_POST["exportarExcelActividadesAtendidas"]) || isset($_POST["exportarExcelActividades"]))
{
	require_once "../controladores/ActividadQrsControlador.php";
  $ins_excel = new ActividadQrsControlador();
	
        if(isset($_POST['exportarExcelActividades'])){
    		echo $ins_excel->generarexcelActividades_Controlador();
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
