<?php

namespace App\Http\Requests\AdminRequest;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required', 'max:30', 'min:2'],
            'lastname' => ['required', 'max:30', 'min:4'],
            'phone' => ['required', 'min:8'],
            'imageProfil' => 'required',
            // 'email' => ['required', 'email', 'lowercase', 'string', 'max:255'],
            'salary' => ['required'],
            'password' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', 'min:8', 'max:20'],
            'user_roles_id' => ['required', 'exists:userrole,id']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'email' => $this->input('email') ?: substr(strtolower($this->input('lastname')), 0, 1) . '' . strtolower($this->input('name')) . rand(1, 1000) . '@' . 'agence.gn'
        ]);
    }
}