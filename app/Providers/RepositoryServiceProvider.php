<?php

namespace App\Providers;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Contracts\BaseRepositoryContract;
use App\Http\Repositories\Contracts\MasterData\CategoryProductContract;
use App\Http\Repositories\Contracts\MasterData\ProductContract;
use App\Http\Repositories\MasterData\CategoryProductRepository;
use App\Http\Repositories\MasterData\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryContract::class, BaseRepository::class);

        $this->app->bind(CategoryProductContract::class, CategoryProductRepository::class);
        $this->app->bind(ProductContract::class, ProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
