<?php

use App\Activite;
use App\Culte;
use App\Enseignement;
use App\Responsable;
use App\Rubrique;
use App\Subheading;
use App\Temple;
use Illuminate\Database\Seeder;

class ForeignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Relation Responsable et Enseignements
        $responsable = Responsable::find(1);
        $responsable->enseignements()->sync([1,2]);

        $responsable = Responsable::find(2);
        $responsable->enseignements()->sync([3,4]);

        $responsable = Responsable::find(3);
        $responsable->enseignements()->sync([5]);


        // Relation Responsable et Temple
        $responsable = Responsable::find(1);
        $responsable->temples()->sync([1,2]);

        $responsable = Responsable::find(2);
        $responsable->temples()->sync([3,4]);

        $responsable = Responsable::find(3);
        $responsable->temples()->sync([5]);


        // Relation Responsable et Culte
        $responsable = Responsable::find(1);
        $responsable->cultes()->sync([1,2]);

        $responsable = Responsable::find(2);
        $responsable->cultes()->sync([3,4]);

        $responsable = Responsable::find(3);
        $responsable->cultes()->sync([5]);

        
        // Relation Enseignement et Rubrique
        $enseignement = Enseignement::find(1);
        $enseignement->rubriques()->sync([1,2]);

        $enseignement = Enseignement::find(2);
        $enseignement->rubriques()->sync([3,4]);

        $enseignement = Enseignement::find(3);
        $enseignement->rubriques()->sync([5]);

        // Relation Rubrique et Subheading
        $subheading1 = Subheading::find(1);
        $subheading2 = Subheading::find(2);
        $subheading3 = Subheading::find(3);
        $subheading4 = Subheading::find(4);
        $subheading5 = Subheading::find(5);
        Rubrique::first()->subheadings()->saveMany([$subheading1, $subheading2]);
        Rubrique::find(2)->subheadings()->saveMany([$subheading3, $subheading4]);
        Rubrique::find(3)->subheadings()->save($subheading5);

        // Relation Temple et Culte
        $culte1 = Culte::find(1);
        $culte2 = Culte::find(2);
        $culte3 = Culte::find(3);
        $culte4 = Culte::find(4);
        $culte5 = Culte::find(5);
        Temple::first()->cultes()->saveMany([$culte1, $culte2]);
        Temple::find(2)->cultes()->saveMany([$culte3, $culte4]);
        Temple::find(3)->cultes()->save($culte5);

        // Relation Temple et Activite
        $activite1 = Activite::find(1);
        $activite2 = Activite::find(2);
        $activite3 = Activite::find(3);
        $activite4 = Activite::find(4);
        $activite5 = Activite::find(5);
        Temple::first()->activites()->saveMany([$activite1, $activite2]);
        Temple::find(2)->activites()->saveMany([$activite3, $activite4]);
        Temple::find(3)->activites()->save($activite5);

    }
}
