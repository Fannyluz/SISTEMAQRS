<script>
	let btn_salir=document.querySelector(".btn-exit-system");
	btn_salir.addEventListener('click',function(e){
		e.preventDefault();
			Swal.fire({
				title: 'Quieres salir del sistema?',
				text: "La session actual se cerrra y saldras del sistema',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, exit!',
				cancelButtonText: 'No, cancelar'
			}).then((result) => {
				if (result.value) {
					window.location="index.html";
				}
			});
		});
</script>