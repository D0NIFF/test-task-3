<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => 'email|unique:users,email',
            'age' => 'integer|between:1,100',
        ];
    }

    public function messages(): array
    {
        return [
            'email.email' => 'Email некорректный',
            'email.unique' => 'Пользователь с таким Email уже существует',
            'age.between' => 'Возраст должен быть от 1 до 100',
            'age.integer' => 'Возраст должен быть числом',
        ];
    }
}
