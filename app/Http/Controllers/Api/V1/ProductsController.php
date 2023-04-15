<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductsController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }
}
