<?php

use Faker\Generator as Faker;
use App\Course;

$factory->define(Course::class, function (Faker $faker) {
    return [
        "name" => $faker->text(8),
        "num_classes" => $faker->numberBetween(25,30)

    ];
});
