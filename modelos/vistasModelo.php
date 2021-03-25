<?php

class vistasModelo{

    /*------Modelo para obtener vistas -----*/

    protected static function obtener_vistas_modelo($vistas){
        $listaBlanca=["home","general","mision","agregar-casos","agregar-tipo-usuario","listar-casos","editar-caso","listar-tipo-usuario","personal-uptvirtual","agregar-tipo-personal","agregar-tipo-qrs","listar-tipo-qrs","agregar-usuariopersonal-uptvirtual","listar-usuario-personaluptvirtual","agregar-rol-personal"
        ,"agregar-personal","listar-rol","listar-personal","listar-actividadQrsAll","listar-actividadPendienteAll","listar-actividadPendiente","agregar-actividadQRS","agregar-actividadesQRSALL","listar-actividadesQRSU","listar-actividadAtendidasAll","listar-actividadAtendidasU","reportes-pdf","fpdf","listar-excel"
        ,"ver-caso","ver-tipo-qrs","ver-tipo-usuario","ver-usuariopersonal-uptvirtual","ver-actividadPendienteAll","editar-tipo-qrs","editar-tipo-usuario","ver-actividadPendiente","cerrar","ver-actividadAll","editar-usuariopersonal-uptvirtual","editar-actividadPendienteAll","editar-actividadAll","editar-actividadPendiente"
        ,"editar-rol","ver-rol","ver-personal","editar-personal","ver-actividadAtendidaU","editar-actividadAtendidaU","ver-actividadU","editar-actividadU","ver-actividadAtendidaAll","editar-actividadAtendidaAll","perfil"];
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