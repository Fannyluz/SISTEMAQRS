
<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['caso_nombre_reg'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/CasoControlador.php";
        $ins_caso = new CasoControlador();

            // agregar un caso
            if(isset($_POST['caso_nombre_reg']) && isset($_POST['caso_descripcion_reg'])){
                echo $ins_caso->agregar_caso_controlador();
            }
            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }