<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePictureRequest;
use App\Http\Requests\UpdatePictureRequest;
use Intervention\Image\Laravel\Facades\Image;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePictureRequest $request)
    {
        $property = Property::find($request->id);


        foreach ($request->file('files') as $file) {
            $filePath = $file->store('images/properties', 'public');

            // Generate thumbnail
            $thumbnail = Image::read($file->getRealPath())->cover(256, 256);
            $thumbnailPath = 'images/properties/thumbs/' . basename($filePath);
            Storage::disk('public')->put($thumbnailPath, (string) $thumbnail->encode());

            // Save file paths to database
            $picture = new Picture();
            $picture->url = $filePath;
            $picture->thumb = $thumbnailPath;
            $property->pictures()->save($picture);
        }

        return redirect()->back()->with('success', 'Pictures uploaded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePictureRequest $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
