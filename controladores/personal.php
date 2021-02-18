<?php
     
     if($peticionAjax){
        require_once "../modelos/personalmodel.php";
     }else{
        require_once "./modelos/personalmodel.php";
     }
     class personal extends personalmodel{
          /*controlador listar casos*/
      public function Listar_personal_controlador()
      {
         $datos=personalmodel::listar_personal_modelo();
         return $datos;
      } // fin del controlador 

     }