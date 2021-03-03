<script>
	let btn_salir=document.querySelector(".btn-exit-system");
	btn_salir.addEventListener('click',function(e){
		e.preventDefault();
			Swal.fire({
				title: 'Quires salir del sistema?',
				text: "La sesion actual cerrara y saldras del sistema",
				type: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor:'#d33', 
				confirmButtonText:'Si, salir',
				cancelButtonText: 'No, cancelar'
			}).then((result)=> {
				if (result.value){
					let url='<?php echo SERVERURL; ?> ajax/LoginAjax.php';
					let usuario='<?php echo $lc->encryption($_SESSION['usuario_spm']); ?>';
					let clave='<?php echo $lc->encryption($_SESSION['clave_spm']); ?>';
					


					let datos = new FormData();
					datos.append("usuario",usuario);
					datos.append("clave",clave);

					fetch(url,{
						method: 'POST',
						body: datos
					})
					.then(respuesta => respuesta.json())
					.then(respuesta => {
						return alertas_ajax(respuesta);
					})
				}
			})
		});
</script>