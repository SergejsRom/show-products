<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Http\Resources\StockResource;

class StockController extends Controller
{
    public function index()
    {
        return StockResource::collection(Stock::all());
    }
}
