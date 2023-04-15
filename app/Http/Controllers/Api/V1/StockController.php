<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        return Stock::all();
    }
}
