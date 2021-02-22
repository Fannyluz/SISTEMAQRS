<?php

require_once "./config/APP.php";
require_once "./controladores/vistasControlador.php";

$plant = new vistasControlador();
$plant->obtener_plantilla_controlador();