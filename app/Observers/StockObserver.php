<?php

namespace App\Observers;

use App\Models\Stock;
use Illuminate\Support\Facades\Cache;

class StockObserver
{
    /**
     * Handle the Stock "created" event.
     */
    public function created(Stock $stock): void
    {
        Cache::forget('product_sku');
    }

    /**
     * Handle the Stock "updated" event.
     */
    public function updated(Stock $stock): void
    {
        Cache::forget('product_sku');
    }

    /**
     * Handle the Stock "deleted" event.
     */
    public function deleted(Stock $stock): void
    {
        //
    }

    /**
     * Handle the Stock "restored" event.
     */
    public function restored(Stock $stock): void
    {
        //
    }

    /**
     * Handle the Stock "force deleted" event.
     */
    public function forceDeleted(Stock $stock): void
    {
        //
    }
}
