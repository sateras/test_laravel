<?php

namespace App\Providers;

use App\Services\Contracts\AuthServiceInterface;
use App\Services\Contracts\CartServiceInterface;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\OrderServiceInterface;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\v1\AuthService;
use App\Services\v1\CartService;
use App\Services\v1\CategoryService;
use App\Services\v1\OrderService;
use App\Services\v1\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(CartServiceInterface::class, CartService::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
