<?php

// Testing Composer Package: Collection

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([1, 2, 3, 4, 5, 6]);

// if ($numbers->contains(1)) {
//     die('it contains 1');
// }

$lessThan = $numbers->filter(function ($number) {
    return $number <= 3;
});

die($result);
