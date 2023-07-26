<?php

namespace App\Providers;

use App\Repository\DBCartRepository;
use App\Repository\DBInvoRepository;
use App\Repository\DBUserRepository;
use App\Repository\DBCouponRepository;
use App\Repository\DBSliderRepository;
use App\Repository\DBCommentRepository;
use App\Repository\DBProductRepository;
use App\Repository\DBSettingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\DBCategoryRepository;
use App\Repository\DBWishlistRepository;
use App\Repository\DBCateoryAppRepository;
use App\Repository\DBClientPaymentRepository;
use App\Repository\DBNotifictionRepository;
use App\Repository\DBUserDeliveryRepository;
use App\Repository\NotifictionRepository;
use App\Repositoryinterface\CartRepositoryinterface;
use App\Repositoryinterface\InvoRepositoryinterface;
use App\Repositoryinterface\UserRepositoryinterface;
use App\Repositoryinterface\CouponRepositoryinterface;
use App\Repositoryinterface\SliderRepositoryinterface;
use App\Repositoryinterface\CommentRepositoryinterface;
use App\Repositoryinterface\ProductRepositoryinterface;
use App\Repositoryinterface\SettingRepositoryinterface;
use App\Repositoryinterface\CategoryRepositoryinterface;
use App\Repositoryinterface\WishlistRepositoryinterface;
use App\Repositoryinterface\CateoryAppRepositoryinterface;
use App\Repositoryinterface\ClientPaymentRepositoryinterface;
use App\Repositoryinterface\NotifictionRepositoryinterface;
use App\Repositoryinterface\UserDeliveryRepositoryinterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryinterface::class, DBUserRepository::class);
        $this->app->bind(CateoryAppRepositoryinterface::class, DBCateoryAppRepository::class);
        $this->app->bind(CategoryRepositoryinterface::class, DBCategoryRepository::class);
        $this->app->bind(ProductRepositoryinterface::class, DBProductRepository::class);
        $this->app->bind(SettingRepositoryinterface::class, DBSettingRepository::class);
        $this->app->bind(SliderRepositoryinterface::class, DBSliderRepository::class);
        $this->app->bind(WishlistRepositoryinterface::class, DBWishlistRepository::class);
        $this->app->bind(CouponRepositoryinterface::class, DBCouponRepository::class);
        $this->app->bind(CartRepositoryinterface::class, DBCartRepository::class);
        $this->app->bind(InvoRepositoryinterface::class, DBInvoRepository::class);
        $this->app->bind(CommentRepositoryinterface::class, DBCommentRepository::class);
        $this->app->bind(NotifictionRepositoryinterface::class, DBNotifictionRepository::class);
        $this->app->bind(ClientPaymentRepositoryinterface::class, DBClientPaymentRepository::class);
        $this->app->bind(UserDeliveryRepositoryinterface::class, DBUserDeliveryRepository::class);
    }
    public function boot(): void
    {
        //
    }
}
