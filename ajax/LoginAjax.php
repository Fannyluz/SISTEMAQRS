
<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(){
       

    }else{
        session_start(['name' => 'QRS']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."home/");
        exit(); 
    }