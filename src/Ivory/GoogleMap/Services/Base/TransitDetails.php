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

/**
 * Transit Details are provided as part of a direction step
 */
class TransitDetails
{
    protected $arrival_stop;

    protected $arrival_time;

    protected $departure_stop;

    protected $departure_time;

    protected $headsign;

    protected $line;

    protected $num_stops;
    
    /**
     * Creates a distance.
     *
     * @param string $text  The distance as text.
     * @param double $value The distance in meters.
     */
    public function __construct($arrival_stop, $arrival_time, $departure_stop, $departure_time, $headsign, $line, $num_stops) {
        $this->setArrivalStop  ($arrival_stop);
        $this->setArrivalTime  ($arrival_time);
        $this->setDepartureStop($departure_stop);
        $this->setDepartureTime($departure_time);
        $this->setHeadsign     ($headsign);
        $this->setLine         ($line);
        $this->setNumStops     ($num_stops);
    }

    public function setArrivalStop($arrival_stop) {
        $this->arrival_stop = new Stop($arrival_stop->name, $arrival_stop->location);
    }   

    public function getArrivalStop() {
        return $this->arrival_stop;
    }   

    public function setArrivalTime($arrival_time) {
        $this->arrival_time = ( new \DateTime('@'.$arrival_time->value) )->setTimezone(new \DateTimeZone($arrival_time->time_zone));
    }

    public function getArrivalTime() {
        return $this->arrival_time;
    }

    public function setDepartureStop($departure_stop) {
        $this->departure_stop = new Stop($departure_stop->name, $departure_stop->location);
    }

    public function getDepartureStop() {
        return $this->departure_stop;
    }

    public function setDepartureTime($departure_time) {
        $this->departure_time = ( new \DateTime('@'.$departure_time->value) )->setTimezone(new \DateTimeZone($departure_time->time_zone));
    }

    public function getDepartureTime() {
        return $this->$departure_time;
    }

    public function setHeadsign($headsign) {
        $this->headsign = $headsign;
    }

    public function getHeadsign() {
        return $this->headsign;
    }

    public function setLine($line) {
        $this->line = $line;
    }        

    public function getLine() {
        return $this->line;
    }        

    public function setNumStops($num_stops) {
         $this->num_stops = $num_stops;
    }        

    public function getNumStops() {
        return $this->num_stops;
    }        
}
