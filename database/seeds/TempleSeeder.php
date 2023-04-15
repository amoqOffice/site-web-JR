<?php

use App\Temple;
use Illuminate\Database\Seeder;

class TempleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            Temple::create([
                'nom' => 'Temple '.$i,
                'adresse' => 'adresse '.$i,
                'adresse_map' => 'adresse_map '.$i,
            ]);
        }
    }
}
