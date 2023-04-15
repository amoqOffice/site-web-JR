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
        // $this->call(PermissionSeeder::class);
        $this->call(EnseignementSeeder::class);
        $this->call(RubriqueSeeder::class);
        $this->call(SubheadingSeeder::class);
        $this->call(TempleSeeder::class);
        $this->call(ActiviteSeeder::class);
        $this->call(CulteSeeder::class);
        $this->call(ResponsableSeeder::class);
        $this->call(ForeignSeeder::class);
    }
}
