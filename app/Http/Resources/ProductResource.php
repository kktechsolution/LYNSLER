<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'reviews' => ProductReviewResource::collection($this->product_reviews),
            'average_ratings' => $this->product_reviews->avg('ratings'),
            'total_reviews' => $this->product_reviews->count(),
            'users_with_reviews' => $this->product_reviews->pluck('user_id')->unique()->count(),
        ];
    }
}
