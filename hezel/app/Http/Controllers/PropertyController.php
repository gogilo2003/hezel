<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        })->orderBy('created_at', 'DESC')->paginate(4)->through(function ($item) {
            $pictures = $item->pictures()->orderBy('primary', 'DESC')->get()->map(fn(Picture $picture) => $this->mapPicture($picture));
            $pic = $item->pictures()->orderBy('primary', 'DESC')->first();

            $picture = $pic
                ? $this->mapPicture($pic)
                : null;
            return [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "location" => $item->location,
                "price" => $item->price,
                "status" => $item->status,
                "published" => $item->published,
                "featured" => $item->featured,
                "hot" => $item->hot,
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
        $property->slug = Str::slug($request->title);
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->location = $request->location;
        $property->save();

        return redirect()->back()->with('success', 'Property Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
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
