<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportarExcelActividadAll"]) || isset($_POST["exportarPdfActividadesAll"]) || isset($_POST["export"]) || isset($_POST["exportExcelPendientesAll"]) || isset($_POST["exportarPdfActividadesPendientesAll"]) || isset($_POST["exportWordPendientesAll"]) || isset($_POST["exportarExcelAtendidasAll"]) || isset($_POST["exportarPdfActividadesAtendidasAll"]) || isset($_POST["exportWordAtendidasAll"]))
{
        require_once "../controladores/ActividadQrsControlador.php";
  $exportar_actividad = new ActividadQrsControlador();
  
  require_once "../vistas/pdf/pdfActividades.php";
    
    $pdf = new pdfActividades();



    //ACTIVIDADES GENERLAES
            //exportar actividades generales en excel
        if(isset($_POST['exportarExcelActividadAll'])){
         echo $exportar_actividad->generarexcelActividadQRSALL_Controlador();
            } 
            
            //exportar actividades generales en PDF
            if(isset($_POST['exportarPdfActividadesAll'])){
            echo $pdf->AgregarPdfActividesAll();
            }


            //exportar actividades generales en word
            if(isset($_POST['export'])){
            echo $exportar_actividad->generarwordActividadQRSALL_Controlador();

            
            }
  //ACTIVIDADDES PENDIENTES
            //exportar actividades pendientes en excel
        if(isset($_POST['exportExcelPendientesAll'])){
         echo $exportar_actividad->generarexcelActividadPendientesQRSALL_Controlador();
            } 
            
            //exportar actividades pendientes en PDF
            if(isset($_POST['exportarPdfActividadesPendientesAll'])){
            echo $pdf->AgregarPdfActividesPendientesAll();
            }


            //exportar actividades pendientes en word
            if(isset($_POST['exportWordPendientesAll'])){
            echo $exportar_actividad->generarwordActividadPendientesQRSALL_Controlador();
            }

//ACTIVIDADDES ATENDIDAS - GENERAL
            //exportar actividades pendientes en excel
        if(isset($_POST['exportarExcelAtendidasAll'])){
         echo $exportar_actividad->generarexcelActividadAtendidasQRSALL_Controlador();
            } 
            
            //exportar actividades pendientes en PDF
            if(isset($_POST['exportarPdfActividadesAtendidasAll'])){
            echo $pdf->AgregarPdfActividesAtendidasAll();
            }


            //exportar actividades pendientes en word
            if(isset($_POST['exportWordAtendidasAll'])){
            echo $exportar_actividad->generarwordActividadAtendidasQRSALL_Controlador();
            }
}else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
?>
