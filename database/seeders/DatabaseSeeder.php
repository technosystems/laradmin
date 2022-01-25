<?php

namespace Database\Seeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesAndPermissionsTableSeeder::class);
         $this->call(UsuariosTableSeeder::class);
         //$this->call(AdminTableSeeder::class);
    }
}
