#TRIP SORTER by Christophe Hammami

### How to execute the code

Extract the ZIP file in the webroot of your web server, e.g. C:\xamp\htdocs

Navigate to the trip directory.
```
cd trip
```

Install the PHP dependencies (phpunit, phpdoc) and generate the autoloading file.

```
composer install
```

## Tests
To run tests make sure you are in the main folder, and then you can run this command line :

```
vendor/phpunit/phpunit/phpunit tests/TripTest.php
```

Repeat for the other test files


### Trying the API
* Browse the package url via browser, It should output a sorted list.

### Extending class
* You can create new types of transports by extending the AbstractBoardingCard.

### Level of complexity
* There are three steps in the sorting alo each of O(n) = 3n.