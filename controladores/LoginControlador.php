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
            "Usuario"=>$usuario,
            "Clave "=>$clave
         ];
         $datos_cuenta=LoginModelo::iniciar_sesion_modelo($datos_login);
         if($datos_cuenta->rowCount()==1)
         {
            $row=$datos_cuenta->fetch();
            session_start(['name' => 'QRS']);
            $_SESSION['CodUsuarioPersonalUptVirtual_spm']=$row['CodUsuarioPersonalUptVirtual'];
            $_SESSION['usuario_spm']=$row['Usuario'];
            $_SESSION['clave_spm']=$row['Clave'];
            $_SESSION['estado_spm']=$row['Estado'];
            return header("Location:".SERVERURL."home/");
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

        /** controlador de forzar cierre de sesion */
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

        /** cerrar la sesion */
        public function cerrar_sesion_controlador()
        {
         session_start(['name' => 'QRS']);
        }/**fin del controlador  */
     }
     