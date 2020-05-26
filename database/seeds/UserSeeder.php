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
        DB::table('users')->insert([
            'name' => 'administrador',
            'user' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1
        ]);

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
