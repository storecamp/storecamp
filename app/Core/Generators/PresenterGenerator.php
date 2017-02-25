<?php
namespace App\Core\Generators;

/**
 * Class PresenterGenerator
 * @package App\Core\Generators
 */

class PresenterGenerator extends Generator
{
    /**
     * Get stub name.
     *
     * @var string
     */
    protected $stub = 'presenter/presenter';

    /**
     * Get base path of destination file.
     *
     * @return string
     */
    public function getBasePath()
    {
        return config('generators.generator.basePath', app_path());
    }

    /**
     * Get root namespace.
     *
     * @return string
     */
    public function getRootNamespace()
    {
        return parent::getRootNamespace().parent::getConfigGeneratorClassPath($this->getPathConfigNode());
    }

    /**
     * Get generator path config node.
     *
     * @return string
     */
    public function getPathConfigNode()
    {
        return 'presenters';
    }

    /**
     * Get array replacements.
     *
     * @return array
     */
    public function getReplacements()
    {
        return array_merge(parent::getReplacements(), [
            'appnamespace' => $this->getAppNamespace()
        ]);
    }

    /**
     * Get destination path for generated file.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->getBasePath() . '/'.parent::getConfigGeneratorClassPath($this->getPathConfigNode(), true) .'/' . $this->getName() . 'Presenter.php';
    }
}