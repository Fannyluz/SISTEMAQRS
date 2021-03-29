<?php
     
     if($peticionAjax){
        require_once "../modelos/PersonalModelo.php";
     }else{
        require_once "./modelos/PersonalModelo.php";
     }
  class PersonalControlador extends PersonalModelo{
      
           /*--- controlador agregar personal--*/
           public function agregar_personal_controlador(){ 

            $rolpersonal=modeloPrincipal::limpiar_cadena($_POST['rol_nombre_reg']);
            $dni=modeloPrincipal::limpiar_cadena($_POST['personal_dni_reg']);
            $nombre=modeloPrincipal::limpiar_cadena($_POST['personal_nombre_reg']);
            $apellido=modeloPrincipal::limpiar_cadena($_POST['personal_apellido_reg']);

           $imagen=modeloPrincipal::limpiar_cadena('personal_foto_reg');
            $foto=$_FILES[$imagen]['name'];
            $ruta=($_FILES[$imagen]['tmp_name']);
            $destino="../imagenes/".$foto; 
            copy($ruta,$destino);


            $correo=modeloPrincipal::limpiar_cadena($_POST['personal_correo_reg']);
            $celular=modeloPrincipal::limpiar_cadena($_POST['personal_celular_reg']);
            $direccion=modeloPrincipal::limpiar_cadena($_POST['personal_direccion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['personal_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['personal_estado_reg']);
            
          //comprobar campos vacios
            if($dni=="" || $nombre=="" || $apellido=="" || $celular=="" || $fecha=="" || $estado==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }     
            

            $datos_personal_registro=[
               "ROPcodigo"=>$rolpersonal,
               "PEUDNI"=>$dni,
               "PEUnombres"=>$nombre,
               "PEUapellidos"=>$apellido,
               "PEUfoto"=>$foto,
               "PEUcorreoElectronico"=>$correo,
               "PEUcelular"=>$celular,
               "PEUdireccion"=>$direccion,
               "PEUfecha"=>$fecha,
               "PEUestado"=>$estado
            ];


            $agregar_personal = PersonalModelo::agregar_personal_modelo($datos_personal_registro);
           
            if($agregar_personal->rowCount()==1){
               
               $alerta=[
                  "Alerta"=>"Limpiar",
                  "Titulo"=>"Personal registrado",
                  "Texto"=>"Se registro los datos correctamente",
                  "Tipo"=>"success"
               ];
              
            }else {
         
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos podido registrar el Personal",
                  "Tipo"=>"error"
               ];
            }
            
            echo json_encode($alerta);
      } // fin del controlador 

      /*controlador listar casos*/
      public function Listar_personal_controlador()
      {
         $datos=PersonalModelo::listar_personal_modelo();
         return $datos;
      } // fin del controlador 

/*controlador listar personal estado=activo*/
      public function Listar_personal_estado_controlador()
      {
         $datos=PersonalModelo::listar_personal_Estado_modelo();
         return $datos;
      } // fin del controlador 



       /*controlador eliminar casos*/
      public function Eliminar_personal_controlador()
      {
        // recibiendo el codigo del caso
      
         $codigo=modeloPrincipal::limpiar_cadena($_POST['personal_codigo_del']);

         // recibiendo el caso 
         if($codigo==1){
          $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No podemos eliminar el personal principal del sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
         }
         // comprobar el personal en BD
         $check_personal=modeloPrincipal::ejecutar_consulta_simple("SELECT PEUcodigo FROM oevpeutpersonaluptvirtual WHERE PEUcodigo='$codigo'");


         if($check_personal->rowCount()<=0)
         {
           $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"El personal que intenta eliminar no existe en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();

         }
         
         // comprobar el personal en la tabla actividad QRS -BD
         $check_personal_actividadQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT PEUcodigo FROM oevuputusuariopersonaluptvirtual WHERE PEUcodigo='$codigo' LIMIT 1");


         if($check_personal_actividadQRS->rowCount()>0)
         {
           $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No podemos eliminar el personal, debido a que cuenta con su usuario, recomendamos deshabilitar el personal si ya no sera usado en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();

         }

        //eliminar caso
         $eliminar_personal=PersonalModelo::eliminar_personal_modelo($codigo);
         if($eliminar_personal->rowCount()==1){
            $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Personal eliminado",
                  "Texto"=>"el personal ha sido eliminado del sistema exitosamente",
                  "Tipo"=>"success"
               ];
         }else{
          $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos podido eliminar el personal, por favor intente nuevamente",
                  "Tipo"=>"error"
               ];

         }
         echo json_encode($alerta);
      } // fin del controlador 


/*controlador ver  personal*/
      public function Ver_personal_controlador($codigo)
      {
         $codigo=modeloPrincipal::limpiar_cadena($codigo);
         $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=PersonalModelo::Veer_personal_Modelo($codigodesencriptado); 
         return $datos;

      } // fin del controlador

      /*controlador ver  perfil*/
      public function Ver_perfil_controlador($codigo)
      {
         $codigo=$_SESSION['personal_spm'];
         $codigo=modeloPrincipal::limpiar_cadena($codigo);

         $datos=PersonalModelo::Veer_perfil_Modelo($codigo);
         return $datos;

      } // fin del controlador
      
     /*controlador editar personal*/
     public function Editar_personal_controlador()
     {
       //recuperar el codigo
     
        $codigo=modeloPrincipal::limpiar_cadena($_POST['personal_codigo_up']);
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
          //comprobar caso en la base de datos
       $check_casos=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevpeutpersonaluptvirtual WHERE PEUcodigo='$codigodesencriptado'");

       if($check_casos->rowCount()<=0){
           $alerta=[
                 "Alerta"=>"simple",
                 "Titulo"=>"Ocurrio un error inesperado",
                 "Texto"=>"No hemos encontrado el personal en el sistema",
                 "Tipo"=>"error"
              ];
              echo json_encode($alerta);
              exit();
       }else
       {
         $campos=$check_casos->fetch();
       }

       $rolpersonal=modeloPrincipal::limpiar_cadena($_POST['rol_nombre_up']);
       $dni=modeloPrincipal::limpiar_cadena($_POST['personal_dni_up']);
       $nombre=modeloPrincipal::limpiar_cadena($_POST['personal_nombre_up']);
       $apellido=modeloPrincipal::limpiar_cadena($_POST['personal_apellido_up']);

           $imagen=modeloPrincipal::limpiar_cadena('personal_foto_reg');
            $foto=$_FILES[$imagen]['name'];
            $ruta=trim ($_FILES[$imagen]['tmp_name']);
            $destino="../imagenes/".$foto; 
            copy($ruta,$destino);

       $correo=modeloPrincipal::limpiar_cadena($_POST['personal_correo_up']);
       $celular=modeloPrincipal::limpiar_cadena($_POST['personal_celular_up']);
       $direccion=modeloPrincipal::limpiar_cadena($_POST['personal_direccion_up']);
       $fecha=modeloPrincipal::limpiar_cadena($_POST['personal_fecha_up']);
       $estado=modeloPrincipal::limpiar_cadena($_POST['personal_estado_up']);

//comprobar campos vacios
           if($nombre==""){
              $alerta=[
                 "Alerta"=>"simple",
                 "Titulo"=>"Ocurrio un error inesperado",
                 "Texto"=>"No has llenado todos los campos obligatorios",
                 "Tipo"=>"error"
              ];
              echo json_encode($alerta);

              exit();
           } 



           $datos_personal_update=[
            "ROPcodigo"=>$rolpersonal,
            "PEUDNI"=>$dni,
            "PEUnombres"=>$nombre,
            "PEUapellidos"=>$apellido,
            "PEUfoto"=>$ruta,
            "PEUcorreoElectronico"=>$correo,
            "PEUcelular"=>$celular,
            "PEUdireccion"=>$direccion,
            "PEUfecha"=>$fecha,
            "PEUestado"=>$estado,
            "CODIGO"=>$codigodesencriptado
           ];

        if(PersonalModelo::Editar_Personal_Modelo($datos_personal_update)){
         $alerta=[
                 "Alerta"=>"recargar",
                 "Titulo"=>"Personal Actualizado",
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