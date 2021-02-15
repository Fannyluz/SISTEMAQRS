<?php

    require_once "modeloPrincipal.php";
    /* */
    class LoginModelo extends modeloPrincipal{
        /* Modelo de iniciar sesion*/

        protected static function iniciar_sesion_modelo($datos){
            $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM usuariopersonaluptvirtual WHERE
             Usuario=:Usuario AND Clave=:Clave");
            $sql->bindParam(":Usuario",$datos['Usuario']);
            $sql->bindParam(":Clave",$datos['Clave ']);
            $sql->execute();
            return $sql;
        }
    }