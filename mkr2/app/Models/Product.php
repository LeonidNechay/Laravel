<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'manufacturer_id',
        'create_date'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}