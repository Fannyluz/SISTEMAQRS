<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportarPdfActividades"]) || isset($_POST["exportarPdfActividadesPendientes"]) || isset($_POST["exportarPdfActividadesAtendidas"]) )
{
	
    require_once "../vistas/pdf/pdfActividades.php";
    
    $pdf = new pdfActividades();
            // expotar pdf actividades del un personal 
            if(isset($_POST['exportarPdfActividades'])){
    		echo $pdf->Agregarpdf();
            }

// expotar pdf actividades Pendientes de cada personal 
            if(isset($_POST['exportarPdfActividadesPendientes'])){
            echo $pdf->AgregarPdfActividadPendiente();
            }

// expotar pdf actividades Atendidos  de cada personal 
            if(isset($_POST['exportarPdfActividadesAtendidas'])){
            echo $pdf->ExportarPdfActividadAtendido();
            }

            



  
}else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
?>
