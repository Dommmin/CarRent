<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'user' => $this->user->name,
            'rating' => $this->rating,
//            'car_id' => $this->car_id,
            'rating' => $this->rating,
            'description' => $this->description,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
