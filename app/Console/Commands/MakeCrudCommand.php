<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;
use stdClass;

class MakeCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create crud view, update route, model, controller from existing migration';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $argument = $this->argument('name');
        // Met à jour le model ou le créé si il n'existe pas
        $this->appendModel($argument);

        // Met à jour le controller ou le créé si il n'existe pas
        $this->appendController($argument);

        // Créé les vues et les met à jour
        $this->appendViews($argument);

        $this->appendForm($argument);
        $this->appendIndex($argument);

        // Met à jour le menu
        $this->appendMenu($argument);

        // Met à jour les routes
        $this->appendRoutes($this->argument('name'));

        $this->info("Crud de $argument créé avec succès.");

        // $this->getFieldMigration($this->argument('name'));

        // // Si option cutom choisi
        // if ($this->option('custom')) {
        //     // User édite les propriétés et la disposition des inputs
        //     $this->customForm($this->argument('name'));

        //     // User choisit les champs du table dans index
        //     $this->customIndex($this->argument('name'));
        // }
    }

    public function appendModel($name)
    {
        $modelName = ucfirst($name);

        $modelPath = "app/$modelName.php";

        $this->createDir($modelPath);

        $newModelContent = $this->files->get("stubs/model.stub");

        $newModelContent = str_replace('{{ class }}', $modelName, $newModelContent);

        // Efface le contenu du fichier
        $this->files->replace($modelPath, '');

        $this->files->append($modelPath, $newModelContent);

        $this->info("Model $modelName est bien mis à jour.");
    }

    public function appendView($name, $viewName)
    {
        $modelName = ucfirst($name);

        $modelVariable = strtolower($name);

        $viewPath = "/ressources/views/$modelName/$viewName.blade.php";

        $this->createDir($viewPath);

        $newViewContent = $this->files->get('stubs/' . $viewName . '.view.stub');

        $newViewContent = str_replace('{{ modelVariable }}', $modelVariable, $newViewContent);

        $newViewContent = str_replace('{{ modelName }}', $modelName, $newViewContent);

        // Efface le contenu du fichier
        $this->files->replace($viewPath, '');

        $this->files->append($viewPath, $newViewContent);
    }

    public function appendController(string $name)
    {
        $controllerName = ucfirst($name) . 'Controller';

        $modelName = ucfirst($name);

        $modelVariable = lcfirst($name);

        $controllerPath = "app/Http/controllers/$controllerName.php";

        $this->createDir($controllerPath);

        $newControllerContent = $this->files->get('stubs/controller.stub');

        $newControllerContent = str_replace('{{ namespacedModel }}', $modelName, $newControllerContent);

        $newControllerContent = str_replace('{{ class }}', $controllerName, $newControllerContent);

        $newControllerContent = str_replace('{{ modelVariable }}', $modelVariable, $newControllerContent);

        $newControllerContent = str_replace('{{ model }}', $modelName, $newControllerContent);

        // Efface le contenu du fichier
        $this->files->replace($controllerPath, '');

        $this->files->append($controllerPath, $newControllerContent);

        $this->info("Controller $controllerName est bien mis à jour.");
    }

    public function appendViews(string $name)
    {
        $modelName = ucfirst($name);

        $modelVariable = strtolower($name);

        // Contenue des differentes vues qui seront créées
        $views = [
            "create",
            "delete_modal",
            "deleteAll_modal",
            "edit",
            "form",
            "index",
            "show",
        ];


        foreach ($views as $viewName) {
            $viewPath = "resources/views/$modelName/$viewName.blade.php";

            $this->createDir($viewPath);

            $newViewContent = $this->files->get('stubs/' . $viewName . '.view.stub');

            $newViewContent = str_replace('{{ modelVariable }}', $modelVariable, $newViewContent);

            $newViewContent = str_replace('{{ modelName }}', $modelName, $newViewContent);

            // Efface le contenu du fichier
            $this->files->replace($viewPath, '');

            $this->files->append($viewPath, $newViewContent);
        }

        $this->info("Les vues sont bien mis à jour.");
    }

    /**
     * Créés le chemin si il n'existe pas
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    public function appendRoutes($name)
    {
        $modelName = ucfirst($name);

        $modelVariable = strtolower($name);

        $controllerName = $modelName . 'Controller';

        $newRoutesContent = $this->files->get('stubs/routes.stub');

        $newRoutesContent = str_replace('{{ modelName }}', $modelName, $newRoutesContent);

        $newRoutesContent = str_replace('{{ modelVariable }}', $modelVariable, $newRoutesContent);

        $newRoutesContent = str_replace('{{ controllerName }}', $controllerName, $newRoutesContent);

        $this->files->append('routes/web.php', $newRoutesContent);

        $this->info('Les routes de '.$modelName.' ont été bien ajouté');
    }

    public function getMigrationField(string $name)
    {
        $modelName = ucfirst($name);
        $class = "App\\$modelName";

        $instance = new $class;

        $table = $instance->getTable();

        $columns = Schema::getColumnListing($table);

        $columns = $this->ignoreMigrationField(['id', 'created_at', 'updated_at'], $columns);

        return $columns;
    }

    public function ignoreMigrationField(array $ignoreFields, array $data)
    {
        foreach ($ignoreFields as $ignoreField) {
            //delete element in array by value "green"
            if (($key = array_search($ignoreField, $data)) !== false) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    public function appendForm(string $name)
    {
        $modelName = ucfirst($name);

        $modelVariable = lcfirst($name);

        $formPath = "resources/views/$modelName/form.blade.php";

        $formInputsNames = [];

        // Liste des champs d'une migration spécifique depuis le model
        foreach ($this->getMigrationField($modelName) as $migrationField) {
            $formInputsNames[] = $migrationField;
        }

        // Informations sur chaque champs pour le formulaire
        $inputsInformations = $this->formInputsInformations($formInputsNames);

        // Lignes du formulaire basé sur les informations des champs de la migration
        $rowContent = $this->getFormRow($inputsInformations, $modelVariable);

        $newFormContent = $this->files->get('stubs/form.view.stub');

        // Spécifie le nom du modele lié au formulaire
        $newFormContent = str_replace('{{ modelName }}', $modelName, $newFormContent);

        // Spécifie lea variable du modele lié au formulaire
        $newFormContent = str_replace('{{ modelVariable }}', $modelVariable, $newFormContent);

        // Charge les différentes lignes du formulaire
        $newFormContent = str_replace('{{ rowContent }}', $rowContent, $newFormContent);

        $this->files->replace($formPath, '');

        // Ajoute les informations du prototype dans le fichier du formulaire
        $this->files->append($formPath, $newFormContent);

        $this->info("Le formulaire de $modelName est bien mis à jour");
    }

    public function array_to_obj($array, &$obj)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $obj->$key = new stdClass();
                $this->array_to_obj($value, $obj->$key);
            } else {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    public function arrayToObject($array)
    {
        $object = new stdClass();
        return $this->array_to_obj($array, $object);
    }

    public function formInputsInformations(array $formInputsNames)
    {
        $input = [];
        $inputs = [];
        $inputInformations = '';

        foreach ($formInputsNames as $inputName) {
            $inputUserResponse = $this->ask("Attributs du champ <bg=yellow;fg=black>" . strtoupper($inputName) . "</>:\n Exp: label=TEXTE_DU_LABEL|type=TYPE_DU_INPUT|placeholder=PLACEHOLDER_DU_INPUT:|required|size=TAILLE_DU_INPUT_DE_1_A_12|AUTRES_ATTRIBUTS");

            if (!is_null($inputUserResponse)) {

                // Ajout de name aux informations du input
                $inputUserResponse = $inputUserResponse . "|name=$inputName";

                // Séparation des infos en tableai
                $inputInformations = explode("|", $inputUserResponse);

                // Charge et organise les informations du input dans le tableau input
                foreach ($inputInformations as $inputInformationLine) {
                    $inputContent = explode('=', $inputInformationLine);

                    if (array_key_exists(1, $inputContent)) {
                        $input[$inputContent[0]] = $inputContent[1];
                    } else {
                        $input[$inputContent[0]] = null;
                    }
                }

                // dump($input,$this->arrayToObject($input),"\n\n");
                $inputs[] = $this->arrayToObject($input);
                $input = [];
            }
        }

        return $inputs;
    }

    public function getFormRow(array $inputsInformations, string $modelVariable)
    {
        $row["tag_start"] = '<div class="row">';
        $row["tag_end"] = '</div>';
        $inputInfos = '';
        $inputsCols = '';
        $inputsRow = '';
        $sizeLimit = 0;
        $infos = '';

        foreach ($inputsInformations as $input) {
            $inputInfos = $this->files->get('stubs/colForm.stub');
            $inputInfos = str_replace('{{ name }}', $input->name, $inputInfos);
            $inputInfos = str_replace('{{ size }}', $input->size, $inputInfos);
            $inputInfos = str_replace('{{ label }}', $input->label, $inputInfos);
            $inputInfos = str_replace('{{ modelVariable }}', $modelVariable, $inputInfos);
            $inputInfos = str_replace('{{ migrationName }}', $input->name, $inputInfos);

            foreach ($input as $attribute => $value) {
                // $infos = '';

                if ($attribute != 'label' && $attribute != 'size' && $value != null) {
                    $infos = $infos.$attribute.'="'.$value.'" ';
                }

                if ($value == null) {
                    $infos = $infos.$attribute.' ';
                }
            }
            $inputInfos = str_replace('{{ infos }}', $infos, $inputInfos);
            $infos = '';

            $sizeLimit += $input->size;
            // dump($sizeLimit);

            if ($sizeLimit <= 12) {
                if ($sizeLimit == 12) {
                    $inputsRow = $inputsRow."\n\t\t\t\t\t".$row['tag_start'].$inputsCols."\n".$inputInfos."\t\t\t\t\t".$row['tag_end']."\n";
                    $sizeLimit = 0;
                    $inputsCols = '';
                } else {
                    $inputsCols = $inputsCols . $inputInfos;

                }
            }
        }

        return $inputsRow;
    }

    public function appendMenu($argument)
    {
        $menuIcon = $this->ask("Icone Fontawesome du menu:\n Exp: fa fa-home -> Home");

        $modelName = ucfirst($argument);
        $modelVariable = lcfirst($argument);

        $menu = $this->files->get('stubs/menuChild.view.stub');
        $menu = str_replace('{{ menuIcon }}', $menuIcon, $menu);
        $menu = str_replace('{{ menuName }}', $modelName, $menu);
        $menu = str_replace('{{ modelVariable }}', $modelVariable, $menu);

        $this->files->append('resources/views/layouts/menuChild.blade.php', $menu);

        $this->info('Menu bien mis à jour');
    }

    public function appendIndex(string $argument)
    {
        $modelName = ucfirst($argument);
        $modelVariable = lcfirst($argument);
        $indexPath = "resources/views/$modelName/index.blade.php";
        $columnsValues = '';
        $columnsNames = '';

        $migrationFields = $this->getMigrationField($argument);
        $listFieldMigration = '';
        $titleFieldMigration = '';

        foreach ($migrationFields as $migration) {
            $listFieldMigration = $listFieldMigration.$migration.'|';
            $titleFieldMigration = $titleFieldMigration.ucfirst($migration).'|';
        }
        $tableFieldChoices = $this->ask("Entrer la liste des champs a afficher pour le tableau de index\n Exp: $listFieldMigration");

        $tableFieldChoices = explode('|', $tableFieldChoices);

        foreach ($tableFieldChoices as $field) {
            $columnsValues = $columnsValues."\t\t\t\t\t\t\t<td>{{ $".$modelVariable."->$field }}</td>\n";
        }

        $titleFieldMigration = $this->ask("Entrer le titre de chaque champs en suivant l'ordre de la liste precedente\n Exp: $titleFieldMigration");

        $titleFieldMigration = explode('|', $titleFieldMigration);

        foreach ($titleFieldMigration as $title) {
            $columnsNames = $columnsNames."\t\t\t\t\t\t\t".'<th class="filter">'.$title."</th>\n";
        }

        $newIndexContent = $this->files->get('stubs/index.view.stub');
        $newIndexContent = str_replace('{{ modelName }}', $modelName, $newIndexContent);
        $newIndexContent = str_replace('{{ modelVariable }}', $modelVariable, $newIndexContent);
        $newIndexContent = str_replace('{{ columnName }}', $columnsNames, $newIndexContent);
        $newIndexContent = str_replace('{{ columnValue }}', $columnsValues, $newIndexContent);

        $this->files->replace($indexPath, '');
        $this->files->append($indexPath, $newIndexContent);

        $this->info('Index bien mis a jour.');
    }
}
