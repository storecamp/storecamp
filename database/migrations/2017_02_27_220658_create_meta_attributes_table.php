<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetaAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $root = config('meta.modelsPath');
        $files = $this->resolveModelFiles($root);
        foreach ($files as $prefix) {
            $tableName = $prefix.'_'.config('meta.table_prefix');
            echo $tableName.'<br>';
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
            $tableName = $prefix.'_'.config('meta.table_prefix');
            \Schema::dropIfExists($tableName);
        }
    }

    private function resolveModelFiles($root)
    {
        $files = getFileNames($root);
        $newFiles = [];
        foreach ($files as $file) {
            $newFiles[] = \Illuminate\Support\Str::snake($file);
        }

        return $newFiles;
    }
}
