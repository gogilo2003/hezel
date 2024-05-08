<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');

        $properties = Property::when($search, function ($query) use ($search) {
            $query->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhere('location', 'LIKE', "%$search%");
        })->paginate(10)->through(function ($item) {
            $pic = $item->pictures()->orderBy('primary', 'DESC')->first();

            $picture = $pic
                ? [
                    "id" => $pic->id,
                    "url" => $pic->url,
                    "thumb" => $pic->thumb,
                    "caption" => $pic->caption,
                ]
                : null;
            return [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "location" => $item->location,
                "price" => $item->price,
                "status" => $item->status,
                "picture" => $picture
            ];
        });

        return Inertia::render('Dashboard/Properties/Index', ['properties' => $properties]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $property = new Property();
        $property->slug = $request->slug;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->longitude = $request->longitude;
        $property->latitude = $request->latitude;
        $property->status = $request->status;
        $property->location = $request->location;
        $property->county_id = $request->county;
        $property->sub_county_id = $request->sub_county;
        $property->ward_id = $request->ward;
        $property->town_id = $request->town;
        $property->save();

        return redirect()->back()->with('success', 'Property Stored');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->slug = $request->slug;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->longitude = $request->longitude;
        $property->latitude = $request->latitude;
        $property->status = $request->status;
        $property->location = $request->location;
        $property->county_id = $request->county;
        $property->sub_county_id = $request->sub_county;
        $property->ward_id = $request->ward;
        $property->town_id = $request->town;
        $property->save();

        return redirect()->back()->with('success', 'Property Stored');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
