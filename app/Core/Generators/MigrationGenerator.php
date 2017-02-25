<?php

namespace App\Core\Generators;
use App\Core\Generators\Migrations\NameParser;
use App\Core\Generators\Migrations\SchemaParser;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class MigrationGenerator
 * @package App\Core\Generators
 */
class MigrationGenerator extends Generator
{
    /**
     * Get stub name.
     *
     * @var string
     */
    protected $stub = 'migration/plain';
    /**
     * Get base path of destination file.
     *
     * @return string
     */
    public function getBasePath()
    {
        return base_path() . '/database/migrations/';
    }
    /**
     * Get destination path for generated file.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->getBasePath() . $this->getFileName() . '.php';
    }
    /**
     * Get generator path config node.
     *
     * @return string
     */
    public function getPathConfigNode()
    {
        return '';
    }
    /**
     * Get root namespace.
     *
     * @return string
     */
    public function getRootNamespace()
    {
        return '';
    }
    /**
     * Get migration name.
     *
     * @return string
     */
    public function getMigrationName()
    {
        return strtolower($this->name);
    }
    /**
     * Get file name.
     *
     * @return string
     */
    public function getFileName()
    {
        return date('Y_m_d_His_') . $this->action .'_'. $this->getMigrationName() .'_table';
    }
    /**
     * Get schema parser.
     *
     * @return SchemaParser
     */
    public function getSchemaParser()
    {
        return new SchemaParser($this->fields);
    }
    /**
     * Get name parser.
     *
     * @return NameParser
     */
    public function getNameParser()
    {
        return new NameParser($this->name);
    }
    /**
     * Get stub templates.
     *
     * @return string
     */
    public function getStub()
    {
        $parser = $this->getNameParser();
        $action = $parser->getAction();
        switch ($action) {
            case 'add':
            case 'append':
            case 'update':
            case 'insert':
                $file = 'change';
                $replacements = [
                    'class'       => $this->getClass(),
                    'table'       => $parser->getTable(),
                    'fields_up'   => $this->getSchemaParser()->up(),
                    'fields_down' => $this->getSchemaParser()->down(),
                ];
                break;
            case 'delete':
            case 'remove':
            case 'alter':
                $file = 'change';
                $replacements = [
                    'class'       => $this->getClass(),
                    'table'       => $parser->getTable(),
                    'fields_down' => $this->getSchemaParser()->up(),
                    'fields_up'   => $this->getSchemaParser()->down(),
                ];
                break;
            default:
                $file = 'create';
                $replacements = [
                    'class'  => $this->getClass(),
                    'table'  => $parser->getTable(),
                    'fields' => $this->getSchemaParser()->up(),
                ];
                break;
        }
        $path = __DIR__;
        if (!file_exists($path . "/Stubs/migration/{$file}.stub")) {
            throw new FileNotFoundException($path . "/Stubs/migration/{$file}.stub");
        }
        return Stub::create($path . "/Stubs/migration/{$file}.stub", $replacements);
    }

    /**
     * @param bool $backup
     * @return string
     * @throws FileAlreadyExistsException
     */
    protected function checkFileExists($backup = false)
    {
        $path = $this->getPath();
        if ( $this->checkMigrationExists() && !$this->force) {
            if (! $backup) {
                throw new FileAlreadyExistsException($this->getMigrationName());
            }
        }
        return $path;
    }
    /**
     * Check if migration exists.
     *
     * @return bool
     */
    protected function checkMigrationExists()
    {
        $iterator = new \FilesystemIterator(dirname($this->getPath()));
        $filter = new \RegexIterator($iterator, '/' . $this->getMigrationName() . '.php$/');
        return iterator_count($filter);
    }
}