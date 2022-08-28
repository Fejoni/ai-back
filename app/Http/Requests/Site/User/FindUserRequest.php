<?php

namespace App\Http\Requests\Site\User;

use Illuminate\Foundation\Http\FormRequest;
use function auth;

class FindUserRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'alpha'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Обязательно заполните поле',
            'name.max' => 'Максимальная длина 255 символов',
            'name.alpha' => 'Поле должно состоять полностью из букв',
        ];
    }
}
