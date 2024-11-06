$(document).ready(function(){
  
    $('.buscar-producto').click(function(){
    let productoNecesario=$('#id_producto')
        const productoId = $('#id_producto').val()
        $('.botones-producto').css('display','block')
        
        if (productoId) {
           
            fetch('http://localhost/sistema2/ajax/devuelveAjax.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    'id_producto': productoId
                })
            })
            .then(response => response.json()) // Primero recibe la respuesta como texto
            .then(data => {      
                let i=1
                $.each(data, function(numero, rows){
                  if (rows['insumo_cancelado']==0) {
                
                  
                let input=`
                <div class="div-input-dom">
                <input type="hidden" name="id-producto-${i}" id="id-producto-${i}" value="${rows['id_producto']}">
                <label for="">ID</label>
                <input type="text" id="id-insumo-db-${i}" name="id-insumo-db-${i}" value="${rows['id_insumo']}">
                  <label for="">Nombre</label>
                <input type="text" id="nombre-insumo-db-${i}" name="nombre-insumo-db-${i}" value="${rows['nombre_insumo']}">
                  <label for="">Cantidad</label>
                <input type="text" id="cantidad-insumo-db-${i}" name="cantidad-insumo-db-${i}" value="${rows['cantidad_insumo']}">
                <span class="eliminar_input"  data-delete="id-insumo-db-${numero}">❌</span>
                </div>
                `;
                  i++
                $('#divPrueba').append(input)
                  }
                // voy a probar eliminar un insumo de la db con jquery 
                $(".eliminar_input").click(function(){
                  
                   
                    let dentroDelDiv=$(this).closest('.div-input-dom')
                    let id_producto=dentroDelDiv.find('input[id^="id-producto"').val()
                    let idInsumo=dentroDelDiv.find('input[id^="id-insumo-db"]').val()
                    let nombreInsumo=dentroDelDiv.find('input[id^="nombre-insumo-db"]').val()

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                      }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url:'http://localhost/sistema2/ajax/productoAjax.php',
                                type:'POST',
                                data:{
                                    id_producto:id_producto,
                                    id_insumo_db:idInsumo,
                                    nombre_insumo_db:nombreInsumo
                                },
                                success:function(response){                                  
                                      
                                    dentroDelDiv.remove()
                                },
                                error:function(xhr, status, error){
                                    alert('no se elimino')
                                }
                            })
                         
                          Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                          });
                        }
                      });
               
                   

                     
                 })
                })            
               })
            .catch(error => console.error('Error en la solicitud:', error));
           }
    });
    })




$(document).ready(function(){

    let contador=0
   $('.agregar-producto').click(function(){

        contador++;

        let insumoNecesarioId="id-insumo-" + contador;
        let insumoNecesarioNombre= "nombre-insumo-"+ contador;
        let insumocantidad= "cantidad-necesaria-"+ contador;
        
        let input=`
        <div class="div-input-dom">
        <label for="${insumoNecesarioId}">ID</label>
        <input type="text" id=${insumoNecesarioId} name=${insumoNecesarioId}>
          <label for="${insumoNecesarioNombre}">Nombre</label>
        <input type="text" id=${insumoNecesarioNombre} name=${insumoNecesarioNombre}>
          <label for="${insumocantidad}">Cantidad</label>
        <input type="text" id=${insumocantidad} name=${insumocantidad}>
        <span class="eliminar_input">❌</span>
        </div>
        `;
    
        $(".inputContainer").append(input);
        $(".eliminar_input").click(function(){
           $(this).closest('.div-input-dom').remove()
            
        })
    }
)
})


// voy a probar eliminar un insumo de la db con jquery 





let id_existe=$('#id_producto');

if(id_existe){

$('#id_producto').on('change', function() {
    const insumoId = $('#id_producto').val();

    if (insumoId) {
     
        fetch('http://localhost/sistema2/ajax/devuelveAjax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'id_producto': insumoId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
               console.log(data)
            
                // Rellenar los campos del formulario co los datos obtenidos
                $('#nombre_producto').val(data[1]['nombre_producto']);
               
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        alert('Por favor, ingresa un ID de insumo');
    }
});
}

let nombre_existe=$('#nombre_producto');

if(nombre_existe){
$('#nombre_producto').on('change', function() {
    const insumoId = $('#nombre_producto').val();

    if (insumoId) {
     
        fetch('http://localhost/sistema2/ajax/devuelveAjax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'nombre_producto': insumoId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
               
                
                // Rellenar los campos del formulario co los datos obtenidos
                $('#id_producto').val(data[0]['id_producto']);
               
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        alert('Por favor, ingresa un ID de insumo');
    }
});
}