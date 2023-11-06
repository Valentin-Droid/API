$(document).ready(function() {
    var map;

    $('#envoyerButton').on('click', function() {
        // Affichez l'animation de chargement
        $('.loading-overlay').show();

        var selectedVille = $('#villeInput').val();
        var apiUrl = 'https://api-adresse.data.gouv.fr/search/?q=' + selectedVille;

        $.ajax({
            url: apiUrl,
            method: 'GET',
            success: function(data) {
                var latitude = data.features[0].geometry.coordinates[1];
                var longitude = data.features[0].geometry.coordinates[0];
                $('#coordinates').text('Latitude : ' + latitude + ', Longitude : ' + longitude);

                if (map) {
                    map.remove();
                }
                map = L.map('map').setView([latitude, longitude], 12);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                var weatherApiUrl = 'https://api.openweathermap.org/data/2.5/weather?lat=' + latitude + '&lon=' + longitude + '&appid=44db16db91ed95ba40b859d2a01c1d96&lang=fr';

                $.ajax({
                    url: weatherApiUrl,
                    method: 'GET',
                    success: function(weatherData) {
                        var temperature = (weatherData.main.temp - 273.15).toFixed(1);
                        var description = weatherData.weather[0].description;
                        var windSpeed = weatherData.wind.speed;
                        var icon = weatherData.weather[0].icon;
                        var weatherIconUrl = 'https://openweathermap.org/img/wn/' + icon + '.png';

                        $('#weatherDescription').text('Description : ' + description);
                        $('#weatherTemperature').text('Température : ' + temperature + ' C°');
                        $('#weatherWindSpeed').text('Vent : ' + (windSpeed * 3.6).toFixed(1) + ' km/h');
                        $('#imageIcon').attr('src', weatherIconUrl);

                        // Montrez les cartes une fois que les données sont chargées
                        $('#coordinatesCard').show();
                        $('#weatherCard').show();
                    },
                    error: function(error) {
                        console.error('Erreur lors de la requête météo :', error);
                    }
                }).always(function() {
                    // Cachez l'animation de chargement
                    $('.loading-overlay').hide();
                });
            },
            error: function(error) {
                console.error('Erreur lors de la requête :', error);
            }
        });
    });
});
