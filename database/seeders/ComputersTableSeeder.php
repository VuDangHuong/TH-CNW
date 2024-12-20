<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Computer;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Computer::create([
                'computer_name' => $faker->word . '-PC',
                'model' => $faker->word . ' ' . $faker->randomNumber(3),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Linux']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5']),
                'memory' => $faker->randomElement([4, 8, 16, 32]),
                'available' => $faker->boolean,
            ]);
        }
    }
}

