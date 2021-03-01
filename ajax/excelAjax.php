<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["export"]) || isset($_POST["exportPendientesAll"]) || isset($_POST["exportAtendidasAll"]) || isset($_POST["exportarActividadesPendientes"]) || isset($_POST["exportarActividadesAtendidas"]) || isset($_POST["exportar"]))
{
	require_once "../controladores/ActividadQrsControlador.php";
  $ins_excel = new ActividadQrsControlador();
	// Actividades Pendientes
     if(isset($_POST['export'])){
    echo $ins_excel->generarexcelActividadQRSALL_Controlador();
            }
if(isset($_POST['exportar'])){
    		echo $ins_excel->generarexcelActividades_Controlador();
            }

			if(isset($_POST['exportPendientesAll'])){
    		echo $ins_excel->generarexcelActividadPendientesQRSALL_Controlador();
            }

            if(isset($_POST['exportAtendidasAll'])){
    		echo $ins_excel->generarexcelActividadAtendidasQRSALL_Controlador();
            }
            if(isset($_POST['exportarActividadesPendientes'])){
    		echo $ins_excel->generarexcelActividadPendientesQRS_Controlador();
            }

            if(isset($_POST['exportarActividadesAtendidas'])){
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
