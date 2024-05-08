<?php

namespace App\Http\Resources;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            "id" => $this->id,
            "slug" => $this->slug,
            "title" => $this->title,
            "location" => $this->location,
            "description" => $this->description,
            "status" => $this->status,
            "price" => $this->price,
            "picture" => $this->pictures->first() ? PictureResource::make($this->pictures->first()) : null,
            "pictures" => $this->RelationLOaded('pictures') ? PictureResource::collection($this->pictures) : [],
            "features" => $this->RelationLoaded('features') ? FeatureResource::collection($this->features) : [],
            "categories" => $this->RelationLoaded('categories') ? CategoryResource::collection($this->categories) : [],
        ];
    }
}
