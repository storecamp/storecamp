<?php
namespace App\Core\Generators\Commands;

use App\Core\Generators\ControllerGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ControllerCommand extends Command
{

    /**
     * The name of command.
     *
     * @var string
     */
    protected $name = 'storecamp:controller';

    /**
     * The description of command.
     *
     * @var string
     */
    protected $description = 'Create a new custom controller.';

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
        $this->generators = new Collection();

        $this->generators->push(new ControllerGenerator([
            'name'      => $this->argument('name'),
            'for'      => $this->argument('for'),
            'force'     => $this->option('force')
        ]));

        foreach ( $this->generators as $generator) {
            $generator->run();
        }

        $this->info("Controller created successfully.");
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
            ['for', InputOption::VALUE_NONE, 'Create Controller for admin, site or something else.', null]
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
            ['force', 'f', InputOption::VALUE_NONE, 'Force the creation if file already exists.', null]
        ];
    }
}