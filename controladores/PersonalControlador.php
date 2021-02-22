<?php
     
     if($peticionAjax){
        require_once "../modelos/PersonalModelo.php";
     }else{
        require_once "./modelos/PersonalModelo.php";  

       /* $rol = new Rol();

        switch($GET["op"]){
           case "combo":
            $dato=$producto->get_rolpersonal($_POST["CodRolPersonal"]);
            if(is_array($dato)==true and count($dato)>0){
               $html="<option value='".$row['CodRolPersonal']."'>".$row['Nombre']."</option>";
            }
            echo $html;
        }
        break;*/
     }

     class PersonalControlador extends PersonalModelo{
      
           /*--- controlador agregar tipo personal--*/ 
           public function agregar_personal_controlador(){

            $rolnombre=modeloPrincipal::limpiar_cadena($_POST['rol_nombre_reg']);
            $dni=modeloPrincipal::limpiar_cadena($_POST['personal_dni_reg']);
            $nombre=modeloPrincipal::limpiar_cadena($_POST['personal_nombre_reg']);
            $apellido=modeloPrincipal::limpiar_cadena($_POST['personal_apellido_reg']);
            $foto=modeloPrincipal::limpiar_cadena($_POST['personal_foto_reg']);
            $correo=modeloPrincipal::limpiar_cadena($_POST['personal_correo_reg']);
            $celular=modeloPrincipal::limpiar_cadena($_POST['personal_celular_reg']);
            $direccion=modeloPrincipal::limpiar_cadena($_POST['personal_direccion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['personal_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['personal_estado_reg']);


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

         /*controlador listar personales de la oficina de educación virtual*/
         public function Listar_personal_controlador()
         {
            $datos=PersonalModelo::listar_personal_modelo();
            return $datos;
         } // fin del controlador 
   

     }