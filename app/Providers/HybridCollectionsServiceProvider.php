<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Statamic\Contracts\Entries\CollectionRepository as CollectionRepositoryContract;

// Importing the one from eloquent-driver package
use Statamic\Eloquent\Structures\CollectionTreeRepository;
use Statamic\Statamic;
use App\Repositories\CollectionRepository;

class HybridCollectionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if(config('statamic.eloquent-driver.collections.driver') == 'hybrid') {
            $this->registerHybridCollectionRepository();
        }
    }



    private function registerHybridCollectionRepository() {
        // Replace with custom repository, in order to query entries
        // via eloquent when trying to update entry URIs.
        Statamic::repository(CollectionRepositoryContract::class, CollectionRepository::class);
    }


}
