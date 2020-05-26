<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Documents;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $countUser = count( User::all());

        for($i=0; $i <= 20; $i++){
            Documents::create([
                'user_id' => $faker->numberBetween(1,$countUser),
                'name' => 'Documento '.$i,
                'ext'  => $faker->randomElement(['jpg','pdf']),
                'type' => $faker->randomElement(['PICTURE','CV'])
            ]);

        }

    }
}
