<?php

namespace App\Providers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Observers\StockObserver;
use App\Observers\ProductObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
        Product::observe(ProductObserver::class);
        Stock::observe(StockObserver::class);

    }
}
