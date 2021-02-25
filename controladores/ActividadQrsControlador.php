<?php
     
     if($peticionAjax){
        require_once "../modelos/ActividadQrsModelo.php";
     }else{
        require_once "./modelos/ActividadQrsModelo.php";
     }


     class ActividadQrsControlador extends ActividadQrsModelo{
      
     
      /*controlador listar actividades All*/
      public function listar_ActividadQrsAll_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsAll_modelo();
         return $datos;
      } // fin del controlador 

       /*controlador listar actividades pendientes All*/
      public function listar_ActividadQrsPendientesAll_controlador()
      {
         $datos=ActividadQrsModelo::listar_ActividadQrsPendientesAll_modelo();
         return $datos;
      } // fin del controlador 

      
     }