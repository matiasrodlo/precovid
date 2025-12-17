$(document).ready(function() {
    $('#age-validation').submit(function(event) {
        var dia = $("#dia").val();
        var mes = $("#mes").val();
        var ano = $("#ano").val();
        var edad_minima = 16;

        if(!dia || !mes || !ano) {
            alert("Por favor, completa todos los campos de la fecha de nacimiento.");
            return false;
        }

        var parsedDia = parseInt(dia);
        var parsedMes = parseInt(mes);
        var parsedAno = parseInt(ano);

        // Validate day range for month
        var daysInMonth = new Date(parsedAno, parsedMes, 0).getDate();
        if (parsedDia > daysInMonth) {
            alert("El día seleccionado no es válido para el mes seleccionado.");
            return false;
        }

        // Validate date
        var dob = new Date();
        dob.setFullYear(parsedAno, parsedMes - 1, parsedDia);
        var yearMatch = dob.getFullYear() === parsedAno;
        var monthMatch = dob.getMonth() === (parsedMes - 1);
        var dayMatch = dob.getDate() === parsedDia;
        
        if(!yearMatch || !monthMatch || !dayMatch) {
            alert("Por favor, ingresa una fecha válida.");
            return false;
        }

        // Calculate age
        var hoy = new Date();
        var edad = hoy.getFullYear() - dob.getFullYear();
        var aux = hoy.getMonth() - dob.getMonth();
        if(aux < 0 || (aux === 0 && hoy.getDate() < dob.getDate())) {
            edad--;
        }

        $('#edad').val(edad);

        // Check minimum age
        if(edad < edad_minima) {
            alert("Lo sentimos, no cumples con la edad mínima para realizar la evaluación. Debes tener al menos 16 años.");
            return false;
        }

        return true;
    });

    // Visual feedback
    $('#dia, #mes, #ano').on('change', function() {
        var dia = $("#dia").val();
        var mes = $("#mes").val();
        var ano = $("#ano").val();
        if(dia && mes && ano) {
            $(this).removeClass('is-invalid');
        }
    });
});