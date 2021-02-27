<?php
     
     if($peticionAjax){
        require_once "../modelos/LoginModelo.php";
     }else{
        require_once "./modelos/LoginModelo.php";
     }


     class LoginControlador extends LoginModelo{

        /* controlador iniciar sesion */
        public function iniciar_sesion_controlador(){
         $usuario=modeloPrincipal::limpiar_cadena($_POST['usuario_log']); 
         $clave=modeloPrincipal::limpiar_cadena($_POST['clave_log']);
          //comprobar campos vacios
          if($usuario=="" || $clave==""){
           echo '
           <script>
           Swal.fire({
            title: "Ocurrio un error inesperado",
            text:"No haz llenado todo los campos que son requeridos",
            type: "error",
            confirmButtonText: "Aceptar"
          });
            </script>
           ';
         }

         $datos_login=[
            "UPUusuario"=>$usuario,
            "UPUclave"=>$clave
         ];
         $datos_cuenta=LoginModelo::iniciar_sesion_modelo($datos_login);
         if($datos_cuenta->rowCount()==1)
         {
            $row=$datos_cuenta->fetch();
            session_start(['name' => 'QRS']);
            $_SESSION['CodUsuarioPersonalUptVirtual_spm']=$row['UPUcodigo'];
            $_SESSION['personal_spm']=$row['PEUcodigo'];
            $_SESSION['nombres_spm']=$row['PEUnombres'];
            $_SESSION['apellidos_spm']=$row['PEUapellidos'];
            $_SESSION['rolpersonal_spm']=$row['ROPnombre'];
            $_SESSION['usuario_spm']=$row['UPUusuario'];
            $_SESSION['clave_spm']=md5(uniqid(mt_rand(),true));
            $_SESSION['privilegio_spm']=$row['UPUprivilegio'];
            $_SESSION['estado_spm']=$row['UPUestado'];
            
            return header("Location:".SERVERURL."general/");
         }else{
            echo '
            <script>
            Swal.fire({
             title: "Ocurrio un error inesperado",
             text:"EL USUARIO o CLAVE son incorrectos",
             type: "error",
             confirmButtonText: "Aceptar"
           });
             </script>
            ';
         }
        
        }/**fin del controlador  */

        /** controlador para forzar cierre de sesion */
        public function forzar_cierre_sesion_controlador()
        {
         session_unset();
         session_destroy();
         if(headers_sent()){
         return "<script> window.location.href='".SERVERURL."login/'; </script>";
         }else{
            return header("Location:".SERVERURL."login/"); 
         }
        }/**fin del controlador  */

        /** controlador cierre de sesion */
        public function cerrar_sesion_controlador()
        {
             session_start(['name' => 'QRS']); 
             $usuario=modeloPrincipal::decryption($_POST['usuario']);
             $clave=modeloPrincipal::decryption($_POST['clave']);
             if($usuario==$_SESSION['usuario_spm'] && $clave==$_SESSION['clave_spm'])
             {
                session_unset();
                session_destroy();
                $alerta=[
                    "Alerta"=>"redireccionar",
                    "URL"=>SERVERURL."login/"
                ];
             }
             else{
                $alerta=[
                      "Alerta"=>"simple",
                      "Titulo"=>"Ocurrió un error inesperado",
                      "Texto"=>"No se pudo cerrar la sesion en el sistema",
                      "Tipo"=>"error"
                   ];
              }
              echo json_encode($alerta);
        }/**fin del controlador  */


     }
     