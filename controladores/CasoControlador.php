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
            }  else{
               
            }       

            $datos_caso_registro=[
               "Nombre"=>$nombre,
               "Descripcion"=>$descripcion
            ];

            $agregar_caso=CasoModelo::agregar_caso_modelo($datos_caso_registro);

            if($agregar_caso->rowCount()==1){
               $alerta=[
                  "Alerta"=>"limpiar",
                  "Titulo"=>"Caso registrado",
                  "Texto"=>"Los datos del nuevo caso se registraron satisfactoriamente",
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

      } // fin del controlador 


     }