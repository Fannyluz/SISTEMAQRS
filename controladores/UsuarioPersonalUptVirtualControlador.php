<?php
     
     if($peticionAjax){
        require_once "../modelos/UsuarioPersonalUptVirtualModelo.php";
     }else{
        require_once "./modelos/UsuarioPersonalUptVirtualModelo.php";
     }
  class UsuarioPersonalUptVirtualControlador extends UsuarioPersonalUptVirtualModelo{
      
           /*--- controlador agregar usuario--*/
           public function agregar_usuariopersonaluptvirtual_controlador(){

            $personaluptvirtual=modeloPrincipal::limpiar_cadena($_POST['personaluptvirtual_reg']);
            $usuario=modeloPrincipal::limpiar_cadena($_POST['usuario_reg']);
            $clave=modeloPrincipal::limpiar_cadena($_POST['clave_reg']);
            $privilegio=modeloPrincipal::limpiar_cadena($_POST['privilegio_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['estado_reg']);
            


            $datos_usuariopersonaluptvirtual_registro=[
               "CodPersonalUptVirtual"=>$personaluptvirtual,
               "Usuario"=>$usuario,
               "Clave"=>$clave,
               "Privilegio"=>$privilegio,
               "Fecha"=>$fecha,
               "Estado"=>$estado
            ];


            $agregar_usuariopersonaluptvirtual = UsuarioPersonalUptVirtualModelo::agregar_usuariopersonaluptvirtual_modelo($datos_usuariopersonaluptvirtual_registro);
           
            if($agregar_usuariopersonaluptvirtual->rowCount()==1){
               
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
      public function Listar_usuariopersonaluptvirtual_controlador()
      {
         $datos=UsuarioPersonalUptVirtualModelo::listar_usuariopersonaluptvirtual_modelo();
         return $datos;
      } // fin del controlador 


}