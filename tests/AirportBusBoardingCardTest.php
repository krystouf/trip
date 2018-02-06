<?php

namespace Chris\TripSorter\Test;

use Chris\TripSorter\BoardingCards\AirportBusBoardingCard;

class AirportBusBoardingCardTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $airportBusBoardingCard = new AirportBusBoardingCard('Casablanca', 'Gerona Airport');

        $this->assertEquals($airportBusBoardingCard->toString(),"Take the airport bus from Casablanca to Gerona Airport. No seat assignment.");
    }
}

