<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMap\Services\Base;

use Ivory\GoogleMap\Exception\ServiceException;
use Ivory\GoogleMap\Base\Coordinate;

/**
 * Transit Details are provided as part of a direction step
 */
class Stop
{
    /** @var \Ivory\GoogleMap\Base\Coordinate */
    protected $location;

    /** @var string */
    protected $name;

    public function __construct($name, $location) {
        $this->setName($name);
        $this->setLocation($location->lng, $location->lat);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Gets the directions waypoint location.
     *
     * @return string | \Ivory\GoogleMap\Base\Coordinate The directions waypoint location.
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Sets the directions waypoint location.
     *
     * Available prototypes:
     * - function setLocation(string $destination)
     * - function setLocation(Ivory\GoogleMap\Base\Coordinate $destination)
     * - function setLocation(double $latitude, double $longitude, boolean $noWrap)
     *
     * @throws \Ivory\GoogleMap\Exception\DirectionsException If the location is not valid (prototypes).
     */
    public function setLocation($longitude, $latitude) {
        $this->location = new Coordinate();
        $this->location->setLatitude($latitude);
        $this->location->setLongitude($longitude);
    }
}
