<?php
require 'Config.php';
require 'Map.php';
require 'Coordinates.php';

/**
 * Class OpenStreetMap
 */
class OpenStreetMap extends Map
{
    /**
     * @param string $address
     * @return Coordinates
     */
    public function getCoordinatesFor(string $address): Coordinates
    {
        if (!$address) {
            throw new Exception('Open Street Map address missing!');
        }

        $coordinates = new Coordinates();

        $opts = ['http' => ['header' => 'User-Agent: StevesCleverAddressScript 3.7.6\r\n']];
        $context = stream_context_create($opts);

        $content = file_get_contents(Config::$openStreetMapDomain . '/search?q=' . urlencode($address) . '&format=json&polygon=1&addressdetails=1', false, $context);
        $content = json_decode($content, true);

        $coordinates->setLatitude($content[0]['lat'] ?? 43);
        $coordinates->setLongitude($content[0]['lon'] ?? 25);

        return $coordinates;
    }

}