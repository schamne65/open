



$(document).ready(function(){
    let contador = 0;
    let total_venta=0;
        
   
      // Evento change fuera de la condición
      $('#nombre_insumo').on('change', function() {
        const insumoId = $(this).val();
        if (insumoId) {
            fetch('http://localhost/sistema2/ajax/devuelveAjax.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    'nombre_insumo': insumoId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                
                    let precio = data['precio_venta'];
                   
                    $('#precio_producto').val(precio); // Asignar el precio correcto
                    
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });

    
    $('.boton-mas-venta').click(function(){
        
        contador++;

        let prodcutoVendidoId = "id-producto-" + contador;
        let prodcutoVendidoNombre = "nombre-producto-" + contador;
        let productoVendidoCantidad = "cantidad-vendida-" + contador;
        let precioPorCantidad = "precio-" + contador;

        let nombre = $('#nombre_insumo').val();
        let id = $('#id_insumo').val();
        let venta = $('#cantidad_producto').val();
        let precio=  $('#precio_producto').val();

        let multiplicar1= parseFloat($('#cantidad_producto').val())
        let multiplicar2= parseFloat($('#precio_producto').val())

        let multiplo= multiplicar1 * multiplicar2
        if (id && !isNaN(venta) && !isNaN(precio)) {
        total_venta+=multiplo
        // Solo ejecutar si existe el id de insumo
        if (id) {
            let input = `
            <div class="div-input-dom">
                <label for="${prodcutoVendidoId}">ID</label>
                <input type="text" id="${prodcutoVendidoId}" name="${prodcutoVendidoId}" value="${id}">
                <label for="${prodcutoVendidoNombre}">Nombre</label>
                <input type="text" id="${prodcutoVendidoNombre}" name="${prodcutoVendidoNombre}" value="${nombre}">
                <label for="${productoVendidoCantidad}">Cantidad</label>
                <input type="text" id="${productoVendidoCantidad}" name="${productoVendidoCantidad}" value="${venta}">
                <label for="${precioPorCantidad}">Precio</label>
                <input type="text" id="${precioPorCantidad}" name="${precioPorCantidad}" value="${multiplo}">
                <span class="eliminar_input">❌</span>
            </div>`;

           
            
            $('#nombre_insumo').val('');
            $('#id_insumo').val('');
            $('#cantidad_producto').val('');
            $('#precio_producto').val('');
            
            
            $(".ventas").append(input);
           
           
        } else {
            alert('Por favor, ingresa un ID de insumo');
        }

        $(".eliminar_input").click(function(){
            $(this).closest('.div-input-dom').remove();
            $('#total').text('Total: $' + totalVenta.toFixed(2));
        });
      
        let total= `
        <p>total ${total_venta} </p>
    
         `;
         
         $('#total').text('Total: $' + total_venta.toFixed(2));
    }
    });

    
  
});
