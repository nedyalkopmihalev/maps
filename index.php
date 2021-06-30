<?php
require 'OpenStreetMap.php';
require 'GoogleMap.php';
require 'Formatter.php';

$googleMapText = '';
$openStreetMapText = '';
$googleMapAddress = 'Античен+форум+"Августа+Траяна"';
$openStreetMapAddress = 'Античен форум, Антична улица, kv. Vazrazhdane, Stara Zagora, 6000, Bulgaria';

//Google Maps Coordinates
$googleMap = new GoogleMap();
try {
    $googleMapCoordinates = $googleMap->getCoordinatesFor($googleMapAddress);
} catch (Exception $e) {
    echo $e->getMessage() . '<br />';
}

if (!empty($googleMapCoordinates)) {
    $googleMapText .= 'Google Map Coordinates for address: ' . Formatter::formatAddress($googleMapAddress) . '<br />';
    $googleMapText .= 'Latitude: ' . $googleMapCoordinates->getLatitude() . '<br />';
    $googleMapText .= 'Longitude: ' . $googleMapCoordinates->getLongitude() . '<br />';
}

//OpenStreet Map Coordinates
$openStreetMap = new OpenStreetMap();
try {
    $openStreetMapCoordinate = $openStreetMap->getCoordinatesFor($openStreetMapAddress);
} catch (Exception $e) {
    echo $e->getMessage() . '<br />';
}

if (!empty($openStreetMapCoordinate)) {
    $openStreetMapText .= 'Open Street Map Coordinates for address: ' . Formatter::formatAddress($openStreetMapAddress) . '<br />';
    $openStreetMapText .= 'Latitude: ' . $openStreetMapCoordinate->getLatitude() . '<br />';
    $openStreetMapText .= 'Longitude: ' . $openStreetMapCoordinate->getLongitude() . '<br />';
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Google Map | Open Street Map</title>
    </head>

    <body>
        <h3>Google Map And Open Street Map coordinates</h3>
        <?php echo $googleMapText; ?>
        <br />
        <?php echo $openStreetMapText; ?>
    </body>
</html>
