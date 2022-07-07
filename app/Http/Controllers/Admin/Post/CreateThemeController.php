<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\ThemeRequest;
use App\Models\Admin\Post\Theme;
use Illuminate\Http\Request;
use function response;

class CreateThemeController extends Controller
{
    public function create(ThemeRequest $request)
    {
        $validatedData = $request->validated();

        Theme::create([
           'title' => $request->input('title')
        ]);

        return response()->json('Успешно создалась тема');
    }
}
