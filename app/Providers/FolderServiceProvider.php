<?php

namespace App\Providers;

use App\Core\Models\Folder;
use Illuminate\Support\ServiceProvider;

class FolderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            "App\\Drivers\\FolderToDb\\SynchronizerInterface",
            "App\\Drivers\\FolderToDb\\Synchronizer");

        Folder::created(function ($folder) {
            //setDiskAttribute fix
            if (!$folder->disk) {
                $folder->disk = "local";
                $folder->save();
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
