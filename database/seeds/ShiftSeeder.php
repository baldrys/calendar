<?php

use App\ShiftModel;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        ShiftModel::create([
            'name' => '1 смена',
        ]);
        ShiftModel::create([
            'name' => '2 смена',
        ]);
        ShiftModel::create([
            'name' => 'ночь',
        ]);
    }
}
