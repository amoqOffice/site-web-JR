<?php

use App\Rubrique;
use Illuminate\Database\Seeder;

class RubriqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            Rubrique::create([
                'nom' => 'rubrique '.$i,
            ]);
        }
    }
}
