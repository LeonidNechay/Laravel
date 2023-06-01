<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'owner_name' => $this->owner_name,
            'brand' => $this->brand,
            'car_number' => $this->car_number,
            'color' => $this->color,
            'dps_id' => $this->dps_id,
            'user_id' => $this->user_id
        ];
    }
}
