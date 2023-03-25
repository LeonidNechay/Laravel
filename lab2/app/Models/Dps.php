<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Dps extends Model
{
    use HasFactory;

    protected $fillable = [
        'region'
    ];

    public function dps(): HasMany
    {
        return $this->hasMany(Dps::class);
    }
}
