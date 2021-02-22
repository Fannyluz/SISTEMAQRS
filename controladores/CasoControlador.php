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
      
     
      /*controlador listar casos*/
      public function Listar_casos_controlador()
      {
         $datos=CasoModelo::listar_casos_modelo();
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
         // comprobar el cso en BD
         $check_caso=modeloPrincipal::ejecutar_consulta_simple("SELECT CodCaso FROM caso WHERE CodCaso='$codigo'");
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

      
     }