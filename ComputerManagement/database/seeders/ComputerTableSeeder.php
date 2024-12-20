<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ComputerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 100 ; $i++){
            DB::table('computers')->insert([
                'computer_name' => $faker->name(),
                'model' => $faker->city(),
                'operating_system' => $faker->company(),
                'processor' => $faker->country(),
                'memory' => $faker->numberBetween(2, 64),
                'available' => $faker->boolean(),
            ]);
        }
    }
}
