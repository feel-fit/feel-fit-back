<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create {model?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Model Controller Resource Migration';

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
     * @return mixed
     */
    public function handle()
    {
        $model = $this->argument('model') ?? $this->ask('What is the name of the model?');

        $this->call('make:model', [
            'name' => 'Models/'.$model,
            '--migration' => true,
        ]);

        $this->call('make:controller', [
            'name' => 'Api/'.str_plural($model).'/'.$model.'Controller',
            '--api' => true,
            '--model' => 'Models/'.$model,
        ]);

        $this->call('make:factory', [
            'name' => $model.'Factory',
            '--model' => 'Models/'.$model,
        ]);

        $this->call('make:resource', [
            'name' => str_plural($model).'/'.$model.'Resource',
        ]);

        $this->call('make:resource', [
            'name' => str_plural($model).'/'.$model.'Collection',
        ]);

        $this->call('make:test', [
            'name' => str_plural($model).'/'.$model.'Test',
        ]);

        $this->call('make:seeder', [
            'name' => str_plural($model).'TableSeeder',
        ]);

        $this->info("Create all elements for {$model}.");
    }
}
