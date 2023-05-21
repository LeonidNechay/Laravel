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
        'dps_id',
        'creator_id'
    ];

    public function dps(): BelongsTo
    {
        return $this->belongsTo( Dps::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
