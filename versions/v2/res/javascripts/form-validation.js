$(document).ready(function() {
    $("#rut").rut({formatOn: 'keyup'});

    var dropdown = $('#region');
    var url = 'res/json/chile.min.json';
    var content;

    dropdown.empty().append('<option selected="true" disabled>Selecciona tu Región</option>');
    dropdown.prop('selectedIndex', 0);

    $.getJSON(url, function(data) {
        content = data;
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.region).text(entry.region));
        });
    });

    $('#region').change(function() {
        var value = $(this).val();

        var dropdown = $('#comuna');
        dropdown.empty().append('<option selected="true" disabled>Selecciona tu Comuna</option>');
        dropdown.prop('selectedIndex', 0);

        $.each(content, function(key, entry) {
            if(entry.region === value) {
                var comunas = [];

                $.each(entry.provincias, function(key, entry) {
                    $.each(entry.comunas, function(key, entry) {
                        comunas.push(entry.name);
                    });
                });

                comunas.sort(function(comuna, otraComuna) {
                    return comuna.localeCompare(otraComuna);
                });
                comunas.forEach(function(valor, indice, array) {
                    dropdown.append($('<option></option>').attr('value', valor).text(valor));
                });
            }
        });
    });

    $('[name="formulario"]').submit(function(event) {
        var rut = $('#rut');
        
        if(!$.validateRut(rut.val())) {
            alert("El rut ingresado no es válido.");
            return false;
        }

        return true;
    });
});