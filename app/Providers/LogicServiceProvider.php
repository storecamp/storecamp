<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LogicServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'MediaSystem',
            'CategorySystem',
            'ProductSystem',
            'AttributeGroupSystem',
            'UsersSystem',
            'LogViewerSystem',
            'ProductReviewSystem',
            'AccessSystem',
            'OrdersSystem',
            'CartSystem',
            'ShopSystem',
            'MailCampaignSystem',
        ];

        foreach ($models as $repo) {
            $this->app->bind(
                "App\\Core\\Contracts\\{$repo}Contract",
                "App\\Core\\Logic\\{$repo}"
            );
        }
    }
}
