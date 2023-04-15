<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Http\Resources\StockResource;
use Illuminate\Support\Facades\Cache;

class StockController extends Controller
{
    public function index()
    {
        return StockResource::collection(Cache::remember('sku', 60*60*24, function () {
            return Stock::all();
        }));
    }
}
