<?php

namespace App\Console\Commands;

// use App\Categorie;
use Illuminate\Console\Command;

class RunTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:test';

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
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Relation $relation)
    {
        // TODO:
        $value = $relation->trierInput("Categorie-Produit,one-to-many");

        $value = $relation->creerMigration($value);

        $value = $relation->genererModels();

        Self::Output($value);
    }

    public static function Output($var, $fct = '')
    {
        $start = microtime(true);
        $value = $var;
        $time_elapsed_secs = microtime(true) - $start;

        dd($fct, $value, 'temps ecoule: '.$time_elapsed_secs);
    }
}
