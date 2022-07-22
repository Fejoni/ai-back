<?php

namespace App\Http\Requests\Admin\Post\Theme;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThemeRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'alpha', 'exists:themes,title'],
            'titleUpdate' => ['required', 'max:255', 'alpha']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Обязательно заполните поле | title',
            'title.max' => 'Максимальная длина 255 символов | title',
            'title.alpha' => 'Поле должно состоять полностью из букв | title',
            'title.exists' => 'Данного поля не существует | title',
            'titleUpdate.required' => 'Обязательно заполните поле | titleUpdate',
            'titleUpdate.max' => 'Максимальная длина 255 символов | titleUpdate',
            'titleUpdate.alpha' => 'Поле должно состоять полностью из букв | titleUpdate',
        ];
    }
}
