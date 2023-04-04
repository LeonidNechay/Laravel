<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'brand',
        'car_number',
        'color',
        'dps_id'
    ];

    public function auto(): BelongsTo
    {
        return $this->belongsTo( Dps::class);
    }
}
