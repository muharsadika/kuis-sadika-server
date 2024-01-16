<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AvatarResource extends JsonResource
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
            'avatar_url' => $this->avatar_url,
            'avatar_name' => $this->avatar_name,
            'avatar_price' => $this->avatar_price,
            'created_at' => date_format($this->created_at, 'd-m-Y H:i:s'),
            'updated_at' => date_format($this->updated_at, 'd-m-Y H:i:s'),
        ];
    }
}
