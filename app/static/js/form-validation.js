$(document).ready(function() {
    var dropdown = $('#region');
    var url = '/static/json/countries.min.json';

    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(data, textStatus, jqXHR) {
            // Sort alphabetically
            data.sort(function(a, b) {
                return a.name.localeCompare(b.name, 'es', { sensitivity: 'base' });
            });
            $.each(data, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.name).text(entry.name));
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Fallback countries
            var fallbackCountries = ['Argentina', 'Bolivia', 'Brasil', 'Chile', 'Colombia', 'Ecuador', 'España', 'Estados Unidos', 'México', 'Perú'];
            $.each(fallbackCountries, function(key, country) {
                dropdown.append($('<option></option>').attr('value', country).text(country));
            });
        }
    });
});