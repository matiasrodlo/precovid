$(document).ready(function() {
    console.log('Document ready');
    var dropdown = $('#region');
    var url = '/res/json/countries.min.json';
    var content;

    // Initialize country dropdown
    dropdown.empty().append('<option selected="true" disabled>Selecciona tu País</option>');
    dropdown.prop('selectedIndex', 0);

    console.log('Fetching JSON from:', url);
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(data, textStatus, jqXHR) {
            console.log('AJAX success. Status:', textStatus);
            console.log('Raw response:', jqXHR.responseText);
            console.log('JSON data received:', data);
            content = data;
            $.each(data, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.name).text(entry.name));
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX error. Status:', textStatus, 'Error:', errorThrown);
            console.error('Raw response:', jqXHR.responseText);
            dropdown.append($('<option></option>').attr('value', 'Chile').text('Chile'));
        },
        complete: function(jqXHR, textStatus) {
            console.log('AJAX complete. Status:', textStatus);
        }
    });

    // Handle country selection change
    $('#region').change(function() {
        var selectedCountry = $(this).val();
        console.log('Country selected:', selectedCountry);
    });

    // Trigger change event if Chile is selected by default
    if (dropdown.val() === 'Chile') {
        dropdown.trigger('change');
    }

    // Force all internal <a> clicks to trigger a full page reload
    // $(document).on('click', 'a', function(e) {
    //     var href = $(this).attr('href');
    //     if (href && href.startsWith('/') && !$(this).attr('target')) {
    //         window.location = href;
    //         return false;
    //     }
    // });
});