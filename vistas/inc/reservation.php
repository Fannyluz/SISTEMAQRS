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
                let tabla_clientes = document.querySelector('#datatable');
                tabla_clientes.innerHTML=respuesta;
            });

        }
    }

    function buscar_atendidos(){
        //obtener el valor
        let input_clienteU = document.querySelector('#buscaratendido').value;

        
        if(input_clienteU != 0){
            let datos = new FormData();
            datos.append("buscar_atendidos",input_clienteU);

            fetch("<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php",{
                method:'POST',
                body: datos
            })
            .then(respuesta => respuesta.text())
            .then(respuesta => {
                let tabla_clientes = document.querySelector('#datatable');
                tabla_clientes.innerHTML=respuesta;
            });

        }
    }

    function buscar_pendiente(){
        //obtener el valor
        let input_cliente = document.querySelector('#buscarpendiente').value;

        
        if(input_cliente != 0){
            let datos = new FormData();
            datos.append("buscar_pendiente",input_cliente);

            fetch("<?php echo SERVERURL; ?>ajax/ActividadQrsAjax.php",{
                method: 'POST',
                body: datos
            })
            .then(respuesta => respuesta.text())
            .then(respuesta => {
                let tabla_clientes = document.querySelector('#datatable');
                tabla_clientes.innerHTML=respuesta;
            });

        }
    }
</script>