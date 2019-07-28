<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Widget;
use Faker\Generator as Faker;

$factory->define(Widget::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
    ];
});
