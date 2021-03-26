<?php
     
     if($peticionAjax){
        require_once "../modelos/RolModelo.php";
     }else{
        require_once "./modelos/RolModelo.php";
     }


     class RolControlador extends RolModelo{
      
           /*--- controlador agregar usuario--*/
           public function agregar_rol_controlador(){
            
            $nombre=modeloPrincipal::limpiar_cadena($_POST['rol_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['rol_descripcion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['rol_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['rol_estado_reg']);


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
            $check_codRol=modeloPrincipal::ejecutar_consulta_simple("SELECT ROPnombre FROM oevroptrolpersonal WHERE ROPnombre='$nombre'");
            if($check_codRol->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un rol registrado con el mismo nombre, por favor registre un rol diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }


            $datos_rol_registro=[
               
               "ROPnombre"=>$nombre,
               "ROPdescripcion"=>$descripcion,
               "ROPfecha"=>$fecha,
               "ROPestado"=>$estado
            ];


            $agregar_rol = RolModelo::agregar_rol_modelo($datos_rol_registro);
           
            if($agregar_rol->rowCount()==1){
               
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

      /*controlador listar personales de la oficina de educación virtual*/
      public function Listar_rol_controlador()
      {
         $datos=RolModelo::listar_rol_modelo();
         return $datos;
      } // fin del controlador 



  /*controlador listar personales de la oficina de educación virtual*/
      public function Listar_rol_estado_controlador()
      {
         $datos=RolModelo::listar_rol_estado_modelo();
         return $datos;
      } // fin del controlador 

  /*controlador datos del caso*/
  public function Ver_rol_controlador($codigo)
  {
    $codigo=modeloPrincipal::limpiar_cadena($codigo);
     $datos=RolModelo::Ver_Rol_Modelo($codigo); 
     return $datos;

  } // fin del controlador
 

  
/*controlador editar rollllll*/
public function Editar_rol_controlador()
{
  //recuperar el codigo

$codigo=modeloPrincipal::limpiar_cadena($_POST['rol_codigo_up']);

     //comprobar caso en la base de datos
  $check_rol=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevroptrolpersonal WHERE ROPcodigo='$codigo'");

  if($check_rol->rowCount()<=0){
      $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No hemos encontrado el rol en el sistema",
            "Tipo"=>"error"
         ];
         echo json_encode($alerta);
         exit();
  }else
  {
    $campos=$check_rol->fetch();
  }

   $nombre=modeloPrincipal::limpiar_cadena($_POST['rol_nombre_up']);
   $descripcion=modeloPrincipal::limpiar_cadena($_POST['rol_descripcion_up']);
   $fecha=modeloPrincipal::limpiar_cadena($_POST['rol_fecha_up']);
   $estado=modeloPrincipal::limpiar_cadena($_POST['rol_estado_up']);

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



      $datos_rol_update=[
         "ROPnombre"=>$nombre,
         "ROPdescripcion"=>$descripcion,
         "ROPfecha"=>$fecha,
         "ROPestado"=>$estado,
         "CODIGO"=>$codigo
      ];

   if(RolModelo::Editar_Rol_Modelo($datos_rol_update)){
    $alerta=[
            "Alerta"=>"recargar",
            "Titulo"=>"Rol Actualizado",
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
      

/*--------------------------------------------------------------------*/
/*controlador eliminar casos*/
public function Eliminar_rol_controlador() 
{
  // recibiendo el codigo del caso

   $codigo=modeloPrincipal::limpiar_cadena($_POST['rol_codigo_del']);

   // recibiendo el caso 
   if($codigo==1){
    $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No podemos eliminar el rol  del sistema",
            "Tipo"=>"error"
         ];
         echo json_encode($alerta);
         exit();
   }
   // comprobar el caso en BD
   $check_rol=modeloPrincipal::ejecutar_consulta_simple("SELECT ROPcodigo FROM oevroptrolpersonal WHERE ROPcodigo='$codigo'");


   if($check_rol->rowCount()<=0)
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
   
   // comprobar el caso en la tabla personal QRS -BD
   $check_rol_personalQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT ROPcodigo FROM oevpeutpersonaluptvirtual WHERE ROPcodigo='$codigo' LIMIT 1");


   if($check_rol_personalQRS->rowCount()>0)
   {
     $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No podemos eliminar el rol, debido a que actividades asociados, recomendamos deshabilitar el caso si ya no sera usado en el sistema",
            "Tipo"=>"error"
         ];
         echo json_encode($alerta);
         exit();

   }

  //eliminar caso
   $eliminar_rol=RolModelo::Eliminar_rol_modelo($codigo);
   if($eliminar_rol->rowCount()==1){
      $alerta=[
            "Alerta"=>"recargar",
            "Titulo"=>"Caso eliminado",
            "Texto"=>"el rol ha sido eliminado del sistema exitosamente",
            "Tipo"=>"success"
         ];
   }else{
    $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No hemos podido eliminar el rol, por favor intente nuevamente",
            "Tipo"=>"error"
         ];

   }
   echo json_encode($alerta);
} // fin del controlador 

 /*controlador datos del caso*/
public function Ver_caso_controlador($codigo)
{
  $codigo=modeloPrincipal::limpiar_cadena($codigo);
   $datos=CasoModelo::Ver_Caso_Modelo($codigo);
   return $datos;

} // fin del controlador 
     }