<?php

    require_once "modeloPrincipal.php";
    /* */
    class LoginModelo extends modeloPrincipal{
        /* Modelo de iniciar sesion*/

        protected static function iniciar_sesion_modelo($datos){
            $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevuputusuariopersonaluptvirtual AS up
                INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
                INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo
                WHERE up.UPUusuario=:UPUusuario AND up.UPUclave=:UPUclave AND up.UPUestado=1");
            $sql->bindParam(":UPUusuario",$datos['UPUusuario']);
            $sql->bindParam(":UPUclave",$datos['UPUclave']);
            $sql->execute();
            return $sql;
        }
      
    }