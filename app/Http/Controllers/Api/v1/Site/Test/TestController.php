<?php

namespace App\Http\Controllers\Api\v1\Site\Test;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Post\SubjectResource;
use App\Models\Admin\Post\Theme;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TestController extends Controller
{
    public function test(): AnonymousResourceCollection
    {
        $themes = Theme::all();
        return SubjectResource::collection(Theme::with('subjects')->get());
    }
}
