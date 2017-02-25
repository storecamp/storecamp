<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TransformersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'File',
            'AttributeGroup',
            'AttributeGroupDescription',
            'Orders',
            'Banner',
            'Layout',
            'Promocode',
            'Returns',
            'StaticPages'
        ];
        foreach ($models as $model) {
            $this->app->bind("App\\Core\\Transformers\\{$model}Transformer");
        }
    }
}
