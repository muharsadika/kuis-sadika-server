<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiamondResource extends JsonResource
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
            'diamond_category' => $this->diamond_category,
            'diamond_image' => $this->diamond_image,
            'diamond_amount' => $this->diamond_amount,
            'diamond_price' => $this->diamond_price,
            'created_at' => date_format($this->updated_at, 'd-m-Y H:i:s'),
            'updated_at' => date_format($this->updated_at, 'd-m-Y H:i:s'),
        ];
    }
}
