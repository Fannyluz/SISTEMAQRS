<?php
     
     if($peticionAjax){
        require_once "../modelos/TipoUsuarioModelo.php";
     }else{
        require_once "./modelos/TipoUsuarioModelo.php";
     }


     class TipoUsuarioControlador extends TipoUsuarioModelo{
      
           /*--- controlador agregar usuario--*/
           public function agregar_tipousuario_controlador(){

            $nombre=modeloPrincipal::limpiar_cadena($_POST['tipousuario_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['tipousuario_descripcion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['tipousuario_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['tipousuario_estado_reg']);


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
            
            //comprobar el nombre
            $check_nombretipousuario=modeloPrincipal::ejecutar_consulta_simple("SELECT Nombre FROM tipousuario WHERE Nombre='$nombre'");
            if($check_nombretipousuario->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un caso registrado con el mismo nombre, por favor registre un caso diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }


            $datos_tipousuario_registro=[
               "Nombre"=>$nombre,
               "Descripcion"=>$descripcion,
               "Fecha"=>$fecha,
               "Estado"=>$estado
            ];


            $agregar_tipousuario = TipoUsuarioModelo::agregar_tipousuario_modelo($datos_tipousuario_registro);
           
            if($agregar_tipousuario->rowCount()==1){
               
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
      
     }