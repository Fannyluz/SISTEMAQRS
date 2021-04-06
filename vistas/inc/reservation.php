<script>
    function buscar_cliente(){
        //obtener el valor
        let input_cliente = document.querySelector('#buscarvivo').value;

        if(input_cliente != 0){
            let datos = new FormData();
            datos.append("buscar_cliente",input_cliente);

            fetch("<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php",{
                method: 'POST',
                body: datos
            })
            .then(respuesta => respuesta.text())
            .then(respuesta => {
                let tabla_clientes = document.querySelector('#tabla_clientes');
                tabla_clientes.innerHTML=respuesta;
            });

        }
    }
</script>