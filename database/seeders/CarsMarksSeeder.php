<?php

namespace Database\Seeders;

use App\Models\CarManufacturer;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CarMark;

class CarsMarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marks = array(
            ['Audi', 'Porsche', 'Volkswagen'],
            ['Cadillac', 'Chevrolet'],
            ['Jeep', 'Ferrari'],
            ['Mercedes-Benz'],
            ['BMW', 'Rolls-Royce'],
        );

        foreach ($marks as $mark_name) {
            foreach ($mark_name as $name) {
                CarMark::create([
                    'id' => fake()->uuid(),
                    'manufacturer_id' => CarManufacturer::all('id')->random()->id,
                    'name' => $name,
                ]);
            }
        }
    }
}