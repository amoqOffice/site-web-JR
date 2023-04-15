<?php

use App\Enseignement;
use Illuminate\Database\Seeder;

class EnseignementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            Enseignement::create([
                'titre' => 'Enseignement '.$i,
                'description' => 'Lorem ipsum dolor sit amet',
                'lieu' => 'Benin',
                'image' => 'https://s35691.pcdn.co/wp-content/uploads/2021/11/day-picture-id1163588010.jpg',
            ]);
        }

    }
}
