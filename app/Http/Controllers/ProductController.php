<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function getProducts()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://kinfirm.com/app/uploads/laravel-task/products.json');
        $response = $request->getBody();
       
        $allproducts = json_decode($response, true);

        foreach($allproducts as $allproducts) {
            // $path = $allproducts['photo'];
            // $filename = basename($path);
            // Image::make($path)->save(public_path('storage/' . $filename));
            Product::updateOrCreate([
                'sku' => $allproducts['sku'],
                'description' => $allproducts['description'],
                'size' => $allproducts['size'],
                // 'photo' => $filename,
                'tags' => json_encode($allproducts['tags']),
                'updated_at' => $allproducts['updated_at']
            ]);  
        }
        return view('products');
    }

    public function updateProducts()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://kinfirm.com/app/uploads/laravel-task/stocks.json');
        $response = $request->getBody();
       
        $allstocks = json_decode($response, true);

        foreach($allstocks as $allstock) {
            if (DB::table('products')->where('sku', $allstock['sku'])->exists()) {
                if (DB::table('stocks')
                ->where('city', $allstock['city'])
                ->where('product_sku', $allstock['sku'])
                ->exists()) {
                    DB::table('stocks')
                    ->where('city', $allstock['city'])
                    ->update([
                        'stock' => $allstock['stock'],
                    ]);
                } elseif (DB::table('products')->where('sku', $allstock['sku'])->exists()) {
                    Stock::create([
                        'product_sku' => $allstock['sku'],
                        'stock' => $allstock['stock'],
                        'city' => $allstock['city'],
                    ]);  
                    
                } 
            }
        }
        return view('update');
    }

}
