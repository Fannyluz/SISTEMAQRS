
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
    $this->SetFont('Arial','B',5.5);
    $this->Cell(7,10, utf8_decode("N°"), 1, 0, 'C', 1);
    $this->Cell(13,10, "Tipo", 1, 0, 'C', 1);
    $this->Cell(24,10, "Caso", 1, 0, 'C', 1);
    $this->Cell(13,10, "Emisor", 1, 0, 'C', 1);
    $this->Cell(20,10, "Personal UPTVirtual", 1, 0, 'C', 1);
    $this->Cell(14,10, "Codigo", 1, 0, 'C', 1);
    $this->Cell(24,10, "Nombres y Apellidos", 1, 0, 'C', 1);
    $this->Cell(55,10, "Descripcion", 1, 0, 'C', 1);
    $this->Cell(10,10, "Celular", 1, 0, 'C', 1);
    $this->Cell(20,10, "Correo", 1, 0, 'C', 1);
    $this->Cell(10,10, "Fecha", 1, 0, 'C', 1);
    $this->Cell(65,10, "Acciones", 1, 0, 'C', 1);
    $this->Cell(10,10, "Estado", 1, 1, 'C', 1);
    
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
        $codigo=$principal->limpiar_cadena($_POST['exportarPdfActividades']);

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
        $pdf->SetFont('Times','',5.5);

        $i = 1;
        $nuevo="";
       
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1, 0,'D', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
            $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
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
        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscaratendido']);
       
       if($buscarPersonal=="vacia")
    {
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
        $pdf->SetFont('Times','',5.5);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1, 0,'D', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
            $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','ActividadesAtendidas.pdf');
        //$pdf->Output();

    }else{

    }
        
        $consulta="SELECT * FROM oevactpactividadqrs AS act
          INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
          INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
          INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
          INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
          INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=2 and act.UPUcodigo=$buscarPersonal ORDER BY ACTfecha DESC";

                  $conexion=modeloPrincipal::conectar();
                  $datos=$conexion->query($consulta);
                  
            // Creación del objeto de la clase heredada
            $pdf = new PDF();

            $pdf->AliasNbPages();
            $pdf->AddPage('landscape');
            $pdf->SetFont('Times','',5.5);

            $i = 1;
            foreach($datos as $row){  
                $pdf->Cell(7,10, $i,1,0,'C',0);
                //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
                $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
                //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
                $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1,0, 'D', 0);
                $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
                $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
                $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
                $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
                $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
                $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
                $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
                $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
                $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
                if($row['ACTestado']==1)
                    {
                    $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                    }
                    else if($row['ACTestado']==2)
                    {
                        $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                    }else
                    {
                        $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                    }
                
                $i++;
            }
            $pdf->Output('D','ActividadesPendientes.pdf');
            //$pdf->Output();
    }

    //metodo decargar pdf Actividdes generales AtendidasALL
    public function AgregarPdfActividesPendientesAll(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();
        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscarvivo']);

if($buscarPersonal=="vacia")
    {
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
        $pdf->SetFont('Times','',5.5);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1,0, 'D', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
            $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','ActividadesPendientes.pdf');
        //$pdf->Output();
    }else
    {
            $consulta="SELECT * FROM oevactpactividadqrs AS act
          INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
          INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
          INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
          INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
          INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=1 and act.UPUcodigo=$buscarPersonal ORDER BY ACTfecha DESC";

                  $conexion=modeloPrincipal::conectar();
                  $datos=$conexion->query($consulta);
                  
            // Creación del objeto de la clase heredada
            $pdf = new PDF();

            $pdf->AliasNbPages();
            $pdf->AddPage('landscape');
            $pdf->SetFont('Times','',5.5);

            $i = 1;
            foreach($datos as $row){  
                $pdf->Cell(7,10, $i,1,0,'C',0);
                //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
                $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
                //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
                $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1,0, 'D', 0);
                $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
                $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
                $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
                $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
                $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
                $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
                $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
                $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
                $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
                if($row['ACTestado']==1)
                    {
                    $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                    }
                    else if($row['ACTestado']==2)
                    {
                        $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                    }else
                    {
                        $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                    }
                
                $i++;
            }
            $pdf->Output('D','ActividadesPendientes.pdf');
            //$pdf->Output();
    }
        
    }


    //metodo decargar pdf Actividdes generales All
    public function AgregarPdfActividesAll(){

        require_once "../modelos/modeloPrincipal.php";
        $principal= new modeloPrincipal();
        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscarvivo']);
       
if($buscarPersonal=="vacia")
    {
          $consulta="SELECT *  FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo 
      ORDER BY ACTfecha DESC";

              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',5.5);

        $i = 1;
        foreach($datos as $row){  
           $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1,0, 'D', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
            $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','Actividades.pdf');
    }else{
          $consulta="SELECT *  FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo 
      WHERE act.UPUcodigo=$buscarPersonal ORDER BY act.UPUcodigo ASC";

              $conexion=modeloPrincipal::conectar();
              $datos=$conexion->query($consulta);
              
        // Creación del objeto de la clase heredada
        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage('landscape');
        $pdf->SetFont('Times','',5.5);

        $i = 1;
        foreach($datos as $row){  
           $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1,0, 'D', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
            $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','Actividades.pdf');
    }

      
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
        $pdf->SetFont('Times','',5.5);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1, 0, 'D', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
            $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
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
        $pdf->SetFont('Times','',5.5);

        $i = 1;
        foreach($datos as $row){  
            $pdf->Cell(7,10, $i,1,0,'C',0);
            //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
            //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
            $pdf->Cell(24,10,utf8_decode( $row['CASnombre']), 1, 0,'D', 0);
            $pdf->Cell(13,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
            $pdf->Cell(20,10,utf8_decode( $row['PEUnombres'].' '.$row['PEUapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(14,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
            $pdf->Cell(24,10,utf8_decode( $row['ACTnombres'].' '.$row['ACTapellidos']), 1, 0, 'C', 0);
            $pdf->Cell(55,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'D', 0);
            $pdf->Cell(10,10, $row['ACTcelular'], 1, 0, 'C', 0);
            $pdf->Cell(20,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
            $pdf->Cell(10,10, $row['ACTfecha'], 1, 0, 'C', 0);
            $pdf->Cell(65,10, $row['ACTacciones'], 1, 0, 'C', 0);
            if($row['ACTestado']==1)
                {
                $pdf->Cell(10,10, $nuevo="Pendiente", 1, 1, 'C', 0);
                }
                else if($row['ACTestado']==2)
                {
                    $pdf->Cell(10,10, $nuevo="Atendido", 1, 1, 'C', 0);
                }else
                {
                    $pdf->Cell(10,10, $nuevo="Rechazado", 1, 1, 'C', 0);
                }
            
            $i++;
        }
        $pdf->Output('D','ActividadesAtendidos.pdf');
        //$pdf->Output();
    }

}


?>