<?php


namespace Chris\TripSorter\Utils\Sorters;


/**
 * Class ArraySorter
 *
 * The trip sorter "class". Contains all the sorting algorithm for n number of boarding passes.
 *
 * @package Chris\TripSorter\Utils\Sorters
 * @author Christophe Hammami <ami.chris@ymail.com>
 */
class ArraySorter
{
    /**
     * ArraySorter constructor.
     */
    function __construct()
    {
    }

    /**
     * Function to sort n number of boarding passes
     *
     * @param array $items
     * @return array $sortedBaseBoardingCards
     */
    public static function sort(array $items)
    {
        /*
         * This indexing step takes O(n) time.
         *
         *  Index the departure and arrival locations for fast lookup.
        */
        $departureIndex = self::createDepartureIndex($items);
        $arrivalIndex = self::createArrivalIndex($items);

        /*
         * This next step also takes O(n) time.
         */
        $startingLocation = self::getStartingLocation($items, $arrivalIndex);

        /*
         *  From the starting location, traverse the boarding passes, creating a sorted list as we go.
         *
         * This step takes O(n) time.
         */

        $sortedBaseBoardingCards = array();
        $currentLocation = $startingLocation;
        /*
         * Assign respective boarding pass while checking for undefined index
         */
        while ($currentBaseBoardingCard = (array_key_exists($currentLocation, $departureIndex)) ? $departureIndex[$currentLocation] : null) {
            /*
             *  Add the boarding pass to our sorted list.
             */
            array_push($sortedBaseBoardingCards, $currentBaseBoardingCard);

            /*
             *  Get our next location.
             */
            $currentLocation = $currentBaseBoardingCard->get('arrivalLocation');
        }

        /*
         * After O(3n) operations, we can now return the sorted boarding passes.
         */

        return $sortedBaseBoardingCards;
    }

    /**
     * This function creates an associative array of the randomly arranged boarding passes
     * Wth the departure locations being the key for the arrays
     *
     * @param array $boardingCards
     */
    static function createDepartureIndex($boardingCards)
    {
        foreach ($boardingCards as $baseBoardingCard) {
            $departureIndex[$baseBoardingCard->get('departureLocation')] = $baseBoardingCard;
        }
        return $departureIndex;

    }


    /**
     * This function creates an associative array of the randomly arranged boarding passes
     * With the arrival locations being the key for the arrays
     *
     * @param $boardingCards
     * @return mixed
     */
    static function createArrivalIndex($boardingCards)
        {
            foreach ($boardingCards as $baseBoardingCard) {
                $arrivalIndex[$baseBoardingCard->get('arrivalLocation')] = $baseBoardingCard;
            }
            return $arrivalIndex;

        }

    /*
     * based on the idea that the starting location is never set as arrival location
     * returns the first departure location, which also is the starting location
     *
     * @return string $departureLocation which contains the starting location for the whole trip
     */

    /**
     * @param $baseBoardingCards
     * @param $arrivalIndex
     * @return mixed
     */
    private static function getStartingLocation($baseBoardingCards, $arrivalIndex)
    {
        foreach($baseBoardingCards as $baseBoardingCard){
            $departureLocation = $baseBoardingCard->get('departureLocation');
            if (!array_key_exists($departureLocation, $arrivalIndex)) {
                return $departureLocation;
            }
        }
        return null;
    }
}
