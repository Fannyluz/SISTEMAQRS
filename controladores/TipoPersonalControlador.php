<?php
     
     if($peticionAjax){
        require_once "../modelos/TipoPersonalModelo.php";
     }else{
        require_once "./modelos/TipoPersonalModelo.php"; 
     }


     class TipoPersonalControlador extends TipoPersonalModelo{
      
           /*--- controlador agregar tipo personal--*/ 
           public function agregar_tipopersonal_controlador(){

            $nombre=modeloPrincipal::limpiar_cadena($_POST['caso_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['caso_descripcion_reg']);
            $nombre=modeloPrincipal::limpiar_cadena($_POST['caso_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['caso_descripcion_reg']);
            $nombre=modeloPrincipal::limpiar_cadena($_POST['caso_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['caso_descripcion_reg']);
            $nombre=modeloPrincipal::limpiar_cadena($_POST['caso_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['caso_descripcion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['caso_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['caso_estado_reg']);


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
            $check_nombreCaso=modeloPrincipal::ejecutar_consulta_simple("SELECT Nombre FROM caso WHERE Nombre='$nombre'");
            if($check_nombreCaso->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un caso registrado con el mismo nombre, por favor registre un caso diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }


            $datos_caso_registro=[
               "Nombre"=>$nombre,
               "Descripcion"=>$descripcion,
               "Fecha"=>$fecha,
               "Estado"=>$estado
            ];


            $agregar_caso = CasoModelo::agregar_caso_modelo($datos_caso_registro);
           
            if($agregar_caso->rowCount()==1){
               
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