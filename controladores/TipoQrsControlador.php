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
            if($nombre=="" || $fecha=="" || $estado==""){
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
            $check_nombretipoqrs=modeloPrincipal::ejecutar_consulta_simple("SELECT TIPnombre FROM oevtipttipoqrs WHERE TIPnombre='$nombre'");
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
               "TIPnombre"=>$nombre,
               "TIPdescripcion"=>$descripcion,
               "TIPfecha"=>$fecha,
               "TIPestado"=>$estado
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

/*controlador listar tipoqrs estado=activo*/
      public function Listar_tipoqrs_estado_controlador()
      {
         $datos=TipoQrsModelo::listar_tipoqrs_estado_modelo();
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
          $check_tipoqrs=modeloPrincipal::ejecutar_consulta_simple("SELECT TIPcodigo  FROM oevtipttipoqrs WHERE TIPcodigo  ='$codigo'");
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

      // comprobar si existe el tipo qrs en las actividades registradas
          $check_tipoqrs_actividadQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT TIPcodigo FROM oevactpactividadqrs WHERE TIPcodigo='$codigo'LIMIT 1");
          if($check_tipoqrs_actividadQRS->rowCount()>0)
          {
            $alerta=[
                   "Alerta"=>"simple",
                   "Titulo"=>"Ocurrio un error inesperado",
                   "Texto"=>"No podemos eliminar este tipo de QRS, debido a que existe actividades registrados",
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

        /*mostrar datos del tipo qrs */
      public function Ver_tipoqrs_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
         $datos=TipoQrsModelo::Ver_tipoqrs_Modelo($codigo);
         return $datos;

      } // fin del controlador 


      /*controlador editar tipoqrs*/
      public function Editar_tipoqrs_controlador()
      {
        //recuperar el codigo
      
    $codigo=modeloPrincipal::limpiar_cadena($_POST['tipoQRS_codigo_up']);

           //comprobar caso en la base de datos
        $check_tipoQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevtipttipoqrs WHERE TIPcodigo='$codigo'");

        if($check_tipoQRS->rowCount()<=0){
            $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos encontrado el tipoQRS en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
        }else
        {
          $campos=$check_tipoQRS->fetch();
        }

            $nombre=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_nombre_up']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_descripcion_up']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_fecha_up']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['tipoqrs_estado_up']);

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



            $datos_tipoqrs_update=[
               "TIPnombre"=>$nombre,
               "TIPdescripcion"=>$descripcion,
               "TIPfecha"=>$fecha,
               "TIPestado"=>$estado,
               "CODIGO"=>$codigo
            ];

         if(TipoQrsModelo::Editar_tipoqrs_Modelo($datos_tipoqrs_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"TipoQRS Actualizado",
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
