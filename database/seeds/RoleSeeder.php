<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'name' => 'Administrador',
            'description' => 'rol admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Empleado',
            'description' => 'rol empleado'
        ]);


    }
}
