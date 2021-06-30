<?php

/**
 * Class GoogleMap
 */
class GoogleMap extends Map
{
    /**
     * @param string $address
     * @return Coordinates
     */
    public function getCoordinatesFor(string $address): Coordinates
    {
        if (!$address) {
            throw new Exception('Google Map address missing!');
        }

        $coordinates = new Coordinates();

        $content = file_get_contents(Config::$googleDomain . '/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=false&key=' . Config::$googleApiKey);
        $content = json_decode($content, true);

        if ($geocode['status'] = 'OK') {
            $coordinates->setLatitude($content['results'][0]['geometry']['location']['lat'] ?? 43);
            $coordinates->setLongitude($content['results'][0]['geometry']['location']['lng'] ?? 25);
        }

        return $coordinates;
    }

}