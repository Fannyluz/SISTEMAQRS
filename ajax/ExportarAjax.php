<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportarExcelActividadAll"]) || isset($_POST["exportarPdfActividadesAll"]) || isset($_POST["export"]))
{
        require_once "../controladores/ActividadQrsControlador.php";
  $exportar_actividad = new ActividadQrsControlador();
  
  require_once "../vistas/pdf/pdfActividades.php";
    
    $pdf = new pdfActividades();

    if(isset($_POST['exportarExcelActividadAll'])){
         echo $exportar_actividad->generarexcelActividadQRSALL_Controlador();
            } 
            
            // expotar pdf actividades All 
            if(isset($_POST['exportarPdfActividadesAll'])){
            echo $pdf->AgregarPdfActividesAll();
            }



             if(isset($_POST['export'])){
    echo $exportar_actividad->generarwordActividadQRSALL_Controlador();
            }
  
}else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
?>
