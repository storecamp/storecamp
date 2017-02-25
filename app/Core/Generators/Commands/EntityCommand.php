<?php
namespace App\Core\Generators\Commands;

use App\Core\Generators\MigrationGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class EntityCommand extends Command
{

    /**
     * The name of command.
     *
     * @var string
     */
    protected $name = 'storecamp:entity';

    /**
     * The description of command.
     *
     * @var string
     */
    protected $description = 'Create a new entity.';

    /**
     * @var Collection
     */
    protected $generators = null;

    /**
     * Execute the command.
     *
     * @return void
     */
    public function fire()
    {
        $this->call('storecamp:repository', [
            'name'       => $this->argument('name'),
            '--fillable' => $this->option('fillable'),
            '--rules'    => $this->option('rules'),
            '--force'    => $this->option('force')
        ]);

        if ($this->confirm('Would you like to create a Presenter? [y|N]')) {
            $this->call('storecamp:presenter', [
                'name'    => $this->argument('name'),
                '--force' => $this->option('force'),
            ]);
        }
        if($this->confirm('Would you like to create a Migration? [y|N]')) {
            (new MigrationGenerator([
                'name'  => "create_".$this->argument('name'),
                'action' => null,
                'table'  => $this->argument('name')."Table",
                'fields_up'  => null,
                'fields_down'  => null,
                'force' => $this->option('force'),
            ]))->run();
        }
    }

    /**
     * The array of command arguments.
     *
     * @return array
     */
    public function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of class being generated.', null],
        ];
    }

    /**
     * The array of command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            ['fillable', null, InputOption::VALUE_OPTIONAL, 'The fillable attributes.', null],
            ['rules', null, InputOption::VALUE_OPTIONAL, 'The rules of validation attributes.', null],
            ['force', 'f', InputOption::VALUE_NONE, 'Force the creation if file already exists.', null]
        ];
    }
}