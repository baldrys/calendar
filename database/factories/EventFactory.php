<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompanyModel;
use App\EventModel;
use App\ShiftModel;
use App\User;
use Faker\Generator as Faker;

$workType = ['тип работы 1', 'тип работы 2', 'тип работы 3'];
$startDate = '2020-08-09';
$endDate = '2020-08-14';

$factory->define(EventModel::class, function (Faker $faker) use ($workType, $startDate, $endDate) {
    static $id = 0;
    return [
        'name' => "Событие " . ++$id,
        'price' => $faker->randomFloat(3, 0, 1000),
        'work_type' => $workType[array_rand($workType)],
        'company_id' => function () {
            return CompanyModel::all()->random()->id;
        },
        'employee_id' => function () {
            return User::all()->random()->id;
        },
        'shift_id' => function () {
            return ShiftModel::all()->random()->id;
        },
        'date' => function () use ($startDate, $endDate, $faker) {
            $employeeId = User::all()->random()->id;
            $shiftId = ShiftModel::all()->random()->id;
            $companyId = CompanyModel::all()->random()->id;

            $date = $faker->dateTimeBetween($startDate, $endDate);
            $isDateOk = !EventModel::where('company_id', $companyId)
                ->where('shift_id', $shiftId)
                ->where('date', $date)->exists();

            while (!$isDateOk) {
                $date = $faker->dateTimeBetween($startDate, $endDate);
                $isDateOk = !EventModel::where('company_id', $companyId)
                    ->where('shift_id', $shiftId)
                    ->where('date', $date)->exists();
            }
            return $date;
        },
    ];
});
