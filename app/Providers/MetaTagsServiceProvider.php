<?php

namespace App\Providers;

use Butschster\Head\MetaTags\Meta;
use Butschster\Head\Packages\Package;
use Butschster\Head\Facades\PackageManager;
use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Butschster\Head\Contracts\Packages\ManagerInterface;
use Butschster\Head\Contracts\Packages\PackageInterface;
use Butschster\Head\Providers\MetaTagsApplicationServiceProvider as ServiceProvider;

class MetaTagsServiceProvider extends ServiceProvider
{
    protected function packages()
    {
        // app assets
        PackageManager::create('base-assets', function (Package $package) {
            $package->addScript(
                'app.js',
                mix('js/app.js'),
                ['defer'],
                Meta::PLACEMENT_HEAD
            )->addStyle(
                'app.css',
                mix('css/app.css'),
            )->addStyle(
                'bs.css',
                mix('css/bs.css'),
            );
        });

        PackageManager::create('glightbox', function (Package $package) {
            $package->addStyle(
                'glightbox.min.css',
                'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css'
            )->addScript(
                'glightbox.js',
                asset('js/glightbox.js'),
                ['defer'],
                Meta::PLACEMENT_HEAD
            );
        });
    }

    // if you don't want to change anything in this method just remove it
    protected function registerMeta(): void
    {
        $this->app->singleton(MetaInterface::class, function () {

            $meta = new Meta(
                $this->app[ManagerInterface::class],
                $this->app['config']
            );

            // It just an imagination, you can automatically
            // add favicon if it exists
            if (file_exists(public_path('favicon.ico'))) {
                $meta->setFavicon('/favicon.ico');
            }

            // This method gets default values from config and creates tags, includes default packages, e.t.c
            // If you don't want to use default values just remove it.
            $meta->initialize();

            return $meta;
        });
    }
}
