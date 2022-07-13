<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'theme_id' => ['required', 'max:255']
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Обязательно заполните поле',
            'title.max' => 'Максимальная длина 255 символов'
        ];
    }
}
