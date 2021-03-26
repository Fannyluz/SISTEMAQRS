
<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['rol_nombre_reg']) || isset($_POST['rol_codigo_up']) || isset($_POST['rol_codigo_del'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/RolControlador.php";
        $ins_rol = new RolControlador();

            // agregar un caso
            if(isset($_POST['rol_nombre_reg']) && isset($_POST['rol_descripcion_reg']) && isset($_POST['rol_estado_reg'])){
                echo $ins_rol->agregar_rol_controlador();
            }
           // editar un caso
           if(isset($_POST['rol_codigo_up'])){
            echo $ins_rol->Editar_rol_controlador();
           }
            // Eliminar un caso
            if(isset($_POST['rol_codigo_del'])){
                echo $ins_rol->Eliminar_rol_controlador();
            }
        
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }