<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaAttributesTable extends Migration
{
    protected $table = 'meta';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $root = app_path().'/Core/Models/';
        $files = $this->resolveModelFiles($root);
        foreach ($files as $prefix)
        {
            $tableName = $prefix .'_'.$this->table;
            echo $tableName .'<br>';
            \Schema::create($tableName, function (Blueprint $table) {
                $table->increments('meta_id');
                $table->string('meta_key');
                $table->longText('meta_value');
                $table->string('meta_type')->default('string');
                $table->morphs('metable');

                $table->index('meta_key');
            });
            // Laravel doesn't handle index length, so we need raw statement for this one
            \Schema::getConnection()->statement(
                'create index '.$tableName.'_index_value on '.$tableName.' (meta_key, meta_value(20))'
            );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $root = app_path().'/Core/Models/';
        $files = $this->resolveModelFiles($root);
        foreach ($files as $prefix) {
            $tableName = $prefix . '_' . $this->table;
            \Schema::drop($tableName);
        }
    }
    private function getFilesByFormat($root, $format = 'php', $skipFormatEnding = true)
    {
        $Directory = new \RecursiveDirectoryIterator($root);
        $Iterator = new \RecursiveIteratorIterator($Directory);
        $Regex = new \RegexIterator($Iterator, '/^.+\.'.$format.'$/i', \RecursiveRegexIterator::GET_MATCH);
        $files = [];
        foreach ($Regex as $file) {
            if ($skipFormatEnding) {
                $files[] = explode('.'.$format, basename($file[0]))[0];
            } else {
                $files[] = basename($file[0]);
            }
        }
        return $files;
    }
    private function resolveModelFiles($root)
    {
        $files = $this->getFilesByFormat($root, $format = 'php', true);
        $newFiles = [];
        foreach ($files as $file) {
            $newFiles[] = \Illuminate\Support\Str::snake($file);
        }
        return $newFiles;
    }
}
