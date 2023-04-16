<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class GetProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://kinfirm.com/app/uploads/laravel-task/products.json');
        $response = $request->getBody();

        $allproducts = json_decode($response, true);

        foreach ($allproducts as $allproduct) {
            $filename = basename(strstr(($allproduct['photo']), 'png', true) . 'png');
            $filepath = public_path('storage/' . $filename);
            if (!file_exists($filepath)) {
                Image::make($allproduct['photo'])->save(public_path('storage/' . $filename));
            }
            if (DB::table('products')->where('sku', $allproduct['sku'])->exists()) {
                DB::table('products')
                    ->where('sku', $allproduct['sku'])
                    ->update([
                        'sku' => $allproduct['sku'],
                        'description' => $allproduct['description'],
                        'size' => $allproduct['size'],
                        'photo' => $filename,
                        'tags' => $allproduct['tags'],
                        'updated_at' => $allproduct['updated_at']
                    ]);
            } else {
                Product::create([
                    'sku' => $allproduct['sku'],
                    'description' => $allproduct['description'],
                    'size' => $allproduct['size'],
                    'photo' => $filename,
                    'tags' => $allproduct['tags'],
                    'updated_at' => $allproduct['updated_at']
                ]);
            }
        }
    }
}
