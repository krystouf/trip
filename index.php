<?php
namespace Chris\TripSorter;

require_once __DIR__ . '/vendor/autoload.php';

use Chris\TripSorter\BoardingCards\AirportBusBoardingCard;
use Chris\TripSorter\BoardingCards\FlightBoardingCard;
use Chris\TripSorter\BoardingCards\TrainBoardingCard;

    // Lets plan a trip :)
    $trip = new  Trip();

    $trip->addCard(new FlightBoardingCard('Stockholm', 'New York JFK', '7B', 'SK22', '22'));
    $trip->addCard(new FlightBoardingCard('Gerona Airport', 'Stockholm', '3A', 'SK455', '45B', '344'));
    $trip->addCard(new TrainBoardingCard('Madrid', 'Valencia', '45B', '7889'));
    $trip->addCard(new TrainBoardingCard('Valencia', 'Barcelona', '30A', '3556'));
    $trip->addCard(new AirportBusBoardingCard('Barcelona', 'Gerona Airport'));

    $trip->sortCard();

    echo ($trip->toHtml());
?>