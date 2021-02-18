<?php

class vistasModelo{

    /*------Modelo para obtener vistas -----*/

    protected static function obtener_vistas_modelo($vistas){
        $listaBlanca=["home","general","mision","agregar-casos","agregar-tipo-usuario","listar-casos","listar-tipo-usuario","personal-uptvirtual","agregar-tipo-personal","agregar-tipo-qrs","listar-tipo-qrs","agregar-usuario-uptvirtual"];
        if(in_array($vistas,$listaBlanca)){
            if(is_file("./vistas/contenidos/".$vistas."-view.php"))
            {
                $contenido="./vistas/contenidos/".$vistas."-view.php";
            }else
            {
                $contenido="404";
            }
        }elseif($vistas=="login" || $vistas=="index"){
            $contenido = "login";

        }else{
            $contenido="404";
        }
        return $contenido;

    }
}