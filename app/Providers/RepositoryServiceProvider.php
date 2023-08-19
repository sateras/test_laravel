<?php

namespace App\Providers;

use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Repositories\Contracts\CartRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\v1\AuthRepository;
use App\Repositories\v1\CartRepository;
use App\Repositories\v1\CategoryRepository;
use App\Repositories\v1\OrderRepository;
use App\Repositories\v1\ProductRepository;
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
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }
}
