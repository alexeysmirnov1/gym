<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class RobotsController extends Controller
{
    public function __invoke(): Response|Application|ResponseFactory
    {
        $setting = Settings::whereSlug(Settings::ROBOTS_SLUG)->first();

        return response($setting->fields->robots ?? '')
            ->header('Content-Type', 'text/plain');
    }
}
