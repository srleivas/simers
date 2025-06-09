<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'cpf' => ['numeric', 'digits:11', 'unique:users,cpf'],
            'phone' => ['numeric', 'max_digits:20'],
            'date_of_birth' => ['date', 'before:today'],
            'password' => ['required', 'string', 'min:6'],
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $userId = $this->route('user')->id ?? null;
            $rules['email'][3] = 'unique:users,email,' . $userId;
            $rules['password'] = ['nullable', 'string', 'min:6'];
        }

        return $rules;
    }
}
