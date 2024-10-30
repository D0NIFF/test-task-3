<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|integer|between:1,100',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле Имя обязательно для заполнения!',
            'email.required' => 'Поле Email обязательно для заполнения!',
            'age.required' => 'Поле Возраст обязательно для заполнения!',
            'email.email' => 'Email некорректный',
            'email.unique' => 'Пользователь с таким Email уже существует',
            'age.between' => 'Возраст должен быть от 1 до 100',
            'age.integer' => 'Возраст должен быть числом',
        ];
    }
}
