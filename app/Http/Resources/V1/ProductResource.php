<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'type' => 'product',
            'id' => (string) $this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->when(!$request->routeIs('products.index'), $this->description),
                'price' => $this->price,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
            'relationships' => [
                'category' => [
                    'data' => $this->category ? [
                        'type' => 'category',
                        'id' => (string) $this->category_id,
                    ] : null,
                    'links' => [
                        'self' => $this->category_id ? route('categories.show', $this->category_id) : null,
                    ],
                ],
            ],
            'links' => [
                'self' => route('products.show', $this->id),
            ],
        ];
    }
}
