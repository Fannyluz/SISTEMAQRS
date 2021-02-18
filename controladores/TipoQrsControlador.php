<?php
     
     if($peticionAjax){
        require_once "../modelos/TipoQrsModelo.php";
     }else{
        require_once "./modelos/TipoQrsModelo.php";
     }


     class TipoQrsControlador extends TipoQrsModelo{
        public function agregar_tipoqrs_controlador(){

            $nombre=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_descripcion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_estado_reg']);


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
            $check_nombretipoqrs=modeloPrincipal::ejecutar_consulta_simple("SELECT Nombre FROM tipoqrs WHERE Nombre='$nombre'");
            if($check_nombretipoqrs->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un caso registrado con el mismo nombre, por favor registre un caso diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }


            $datos_tipoqrs_registro=[
               "Nombre"=>$nombre,
               "Descripcion"=>$descripcion,
               "Fecha"=>$fecha,
               "Estado"=>$estado
            ];


            $agregar_tipoqrs = TipoQrsModelo::agregar_tipoqrs_modelo($datos_tipoqrs_registro);
           
            if($agregar_tipoqrs->rowCount()==1){
               
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
      /*controlador listar tipoqrs*/
      public function Listar_tipoqrs_controlador()
      {
         $datos=TipoQrsModelo::listar_tipoqrs_modelo();
         return $datos;
      } // fin del controlador 

     }
