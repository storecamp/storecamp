<?php

namespace App\Core\Generators\Commands;

use Illuminate\Console\Command;
use App\Core\Generators\Stub;

/**
 * Class MakeViewCommand
 * @package App\Console\Commands
 */
class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storecamp:view {view} {for?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add command to make view on artisan tool';

    /**
     * @var null
     */
    private $path = null;

    /**
     * MakeViewCommand constructor.
     */
    public function __construct()
    {
        $this->path = base_path();
        parent::__construct();
    }

    /**
     *
     */
    public function handle()
    {
        $arguments = $this->argument();
        $for = isset($arguments['for']) ? $arguments['for'] : 'site';
        $view = $arguments['view'];
        $path = $this->makePath($view, $for);
        $content = $this->getContent($for, $view);
        $this->createView($path, $content, $for);
    }

    /**
     * @param $view
     * @param $for
     * @return string
     */
    private function makePath($view, $for)
    {
        $paths = explode('.', $view);
        $view = end($paths);
        $path = '';
        $count = count($paths);
        for ($i = 0; $i < $count; $i++) {
            $path .= $paths[$i] . '/';
            if (!is_dir($this->path . '/resources/views/'.$for."/". $path)) {
                mkdir($this->path . '/resources/views/' .$for."/" . $path);
            }
        }
        return $this->path . '/resources/views/' .$for."/" . $path;
    }

    /**
     * @param $for
     * @param $view
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function getContent($for, $view)
    {
        $content = [];
        $basePath = base_path(). '/resources/views/';
        if ($for) {
            if($for == "admin") {
                $content = [
                    (new Stub(
                        $basePath . '_stubs/view-make/index-admin.blade.stub',
                        ['view' => $view]
                    ))->render(),
                    (new Stub(
                        $basePath . '_stubs/view-make/create-admin.blade.stub',
                        ['view' => $view]
                    ))->render(),
                    (new Stub(
                        $basePath . '_stubs/view-make/edit-admin.blade.stub',
                        ['view' => $view]
                    ))->render(),
                    (new Stub(
                        $basePath . '_stubs/view-make/show-admin.blade.stub',
                        ['view' => $view]
                    ))->render()
                ];
            } else {
                $content = [
                    (new Stub(
                        $basePath . '_stubs/view-make/index.blade.stub',
                        ['view' => $view]
                    ))->render(),
                    (new Stub(
                        $basePath . '_stubs/view-make/create.blade.stub',
                        ['view' => $view]
                    ))->render(),
                    (new Stub(
                        $basePath . '_stubs/view-make/edit.blade.stub',
                        ['view' => $view]
                    ))->render(),
                    (new Stub(
                        $basePath . '_stubs/view-make/show.blade.stub',
                        ['view' => $view]
                    ))->render()
                ];
            }
        }
        return $content;
    }

    /**
     * @param $path
     * @param $content
     * @param $for
     */
    private function createView($path, $content, $for)
    {
        $files = ['index','create', 'edit', 'show'];
        foreach ($content as $key => $cont) {
            $file = $path . $files[$key].'.blade.php';
            file_put_contents($file, $cont);
            $this->info('Success on created view. With name: ' . $file);
        }
    }
}
