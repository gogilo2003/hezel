<?php

namespace App\Http\Resources;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Support\PropertyTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class PictureResource extends JsonResource
{
    use PropertyTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->mapPicture(Picture::find($this->id));
    }
}
