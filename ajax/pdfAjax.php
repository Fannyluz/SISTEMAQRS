<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["export"]) || isset($_POST["exportPendientesAll"]) || isset($_POST["exportAtendidasAll"]) || isset($_POST["exportarActividadesPendientes"]) || isset($_POST["exportarActividadesAtendidas"]) || isset($_POST["exportar"]))
{
	require_once "../controladores/ActividadQrsControlador.php";
  $ins_pdf = new ActividadQrsControlador();
	// Actividades Pendientes
     if(isset($_POST['export'])){
    echo $ins_pdf->generarpdfActividadQRSALL_Controlador();
            }
if(isset($_POST['exportar'])){
    		echo $ins_pdf->generarpdfActividades_Controlador();
            }

			if(isset($_POST['exportPendientesAll'])){
    		echo $ins_pdf->generarpdfActividadPendientesQRSALL_Controlador();
            }

            if(isset($_POST['exportAtendidasAll'])){
    		echo $ins_pdf->generarpdfActividadAtendidasQRSALL_Controlador();
            }
            if(isset($_POST['exportarActividadesPendientes'])){
    		echo $ins_pdf->generarpdfActividadPendientesQRS_Controlador();
            }

            if(isset($_POST['exportarActividadesAtendidas'])){
    		echo $ins_pdf->generarpdfActividadAtendidasQRS_Controlador();
            }
            



  
}else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
?>
