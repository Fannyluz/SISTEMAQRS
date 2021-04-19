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
            $facultad=modeloPrincipal::limpiar_cadena($_POST['ACTfacultad_reg']);
            $nombres=modeloPrincipal::limpiar_cadena($_POST['ACTnombres_reg']);
            $apellidos=modeloPrincipal::limpiar_cadena($_POST['ACTapellidos_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['ACTdescripcion_reg']);
            $celular=modeloPrincipal::limpiar_cadena($_POST['ACTcelular_reg']);
            $correoElectronico=modeloPrincipal::limpiar_cadena($_POST['ACTcorreoElectronico_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['ACTfecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['ACTestado_reg']);
            $acciones=modeloPrincipal::limpiar_cadena($_POST['ACTacciones_reg']);

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

            if($correoElectronico!="")
            {
              if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $correoElectronico)){
                $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"El correo es invalido",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }
            }
            
            

            $datos_actividadQRS_registro=[
               "TIPcodigo"=>$tipo,
               "CAScodigo"=>$caso,
               "TIUcodigo"=>$tipoemisor,
               "UPUcodigo"=>$personal,
               "ACTcodigoUPT"=>$codigoUPT,
               "ACTfacultad"=>$facultad,
               "ACTnombres"=>$nombres,
               "ACTapellidos"=>$apellidos,
               "ACTDescripcion"=>$descripcion,
               "ACTcelular"=>$celular,
               "ACTcorreoelectronico"=>$correoElectronico,
               "ACTfecha"=>$fecha,
               "ACTestado"=>$estado,
               "ACTacciones"=>$acciones
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
/* probar buscar*/
public function Buscar_ActividadQRS_controlador($codigo){
  $codigo=modeloPrincipal::limpiar_cadena($_POST['caso_buscar']);
  $datos=ActividadQrsModelo::listar_ActividadQrsAlll_modelo($codigo);
         return $datos;
}

/*fin del probar*/

     /*controlador listar actividades select All*/
     public function listar_ActividadQrsAlll_controlador()
     {
      $codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
        $datos=ActividadQrsModelo::listar_ActividadQrsAlll_modelo($codigo);
        return $datos;
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
         $datos=ActividadQrsModelo::listar_ActividadesQrsAtendidasAll_modelo();
         return $datos;
      } // fin del controlador 

       /*controlador listar actividades pendientes All*/ 
      public function listar_ActividadQrsAtend_controlador() 
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasAl_modelo();
         return $datos;
      } // fin del controlador 

       
      public function Listar_excel() 
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasAll_modelo();
         return $datos;
      } // fin del controlador 



      public function generarexcelActividadQRSALL_Controlador()
      {
        $output = '';
        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscarvivo']);
       $datos=ActividadQrsModelo::listar_ActividadQrsTODO_modelo($buscarPersonal);
        $count=1;
       
          $output .= '
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '</tr>
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
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarExcelActividades']);
        $datos=ActividadQrsModelo::listar_ActividadQrsU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
          <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '</tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesQRS_U.xls');
          echo $output;
         
              }
  

    public function generarexcelActividadPendientesQRSALL_Controlador()
      {
        $output = '';

        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscarvivo']);
       $datos=ActividadQrsModelo::listar_ActividadQrsPendientes_modelo($buscarPersonal);
        $count=1;
          $output .= '
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '</tr>
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

        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscaratendido']);
       $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasU_modelo($buscarPersonal);
        $count=1;
       
          $output .= '
         <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '</tr>
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
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarExcelActividadesPendientes']);
        $datos=ActividadQrsModelo::listar_ActividadQrsPendientes_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
          <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '</tr>
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
         $codigo=modeloPrincipal::limpiar_cadena($_POST['exportarExcelActividadesAtendidas']);
        $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasU_modelo($codigo);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '</tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesAtendidas.xls');
          echo $output;
         
              }


              //probar pdf

  
/*mostrar datos detallados de actividades QRS pendientes ALL */
      public function Ver_ActividadesQrs_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=ActividadQrsModelo::Ver_actividadesQrs_Modelo($codigodesencriptado);
         return $datos;

      } // fin del controlador

/*mostrar datos detallados de actividades QRS pendientes ALL */
      public function Ver_ActividadesQrsPendientesALL_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=ActividadQrsModelo::Ver_actividadesQrsPendientesAll_Modelo($codigodesencriptado);
         return $datos;

      } // fin del controlador 
      /*mostrar datos detallados de actividades QRS atendidas ALL */
      public function Ver_ActividadesQrsAtendidasALL_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);  
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=ActividadQrsModelo::Ver_actividadesQrsAtendidasAll_Modelo($codigodesencriptado);
         return $datos;

      } 
      // fin del controlador 

/*mostrar datos detallados de actividades QRS pendientes Personal */
      public function Ver_ActividadesQrsPendientes_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigoUsuario=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=ActividadQrsModelo::Ver_actividadesQrsPendientes_Modelo($codigodesencriptado,$codigoUsuario);
         return $datos;

      } // fin del controlador 
      /*mostrar datos detallados de actividades QRS atendidas Personal */
      public function Ver_ActividadesQrsAtendidas_controlador($codigo)
      {      
         $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigoUsuario=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=ActividadQrsModelo::Ver_actividadesQrsPendientes_Modelo($codigodesencriptado,$codigoUsuario);
         return $datos;


      } // fin del controlador 


      //probar word

              
      public function generarwordActividadQRSALL_Controlador()
      {
        $output = '';
       $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscarvivo']);
       $datos=ActividadQrsModelo::listar_ActividadQrsTODO_modelo($buscarPersonal);
        $count=1;
        $nuevoestado="Activo";
       
          $output .= '
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '
                            </tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/doc; boundary=something'); 
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
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '
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
        $count=1;
        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscarvivo']);
        $datos=ActividadQrsModelo::listar_ActividadQrsPendientes_modelo($buscarPersonal);

         $output .= '
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '
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
        $count=1;
        $buscarPersonal=modeloPrincipal::limpiar_cadena($_POST['buscaratendido']);
        $datos=ActividadQrsModelo::listar_ActividadQrsAtendidasU_modelo($buscarPersonal);

          $output .= '
          <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '
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
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '
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
           <table id="datatable" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="13" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Correo Electronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Acciones</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                 <td>'.$row["ACTacciones"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '
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
$codigodesencriptado=modeloPrincipal::decryption($codigo);
           //comprobar caso en la base de datos
        $check_ActividadQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevactpactividadqrs WHERE ACTcodigo='$codigodesencriptado'");

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
            $acciones=modeloPrincipal::limpiar_cadena($_POST['ACTacciones_up']);


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
               "ACTacciones"=>$acciones,
               "CODIGO"=>$codigodesencriptado
            ];

         if(ActividadQrsModelo::Editar_ActividadQRS_Modelo($datos_actividadQRS_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Caso Actualizado",
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

       //probar con el formulario de info/////////////////////////
       public function Editar_ActividadQRS_info_controlador()
       {
         //recuperar el codigo
       
     $codigo=modeloPrincipal::limpiar_cadena($_POST['ActividadQRS_codigo_up_info']);
 $codigodesencriptado=modeloPrincipal::decryption($codigo);
            //comprobar caso en la base de datos
         $check_ActividadQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevactpactividadqrs WHERE ACTcodigo='$codigodesencriptado'");
 
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
 
             $fecha=modeloPrincipal::limpiar_cadena($_POST['ACTfecha_up']);
             $estado=modeloPrincipal::limpiar_cadena($_POST['ACTestado_up']);
             $acciones=modeloPrincipal::limpiar_cadena($_POST['ACTacciones_up']);
 
  //comprobar campos vacios
             if($acciones==""){
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
               
                "ACTfecha"=>$fecha,
                "ACTestado"=>$estado,
                "ACTacciones"=>$acciones,
                "CODIGO"=>$codigodesencriptado
             ];
 
          if(ActividadQrsModelo::Editar_ActividadQRS_Info_Modelo($datos_actividadQRS_update)){
           $alerta=[
                   "Alerta"=>"recargar",
                   "Titulo"=>"Caso Actualizado",
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
       ///////////////////////////////////////////////////////
       
/*controlador listar actividades All reporte por casos*/
      public function listar_ActividadQrsAll_ReporteComparativo_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadesPendientesQrsAll_ReporteComparativo_modelo();
         return $datos;
      } // fin del controlador 


public function ListaActualActividadesAll()
    {
     

      } // fin del controlador 



















/*controlador listar actividades POR CASO PARA EL JEFE  reporte por casos*/
      public function listar_ActividadQrsAll_Reporte_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAll_ReporteCaso_modelo();
         return $datos;
      } // fin del controlador 
/*controlador listar actividades POR CASO PARA CADA PERSONAL reporte por casos*/
      public function listar_ActividadQrs_Reporte_controlador()
      {
        $codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
        $datos=ActividadQrsModelo::listar_ActividadQrs_ReporteCaso_modelo($codigo);
         return $datos;
      } // fin del controlador

/*controlador listar actividades atendidas por caso All reporte por casos*/
      public function listar_ActividadQrsAtendidasCasoAll_Reporte_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAtendidosCasoAll_Reporte_modelo();
         return $datos;
      } // fin del controlador 

/*controlador listar actividades atendidas por caso para cada personal -reporte por casos*/
      public function listar_ActividadQrsAtendidasUCaso_Reporte_controlador()
      {
        $codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
         $datos=ActividadQrsModelo::listar_ActividadQrsAtendidosUCaso_Reporte_modelo($codigo);
         return $datos;
      } // fin del controlador 



/*controlador listar actividades All reporte por casos*/
      public function listar_ActividadQrsPendientesCasoAll_Reporte_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsPendientesCasoAll_Reporte_modelo();
         return $datos;
      } // fin del controlador 

/*controlador listar actividades All reporte por casos*/
      public function listar_ActividadQrsPendientesUCaso_Reporte_controlador()
      {
        $codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
         $datos=ActividadQrsModelo::listar_ActividadQrsPendientesUCaso_Reporte_modelo($codigo);
         return $datos;
      } // fin del controlador 

      /*controlador listar reporte por tipo*/
      public function listar_ActividadQrsAll_ReporteTipo_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAll_ReporteTipo_modelo();
         return $datos;
      } // fin del controlador 

      /*controlador listar reporte por tipo para cada personal de la oficina*/
      public function listar_ActividadQrs_ReporteTipo_controlador()
      {
        $codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
         $datos=ActividadQrsModelo::listar_ActividadQrs_ReporteTipo_modelo($codigo);
         return $datos;
      } // fin del controlador 

/*controlador listar actividades All reporte por casos*/
      public function listar_ActividadAtendidasQrsAll_ReporteTipo_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadesAtendidasQrsAll_ReporteTipo_modelo();
         return $datos;
      } // fin del controlador 

      /*controlador listar actividades atendidas por tipo para cada personal de la oficina - reporte por tipo*/
      public function listar_ActividadAtendidasQrsU_ReporteTipo_controlador()
      {
        $codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
         $datos=ActividadQrsModelo::listar_ActividadesAtendidasQrsU_ReporteTipo_modelo($codigo);
         return $datos;
      } // fin del controlador 
/*controlador listar actividades All reporte por casos*/
      public function listar_ActividadPendientesQrsAll_ReporteTipo_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadesPendientesQrsAll_ReporteTipo_modelo();
         return $datos;
      } // fin del controlador 
////aquiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii

      public function buscar_cliente_prestamo_controlador(){
        /* recuperar el select que estamos enviando */
        $count=1;
        $cliente =modeloPrincipal::limpiar_cadena($_POST['buscar_cliente']);

        if($cliente=="vacia"){
          /* seleccionando clientes en la bd */
          $datos_cliente=modeloPrincipal::ejecutar_consulta_simple("SELECT *  FROM oevactpactividadqrs AS act
            INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
            INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
            INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
            INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
            INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo ORDER BY ACTfecha DESC");

            if($datos_cliente->rowCount()>=1){
              $datos_cliente=$datos_cliente->fetchAll();

              $output='<table class="table table-bordered border-warning" style="width:100%" bordered="1">  
                               <tr class="tr-primary" style="background-color:#10226a;color:white;"> 
                                    <th>Item</th>
                                   <th>Tipo</th>
                                   <th>Caso</th>
                                   
                                   <th>Personal UptVirtual (Destinatario)</th>
                                   
                                   <th>Nombres y Apellidos</th>
                                   <th>Descripcion</th>
                                   <th>Celular</th>
                                   <th>Fecha</th>
                                   <th>Estado</th> 
                                   <th>Acciones</th> 
                               </tr>
             ';
             foreach($datos_cliente as $row){  
              $output .= '
               <tr>  
                                    <td>'.$count++.'</td> 
                                    <td>'.$row["TIPnombre"].'</td>
                                    <td>'.$row["CASnombre"].'</td>
                                    
                                    <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                     
                                     <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'('.$row["TIUnombre"].')</td> 
                                    <td>'.$row["ACTDescripcion"].'</td>  
                                    <td>'.$row["ACTcelular"].'</td>   
                                    <td>'.$row["ACTfecha"].'</td>';
                             
                             if($row["ACTestado"]==1)
                             {
                               $output.='<td><label class="badge bg-warning" style="background-color:#10226a;color:white;">Pendiente</label></td>';
                             }else if($row["ACTestado"]==2)
                             {
                               $output.='<td><label class="badge bg-success" style="background-color:#10226a;color:white;">Atendido</label></td>';
                             }else
                             {
                               $output.='<td><label class="badge bg-danger" style="background-color:#10226a;color:white;">Rechazado</label></td>';
                             }
                             $output.='<td></a>
                              <a href="'.SERVERURL.'ver-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                         </a>
                         <a href="'.SERVERURL.'editar-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                         </a> </td>';
                             
                             '
                               </tr>
                               
              ';
                              

              }
              $output.='</tbody></table></div>';
                    return $output;
            }
            else
            {
              return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                <i class="fa fa-exclamation-triangle fa-2x"></i><br>
                No hemos encontrado ningun cliente que coincida <strong>"'.$cliente.'"</strong>
                </p>
                </div>';
                exit();
            }
        
        }
        else
        {

            /* seleccionando clientes en la bd */
            $datos_cliente=modeloPrincipal::ejecutar_consulta_simple("SELECT *  FROM oevactpactividadqrs AS act 
            INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
            INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
            INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
            INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
            INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
            WHERE act.UPUcodigo LIKE'%$cliente%' ORDER BY act.UPUcodigo ASC");

            if($datos_cliente->rowCount()>=1){
              $datos_cliente=$datos_cliente->fetchAll();

              $output='<table class="table table-bordered border-warning" style="width:100%" bordered="1">  
                               <tr class="tr-primary" style="background-color:#10226a;color:white;"> 
                                    <th>Item</th>
                                   <th>Tipo</th>
                                   <th>Caso</th>
                                   
                                   <th>Personal UptVirtual (Destinatario)</th>
                                   
                                   <th>Nombres y Apellidos</th>
                                   <th>Descripcion</th>
                                   <th>Celular</th>
                                   <th>Fecha</th>
                                   <th>Estado</th> 
                                   <th>Acciones</th> 
                               </tr>
             ';
             foreach($datos_cliente as $row){  
              $output .= '
               <tr>  
                                    <td>'.$count++.'</td> 
                                    <td>'.$row["TIPnombre"].'</td>
                                    <td>'.$row["CASnombre"].'</td>
                                    
                                    <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                    
                                    <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'('.$row["TIUnombre"].')</td> 
                                    <td>'.$row["ACTDescripcion"].'</td>  
                                    <td>'.$row["ACTcelular"].'</td>  
                                    <td>'.$row["ACTfecha"].'</td>';
                             
                             if($row["ACTestado"]==1)
                             {
                               $output.='<td><label class="badge bg-warning" style="background-color:#10226a;color:white;">Pendiente</label></td>';
                             }else if($row["ACTestado"]==2)
                             {
                               $output.='<td><label class="badge bg-success" style="background-color:#10226a;color:white;">Atendido</label></td>';
                             }else
                             {
                               $output.='<td><label class="badge bg-danger" style="background-color:#10226a;color:white;">Rechazado</label></td>';
                             }
                             $output.='<td></a>
                              <a href="'.SERVERURL.'ver-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                         </a>
                         <a href="'.SERVERURL.'editar-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                         </a> </td>';
                             
                             '
                               </tr>
                               
              ';
                              

            }
                  $output.='</tbody></table></div>';
                  return $output;
            }else{
              return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                <i class="fa fa-exclamation-triangle fa-2x"></i><br>
                No hemos encontrado ningun cliente que coincida <strong>"'.$cliente.'"</strong>
                </p>
                </div>';
                exit();
            }

         }
                  
        
        }

//excel
        public function buscar_cliente_prestamoEXCEL_controlador(){
        /* recuperar el select que estamos enviando */
       $output = '';
       $datos=ActividadQrsModelo::listar_ActividadQrsAll_modelo();
        $count=1;
        $nuevoestado="Activo";
        if($nuevoestado==1)
        {

        }
       
          $output .= '
           <table id="datatable1" class="table table-bordered border-warning" style="width:100%"> 
           <tr>
           <td colspan="12" bgcolor="Yellow"><center><strong>REPORTE DE ACTIVIDADES</strong></center>
           </td>
           <td> </td>
           </tr>
                            <tr colspan="12" class="tr-primary">  
                                 <th colspan="1" style="background-color:#10226a;color:white;">Item</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Caso</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Tipo Emisor</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Personal UptVirtual (Destinatario)</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Codigo</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Nombres y Apellidos</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Descripcion</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Celular</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">CorreoElectronico</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Fecha</th>
                                <th colspan="1" style="background-color:#10226a;color:white;">Estado</th> 
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
                                <td>'.$row["ACTfecha"].'</td>';
                          
                          if($row["ACTestado"]==1)
                          {
                            $output.='<td>Pendiente</td>';
                          }else if($row["ACTestado"]==2)
                          {
                            $output.='<td>Atendido</td>';
                          }else
                          {
                            $output.='<td>Rechazado</td>';
                          }

                          '</tr>
           ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=ActividadesQrsALL.xls');
          echo $output;
         
        }


public function buscar_actividadesAtendidosPorPersonal__controlador(){
        /* recuperar el select que estamos enviando */
        $count=1;
        $cliente =modeloPrincipal::limpiar_cadena($_POST['buscar_atendidos']);

        if($cliente=="vacia"){
          /* seleccionando clientes en la bd */
          $datos_cliente=modeloPrincipal::ejecutar_consulta_simple("SELECT *  FROM oevactpactividadqrs AS act
            INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
            INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
            INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
            INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
            INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=2 ORDER BY ACTfecha DESC");

            if($datos_cliente->rowCount()>=1){
              $datos_cliente=$datos_cliente->fetchAll();

              $output='<table class="table table-bordered border-warning" style="width:100%" bordered="1">  
                               <tr class="tr-primary" style="background-color:#10226a;color:white;"> 
                                    <th>Item</th>
                                   <th>Tipo</th>
                                   <th>Caso</th>
                                   
                                   <th>Personal UptVirtual (Destinatario)</th>
                                   
                                   <th>Nombres y Apellidos</th>
                                   <th>Descripcion</th>
                                   <th>Celular</th>
                                   <th>Fecha</th>
                                   <th>Estado</th> 
                                   <th>Acciones</th> 
                               </tr>
             ';
             foreach($datos_cliente as $row){  
              $output .= '
               <tr>  
                                    <td>'.$count++.'</td> 
                                    <td>'.$row["TIPnombre"].'</td>
                                    <td>'.$row["CASnombre"].'</td>
                                    
                                    <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                    
                                     <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'('.$row["TIUnombre"].')</td> 
                                    <td>'.$row["ACTDescripcion"].'</td>  
                                    <td>'.$row["ACTcelular"].'</td>  
                                    <td>'.$row["ACTfecha"].'</td>';
                             
                             if($row["ACTestado"]==1)
                             {
                               $output.='<td><label class="badge bg-warning" style="background-color:#10226a;color:white;">Pendiente</label></td>';
                             }else if($row["ACTestado"]==2)
                             {
                               $output.='<td><label class="badge bg-success" style="background-color:#10226a;color:white;">Atendido</label></td>';
                             }else
                             {
                               $output.='<td><label class="badge bg-danger" style="background-color:#10226a;color:white;">Rechazado</label></td>';
                             }
                             $output.='<td></a>
                              <a href="'.SERVERURL.'ver-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                         </a>
                         <a href="'.SERVERURL.'editar-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                         </a> </td>';
                             
                             '
                               </tr>
                               
              ';
                              

              }
              $output.='</tbody></table></div>';
                    return $output;
            }
            else
            {
              return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                <i class="fa fa-exclamation-triangle fa-2x"></i><br>
                No hemos encontrado ningun cliente que coincida <strong>"'.$cliente.'"</strong>
                </p>
                </div>';
                exit();
            }
        
        }
        else
        {

            /* seleccionando clientes en la bd */
            $datos_cliente=modeloPrincipal::ejecutar_consulta_simple("SELECT *  FROM oevactpactividadqrs AS act 
            INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
            INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
            INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
            INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
            INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
            WHERE act.ACTestado=2 and act.UPUcodigo LIKE'%$cliente%' ORDER BY act.UPUcodigo ASC");

            if($datos_cliente->rowCount()>=1){
              $datos_cliente=$datos_cliente->fetchAll();

              $output='<table class="table table-bordered border-warning" style="width:100%" bordered="1">  
                               <tr class="tr-primary" style="background-color:#10226a;color:white;"> 
                                    <th>Item</th>
                                   <th>Tipo</th>
                                   <th>Caso</th>
                                   
                                   <th>Personal UptVirtual (Destinatario)</th>
                                   
                                   <th>Nombres y Apellidos</th>
                                   <th>Descripcion</th>
                                   <th>Celular</th>
                                   <th>Fecha</th>
                                   <th>Estado</th> 
                                   <th>Acciones</th> 
                               </tr>
             ';
             foreach($datos_cliente as $row){  
              $output .= '
               <tr>  
                                    <td>'.$count++.'</td> 
                                    <td>'.$row["TIPnombre"].'</td>
                                    <td>'.$row["CASnombre"].'</td>
                                    
                                    <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                                     <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'('.$row["TIUnombre"].')</td> 
                                    <td>'.$row["ACTDescripcion"].'</td>  
                                    <td>'.$row["ACTcelular"].'</td>  
                                    <td>'.$row["ACTfecha"].'</td>';
                             
                             if($row["ACTestado"]==1)
                             {
                               $output.='<td><label class="badge bg-warning" style="background-color:#10226a;color:white;">Pendiente</label></td>';
                             }else if($row["ACTestado"]==2)
                             {
                               $output.='<td><label class="badge bg-success" style="background-color:#10226a;color:white;">Atendido</label></td>';
                             }else
                             {
                               $output.='<td><label class="badge bg-danger" style="background-color:#10226a;color:white;">Rechazado</label></td>';
                             }
                             $output.='<td></a>
                              <a href="'.SERVERURL.'ver-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                         </a>
                         <a href="'.SERVERURL.'editar-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                         </a> </td>';
                             
                             '
                               </tr>
                               
              ';
                              

            }
                  $output.='</tbody></table></div>';
                  return $output;
            }else{
              return '<div class="alert alert-warning" role="alert">
                <p class="text-center mb-0">
                <i class="fa fa-exclamation-triangle fa-2x"></i><br>
                No hemos encontrado ningun cliente que coincida <strong>"'.$cliente.'"</strong>
                </p>
                </div>';
                exit();
            }

         }
                  
        
        }
/*para el controlador de pendientes*/

public function buscar_actividadesPendientesPorPersonal_controlador(){
  /* recuperar el select que estamos enviando */
  $count=1;
  $cliente =modeloPrincipal::limpiar_cadena($_POST['buscar_pendiente']);

  if($cliente=="vacia"){
    /* seleccionando clientes en la bd */
    $datos_cliente=modeloPrincipal::ejecutar_consulta_simple("SELECT *  FROM oevactpactividadqrs AS act
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=1 ORDER BY ACTfecha DESC");

      if($datos_cliente->rowCount()>=1){
        $datos_cliente=$datos_cliente->fetchAll();

        $output='<table class="table table-bordered border-warning" style="width:100%" bordered="1">  
                         <tr class="tr-primary" style="background-color:#10226a;color:white;"> 
                              <th>Item</th>
                             <th>Tipo</th>
                             <th>Caso</th>
                           
                             <th>Personal UptVirtual (Destinatario)</th>
                             
                             <th>Nombres y Apellidos</th>
                             <th>Descripcion</th>
                             <th>Celular</th>
                             <th>Fecha</th>
                             <th>Estado</th> 
                             <th>Acciones</th> 
                         </tr>
       ';
       foreach($datos_cliente as $row){  
        $output .= '
         <tr>  
                              <td>'.$count++.'</td> 
                              <td>'.$row["TIPnombre"].'</td>
                              <td>'.$row["CASnombre"].'</td>
                             
                              <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                               <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'('.$row["TIUnombre"].')</td> 
                              <td>'.$row["ACTDescripcion"].'</td>  
                              <td>'.$row["ACTcelular"].'</td>  
                              <td>'.$row["ACTfecha"].'</td>';
                       
                       if($row["ACTestado"]==1)
                       {
                         $output.='<td><label class="badge bg-warning" style="background-color:#10226a;color:white;">Pendiente</label></td>';
                       }else if($row["ACTestado"]==2)
                       {
                         $output.='<td><label class="badge bg-success" style="background-color:#10226a;color:white;">Atendido</label></td>';
                       }else
                       {
                         $output.='<td><label class="badge bg-danger" style="background-color:#10226a;color:white;">Rechazado</label></td>';
                       }
                       $output.='<td></a>
                        <a href="'.SERVERURL.'ver-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                   </a>
                   <a href="'.SERVERURL.'editar-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                   </a> </td>';
                       
                       '
                         </tr>
                         
        ';
                        

        }
        $output.='</tbody></table></div>';
              return $output;
      }
      else
      {
        return '<div class="alert alert-warning" role="alert">
          <p class="text-center mb-0">
          <i class="fa fa-exclamation-triangle fa-2x"></i><br>
          No hemos encontrado ningun cliente que coincida <strong>"'.$cliente.'"</strong>
          </p>
          </div>';
          exit();
      }
  
  }
  else
  {

      /* seleccionando clientes en la bd */
      $datos_cliente=modeloPrincipal::ejecutar_consulta_simple("SELECT *  FROM oevactpactividadqrs AS act 
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
      WHERE act.ACTestado=1 and act.UPUcodigo LIKE'%$cliente%' ORDER BY act.UPUcodigo ASC");

      if($datos_cliente->rowCount()>=1){
        $datos_cliente=$datos_cliente->fetchAll();

        $output='<table class="table table-bordered border-warning" style="width:100%" bordered="1">  
                         <tr class="tr-primary" style="background-color:#10226a;color:white;"> 
                              <th>Item</th>
                             <th>Tipo</th>
                             <th>Caso</th>
                             
                             <th>Personal UptVirtual (Destinatario)</th>
                             
                             <th>Nombres y Apellidos</th>
                             <th>Descripcion</th>
                             <th>Celular</th>
                             <th>Fecha</th>
                             <th>Estado</th> 
                             <th>Acciones</th> 
                         </tr>
       ';
       foreach($datos_cliente as $row){  
        $output .= '
         <tr>  
                              <td>'.$count++.'</td> 
                              <td>'.$row["TIPnombre"].'</td>
                              <td>'.$row["CASnombre"].'</td>
                              
                              <td>'.$row["PEUnombres"].' '.$row["PEUapellidos"].'</td> 
                              <td>'.$row["ACTnombres"].' '.$row["ACTapellidos"].'('.$row["TIUnombre"].')</td> 
                              <td>'.$row["ACTDescripcion"].'</td>  
                              <td>'.$row["ACTcelular"].'</td> 
                              <td>'.$row["ACTfecha"].'</td>';
                       
                       if($row["ACTestado"]==1)
                       {
                         $output.='<td><label class="badge bg-warning" style="background-color:#10226a;color:white;">Pendiente</label></td>';
                       }else if($row["ACTestado"]==2)
                       {
                         $output.='<td><label class="badge bg-success" style="background-color:#10226a;color:white;">Atendido</label></td>';
                       }else
                       {
                         $output.='<td><label class="badge bg-danger" style="background-color:#10226a;color:white;">Rechazado</label></td>';
                       }
                       $output.='<td></a>
                        <a href="'.SERVERURL.'ver-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-primary btn-sm"><i class="fa fa-eye fa-sm"></i> 
                   </a>
                   <a href="'.SERVERURL.'editar-actividadAll/'.modeloPrincipal::encryption($row['ACTcodigo']).'" class="btn btn-round btn-outline-info btn-sm"><i class="fa fa-pencil fa-sm"></i>
                   </a> </td>';
                       
                       '
                         </tr>
                         
        ';
                        

      }
            $output.='</tbody></table></div>';
            return $output;
      }else{
        return '<div class="alert alert-warning" role="alert">
          <p class="text-center mb-0">
          <i class="fa fa-exclamation-triangle fa-2x"></i><br>
          No hemos encontrado ningun cliente que coincida <strong>"'.$cliente.'"</strong>
          </p>
          </div>';
          exit();
      }

   }
            
  
  }


/*fin*/
/*controlador listar actividades All reporte por casos*/
      public function listar_ActividadPendientesQrsU_ReporteTipo_controlador()
      {
         $codigo=$_SESSION['CodUsuarioPersonalUptVirtual_spm'];
         $datos=ActividadQrsModelo::listar_ActividadesPendientesQrsU_ReporteTipo_modelo($codigo);
         return $datos;
      } // fin del controlador 



      public function listar_ActividadQrsAll_ReportePersonal_controlador()
      {
       
        $datos=ActividadQrsModelo::listar_ActividadQrsAll_ReportePersonalVacio_modelo();
         return $datos;
      } // fin del controlador 







      public function listar_ActividadesAtendidasQrsAll_ReportePersonal_controlador()
      {
        
        $datos=ActividadQrsModelo::listar_ActividadesAtendidasQrsAll_ReportePersonal_modelo();
return $datos;
      } // fin del controlador 
      public function listar_ActividadesPendientesQrsAll_ReportePersonal_controlador()
      {
        
        $datos=ActividadQrsModelo::listar_ActividadesPendientesQrsAll_ReportePersonal_modelo();
return $datos;
      } // fin del controlador 
      




     }
