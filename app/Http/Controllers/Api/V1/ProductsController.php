<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Cache;

/**
 * @group Products
 */

class ProductsController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Cache::remember('sku', 60*60*24, function () {
            return Product::all();
        }));
    }
}
