<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Property;
use App\Mail\ContactEmail;
use App\Support\PropertyTrait;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\SlideResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PropertyResource;

class WebController extends Controller
{
    use PropertyTrait;
    function welcome()
    {
        $slides = SlideResource::collection(Slide::all());

        $featured = PropertyResource::collection(Property::where('published', 1)
            ->orderBy('updated_at', 'DESC')
            ->where('featured', 1)
            ->limit(6)
            ->get());

        $latest = PropertyResource::collection(Property::where('published', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get());

        $hot = PropertyResource::collection(Property::where('published', 1)
            ->orderBy('updated_at', 'DESC')
            ->where('hot', 1)
            ->get());

        return Inertia::render('Welcome', [
            'slides' => $slides,
            'featured' => $featured,
            'latest' => $latest,
            'hot' => $hot,
        ]);
    }

    function properties($slug = null)
    {
        $category = $slug ? CategoryResource::make(Category::where('slug', $slug)->first()) : null;

        $categories = Category::all()->map(fn($item) => [
            "id" => $item->id,
            "slug" => $item->slug,
            "name" => $item->name,
        ]);

        $properties = PropertyResource::collection(Property::orderBy('created_at', )->with('features', 'pictures')
            ->paginate(6));
        if ($category) {
            $properties = PropertyResource::collection(
                Property::with('features', 'pictures')
                    ->whereHas('categories', function ($query) use ($slug) {
                        $query->where('slug', $slug);
                    })
                    ->paginate(6)
            );
        }

        return Inertia::render('Properties', [
            'properties' => $properties,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    function property($slug)
    {
        $property = Property::with(['categories', 'pictures', 'features'])->where('slug', $slug)->first();

        $properties = Property::where('id', '<>', $property->id)->whereHas('categories', function ($query) use ($property) {
            $query->whereIn('categories.id', $property->categories->pluck('id'));
        })->get();
        $properties = $properties ? PropertyResource::collection($properties) : null;

        return Inertia::render('Property', [
            'property' => PropertyResource::make($property),
            'properties' => $properties,
            'categories' => CategoryResource::collection($property->categories),
        ]);
    }

    function services()
    {
        return Inertia::render('Services');
    }

    function about()
    {
        return Inertia::render('About', );
    }

    function contact()
    {
        return Inertia::render('Contact');
    }

    function postContact(ContactRequest $request)
    {
        \Illuminate\Support\Facades\Mail::to('feedback@hezel.co.ke')->send(new ContactEmail($request->name, $request->email, $request->message));
        return redirect()->back()->with('success', 'Message sent');
    }
}
