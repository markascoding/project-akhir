<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'nip' => 'required',
            'nama_guru' => 'required',
            'email' => 'required|email|unique:teachers',
        ];
    }
    public function messages()
    {
        return [
            'nip.required' => 'NIP wajib diisi',
            'nama_guru.required' => 'Nama Guru wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email sudah digunakan',
        ];
    }
}
