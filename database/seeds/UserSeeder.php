<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i <= 10; $i++){
            DB::table('users')->insert([
                'name' => 'fake'.$i,
                'user' => 'fake'.$i,
                'email' => 'fake'.$i.'@gmail.com',
                'password' => bcrypt('12345678')
            ]);

        }
    }
}
