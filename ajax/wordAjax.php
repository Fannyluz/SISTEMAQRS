<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportarActividadesPendientes"]) || isset($_POST["exportarActividadesAtendidas"]) || isset($_POST["exportar"]))
{
	require_once "../controladores/ActividadQrsControlador.php";
  $ins_word = new ActividadQrsControlador();
	// Actividades Pendientes
     
if(isset($_POST['exportar'])){
    		echo $ins_word->generarwordActividades_Controlador();
            }

			
            if(isset($_POST['exportarActividadesPendientes'])){
    		echo $ins_word->generarwordActividadPendientesQRS_Controlador();
            }

            if(isset($_POST['exportarActividadesAtendidas'])){
    		echo $ins_word->generarwordActividadAtendidasQRS_Controlador();
            }
            



  
}else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
?>