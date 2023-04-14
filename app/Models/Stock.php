<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;


class Stock extends Model
{
    protected $fillable = [
        'product_sku',
        'stock',
        'city',
    ];
    public function post(): BelongsTo
{
    return $this->belongsTo(Product::class, 'sku');
}
}
