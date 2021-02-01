
<?php
    $peticionAjax = true;
    require_once "../config/APP.php";

    if(){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/CasoControlador.php";
        $ins_caso = new CasoControlador();
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }