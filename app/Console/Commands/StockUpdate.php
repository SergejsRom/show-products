<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class StockUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:stock-update {schedule}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stock has been updated';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://kinfirm.com/app/uploads/laravel-task/stocks.json');
        $response = $request->getBody();

        $allstocks = json_decode($response, true);

        foreach ($allstocks as $allstock) {
            if (DB::table('products')->where('sku', $allstock['sku'])->exists()) {
                if (DB::table('stocks')
                    ->where('city', $allstock['city'])
                    ->where('product_sku', $allstock['sku'])
                    ->exists()
                ) {
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
    }
}
