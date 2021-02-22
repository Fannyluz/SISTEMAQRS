<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    public function ObtenerTodosRoles(){
        $sql = "SELECT CodRolPersonal, Nombre  FROM rolpersonal ORDER BY Nombre";
        $result = $this->objeto->ejecutar($sql);
        return $result;
       }

    if(isset($_POST['person_nombres_reg'])){
        /*--- Instanacia al controlador--*/
        require_once "../controladores/PersonalControlador.php";
        $ins_person = new PersonalControlador();

            // agregar un caso
            if(isset($_POST['tiperson_dni_reg']) && isset($_POST['tiperson_nombres_reg']) 
            && isset($_POST['tiperson_apellidos_reg']) && isset($_POST['tiperson_foto_reg']) 
            && isset($_POST['tiperson_correoelectronico_reg']) 
            && isset($_POST['tiperson_celular_reg']) && isset($_POST['tiperson_direccion_reg']) 
            && isset($_POST['tiperson_fecha_reg']) && isset($_POST['tiperson_estado_reg'])){
                echo $ins_person->agregar_tipopersonal_controlador();
            }
            
        
    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit(); 
    }