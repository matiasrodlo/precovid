$(document).ready(function() {
    var dropdown = $('#region');
    //var url = 'res/json/chile.min.json';
    var url = 'res/json/latam.min.json';
    var content;

    dropdown.empty().append('<option selected="true" disabled>Selecciona tu País</option>');
    dropdown.prop('selectedIndex', 0);

    $.getJSON(url, function(data) {
        content = data;
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.name).text(entry.name));
        });
    });

    $('#region').change(function() {
        var value = $(this).val();

        $.each(content, function(key, entry) {
            if(entry.name === value) {
                var dropdown = $('#codigos');
                dropdown.empty();

                $.each(entry.calling_code, function(key, entry) {
                    dropdown.append($('<option></option>').attr('value', entry.code).text('+' + entry.code));
                });

                dropdown.prop('selectedIndex', 0);
            }
        });
    });
});