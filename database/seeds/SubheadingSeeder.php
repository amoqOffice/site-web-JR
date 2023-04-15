<?php

use App\Subheading;
use Illuminate\Database\Seeder;

class SubheadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            Subheading::create([
                'nom' => 'Sous-rubrique '.$i,
            ]);
        }
    }
}
