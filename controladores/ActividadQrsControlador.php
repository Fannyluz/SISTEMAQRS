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
      
     }