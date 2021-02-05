<?php
     
     if($peticionAjax){
        require_once "../modelos/CasoModelo.php";
     }else{
        require_once "./modelos/CasoModelo.php";
     }

     class CasoControlador extends CasoModelo{
           /*--- controlador agregar usuario--*/
           public function agregar_caso_controlador(){
            $nombre=modeloPrincipal::limpiar_cadena($_POST['caso_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['caso_descripcion_reg']);

            //comprobar campos vacios
            if($nombre=="" || $descripcion==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }
        }

     }