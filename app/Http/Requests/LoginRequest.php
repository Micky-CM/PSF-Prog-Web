<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }


    public function messages(): array
    {
        return [
            'email.required'    => "Debe agregar un correo electronico",
            'email.email'       => "El formato de correo no es correcto",
            'password.required' => "La contraseña es obligatoria",
            'password.min'      => "La contraseña es muy corta",
        ];
    }
}
