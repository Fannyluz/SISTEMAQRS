
<?php
if($peticionAjax){
    require_once "../modelos/ActividadQrsModelo.php";
 }else{
    require_once "./modelos/ActividadQrsModelo.php";
 }
require_once "../vistas/fpdf/fpdf.php";



class PDF extends FPDF
{
// Cabecera de página 
function Header()
{
    // Logo
    $this->Image('../images/logo.jpg',30,0,25);
    $this->Image('../images/logoo.jpg',245,0,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(115);
    //$this->Cell(115);
    // Título
    $this->Write(5,'Reporte de Actividades');
    $this->SetFillColor(232,232,232);
    // Salto de línea
    $this->Ln(20);
    $this->SetFont('Arial','B',7);
    $this->Cell(7,10, utf8_decode("N°"), 1, 0, 'C', 1);
    $this->Cell(15,10, "Tipo", 1, 0, 'C', 1);
    $this->Cell(35,10, "Caso", 1, 0, 'C', 1);
    $this->Cell(15,10, "Emisor", 1, 0, 'C', 1);
    $this->Cell(26,10, "Personal UPTVirtual", 1, 0, 'C', 1);
    $this->Cell(17,10, "Codigo", 1, 0, 'C', 1);
    $this->Cell(27,10, "Nombres y Apellidos", 1, 0, 'C', 1);
    $this->Cell(65,10, "Descripcion", 1, 0, 'C', 1);
    $this->Cell(15,10, "Celular", 1, 0, 'C', 1);
    $this->Cell(25,10, "Correo", 1, 0, 'C', 1);
    $this->Cell(16,10, "Fecha", 1, 0, 'C', 1);
    $this->Cell(15,10, "Estado", 1, 1, 'C', 1);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


class pdfActividades{



    //metodo decargar pdf Actividdes generales de un personal 
    public function Agregarpdf(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();
        $codigo=$principal->limpiar_cadena($_POST['exportar']);

        $consulta="SELECT * FROM oevactpactividadqrs AS act
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.UPUcodigo=$codigo ORDER BY act.ACTfecha DESC";
              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',8);

        $i = 1;
        $nuevo="";
       
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(35,10,utf8_decode( $row['CASnombre']), 1, 0,'D', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(26,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(17,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(27,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(65,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(15,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(25,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(16,10, $row['ACTfecha'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(15,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(15,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(15,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','Actividades.pdf');
        //$pdf->Output();
    }

    //metodo decargar pdf Actividdes generales AtendidasALL
    public function AgregarPdfActividesAtendidasAll(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();
        
        $consulta="SELECT * FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=2 ORDER BY ACTfecha DESC";
          

              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',8);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(35,10,utf8_decode( $row['CASnombre']), 1, 0,'D', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(26,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(17,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(27,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(65,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(15,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(25,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(16,10, $row['ACTfecha'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(15,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(15,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(15,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','ActividadesAtendidas.pdf');
        //$pdf->Output();
    }

    //metodo decargar pdf Actividdes generales AtendidasALL
    public function AgregarPdfActividesPendientesAll(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();

        $consulta="SELECT * FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=1 ORDER BY ACTfecha DESC";

              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',8);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(35,10,utf8_decode( $row['CASnombre']), 1,0, 'D', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(26,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(17,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(27,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(65,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(15,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(25,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(16,10, $row['ACTfecha'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(15,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(15,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(15,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','ActividadesPendientes.pdf');
        //$pdf->Output();
    }


    //metodo decargar pdf Actividdes generales All
    public function AgregarPdfActividesAll(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();

        $consulta="SELECT * FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo ORDER BY ACTfecha DESC";

              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',8);

        $i = 1;
        foreach($datos as $row){  
           $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(35,10,utf8_decode( $row['CASnombre']), 1,0, 'D', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(26,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(17,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(27,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(65,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(15,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(25,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(16,10, $row['ACTfecha'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(15,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(15,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(15,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','Actividades.pdf');
        //$pdf->Output();
    }

    //metodo decargar pdf Actividades Pendientes de un personal 
    public function AgregarPdfActividadPendiente(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();
        $codigo=$principal->limpiar_cadena($_POST['exportarPdfActividadesPendientes']);

        $consulta="SELECT * FROM oevactpactividadqrs AS act
        INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
        INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
        INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
        INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
        INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
        INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE act.UPUcodigo=$codigo and act.ACTestado=1 ORDER BY ACTfecha DESC";
          

              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',8);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(35,10,utf8_decode( $row['CASnombre']), 1, 0, 'D', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(26,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(17,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(27,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(65,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(15,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(25,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(16,10, $row['ACTfecha'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(15,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(15,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(15,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','ActividadesPendientes.pdf');
        //$pdf->Output();
    }

//metodo decargar pdf actividades atendidas de un personal 
    public function ExportarPdfActividadAtendido(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();
        $codigo=$principal->limpiar_cadena($_POST['exportarPdfActividadesAtendidas']);

        $consulta="SELECT * FROM oevactpactividadqrs AS act
        INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
        INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
        INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
        INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
        INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
        INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE act.UPUcodigo=$codigo and act.ACTestado=2 ORDER BY ACTfecha DESC";
          

              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',8);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(35,10,utf8_decode( $row['CASnombre']), 1, 0,'D', 0);
            $pdf->Cell(15,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(26,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(17,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(27,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(65,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(15,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(25,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(16,10, $row['ACTfecha'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(15,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(15,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(15,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','ActividadesAtendidos.pdf');
        //$pdf->Output();
    }

}


?>