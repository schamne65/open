
// Búsqueda por ID de insumo
let id_existe=document.getElementById('id_insumo');

if(id_existe){

document.getElementById('id_insumo').addEventListener('change', function() {
    const insumoId = document.getElementById('id_insumo').value;

    if (insumoId) {
        fetch('http://localhost/sistema2/ajax/devuelveAjax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'id_insumo': insumoId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                // Rellenar los campos del formulario con los datos obtenidos
                document.getElementById('nombre_insumo').value = data.nombre_insumo;
                document.getElementById('nombre_insumo_modificado').value = data.nombre_insumo;
                document.getElementById('proveedor_modificado').value = data.proveedor;
                document.getElementById('presentacion_modificado').value = data.presentacion_insumo;
                document.getElementById('stock_min_modificado').value = data.stock_min;
                document.getElementById('actualizar_stock_modificado').value = data.stock_actual;
                document.getElementById('marca_insumo').value = data.marca_insumo;
                document.getElementById('costo_modificado').value = data.costo;
                document.getElementById('precio_venta_modificado').value = data.precio_venta;

     
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        alert('Por favor, ingresa un ID de insumo');
    }
});
}

let nombre_existe=document.getElementById('nombre_insumo');
let ventas =document.getElementById('nombre_producto_venta')

if(nombre_existe ){
// Búsqueda por nombre de insumo
document.getElementById('nombre_insumo').addEventListener('change', function() {
    const insumoNombre = document.getElementById('nombre_insumo').value;

    if (insumoNombre) {
        fetch('http://localhost/sistema2/ajax/devuelveAjax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'nombre_insumo': insumoNombre
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                // Rellenar los campos del formulario con los datos obtenidos
                document.getElementById('id_insumo').value = data.id_insumo;
                document.getElementById('nombre_insumo_modificado').value = data.nombre_insumo;
                document.getElementById('proveedor_modificado').value = data.proveedor;
                document.getElementById('presentacion_modificado').value = data.presentacion_insumo;
                document.getElementById('stock_min_modificado').value = data.stock_min;
                document.getElementById('actualizar_stock_modificado').value = data.stock_actual;
                document.getElementById('marca_insumo').value = data.marca_insumo;
                document.getElementById('costo_modificado').value = data.costo;
                document.getElementById('precio_venta_modificado').value = data.precio_venta;
            
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        alert('Por favor, ingresa un nombre de insumo');
    }
})
};


