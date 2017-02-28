<?php

namespace App\Core\Generators\Commands;

use App\Core\Generators\PresenterGenerator;
use App\Core\Generators\TransformerGenerator;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class PresenterCommand extends Command
{
    /**
     * The name of command.
     *
     * @var string
     */
    protected $name = 'storecamp:presenter';

    /**
     * The description of command.
     *
     * @var string
     */
    protected $description = 'Create a new presenter.';

    /**
     * Execute the command.
     *
     * @return void
     */
    public function fire()
    {
        (new PresenterGenerator([
            'name'  => $this->argument('name'),
            'force' => $this->option('force'),
        ]))->run();
        $this->info('Presenter created successfully.');

        if (! \File::exists(app_path().'/Core/Transformers/'.$this->argument('name').'Transformer.php')) {
            if ($this->confirm('Would you like to create a Transformer? [y|N]')) {
                (new TransformerGenerator([
                    'name'  => $this->argument('name'),
                    'force' => $this->option('force'),
                ]))->run();
                $this->info('Transformer created successfully.');
            }
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
            ['name', InputArgument::REQUIRED, 'The name of model for which the presenter is being generated.', null],
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
            ['force', 'f', InputOption::VALUE_NONE, 'Force the creation if file already exists.', null],
        ];
    }
}
