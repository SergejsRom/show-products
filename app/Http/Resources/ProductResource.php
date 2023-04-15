<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sku' => $this->sku,
            'description' => $this->description,
            'size' => $this->size,
            'photo' =>  asset('storage/' .$this->photo),
            'tags' => $this->tags,

        ];
    }
}
