<?php

use App\Culte;
use Illuminate\Database\Seeder;

class CulteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            Culte::create([
                'titre' => 'Culte '.$i,
                'description' => 'desc',
                'image' => 'https://img.over-blog-kiwi.com/2/08/48/61/20170823/ob_b4c582_evangelisation.jpg',
                'lien' => 'A',
                'type' => 'Evangelisation',
            ]);
        }
    }
}
