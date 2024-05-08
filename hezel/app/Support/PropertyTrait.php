<?php

namespace App\Support;

use App\Models\Property;

trait PropertyTrait
{
    function mapProperty(Property $property)
    {
        return [
            "id" => $property->id
        ];
    }
}
