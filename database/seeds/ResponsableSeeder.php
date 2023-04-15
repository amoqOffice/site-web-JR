<?php

use App\Responsable;
use Illuminate\Database\Seeder;

class ResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            Responsable::create([
                'nom' => 'Responsable '.$i,
                'telephone' => '+229 20 30 14 '.$i*10,
                'ministere' => 'Docteur '.$i,
            ]);
        }
    }
}
