$(document).ready(function() {
    $('[name="age-validation"]').submit(function(event) {
        var dia = $("#dia").val();
        var mes = $("#mes").val();
        var ano = $("#ano").val();
        var edadMinima = 16;

        var nacimiento = new Date();
        nacimiento.setFullYear(ano, mes - 1, dia);

        var actual = new Date();
        actual.setFullYear(actual.getFullYear() - edadMinima);

        if((actual - nacimiento) < 0) {
            alert("Lo sentimos, pero no cumples la edad mínima para poder realizar la evaluación.");
            return false;
        }

        return true;
    });
});