$(document).ready(function() {
    const apiUrl = 'https://geo.api.gouv.fr/communes?codePostal=';
    const format = '&format=json';

    let zipcode = $('#zipcode');
    let city = $('#city');
    let errorMessage = $('#error-message');

    function updateCityOptions() {
        let code = $(zipcode).val();
        let url = apiUrl + code + format;
        fetch(url, { method: 'get' })
            .then(response => response.json())
            .then(results => {
                $(city).find('option').remove();
                if (results.length) {
                    $(errorMessage).text('').hide();
                    $.each(results, function(key, value) {
                        console.log(value.nom);
                        $(city).append('<option value="' + value.nom + '">' + value.nom + '</option>');
                    });
                } else {
                    if ($(zipcode).val()) {
                        console.log('Erreur de code postal.');
                        $(errorMessage).text('Aucune commune avec ce code postal.').show();
                    } else {
                        $(errorMessage).text('').hide();
                    }
                }
            })
            .catch(err => {
                console.log(err);
                $(city).find('option').remove();
            });
    }

    // Appeler la fonction lors du chargement initial de la page
    updateCityOptions();

    // Appeler la fonction lors de l'événement "input"
    $(zipcode).on('input', function() {
        updateCityOptions();
    });
});
