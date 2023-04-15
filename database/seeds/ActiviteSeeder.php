<?php

use App\Activite;
use Illuminate\Database\Seeder;

class ActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            Activite::create([
                'titre' => 'Activite '.$i,
                'description' => 'desc',
                'pays' => 'France',
                'image' => 'https://img.over-blog-kiwi.com/2/08/48/61/20170823/ob_b4c582_evangelisation.jpg',
                'lien' => 'A',
                'type' => 'Evangelisation',
            ]);
        }
    }
}
