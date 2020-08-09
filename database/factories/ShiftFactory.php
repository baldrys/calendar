<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShiftModel;
use Faker\Generator as Faker;

$shifts = ['1 смена', '2 смена', 'ночь'];

$factory->define(ShiftModel::class, function (Faker $faker) use ($shifts) {
    return [
        'name' => $shifts[array_rand($shifts)],
    ];
});
