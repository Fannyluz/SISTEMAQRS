<?php

    require_once "modeloPrincipal.php";
    /* */
    class LoginModelo extends modeloPrincipal{
        /* Modelo de iniciar sesion*/

        protected static function iniciar_sesion_modelo($datos){
            $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevuputusuariopersonaluptvirtual WHERE
             UPUusuario=:UPUusuario AND UPUclave=:UPUclave");
            $sql->bindParam(":UPUusuario",$datos['UPUusuario']);
            $sql->bindParam(":UPUclave",$datos['UPUclave']);
            $sql->execute();
            return $sql;
        }
    }