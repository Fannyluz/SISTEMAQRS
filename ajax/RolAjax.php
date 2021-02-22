
<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['rol_nombre_reg'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/RolControlador.php";
        $ins_rol = new RolControlador();

            // agregar un caso
            if(isset($_POST['rol_nombre_reg']) && isset($_POST['rol_descripcion_reg']) && isset($_POST['rol_estado_reg'])){
                echo $ins_rol->agregar_rol_controlador();
            }
            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }