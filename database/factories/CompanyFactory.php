<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompanyModel;
use Faker\Generator as Faker;

$factory->define(CompanyModel::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
