<?php
     
     if($peticionAjax){
        require_once "../modelos/ActividadQrsModelo.php";
     }else{
        require_once "./modelos/ActividadQrsModelo.php";
     }


     class ActividadQrsControlador extends ActividadQrsModelo{
      

      /*--- controlador agregar usuario--*/
           public function agregar_ActividadQRS_controlador(){
            $personal=modeloPrincipal::limpiar_cadena($_POST['personal_reg']);
            $tipo=modeloPrincipal::limpiar_cadena($_POST['tipo_reg']);
            $caso=modeloPrincipal::limpiar_cadena($_POST['caso_reg']);
            $tipoemisor=modeloPrincipal::limpiar_cadena($_POST['tipousuario_reg']);
            $codigoUPT=modeloPrincipal::limpiar_cadena($_POST['codigo_reg']);
            $nombres=modeloPrincipal::limpiar_cadena($_POST['ACTnombres_reg']);
            $apellidos=modeloPrincipal::limpiar_cadena($_POST['ACTapellidos_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['ACTdescripcion_reg']);
            $celular=modeloPrincipal::limpiar_cadena($_POST['ACTcelular_reg']);
            $correoElectronico=modeloPrincipal::limpiar_cadena($_POST['ACTcorreoElectronico_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['ACTfecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['ACTestado_reg']);


            //comprobar campos vacios
            if($nombres=="" || $apellidos=="" || $descripcion=="" || $celular==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }     
            

            $datos_actividadQRS_registro=[
               "TIPcodigo"=>$tipo,
               "CAScodigo"=>$caso,
               "TIUcodigo"=>$tipoemisor,
               "UPUcodigo"=>$personal,
               "ACTcodigoUPT"=>$codigoUPT,
               "ACTnombres"=>$nombres,
               "ACTapellidos"=>$apellidos,
               "ACTDescripcion"=>$descripcion,
               "ACTcelular"=>$celular,
               "ACTcorreoelectronico"=>$correoElectronico,
               "ACTfecha"=>$fecha,
               "ACTestado"=>$estado
            ];


            $agregar_actividadQRS = ActividadQrsModelo::agregar_ActividadQrs_modelo($datos_actividadQRS_registro);
           
            if($agregar_actividadQRS->rowCount()==1){
               
               $alerta=[
                  "Alerta"=>"Limpiar",
                  "Titulo"=>"Caso registrado",
                  "Texto"=>"Se registro los datos correctamente",
                  "Tipo"=>"success"
               ];
            }else {
         
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos podido registrar el caso",
                  "Tipo"=>"error"
               ];
            }
            
            echo json_encode($alerta);
      } // fin del controlador 


     


      /*controlador listar actividades All*/
      public function listar_ActividadQrsAll_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAll_modelo();
         return $datos;
      } // fin del controlador 

      
       /*controlador listar actividades pendientes All*/
      public function listar_ActividadQrsPendientesAll_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsPendientesAll_modelo();
         return $datos;
      } // fin del controlador 

      /*controlador listar actividadespendientes cpn codigo correspondiente*/
      public function listar_ActividadQrsPendientes_controlador() 
      {
      	$codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
        $datos=ActividadQrsModelo::listar_ActividadQrsPendientes_modelo($codigo);
         return $datos;
        
      } // fin del controlador 

      public function listar_ActividadQrsU_controlador()
      {
      	$codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
        $datos=ActividadQrsModelo::listar_ActividadQrsU_modelo($codigo);
         return $datos;
        
      } // fin del controlador 
      
      /*controlador listar actividadespendientes cpn codigo correspondiente*/
      public function listar_ActividadQrsAtendidasU_controlador()
      {
      	$codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
        $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasU_modelo($codigo);
         return $datos;
        
      } // fin del controlador 


      /*controlador listar actividades pendientes All*/
      public function listar_ActividadQrsAtendidasAll_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasAll_modelo();
         return $datos;
      } // fin del controlador 

      
      public function generarexcelActividadQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                                <th>Estado</th> 
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                                 <td>'.$row["ACTestado"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesQrsALL.xls');
          echo $output;
         
              }
 public function generarexcelActividades_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportar']);
        $datos=ActividadQrsModelo::listar_ActividadQrsU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesQRS.xls');
          echo $output;
         
              }
    public function generarexcelActividadPendientesQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsPendientesAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesPendientesGeneral.xls');
          echo $output;
         
              }


    public function generarexcelActividadAtendidasQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesAtentidasAGeneral.xls');
          echo $output;
         
              }
  public function generarexcelActividadPendientesQRS_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarActividadesPendientes']);
        $datos=ActividadQrsModelo::listar_ActividadQrsPendientes_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesPendientes.xls');
          echo $output;
         
              }

              public function generarexcelActividadAtendidasQRS_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarActividadesAtendidas']);
        $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesAtendidas.xls');
          echo $output;
         
              }


              //probar pdf

              
      public function generarpdfActividadQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                                <th>Estado</th> 
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                                 <td>'.$row["ACTestado"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/pdf');
          header('Content-Disposition: attachment; filename=ActividadesQrsALL.pdf');
          echo $output;
         
              }
 public function generarpdfActividades_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportar']);
        $datos=ActividadQrsModelo::listar_ActividadQrsU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/pdf');
          header('Content-Disposition: attachment; filename=ActividadesQRS.pdf');
          echo $output;
         
              }
    public function generarpdfActividadPendientesQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsPendientesAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          //header('Content-Type: application/pdf');
          header('Content-Type: application/pdf; charset=utf-8');
          header('Content-Disposition: attachment; filename=ActividadesPendientesGeneral.pdf');
          header('Content-Transfer-Encoding:binary');
         
          echo $output;
         
              }


    public function generarpdfActividadAtendidasQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          } 
          $output .= '</table>';
          header('Content-Type: application/pdf');
          header('Content-Disposition: attachment; filename=ActividadesAtentidasAGeneral.pdf');
          
          echo $output;
         
              }
  public function generarpdfActividadPendientesQRS_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarActividadesPendientes']);
        $datos=ActividadQrsModelo::listar_ActividadQrsPendientes_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/pdf');
          header('Content-Disposition: attachment; filename=ActividadesPendientes.pdf');
          echo $output;
         
              }

              public function generarpdfActividadAtendidasQRS_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarActividadesAtendidas']);
        $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/pdf');
          header('Content-Disposition: attachment; filename=ActividadesAtendidas.pdf');
          echo $output;
         
              }

              //fin del probar pdf

/*mostrar datos detallados de actividades QRS pendientes ALL */
      public function Ver_ActividadesQrs_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
         $datos=ActividadQrsModelo::Ver_actividadesQrs_Modelo($codigo);
         return $datos;

      } // fin del controlador

/*mostrar datos detallados de actividades QRS pendientes ALL */
      public function Ver_ActividadesQrsPendientesALL_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
         $datos=ActividadQrsModelo::Ver_actividadesQrsPendientesAll_Modelo($codigo);
         return $datos;

      } // fin del controlador 

/*mostrar datos detallados de actividades QRS pendientes Personal */
      public function Ver_ActividadesQrsPendientes_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigoUsuario=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
         $datos=ActividadQrsModelo::Ver_actividadesQrsPendientes_Modelo($codigo,$codigoUsuario);
         return $datos;

      } // fin del controlador 
      /*mostrar datos detallados de actividades QRS atendidas Personal */
      public function Ver_ActividadesQrsAtendidas_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigoUsuario=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
         $datos=ActividadQrsModelo::Ver_actividadesQrsAtendidas_Modelo($codigo,$codigoUsuario);
         return $datos;

      } // fin del controlador 


      //probar word

              
      public function generarwordActividadQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="3">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                                <th>Estado</th> 
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                                 <td>'.$row["ACTestado"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/doc');
          header('Content-Disposition: attachment; filename=ActividadesQrsALL.doc');
          echo $output;
         
              }
 public function generarwordActividades_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportar']);
        $datos=ActividadQrsModelo::listar_ActividadQrsU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/doc');
          header('Content-Disposition: attachment; filename=ActividadesQRS.doc');
          echo $output;
         
              }
    public function generarwordActividadPendientesQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsPendientesAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          //header('Content-Type: application/pdf');
          header('Content-Type: application/doc; charset=utf-8');
          header('Content-Disposition: attachment; filename=ActividadesPendientesGeneral.doc');
          header('Content-Transfer-Encoding:binary');
         
          echo $output;
         
              }


    public function generarwordActividadAtendidasQRSALL_Controlador()
      {
        $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasAll_modelo();
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          } 
          $output .= '</table>';
          header('Content-Type: application/doc');
          header('Content-Disposition: attachment; filename=ActividadesAtentidasAGeneral.doc');
          
          echo $output;
         
              }
  public function generarwordActividadPendientesQRS_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarActividadesPendientes']);
        $datos=ActividadQrsModelo::listar_ActividadQrsPendientes_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/doc');
          header('Content-Disposition: attachment; filename=ActividadesPendientes.doc');
          echo $output;
         
              }

              public function generarwordActividadAtendidasQRS_Controlador()
      {
        $output = '';
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarActividadesAtendidas']);
        $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table class="table" bordered="1">  
                            <tr>  
                                 <th>Item</th>
                                <th>Tipo</th>
                                <th>Caso</th>
                                <th>Tipo Emisor</th>
                                <th>Personal UptVirtual (Destinatario)</th>
                                <th>Codigo</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripcion</th>
                                <th>Celular</th>
                                <th>CorreoElectronico</th>
                                <th>Fecha</th>
                            </tr>
          ';
          foreach($datos as $row){  
           $output .= '
            <tr>  
                                 <td>'.$count++.'</td> 
                                 <td>'.$row["TIPnombre"].'</td>
                                 <td>'.$row["CASnombre"].'</td>
                                 <td>'.$row["TIUnombre"].'</td>
                                 <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                 <td>'.$row["ACTcodigoUPT"].'</td>  
                                 <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'</td> 
                                 <td>'.$row["ACTDescripcion"].'</td>  
                                 <td>'.$row["ACTcelular"].'</td> 
                                 <td>'.$row["ACTcorreoelectronico"].'</td>  
                                 <td>'.$row["ACTfecha"].'</td>
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/doc');
          header('Content-Disposition: attachment; filename=ActividadesAtendidas.doc');
          echo $output;
         
              }

              //fin del word

/*controlador editar Actividad QRS*/
      public function Editar_ActividadQRS_controlador()
      {
        //recuperar el codigo
      
    $codigo=modeloPrincipal::limpiar_cadena($_POST['ActividadQRS_codigo_up']);

           //comprobar caso en la base de datos
        $check_ActividadQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevactpactividadqrs WHERE ACTcodigo='$codigo'");

        if($check_ActividadQRS->rowCount()<=0){
            $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos encontrado la ActividadQRS en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
        }else
        {
          $campos=$check_ActividadQRS->fetch();
        }


            $personal=modeloPrincipal::limpiar_cadena($_POST['personal_up']);
            $tipo=modeloPrincipal::limpiar_cadena($_POST['tipo_up']);
            $caso=modeloPrincipal::limpiar_cadena($_POST['caso_up']);
            $tipoemisor=modeloPrincipal::limpiar_cadena($_POST['tipousuario_up']);
            $codigoUPT=modeloPrincipal::limpiar_cadena($_POST['codigo_up']);
            $nombres=modeloPrincipal::limpiar_cadena($_POST['ACTnombres_up']);
            $apellidos=modeloPrincipal::limpiar_cadena($_POST['ACTapellidos_up']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['ACTdescripcion_up']);
            $celular=modeloPrincipal::limpiar_cadena($_POST['ACTcelular_up']);
            $correoElectronico=modeloPrincipal::limpiar_cadena($_POST['ACTcorreoElectronico_up']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['ACTfecha_up']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['ACTestado_up']);


 //comprobar campos vacios
            if($nombres=="" || $apellidos=="" || $descripcion=="" || $celular==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }   


            $datos_actividadQRS_update=[
              "TIPcodigo"=>$tipo,
               "CAScodigo"=>$caso,
               "TIUcodigo"=>$tipoemisor,
               "UPUcodigo"=>$personal,
               "ACTcodigoUPT"=>$codigoUPT,
               "ACTnombres"=>$nombres,
               "ACTapellidos"=>$apellidos,
               "ACTDescripcion"=>$descripcion,
               "ACTcelular"=>$celular,
               "ACTcorreoelectronico"=>$correoElectronico,
               "ACTfecha"=>$fecha,
               "ACTestado"=>$estado,
               "CODIGO"=>$codigo
            ];

         if(ActividadQrsModelo::Editar_ActividadQRS_Modelo($datos_actividadQRS_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Actividad QRS Actualizado",
                  "Texto"=>"los datos se actualizaron correctamente",
                  "Tipo"=>"success"
               ];
            }else{
              $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"no hemos podido actualizar los datos, por favor intente nuevamente",
                  "Tipo"=>"error"
               ];
               
            }
      
          echo json_encode($alerta);

      } // fin del controlador 


     }
