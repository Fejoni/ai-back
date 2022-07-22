<?php

namespace App\Http\Requests\Admin\Post\Theme;

use Illuminate\Foundation\Http\FormRequest;

class CreateThemeRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'alpha'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Обязательно заполните поле | title',
            'title.max' => 'Максимальная длина 255 символов | title',
            'title.alpha' => 'Поле должно состоять полностью из букв | title',
        ];
    }
}
