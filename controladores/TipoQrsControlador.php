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



       /*controlador eliminar QRS*/
       public function Eliminar_tipoqrs_controlador()
       {
         // recibiendo el codigo del QRS
       
          $codigo=modeloPrincipal::limpiar_cadena($_POST['qrs_codigo_del']);
 
          // recibiendo el QRS 
          if($codigo==1){
           $alerta=[
                   "Alerta"=>"simple",
                   "Titulo"=>"Ocurrio un error inesperado",
                   "Texto"=>"No podemos eliminar el tipo QRS principal del sistema",
                   "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
          }
          // comprobar el QRS en BD
          $check_tipoqrs=modeloPrincipal::ejecutar_consulta_simple("SELECT CodTipoQRS  FROM tipoqrs WHERE CodTipoQRS ='$codigo'");
          if($check_tipoqrs->rowCount()<=0)
          {
            $alerta=[
                   "Alerta"=>"simple",
                   "Titulo"=>"Ocurrio un error inesperado",
                   "Texto"=>"El tipo QRS que intenta eliminar no existe en el sistema",
                   "Tipo"=>"error"
                ];
                echo json_encode($alerta);
                exit();
 
          }
          
 //eliminar QRS
          $eliminar_tipoqrs=TipoQrsModelo::eliminar_tipoqrs_modelo($codigo);
          if($eliminar_tipoqrs->rowCount()==1){
             $alerta=[
                   "Alerta"=>"recargar",
                   "Titulo"=>"Caso eliminado",
                   "Texto"=>"el tipo QRS ha sido eliminado del sistema exitosamente",
                   "Tipo"=>"success"
                ];
          }else{
           $alerta=[
                   "Alerta"=>"simple",
                   "Titulo"=>"Ocurrio un error inesperado",
                   "Texto"=>"No hemos podido eliminar el tipo QRS, por favor intente nuevamente",
                   "Tipo"=>"error"
                ];
 
          }
          echo json_encode($alerta);
       } // fin del controlador 

       
     }
