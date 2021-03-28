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
            $fecha=modeloPrincipal::limpiar_cadena($_POST['caso_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['caso_estado_reg']);


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
            $check_nombreCaso=modeloPrincipal::ejecutar_consulta_simple("SELECT CASnombre FROM oevcastcaso WHERE CASnombre='$nombre'");
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
               "CASnombre"=>$nombre,
               "CASdescripcion"=>$descripcion,
               "CASfecha"=>$fecha,
               "CASestado"=>$estado
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
      
     
      /*controlador listar casos*/
      public function Listar_casos_controlador()
      {
         $datos=CasoModelo::listar_casos_modelo();
         return $datos;
      } // fin del controlador 
      /*controlador listar casos*/
      public function Listar_casos_estado_controlador()
      {
         $datos=CasoModelo::listar_casos_estado_modelo();
         return $datos;
      } // fin del controlador

      /*controlador eliminar casos*/
      public function Eliminar_caso_controlador()
      {
        // recibiendo el codigo del caso
      
         $codigo=modeloPrincipal::limpiar_cadena($_POST['caso_codigo_del']);

         // recibiendo el caso 
         if($codigo==1){
          $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No podemos eliminar el caso principal del sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
         }
         // comprobar el caso en BD
         $check_caso=modeloPrincipal::ejecutar_consulta_simple("SELECT CAScodigo FROM oevcastcaso WHERE CAScodigo='$codigo'");


         if($check_caso->rowCount()<=0)
         {
           $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"El caso que intenta eliminar no existe en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();

         }
         
         // comprobar el caso en la tabla actividad QRS -BD
         $check_caso_actividadQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT CAScodigo FROM oevactpactividadqrs WHERE CAScodigo='$codigo' LIMIT 1");


         if($check_caso_actividadQRS->rowCount()>0)
         {
           $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No podemos eliminar el caso, debido a que actividades asociados, recomendamos deshabilitar el caso si ya no sera usado en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();

         }

        //eliminar caso
         $eliminar_caso=CasoModelo::eliminar_caso_modelo($codigo);
         if($eliminar_caso->rowCount()==1){
            $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Caso eliminado",
                  "Texto"=>"el caso ha sido eliminado del sistema exitosamente",
                  "Tipo"=>"success"
               ];
         }else{
          $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos podido eliminar el caso, por favor intente nuevamente",
                  "Tipo"=>"error"
               ];

         }
         echo json_encode($alerta);
      } // fin del controlador 

       /*controlador datos del caso*/
      public function Ver_caso_controlador($codigo) 
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=CasoModelo::Ver_Caso_Modelo($codigodesencriptado);
         return $datos;

      } // fin del controlador 


/*controlador editar caso*/
    public function Editar_caso_controlador()
    {
        //recuperar el codigo
      
      $codigo=modeloPrincipal::limpiar_cadena($_POST['caso_codigo_up']);
      $codigodesencriptado=modeloPrincipal::decryption($codigo);
           //comprobar caso en la base de datos
        $check_casos=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevcastcaso WHERE CAScodigo='$codigodesencriptado'");

        if($check_casos->rowCount()<=0){
            $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos encontrado el caso en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
        }else
        {
          $campos=$check_casos->fetch();
        }

         $nombre=modeloPrincipal::limpiar_cadena($_POST['caso_nombre_up']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['caso_descripcion_up']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['caso_fecha_up']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['caso_estado_up']);

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



            $datos_caso_update=[
               "CASnombre"=>$nombre,
               "CASdescripcion"=>$descripcion,
               "CASfecha"=>$fecha,
               "CASestado"=>$estado,
               "CODIGO"=>$codigodesencriptado
            ];

         if(CasoModelo::Editar_Caso_Modelo($datos_caso_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Caso Actualizado",
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