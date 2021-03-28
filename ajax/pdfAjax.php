<?php  
$peticionAjax=true;
  require_once "../config/APP.php";


if(isset($_POST["exportar"]) || isset($_POST["exportarPdfActividadesAtendidasAll"]) || isset($_POST["exportarPdfActividadesPendientesAll"]) || isset($_POST["exportarPdfActividadesAll"]) || isset($_POST["exportarPdfActividadesPendientes"]) || isset($_POST["exportarPdfActividadesAtendidas"]) )
{
	
    require_once "../vistas/pdf/pdfActividades.php";
    
    $pdf = new pdfActividades();
	// Actividades Pendientes
     if(isset($_POST['export'])){
    echo $ins_pdf->generarpdfActividadQRSALL_Controlador(); 
            }


            // expotar pdf actividades del un personal 
            if(isset($_POST['exportar'])){
    		echo $pdf->Agregarpdf();
            }

            // expotar pdf actividades Atendidas All 
            if(isset($_POST['exportarPdfActividadesAtendidasAll'])){
            echo $pdf->AgregarPdfActividesAtendidasAll();
            }

// expotar pdf actividades Pendientes All 
            if(isset($_POST['exportarPdfActividadesPendientesAll'])){
            echo $pdf->AgregarPdfActividesPendientesAll();
            }

// expotar pdf actividades All 
            if(isset($_POST['exportarPdfActividadesAll'])){
            echo $pdf->AgregarPdfActividesAll();
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
