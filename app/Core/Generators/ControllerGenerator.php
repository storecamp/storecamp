<?php

namespace App\Core\Generators;

use App\Core\Generators\Migrations\SchemaParser;

/**
 * Class ModelGenerator
 * @package App\Core\Generators
 */
class ControllerGenerator extends Generator {

    /**
     * Get stub name.
     *
     * @var string
     */
    protected $stub = 'controller';

    /**
     * Get root namespace.
     *
     * @return string
     */
    public function getRootNamespace()
    {
        return config('generators.generator.customControllerNamespace', $this->getAppNamespace()).$this->getFor();
    }

    /**
     * Get generator path config node.
     *
     * @return string
     */
    public function getPathConfigNode()
    {
        return 'controller';
    }

    /**
     * Get base path of destination file.
     *
     * @return string
     */

    public function getBasePath()
    {
        return config('generators.generator.controllerBasePath', app_path());
    }

    /**
     * Get destination path for generated file.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->getBasePath() . '/' . parent::getConfigGeneratorClassPath($this->getPathConfigNode(), true) . '/' . $this->getFor() . '/' . $this->getName(). str_studly($this->getPathConfigNode()) . '.php';
    }

    /**
     * Get schema parser.
     *
     * @return SchemaParser
     */
    public function getSchemaParser()
    {
        return new SchemaParser($this->fillable);
    }

    /**
     * Get the fillable attributes.
     *
     * @return string
     */
    public function getFillable()
    {
        if ( ! $this->fillable) return '[]';
        $results = '['.PHP_EOL;

        foreach ($this->getSchemaParser()->toArray() as $column => $value)
        {
            $results .= "\t\t'{$column}',".PHP_EOL;
        }
        return $results . "\t" . ']';
    }
}