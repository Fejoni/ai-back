<?php

namespace App\Http\Requests\Admin\Post\Subject;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'alpha', 'exists:subjects,title'],
            'theme_id' => ['required', 'max:255', 'Integer', 'exists:subjects,id'],
            'titleUpdate' => ['required', 'max:255', 'alpha'],
            'theme_idUpdate' => ['required', 'max:255', 'Integer'],
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
            'theme_id.max' => 'Максимальная длина 255 символов | theme_id',
            'theme_id.Integer' => 'Поле должно быть целым числом | theme_id',
            'theme_id.required' => 'Обязательно заполните поле | theme_id',
            'theme_idUpdate.required' => 'Обязательно заполните поле | theme_idUpdate',
            'theme_idUpdate.max' => 'Максимальная длина 255 символов | theme_idUpdate',
            'theme_idUpdate.Integer' => 'Поле должно быть целым числом | theme_idUpdate',
        ];
    }
}
