<?php
session_start();

if( $_SESSION['logged_in'] == true) {

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Métadonnées de la page -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Météo</title>

        <!-- Liens vers les feuilles de style CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mx-auto mb-3">
                    <label for="villeInput">Entrez le nom de la ville :</label>
                    <input type="text" class="form-control" id="villeInput" placeholder="Entrez le nom de la ville">
                    <button class="btn btn-primary mt-2" id="envoyerButton">Envoyer</button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mb-3" id="coordinatesCard" style="display: none;">
                    <div class="card card-height">
                        <div class="card-body">
                            <h4 class="card-title">Coordonnées</h4>
                            <p class="card-text" id="coordinates"></p>
                            <div class="map-card" id="map"></div>
                        </div>
                    </div>
                </div>
                <!-- Carte de météo, masquée par défaut -->
                <div class="col-md-6 mb-3" id="weatherCard" style="display: none;">
                    <div class="card card-height">
                        <div class="card-body">
                            <h4 class="card-title">Météo</h4>
                            <p class="card-text" id="weatherDescription"></p>
                            <p class="card-text" id="weatherTemperature"></p>
                            <p class="card-text" id="weatherWindSpeed"></p>
                            <img id="imageIcon" src="" class="weather-icon" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Surimpression de chargement -->
        <div class="loading-overlay">
            <div class="loading-spinner">
                <!-- Spinner Bootstrap pour l'indication du chargement -->
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Chargement...</span>
                </div>
            </div>
        </div>

        <!-- Scripts JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="js/config.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
<?php
} else {
header('Location: index.php');
}
?>