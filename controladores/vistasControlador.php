<?php

require_once "./modelos/vistasModelo.php";

class vistasControlador extends vistasModelo{
     /*------Modelo para obtener plantilla -----*/

     public function obtener_plantilla_controlador(){
        return require_once "./vistas/plantilla.php";
     }
       /*------Modelo para obtener vistas -----*/

       public function obtener_vistas_controlador(){
           if(isset($_GET['views']))
           {
               $ruta=explode("/", $_GET['views']);
               $respuesta = vistasModelo::obtener_vistas_modelo($ruta[0]);
           } else
           {
               $respuesta ="reset";
           }
           return $respuesta;
       }
}