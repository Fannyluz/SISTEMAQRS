<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo COMPANY?></title>

    <?php include "./vistas/inc/Link.php"?>

</head>
<body>
	<?php
	$peticionAjax=false;
	require_once "./controladores/vistasControlador.php";
	$IV =  new vistasControlador();

	$vistas = $IV->obtener_vistas_controlador();

	if($vistas=="login" || $vistas=="404"){
		require_once "./vistas/contenidos/".$vistas."-view.php";
	} 
	else{
		session_start(['name' => 'QRS']); 

		require_once "./controladores/LoginControlador.php";
		$lc = new LoginControlador();  
		if(!isset($_SESSION['clave_spm']) || !isset($_SESSION['usuario_spm']) || !isset($_SESSION['privilegio_spm']) 
		|| !isset($_SESSION['CodUsuarioPersonalUptVirtual_spm'])
		){
			echo $lc->forzar_cierre_sesion_controlador();
			exit();
		}
		
	?>
	<!-- Main container $_SESSION['token_spm'] isset($_SESSION['clave_spm']) $_SESSION['privilegio_spm']-->
	<main class="full-box main-container" >

		<!-- Nav lateral -->
        <?php include "./vistas/inc/Navlateral.php"?>

		<!-- Page content -->
		<section class="full-box page-content">
		<?php 
		include "./vistas/inc/NavBar.php";
		include $vistas;
		?>
	
        </section>
		
		<?php include "./vistas/inc/Footer.php"?>
	</main>
	
	<?php
	include "./vistas/inc/LogOut.php";
	} 
	include "./vistas/inc/Script.php";
	?>
	
	
</body>
</html>