<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'country',
        'phone_number',
        'email'
    ];

    public function manufacturer(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
