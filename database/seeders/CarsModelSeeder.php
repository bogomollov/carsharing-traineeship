<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\CarsModels;

class CarsModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        $models = array(
            ['Q6', 'Q3', 'Q5'],
            ['Cayene', '911'],
            ['Polo', 'Golf', 'Tuguan'],
            ['Escalade', 'CTS'],
            ['Impala', 'Cobalt', 'Camaro'],
            ['Grand Cherokee'],
            ['812'],
            ['CSL', '63AMG', 'GLE'],
            ['X5', 'X3'],
            ['Phantom'],
        );

        foreach ($models as $model_name) {
            CarsModels::create([
                'id' => Str::uuid(),
                'mark_id' => Str::uuid(),
                'name' => $model_name,
            ]);
        }
    }
}