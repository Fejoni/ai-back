<?php

namespace App\Http\Controllers\Admin\Post\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\SubjectRequest;
use App\Models\Admin\Post\Subject;

class CreateSubjectController extends Controller
{
    public function create(SubjectRequest $request)
    {
        $validatedData = $request->validated();

        Subject::create([
            'title' => $request->input('title'),
            'theme_id' => $request->input('theme_id')
        ]);
    }
}
