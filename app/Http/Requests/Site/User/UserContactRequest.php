<?php

namespace App\Http\Requests\Site\User;

use Illuminate\Foundation\Http\FormRequest;

class UserContactRequest extends FormRequest
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
            'user_id' => ['required', 'max:255'],
            'gitOrBit' => ['max:255'],
            'telegram' => ['max:255'],
            'skype' => ['max:255'],
            'vk' => ['max:255'],
            'discord' => ['max:255'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Обязательно заполните поле',
            'user_id.max' => 'Максимальная длина 255 символов',
            'gitOrBit.max' => 'Максимальная длина 255 символов',
            'telegram.max' => 'Максимальная длина 255 символов',
            'skype.max' => 'Максимальная длина 255 символов',
            'vk.max' => 'Максимальная длина 255 символов',
            'discord.max' => 'Максимальная длина 255 символов',
        ];
    }
}
