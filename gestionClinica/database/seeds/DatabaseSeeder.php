<?php

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
        $this->call(ClinicasTableSeeder::class);
        $this->call(BoxesTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(rolsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(entradasTableSeeder::class);
        $this->call(citasTableSeeder::class);
    }
}
