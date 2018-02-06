<?php
namespace Chris\TripSorter\Test;

use Chris\TripSorter\BoardingCards\TrainBoardingCard;

class TrainBoardingCardTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $trainBoardingCard = new TrainBoardingCard('Madrid', 'Casablanca', '45B', '78A');

        $this->assertEquals($trainBoardingCard->toString(),"Take train 78A from Madrid to Casablanca. Sit in seat 45B.");
    }
}

