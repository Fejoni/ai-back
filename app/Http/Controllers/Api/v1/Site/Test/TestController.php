<?php

namespace App\Http\Controllers\Api\v1\Site\Test;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Post\SubjectResource;
use App\Models\Admin\Post\Theme;

class TestController extends Controller
{
    public function test()
    {
        $themes = Theme::all();
        return SubjectResource::collection(Theme::with('subjects')->get());
    }
}
