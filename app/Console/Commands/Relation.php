<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\Filesystem;
use stdClass;

class Relation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:relation {name}';
    protected $migration_one_many;
    protected $relation;
    protected $models;
    protected $migrationPath;
    protected $stub_var_model_1;
    protected $stub_var_model_2;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->migration_one_many = (object)[
            "migration_class" => "",
            "migration_table1" => "",
            "migration_table2" => "",
            "index_field" => "",
        ];

        $this->migration_many_many = (object)[
            "migration_class" => "",
            "migration_table" => "",
            "table1" => "",
            "table2" => "",
        ];

        $this->relation = "";
        $this->migrationPath = "";
        $this->stub_var_model_1 = (object)[
            "fonction_name" => "",
            "fonction_type" => "",
            "model" => "",
            "path" => "",
        ];
        $this->stub_var_model_2 = (object)[
            "fonction_name" => "",
            "fonction_type" => "",
            "model" => "",
            "path" => "",
        ];
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $argument = $this->argument('name'); //php artisan make:relation Produit-Categorie,one-to-one

        $info = $this->trierInput($argument);

        $this->verfierModels($this->models);

        $this->creerMigration();

        $this->genererModels();

        $this->info("Relation $this->relation entre ".$this->models[0]." et ".$this->models[1]." a bien ete genere");

        return 0;
    }

    public function trierInput(string $userInput)
    {
        $userInput = str_replace(' ', '', $userInput);

        $this->models = explode('-', explode(',', $userInput)[0]);

        $this->models[0] = ucfirst($this->models[0]);
        $this->models[1] = ucfirst($this->models[1]);

        $this->relation = str_replace('-', '_', explode(',', $userInput)[1]);
    }

    public function verfierModels(array $models)
    {
        foreach ($models as $model) {
            $filename = 'app/'.$model.'.php';

            if (!file_exists($filename)) {
                echo "The file $model.php does not exist";
                die();
            }
        }
    }

    public function genererModels()
    {
        $this->stub_var_model_1->path = 'app/'.$this->models[0].'.php';
        $this->stub_var_model_2->path = 'app/'.$this->models[1].'.php';

        if($this->relation == 'one_to_one')
        {
            $this->stub_var_model_1->fonction_name = strtolower($this->models[1]);
            $this->stub_var_model_1->fonction_type = "hasOne";
            $this->stub_var_model_1->model = $this->models[1].'::class';

            $this->actualiserModel($this->stub_var_model_1->path, $this->stub_var_model_1);

            $this->stub_var_model_2->fonction_name = strtolower($this->models[0]);
            $this->stub_var_model_2->fonction_type = "belongsTo";
            $this->stub_var_model_2->model = $this->models[0].'::class';

            $this->actualiserModel($this->stub_var_model_2->path, $this->stub_var_model_2);
        }
        elseif ($this->relation == 'one_to_many')
        {
            $this->stub_var_model_1->fonction_name = strtolower($this->models[1]).'s';
            $this->stub_var_model_1->fonction_type = "hasMany";
            $this->stub_var_model_1->model = $this->models[1].'::class';

            $this->actualiserModel($this->stub_var_model_1->path, $this->stub_var_model_1);

            $this->stub_var_model_2->fonction_name = strtolower($this->models[0]);
            $this->stub_var_model_2->fonction_type = "belongsTo";
            $this->stub_var_model_2->model = $this->models[0].'::class';

            $this->actualiserModel($this->stub_var_model_2->path, $this->stub_var_model_2);
        }
        elseif ($this->relation == 'many_to_many')
        {
            $this->stub_var_model_1->fonction_name = strtolower($this->models[1]).'s';
            $this->stub_var_model_1->fonction_type = "belongsToMany";
            $this->stub_var_model_1->model = $this->models[1].'::class';

            $this->actualiserModel($this->stub_var_model_1->path, $this->stub_var_model_1);

            $this->stub_var_model_2->fonction_name = strtolower($this->models[0]).'s';
            $this->stub_var_model_2->fonction_type = "belongsToMany";
            $this->stub_var_model_2->model = $this->models[0].'::class';

            $this->actualiserModel($this->stub_var_model_2->path, $this->stub_var_model_2);
        }
    }

    public function actualiserModel($path, $data)
    {
        $stub_model = 'stubs/relations/model_relationship.stub';

        if($this->verifierFichier($path))
        {
            $value = $this->actualiserDonnees($stub_model, [
                "{{ FN_NAME }}" => $data->fonction_name,
                "{{ FN_TYPE }}" => $data->fonction_type,
                "{{ MODEL }}" => $data->model,
                "{{ migration_table_name }}" => strtolower($this->models[0]).'_'.strtolower($this->models[1]),
            ]);

            $this->remplirFichier($path, $value);

            return true;
        }

        return false;
    }

    public function remplirFichier($path, $data)
    {
        if($this->verifierFichier($path))
        {
            $file = file_get_contents($path);

            $file = str_replace('//', $data, $file);

            file_put_contents($path, $file);
        }
    }

    public function verifierFichier($file)
    {
        if (file_exists($file)) {
            return true;
        }
        return false;
    }

    public function creerMigration()
    {
        if($this->relation == 'many_to_many')
        {
            $migrationTime = date("Y_m_d_His")."_";

            $migrationName = "create_".strtolower($this->models[0])."_".strtolower($this->models[1]).'_table';

            $migrationPath = "database/migrations/".$migrationTime.$migrationName.".php";

            $this->migration_many_many->migration_class = $this->camelCase($migrationName);

            $this->migration_many_many->migration_table = strtolower($this->models[0]).'_'.strtolower($this->models[1]);

            $this->migration_many_many->table1 = strtolower($this->models[0]);

            $this->migration_many_many->table2 = strtolower($this->models[1]);

            $this->migrationPath = $this->creerFichier($migrationPath, $this->donneesMigrationAvecRelation());
        }
        else
        {
            $migrationTime = date("Y_m_d_His")."_";

            $migrationName = "relation_".strtolower($this->relation).'_'.strtolower($this->models[0])."_".strtolower($this->models[1]);

            $migrationPath = "database/migrations/".$migrationTime.$migrationName.".php";

            $this->migration_one_many->migration_class = $this->camelCase($migrationName);

            $this->migration_one_many->migration_table1 = strtolower($this->models[1])."s";

            $this->migration_one_many->migration_table2 = strtolower($this->models[0])."s";

            $this->migration_one_many->index_field = strtolower($this->models[0])."_id";

            $this->migrationPath = $this->creerFichier($migrationPath, $this->donneesMigrationAvecRelation());
        }
    }

    private function donneesMigrationAvecRelation()
    {
        $output = [];
        if($this->relation == "one_to_one" || $this->relation == "one_to_many")
        {
            $output = $this->actualiserDonnees("stubs/relations/migration_foreign_key.stub", [
                "{{ migration_class }}" => $this->migration_one_many->migration_class,
                "{{ migration_table_1 }}" => $this->migration_one_many->migration_table1,
                "{{ migration_table_2 }}" => $this->migration_one_many->migration_table2,
                "{{ index_field }}" => $this->migration_one_many->index_field,
            ]);
        }
        elseif ($this->relation == "many_to_many")
        {
            $output = $this->actualiserDonnees("stubs/relations/migration_many_to_many.stub", [
                "{{ migration_class }}" => $this->migration_many_many->migration_class,
                "{{ migration_table }}" => $this->migration_many_many->migration_table,
                "{{ table1 }}" => $this->migration_many_many->table1,
                "{{ table2 }}" => $this->migration_many_many->table2,
            ]);
        }

        return $output;
    }

    /**
     * Créés le chemin si il n'existe pas
     *
     * @param $path
     */
    private function creerFichier($path, $data)
    {
        if (!file_exists($path))
        {
            $myfile = fopen($path, "w") or die("Unable to open file!");
            fwrite($myfile, $data);
            fclose($myfile);
        }

        return $path;
    }

    private function camelCase($text)
    {
        $text = str_replace(' ', '_', $text);
        $output = '';
        $textes = explode('_', strtolower($text));

        foreach($textes as $text)
        {
            $output .= ucfirst($text);
        }

        return $output;
    }

    private function actualiserDonnees(string $path, array $data)
    {
        $file = file_get_contents($path);
        foreach ($data as $key => $value)
        {
            $file = str_replace($key, $value, $file);
        }

        return $file;
    }
}
