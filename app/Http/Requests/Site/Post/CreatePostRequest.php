<?php

namespace App\Http\Requests\Site\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3', 'max:3000'],
            'user_id' => ['required', 'max:100', 'Integer'],
            'subject_id' => ['required', 'max:100', 'Integer'],
        ];
    }
}
