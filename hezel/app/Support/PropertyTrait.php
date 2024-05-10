<?php

namespace App\Support;

use App\Models\Picture;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

trait PropertyTrait
{
    function mapProperty(Property $property)
    {
        return [
            "id" => $property->id
        ];
    }

    protected function mapPicture(Picture $picture)
    {
        $url = null;
        $thumb = null;
        if (file_exists(public_path($picture->url))) {
            $url = asset($picture->url);
            $thumb = asset($picture->thumb);
        } else if (file_exists(storage_path('app/public/' . $picture->url))) {
            $url = Storage::disk('public')->url($picture->url);
            $thumb = Storage::disk('public')->url($picture->thumb);
        }
        return [
            "id" => $picture->id,
            "url" => $url,
            "thumb" => $thumb,
            "caption" => $picture->caption,
        ];
    }
}
