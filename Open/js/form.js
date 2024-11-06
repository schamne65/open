
//formulario
$(document).ready(function() {
    $('input:first').focus();
    $('input:first').addClass('focus');
});

$(document).ready(function(){
    $("input").click(function(){
        $(this).addClass("focus");
    })
    $("input").blur(function(){
        $(this).removeClass("focus");
    })
    $("select").click(function(){
        $(this).addClass("focus");
    })
    $("select").blur(function(){
        $(this).removeClass("focus");
    })

    $('input').on('input', function() {
        if ($(this).val().trim() !== '') {
            $(this).css('border-color', '#60a5fa'); // Color del borde cuando tiene texto
        } else {
            $(this).css('border-color', '#ccc'); // Color del borde por defecto
        }
    });
        
        

})