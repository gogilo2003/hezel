<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $data = [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'contact' => [
                'phone' => '0726465936/0733283686',
                'email' => 'info@hezelinvestments.co.ke',
                'postal' => 'P.O. Box 213 - 40404, Rongo - KE',
                'location' => 'We are based in Rongo, Royal commercial building, 1st floor suite 2, Along Rongo-Homa bay highway',
            ],
            "aboutIntro" => "We are a real estate property consultants firm changing the property business landscape in Kenya specifically in nyanza and western part of the country.
Our operations are anchored on honesty, value for money and strategic growth of our clients.",
        ];

        if (session('success')) {
            $data['notification'] = ['success' => session('success')];
        }
        if (session('danger')) {
            $data['notification'] = ['danger' => session('danger')];
        }
        if (session('warning')) {
            $data['notification'] = ['warning' => session('warning')];
        }
        if (session('info')) {
            $data['notification'] = ['info' => session('info')];
        }

        return array_merge(parent::share($request), $data);
    }
}
