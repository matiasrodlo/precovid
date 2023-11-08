$(document).ready(function() {
    $.getJSON("/res/json/countries.min.json", function(data) {
        var countries = [];
        $.each(data, function(key, val) {
            countries.push(val.name.es);
        });

        countries.sort((a, b) => a.localeCompare(b));
        $.each(countries, function(index, element) {
            $('#pais').append($('<option></option>').attr('value', element).text(element));
        });
    });
});