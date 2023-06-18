<?php

namespace App\Providers;

use App\Repository\DBCategoryRepository;
use App\Repository\DBCateoryAppRepository;
use App\Repository\DBProductRepository;
use App\Repository\DBSettingRepository;
use App\Repository\DBUserRepository;
use App\Repositoryinterface\CategoryRepositoryinterface;
use App\Repositoryinterface\CateoryAppRepositoryinterface;
use App\Repositoryinterface\ProductRepositoryinterface;
use App\Repositoryinterface\SettingRepositoryinterface;
use App\Repositoryinterface\UserRepositoryinterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryinterface::class,DBUserRepository::class);
        $this->app->bind(CateoryAppRepositoryinterface::class,DBCateoryAppRepository::class);
        $this->app->bind(CategoryRepositoryinterface::class,DBCategoryRepository::class);
        $this->app->bind(ProductRepositoryinterface::class,DBProductRepository::class);
        $this->app->bind(SettingRepositoryinterface::class,DBSettingRepository::class);
    }
    public function boot(): void
    {
        //
    }
}
