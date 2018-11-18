<?php

use Faker\Generator as Faker;
use App\Console;

$factory->define(Console::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),
        'description' => $faker->sentence(10)
    ];
});
