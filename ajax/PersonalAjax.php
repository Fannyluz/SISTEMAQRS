<?php
    $peticionAjax=true;
    require_once "../config/APP.php";
    if(isset($_POST['personal_dni_reg']) || isset($_POST['personal_codigo_del']) || isset($_POST['personal_codigo_up']) || isset($_POST['emailu'])){
        /*--- Instanacia al controlador-- */
        require_once "../controladores/PersonalControlador.php";
        $ins_person = new PersonalControlador();

            // agregar un caso
            if(isset($_POST['rol_nombre_reg']) && isset($_POST['personal_dni_reg']) 
            && isset($_POST['personal_nombre_reg']) && isset($_POST['personal_apellido_reg']) 
            && isset($_FILES['personal_foto_reg'])
            && isset($_POST['personal_correo_reg']) 
            && isset($_POST['personal_celular_reg']) 
            && isset($_POST['personal_direccion_reg']) && isset($_POST['personal_fecha_reg']) 
            && isset($_POST['personal_estado_reg']) ){
                echo $ins_person->agregar_personal_controlador();
            }
            // Eliminar un caso
            if(isset($_POST['personal_codigo_del'])){
                echo $ins_person->eliminar_personal_controlador();
            }

            // Editar un personal
            if(isset($_POST['personal_codigo_up'])){
                echo $ins_person->Editar_personal_controlador();
            }

            

            // Editar un personal
            if(isset($_POST['emailu'])){
                echo $ins_person->buscar_Email();
            }

        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }
