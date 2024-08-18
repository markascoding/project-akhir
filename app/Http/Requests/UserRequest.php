<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    function messages()
    {
        return [
            'name.required' => 'Gagal Tambah Data, Nama wajib diisi',
            'email.required' => 'Gagal Tambah Data, Email wajib diisi',
            'email.email' => 'Gagal Tambah Data, Format email salah',
            'password.required' => 'Gagal Tambah Data, Password wajib diisi',
        ];
    }

}
