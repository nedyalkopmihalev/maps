<?php

/**
 * Class Map
 */
abstract class Map
{
    /**
     * @param string $address
     * @return Coordinates
     */
    abstract function getCoordinatesFor(string $address): Coordinates;
}