<?php
     
     if($peticionAjax){
        require_once "../modelos/UsuarioPersonalUptVirtualModelo.php";
     }else{
        require_once "./modelos/UsuarioPersonalUptVirtualModelo.php";
     }
  class UsuarioPersonalUptVirtualControlador extends UsuarioPersonalUptVirtualModelo{
      
           /*--- controlador agregar usuario--*/
           public function agregar_usuariopersonaluptvirtual_controlador(){

            $personaluptvirtual=modeloPrincipal::limpiar_cadena($_POST['personaluptvirtual_reg']);
            $usuario=modeloPrincipal::limpiar_cadena($_POST['usuario_reg']);
            $clave=modeloPrincipal::limpiar_cadena($_POST['clave_reg']);
            $repetirclave=modeloPrincipal::limpiar_cadena($_POST['repetirclave_reg']);
            $palabrasecreta=modeloPrincipal::limpiar_cadena($_POST['PalabraSecreta_reg']);
            $privilegio=modeloPrincipal::limpiar_cadena($_POST['privilegio_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['estado_reg']);
            


            //comprobar campos vacios
            if($usuario=="" || $clave=="" || $repetirclave=="" || $palabrasecreta=="" || $privilegio==""|| $fecha=="" || $estado==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }     
            
//comprobar el nombre
            $check_nombre=modeloPrincipal::ejecutar_consulta_simple("SELECT UPUusuario FROM oevuputusuariopersonaluptvirtual WHERE UPUusuario='$usuario'");
            if($check_nombre->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un usuario registrado con el mismo nombre, por favor registre un usuario diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }

        //comprobar la clave
            if($clave!=$repetirclave)
            {
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"las claves deben ser iguales, por favir ingrese nuevamente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }
          $claveEncriptado=modeloPrincipal::encryption($clave);
            $datos_usuariopersonaluptvirtual_registro=[
               "PEUcodigo"=>$personaluptvirtual,
               "UPUusuario"=>$usuario,
               "UPUclave"=>$claveEncriptado,
               "UPUpalabraSecreta"=>$palabrasecreta,
               "UPUprivilegio"=>$privilegio,
               "UPUfecha"=>$fecha,
               "UPUestado"=>$estado
            ];


            $agregar_usuariopersonaluptvirtual = UsuarioPersonalUptVirtualModelo::agregar_usuariopersonaluptvirtual_modelo($datos_usuariopersonaluptvirtual_registro);
           
            if($agregar_usuariopersonaluptvirtual->rowCount()==1){
               
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

      /*controlador listar casos*/
      public function Listar_usuariopersonaluptvirtual_controlador() 
      {
         $datos=UsuarioPersonalUptVirtualModelo::listar_usuariopersonaluptvirtual_modelo();
         return $datos;
      } // fin del controlador 

   /*controlador listar usuario personal estado=activo*/
      public function Listar_usuariopersonaluptvirtual_estado_controlador() 
      {
         $datos=UsuarioPersonalUptVirtualModelo::listar_usuariopersonaluptvirtual_estado_modelo();
         return $datos;
      } // fin del controlador 


      /*probarrrrrr con fe*/
      public function Listar_usuariopersonaluptvirtual_buscador_controlador() 
      {
         $codigo=$usuario['UPUusuario'];
         $datos=UsuarioPersonalUptVirtualModelo::listar_usuariopersonaluptvirtual_buscador_modelo($codigo);
         return $datos;
      } // fin del controlador 


      /*controlador obtener usuario _codigo para asi poder obtener la informacion para el formario de agregar actividad qrs personal*/
         public function Obtener_usuariopersonaluptvirtual_controlador()
      {
        $codigo=$_SESSION['personal_spm'];
        $datos=UsuarioPersonalUptVirtualModelo::Obtener_usuariopersonaluptvirtual_modelo($codigo);
         return $datos;
        
      } // fin del controlador 

       /*controlador eliminar usuario personal uptvirtual*/
        public function Eliminar_usuariopersonaluptvirtual_ontrolador()
        {
          // recibiendo el codigo del Tipo usuario
        
           $codigo=modeloPrincipal::limpiar_cadena($_POST['usuariopersonaluptvirtual_codigo_del']);
  
           // recibiendo el Tipo usuario 
           if($codigo==1){
            $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No podemos eliminar el tipo usuario principal del sistema",
                    "Tipo"=>"error"
                 ];
                 echo json_encode($alerta);
                 exit();
           }
           // comprobar el Tipo usuario en BD
           $check_usuariopersonaluptvirtual=modeloPrincipal::ejecutar_consulta_simple("SELECT UPUcodigo  FROM oevuputusuariopersonaluptvirtual WHERE UPUcodigo='$codigo'");
           if($check_usuariopersonaluptvirtual->rowCount()<=0)
           {
             $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"El usuario que intenta eliminar no existe en el sistema",
                    "Tipo"=>"error"
                 ];
                 echo json_encode($alerta);
                 exit();
  
           }

           // comprobar el Tipo usuario en las actividades qrs
           $check_usuariopersonaluptvirtual_Actividades=modeloPrincipal::ejecutar_consulta_simple("SELECT UPUcodigo FROM oevactpactividadqrs WHERE UPUcodigo='$codigo' LIMIT 1");
           if($check_usuariopersonaluptvirtual_Actividades->rowCount()>0)
           {
             $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No podemos eliminar el usuario, debido que tiene actividades registrados a su cargo",
                    "Tipo"=>"error"
                 ];
                 echo json_encode($alerta);
                 exit();
  
           }
           
  //eliminar Tipo usuario
           $eliminar_usuariopersonaluptvirtual=UsuarioPersonalUptVirtualModelo::eliminar_usuariopersonaluptvirtual_modelo($codigo);
           if($eliminar_usuariopersonaluptvirtual->rowCount()==1){
              $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Caso eliminado",
                    "Texto"=>"el tipo usuario ha sido eliminado del sistema exitosamente",
                    "Tipo"=>"success"
                 ];
           }else{
            $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No hemos podido eliminar el tipo usuario, por favor intente nuevamente",
                    "Tipo"=>"error"
                 ];
  
           }
           echo json_encode($alerta);
        } // fin del controlador 


        /////////////////////////////////////////////////////////// 
        /*mostrar informacion detallada del usuario personal de la oficina */
      public function CambiarContraseña_usuariopersonaluptvirtual_controlador()
      {
         $codigo=modeloPrincipal::limpiar_cadena($_POST['cambiar_contra_up']);
    $codigodesencriptado=modeloPrincipal::decryption($codigo);
    
           //comprobar caso en la base de datos
        $check_UsuarioPersonalUPTvirtual=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevuputusuariopersonaluptvirtual WHERE UPUcodigo='$codigodesencriptado'");

        if($check_UsuarioPersonalUPTvirtual->rowCount()<=0){
            $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos encontrado ningun usuario personal de UPTvirtual en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
        }else
        {
          $campos=$check_UsuarioPersonalUPTvirtual->fetch();
        }



            $usuario=modeloPrincipal::limpiar_cadena($_POST['usuario_up']);
            $clave=modeloPrincipal::limpiar_cadena($_POST['clave_up']);
            $repetirclave=modeloPrincipal::limpiar_cadena($_POST['repetirclave_up']);
            
            
            

//comprobar campos vacios
            if($usuario=="" || $clave=="" || $repetirclave==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }

//comprobar la longitud de la clave

if(strlen($clave) < 5 || strlen($repetirclave) < 5){
   $alerta=[
      "Alerta"=>"simple",
      "Titulo"=>"Ocurrio un error inesperado",
      "Texto"=>"La nueva contraseña debe tener 5 caracteres como minimo",
      "Tipo"=>"error"
   ];
   echo json_encode($alerta);

   exit();
}
            
//comprobar la clave
            if($clave!=$repetirclave)
            {
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Las contraseñas deben ser iguales, por favor ingrese nuevamente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }




//verificar contraseña

            $check_nombre=modeloPrincipal::ejecutar_consulta_simple("SELECT UPUusuario FROM oevuputusuariopersonaluptvirtual WHERE UPUclave='$clave'");

            if($check_nombre->rowCount()>0){

          
            $datos_UsuarioPersonalUPTvirtual_update=[
                
               "UPUusuario"=>$usuario,
               "UPUclave"=>$clave,
               
               
               
               "CODIGO"=>$codigodesencriptado
            ];

         if(UsuarioPersonalUptVirtualModelo::Cambiar_usuariopersonaluptvirtual_Modelo($datos_UsuarioPersonalUPTvirtual_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Contraseña Usuario personal de UPTvirtual Actualizado",
                  "Texto"=>"La contraseña se actualizó correctamente",
                  "Tipo"=>"success"
               ];
            }else{
              $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos podido actualizar la contraseña, por favor intente nuevamente",
                  "Tipo"=>"error"
               ];
               
            }
      
          echo json_encode($alerta);
               
            }
            else
            {



          $claveEncriptado=modeloPrincipal::encryption($clave);
            $datos_UsuarioPersonalUPTvirtual_update=[
               
               "UPUusuario"=>$usuario,
               "UPUclave"=>$claveEncriptado,
               
               
               
               "CODIGO"=>$codigodesencriptado
            ];

         if(UsuarioPersonalUptVirtualModelo::Cambiar_usuariopersonaluptvirtual_Modelo($datos_UsuarioPersonalUPTvirtual_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Contraseña Usuario personal de UPTvirtual Actualizado",
                  "Texto"=>"La contraseña se actualizó correctamente",
                  "Tipo"=>"success"
               ];
            }else{
              $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos podido actualizar la contraseña, por favor intente nuevamente",
                  "Tipo"=>"error"
               ];
               
            }
      
          echo json_encode($alerta);
          }

      

      } // fin del controlador 
      ////////////////////////////
        
 /////////////////////////////////////////////////////////// 
        /*mostrar informacion detallada del usuario personal de la oficina */
      public function RecuperarContraseña_usuariopersonaluptvirtual_controlador()
      {
         $codigo=modeloPrincipal::limpiar_cadena($_POST['cambiar_contra_upp']);
    $codigodesencriptado=modeloPrincipal::decryption($codigo);
            
            $clave=modeloPrincipal::limpiar_cadena($_POST['clave_up']);
            $repetirclave=modeloPrincipal::limpiar_cadena($_POST['repetirclave_up']);
            
            
            

//comprobar campos vacios
            if($clave=="" || $repetirclave==""){
               echo '<script language="javascript">alert("LLos campos estan vacios");
                window.location.href="'.SERVERURL.'vistas/contenidos/reset.php/"</script>';
   
            }

//comprobar la longitud de la clave

if(strlen($clave) < 5 || strlen($repetirclave) < 5){
   
      echo '<script language="javascript">alert("La contraseña debe tener 5 caracteres como minimo");
                window.location.href="'.SERVERURL.'vistas/contenidos/reset.php/"</script>';
   

}
            
//comprobar la clave
            if($clave==$repetirclave)
            {
               //verificar contraseña

          $claveEncriptado=modeloPrincipal::encryption($clave);
            $datos_UsuarioPersonalUPTvirtual_update=[     
               "UPUclave"=>$claveEncriptado,
               "CODIGO"=>$codigodesencriptado
            ];

         if(UsuarioPersonalUptVirtualModelo::Cambiar_usuariopersonaluptvirtual_ModeloOTRO($datos_UsuarioPersonalUPTvirtual_update)){
          
                 echo '
                                 <link href="../vistas/css/sweetalert2.min.css" rel="stylesheet">
                   <script src="../vistas/js/sweetalert2.min.js"></script>
                    SISTEMAQRS
                             <script>
                             Swal.fire({
                              title: "Contraseña Usuario personal de UPTvirtual Actualizado",
                              text:"Se cambio la Contraseña correctamente",
                              type: "success",
                              confirmButtonText: "Aceptar"
                            }).then((result) => {
                          if (result.value) {
                             window.location.href="'.SERVERURL.'login/"
                          }
                        });
                              </script>
                             ';

            }else{
             echo '<script language="javascript">alert("El Usuario, Correo electronico o la Palabra Secreta es incorrecta");
                window.location.href="'.SERVERURL.'vistas/contenidos/reset.php/"</script>';
               
            }
            }else
            {
              echo '
                             <link href="../vistas/css/sweetalert2.min.css" rel="stylesheet">
               <script src="../vistas/js/sweetalert2.min.js"></script>
                SISTEMAQRS
                         <script>
                         Swal.fire({
                          title: "Ocurrio un error inesperado",
                          text:"las contraseñas deben ser iguales",
                          type: "error",
                          confirmButtonText: "Aceptar"
                        }).then((result) => {
                      if (result.value) {
                         window.location.href="'.SERVERURL.'vistas/contenidos/reset.php/"
                      }
                    });
                          </script>
                         ';
            }





      
      

      } // fin del controlador 
      ////////////////////////////
        

/*mostrar informacion detallada del usuario personal de la oficina */
      public function Ver_usuariopersonaluptvirtual_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=UsuarioPersonalUptVirtualModelo::Ver_usuariopersonaluptvirtual_Modelo($codigodesencriptado);
         return $datos;

      } // fin del controlador 



/*controlador editar UsuarioPersonal*/
      public function Editar_usuariopersonaluptvirtual_controlador()
      {
        //recuperar el codigo
      
    $codigo=modeloPrincipal::limpiar_cadena($_POST['UsuarioPersonalUPTvirtual_codigo_up']);
    $codigodesencriptado=modeloPrincipal::decryption($codigo);
           //comprobar caso en la base de datos
        $check_UsuarioPersonalUPTvirtual=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevuputusuariopersonaluptvirtual WHERE UPUcodigo='$codigodesencriptado'");

        if($check_UsuarioPersonalUPTvirtual->rowCount()<=0){
            $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos encontrado ningun usuario personal de UPTvirtual en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
        }else
        {
          $campos=$check_UsuarioPersonalUPTvirtual->fetch();
        }







            $personaluptvirtual=modeloPrincipal::limpiar_cadena($_POST['personaluptvirtual_up']);
            $usuario=modeloPrincipal::limpiar_cadena($_POST['usuario_up']);
            $clave=modeloPrincipal::limpiar_cadena($_POST['clave_up']);
            $repetirclave=modeloPrincipal::limpiar_cadena($_POST['repetirclave_up']);
            $palabrasecreta=modeloPrincipal::limpiar_cadena($_POST['PalabraSecreta_up']);
            $privilegio=modeloPrincipal::limpiar_cadena($_POST['privilegio_up']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['fecha_up']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['estado_up']);

//comprobar campos vacios
            if($usuario=="" || $clave=="" || $repetirclave=="" || $palabrasecreta==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }


            
//comprobar la clave
            if($clave!=$repetirclave)
            {
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"las claves deben ser iguales, por favor ingrese nuevamente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }




//verificar contraseña

            $check_nombre=modeloPrincipal::ejecutar_consulta_simple("SELECT UPUusuario FROM oevuputusuariopersonaluptvirtual WHERE UPUclave='$clave'");

            if($check_nombre->rowCount()>0){

          
            $datos_UsuarioPersonalUPTvirtual_update=[
                "PEUcodigo"=>$personaluptvirtual,
               "UPUusuario"=>$usuario,
               "UPUclave"=>$clave,
               "UPUpalabraSecreta"=>$palabrasecreta,
               "UPUprivilegio"=>$privilegio,
               "UPUfecha"=>$fecha,
               "UPUestado"=>$estado,
               "CODIGO"=>$codigodesencriptado
            ];

         if(UsuarioPersonalUptVirtualModelo::Editar_usuariopersonaluptvirtual_Modelo($datos_UsuarioPersonalUPTvirtual_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Usuario personal de UPTvirtual Actualizado",
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
               
            }
            else
            {



          $claveEncriptado=modeloPrincipal::encryption($clave);
            $datos_UsuarioPersonalUPTvirtual_update=[
                "PEUcodigo"=>$personaluptvirtual,
               "UPUusuario"=>$usuario,
               "UPUclave"=>$claveEncriptado,
               "UPUprivilegio"=>$privilegio,
               "UPUfecha"=>$fecha,
               "UPUestado"=>$estado,
               "CODIGO"=>$codigodesencriptado
            ];

         if(UsuarioPersonalUptVirtualModelo::Editar_usuariopersonaluptvirtual_Modelo($datos_UsuarioPersonalUPTvirtual_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Usuario personal de UPTvirtual Actualizado",
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
          }

      } // fin del controlador 





}