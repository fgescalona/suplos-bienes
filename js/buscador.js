$('#submitButton').click(function(e) {
    e.preventDefault();
    let ciudadSeleccionada = $('#selectCiudad option:selected').val();
    let tipoBienSeleccionado = $('#selectTipo option:selected').val();

    if (ciudadSeleccionada == "0" && tipoBienSeleccionado == "0") {
        $(".bien").show();
    } else {
        $(".bien").each(function() {
            let ciudadBien = $(this).find('p.ciudad').text();
            let tipoBien = $(this).find('p.tipo').text();
            let bienEnCiudadSeleccionada = ciudadBien.includes(ciudadSeleccionada);
            let bienEsTipoSeleccionado = tipoBien.includes(tipoBienSeleccionado);
            
            if (ciudadSeleccionada == "0" && tipoBienSeleccionado == "0") {
                $('.bien').show();
            } else if (ciudadSeleccionada != "0" && tipoBienSeleccionado != "0") {
                if (bienEnCiudadSeleccionada && bienEsTipoSeleccionado) {
                    $(this).show();    
                } else {
                    $(this).hide();
                }
            } else if (ciudadSeleccionada == "0" && tipoBienSeleccionado != "0") {
                if (!bienEsTipoSeleccionado) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            } else if (ciudadSeleccionada != "0" && tipoBienSeleccionado == "0") {
                if (!bienEnCiudadSeleccionada) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    }
});


$('.guardarBien').click(function() {
    let bien = $(this).parent();
    let direccion = bien.find('.direccionTexto').text();
    let ciudad = bien.find('.ciudadTexto').text();
    let telefono = bien.find('.telefonoTexto').text();
    let codigoPostal = bien.find('.codigoPostalTexto').text();
    let tipo = bien.find('.tipoTexto').text();
    let precio = bien.find('.precioTexto').text();

    $.ajax({
    method: "POST",
    url: "bienes.php",
    data: { 
        direccion: direccion,
        ciudad: ciudad,
        telefono: telefono,
        codigoPostal: codigoPostal,
        tipo: tipo,
        precio: precio
        }
    })
    .done(function( msg ) {
        alert("Guardado con éxito");
    });
    
});

$('#tabs ul li:nth-child(2)').click(function() {

    $.ajax({
        type: "GET",
        url: "bienes-guardados.php",             
        dataType: "html",            
        success: function(response){                    
            $("#tabs-2 .colContenido .card").after(response); 
        }
    });
});