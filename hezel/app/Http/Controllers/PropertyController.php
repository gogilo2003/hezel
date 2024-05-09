<?php

namespace App\Http\Controllers;

use App\Models\Town;
use App\Models\Ward;
use Inertia\Inertia;
use App\Models\County;
use App\Models\Picture;
use App\Models\Property;
use App\Models\SubCounty;
use Illuminate\Support\Str;
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
        // $county = request()->input('county');
        // $sub_county = request()->input('sub_county');

        $properties = Property::when($search, function ($query) use ($search) {
            $query->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhere('location', 'LIKE', "%$search%");
        })->paginate(4)->through(function ($item) {
            $pictures = $item->pictures()->orderBy('primary', 'DESC')->get()->map(fn(Picture $picture) => [
                "id" => $picture->id,
                "url" => $picture->url,
                "thumb" => $picture->thumb,
                "caption" => $picture->caption,
            ]);
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
                "picture" => $picture,
                "pictures" => $pictures,
            ];
        });

        // $counties = County::all()->map(fn(County $county) => [
        //     "id" => $county->id,
        //     "name" => $county->name,
        // ]);

        // $sub_counties = SubCounty::when($county, function ($query) use ($county) {
        //     $query->where('county_id', $county);
        // })->get()
        //     ->map(fn(SubCounty $subCounty) => [
        //         "id" => $subCounty->id,
        //         "name" => $subCounty->name,
        //     ]);

        // $wards = Ward::when($sub_county, function ($query) use ($sub_county) {
        //     $query->where('sub_county_id', $sub_county);
        // })->get()
        //     ->map(fn(Ward $ward) => [
        //         "id" => $ward->id,
        //         "name" => $ward->name,
        //     ]);

        // $towns = Town::all()->map(fn(Town $town) => [
        //     "id" => $town->id,
        //     "name" => $town->name,
        // ]);

        return Inertia::render('Dashboard/Properties/Index', [
            'properties' => $properties,
            // 'counties' => $counties,
            // 'county' => $county,
            // 'sub_counties' => $sub_counties,
            // 'sub_county' => $sub_county,
            // 'wards' => $wards,
            // 'towns' => $towns,
            'search' => $search
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $property = new Property();
        $property->slug = Str::slug($request->title);
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->location = $request->location;
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
