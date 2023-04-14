<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Stock;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'description',
        'size',
        'photo',
        'tags',
        'stock',
        'city',
        'updated_at'
    ];
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class, 'product_sku');
    }
}
