<?php

namespace App\Providers;

use App\Repository\DBUserRepository;
use App\Repository\DBSliderRepository;
use App\Repository\DBProductRepository;
use App\Repository\DBSettingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\DBCategoryRepository;
use App\Repository\DBWishlistRepository;
use App\Repository\DBCateoryAppRepository;
use App\Repositoryinterface\UserRepositoryinterface;
use App\Repositoryinterface\SliderRepositoryinterface;
use App\Repositoryinterface\ProductRepositoryinterface;
use App\Repositoryinterface\SettingRepositoryinterface;
use App\Repositoryinterface\CategoryRepositoryinterface;
use App\Repositoryinterface\WishlistRepositoryinterface;
use App\Repositoryinterface\CateoryAppRepositoryinterface;

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
        $this->app->bind(SliderRepositoryinterface::class,DBSliderRepository::class);
        $this->app->bind(WishlistRepositoryinterface::class,DBWishlistRepository::class);
    }
    public function boot(): void
    {
        //
    }
}
