$(document).ready(function() {
    $('[name="age-validation"]').submit(function(event) {
        var dia = $("#dia").val();
        var mes = $("#mes").val();
        var ano = $("#ano").val();
        var edad_minima = 16;

        if(!dia || !mes || !ano) {
            alert("Por favor, ingresa tu fecha de nacimiento");
            return false;
        } else {
            // Fecha de nacimiento
            var dob = new Date();
            dob.setFullYear(ano, mes - 1, dia);

            // Verificar si fecha es válida
            if((dob.getFullYear() !== ano) && (dob.getMonth() !== (mes - 1)) && (dob.getDate() !== dia)) {
                alert("Por favor, ingresa una fecha válida.");
                return false;
            }

            // Calcular edad
            var hoy = new Date();
            var edad = hoy.getFullYear() - dob.getFullYear();
            var aux = hoy.getMonth() - dob.getMonth();

            if(aux < 0 || aux === 0 && hoy.getDate() < dob.getDate()) {
                edad--;
            }
            $('#edad').val(edad);

            // Verificar mayor a edad minima
            if(edad < edad_minima) {
                alert("Lo sentimos, no cumples con la edad mínima para realizar la evaluación.");
                return false;
            }

            return true;
        }
    });
});